# REDVision app review

Reviewed 1 October 2026. This is a static review of the supplied backup, not a production penetration test. No application code or production data was changed.

Database follow-up: the subsequently supplied dumps were reviewed in `DATABASE_ANALYSIS.md`. They confirm absent payment uniqueness, textual lead timestamps, legacy credential material and additional type/schema defects. They also establish that `rv_web_login` contains UI configuration rather than account passwords. Read the database report for updated evidence where this initial review says the schema was unavailable.

## Scope and architecture

The repository contains a server-rendered PHP/MySQL website with directly accessible PHP endpoints. The reviewed entry points use procedural PHP, MySQLi and some PDO, shared PHP templates, jQuery, MDB/Bootstrap styling, and Apache rewrite rules. It is primarily the company website plus operational features; Wealth Elite functionality is partly delegated to external APIs, so this backup does not establish the architecture or security of that separate service.

| Area | Main files/directories | Purpose |
| --- | --- | --- |
| Public website | `index.php`, product/service pages, `include/`, `header.php`, `footer.php` | Product marketing, content, shared layout and lead acquisition |
| Blog | `blog/`, `admin_blog/` | Public articles, post/category management, editor uploads |
| Recruitment | `career.php`, `career_mail.php`, `admin/`, `careerdata/` | Applications, resumes, vacancies, candidate notes/status |
| Admin authentication | `webredvblogadmin19122023/`, `webredvcareeradmin19122023/`, legacy login files | Password and email OTP login plus older password-only paths |
| Payments | `pay-online.php`, `response.php`, `transaction.php`, `easebuzz-lib/` | Easebuzz integration and local payment records |
| Lead/service integration | `contact_data.php`, password-reset proxies, related form endpoints | Local persistence and requests to Wealth Elite APIs |
| Other utilities | `api/`, `form/`, invoice scripts, `google-reviews/`, `software/`, `salesninja/` | Configuration APIs, PDF forms, invoices, reviews and additional landing pages |

Composer declares mPDF; the lockfile contains mPDF 8.2.2 and FPDI 2.5.0. Additional PDF and mail libraries are copied into several directories outside Composer management. The PHP configuration references an `ea-php74` session directory; the actual production PHP version is unverified.

## Priority findings

### 1. Critical: admin mutations lack endpoint authentication

`admin_blog/remove_post.php:2-13` and `admin_blog/remove_category.php:2-6` include database configuration but do not include the existing admin session guard. They delete records using a GET parameter. `admin/candidate_note_data.php:2-9` and `admin/candidate_status_data.php:2-9` similarly update candidate records without the session guard.

If these files are served as supplied, unauthenticated requests can change or delete data. Protect every endpoint before reading input or doing work; enforce authorization, POST requests and CSRF checks for admin mutations. The top-level admin landing page's redirect does not protect direct endpoint requests. External server access restrictions could reduce exposure, but none are shown in the inspected rules.

### 2. Critical: SQL injection paths

The deletion endpoints interpolate `id` directly into SQL. Candidate note/status endpoints interpolate POST values directly. `contact_data.php:39,46` builds lead queries using raw mobile, ARN, name and message values. `career_mail.php:115` does the same for applications.

These are confirmed unsafe query constructions. Use bound parameters throughout and validate IDs and business fields. Captcha is not a database protection. Normal input containing apostrophes can also break these queries.

### 3. Critical/high: unauthenticated upload with unsafe filename handling

`admin_blog/upload.php:2-20` has no session guard. Although it checks image signatures, it preserves the original filename and extension and writes beneath the public asset directory. Image signature validation alone does not prevent a file containing both image data and executable content from retaining a script extension. Existing files can also be overwritten. The CKEditor callback includes unescaped request values.

Authenticate uploads, generate filenames and extensions on the server, enforce size limits, decode/re-encode accepted images, and prohibit script execution in storage. Remote code execution depends on Apache/PHP execution rules; it was not demonstrated.

### 4. High: injected candidate notes can become stored XSS

An unauthenticated endpoint stores candidate notes (`admin/candidate_note_data.php:9`). `admin/candidates_data.php:661` renders those notes inside a textarea and attribute without HTML escaping. Crafted content can escape its intended HTML context when an admin opens candidate management.

Fix the endpoint authorization and database queries, then escape output for its precise HTML context. Blog rich text needs a separate sanitization policy.

### 5. High: older authentication paths remain alongside OTP login

The newer login uses `password_verify`, prepared queries, and an OTP stage. However, `admin_blog/login111.php:102-109` sets the same authenticated session using a direct comparison with the legacy `password` field; `admin/login11.php:95-104` follows the equivalent pattern. Both files contain password-recovery logic that emails the stored password. Whether usable legacy credentials exist is database-dependent.

Retire these routes after checking dependencies, migrate credentials to hashes, and use expiring reset tokens. Regenerate session IDs on successful authentication.

### 6. High: OTP resend accepts arbitrary email without authentication

`webredvblogadmin19122023/send_otp_ajax.php:13-28` accepts an email from POST and inserts a new OTP without checking the pending login session or limiting sends. This differs from `send_otp.php`, which checks the session and implements a recent-send count. The AJAX path also uses `rand` and hardcodes expiry. OTP emails are copied to several additional recipients.

Bind resend to the pending authenticated identity, share generation/rate-limit logic with initial issuance, invalidate previous codes and reconsider copying authentication codes. This is an abuse and OTP-disruption risk, not a demonstrated arbitrary-account login bypass. OTP verification's read/update steps also need atomic consumption to avoid concurrent reuse.

### 7. High: configuration and API exposure

Database credentials are embedded in configuration files, and OTP configuration contains database/SMTP credentials. Payment salt is stored in `response.php`. Values have deliberately been omitted from this report. Move secrets outside the served source tree or into deployment-managed configuration, and rotate credentials if the backup has been shared outside trusted access.

`api/web_login.php:23-37` returns every column of active `rv_web_login` records without authentication and allows all origins. The schema was not supplied, so actual sensitive fields cannot be established. Replace `SELECT *` with a deliberate public-field allowlist or require authentication, according to the endpoint's purpose. CORS restrictions alone do not authenticate an endpoint.

## Confirmed behavior and reliability issues

- **Login validation fails in JavaScript:** `webredvblogadmin19122023/index.php:93` defines `id="password"`, but `:109` reads `getElementById('smpassword').value`. The lookup returns null. Passwords and usernames are also SQL-escaped before use with hashing/prepared queries (`:28-29`), which changes input containing certain characters. Use the original password with `password_verify` and bind the original username. Check the duplicated career login for the same defects.
- **OTP session and redirect ordering:** `verify_otp.php` emits HTML before starting sessions and sending redirects and starts the session twice. This can produce headers-already-sent failures depending on buffering. Process authentication before rendering any HTML.
- **Lead deduplication compares formatted strings:** `contact_data.php:34-46` uses `m/d/y,h:i:s:A` values in a greater-than comparison. If stored as text, this does not sort chronologically across month/year boundaries. The insert also appends a space to ARN while the duplicate check uses the original ARN. Normalize ARN and use a real datetime column and bound time range.
- **Partial lead submission:** the contact handler inserts locally before checking the remote API result, has no explicit cURL timeout, builds URL-encoded data by string concatenation, and does not handle transport/JSON failures. A failed remote call can leave a saved lead that blocks a retry. Encode fields correctly and define retry/reconciliation behavior.
- **Payments need stronger persistence handling:** the bundled library does verify response hashes (`easebuzz-lib/payment1.php:833-861`). Do not describe this integration as lacking signature verification. However, `response.php:25-44` does not explicitly check the library's outer result status, interpolates callback fields into SQL, and visibly inserts every callback without an application-level replay check. A database unique constraint might mitigate duplicate records; schema is unavailable. Validate response shape/status, bind fields, reconcile expected transaction/amount and make updates idempotent.
- **Reflected XSS on transaction display:** `transaction.php:177-183` echoes query-string `tId` without escaping. Its success display also trusts the `q` parameter rather than looking up verified payment state. Render escaped, server-verified transaction information.
- **Debug output:** legacy logins enable display of all PHP errors. `software/submit_form.php:40` enables SMTP debug level 3. Disable public debug output and retain private diagnostics.
- **Missing include:** `transaction.php:211` includes `right.php`, which is absent from the root folder inventory.

## Maintenance, presentation and deployment

Multiple header/footer systems, duplicated login code and manual copies of libraries make consistent changes difficult. Consolidate shared behavior incrementally after urgent endpoint fixes. Several public-root test/old scripts, error logs and resume files are present; verify what is deployed and deny public access to private operational files. Resumes currently live in public-root storage; move them to private storage with authorized downloads.

The shared footer loads both minified/unminified variants of Venobox and multiple LightGallery bundles; shared head markup loads both animation stylesheet variants. Remove duplicates after verifying plugin behavior. Public pages use production absolute URLs, complicating isolated staging. The shared viewport disables zoom. Some Open Graph tags are duplicated, and the 404 page does not visibly set an HTTP 404 status. Validate rendered mobile layouts, accessibility, response codes and metadata in staging. No measured performance claims are made here.

Root Apache rules enforce HTTPS and www, but nested admin rules contain HTTP redirects for non-www hosts. Align redirect rules and confirm behavior with a request matrix. Long-lived asset caching needs versioned filenames or equivalent cache busting.

The initial Git status lists the app files as untracked. No project-owned automated test suite, database schema or deployment documentation was identified in the inspected locations; library test folders and scripts named `test` are not evidence of an application suite.

## Recommended order and verification

1. Establish a recoverable staging copy and database backup; inventory deployed entry points.
2. Protect admin mutation/upload endpoints, close SQL injection paths and escape candidate/transaction output.
3. Consolidate authentication, remove usable legacy routes and secure OTP resend/session handling.
4. Protect secrets, public API fields, logs and uploaded documents.
5. Fix lead delivery/deduplication and payment idempotency, then consolidate templates/dependencies and improve frontend loading.

Before release, verify that unauthenticated mutations fail without modifying data; valid admin requests work; missing/invalid CSRF requests fail; script-extension uploads are rejected; quote-containing inputs survive safely; hostile notes/transaction IDs display as text; OTP expiry, resend limits and single-use behavior hold; repeated payment callbacks produce one transaction; and failed remote lead delivery can be retried safely.

PHP and Composer were unavailable through the current command environment, so PHP linting, runtime tests, browser rendering and database checks were not performed. No live endpoints were probed, forms submitted, OTP emails sent or payments initiated. Findings are based on local source; server-level controls, schemas and separate external services remain unverified. This review identifies substantial concrete issues but is not an exhaustive audit of every file.
