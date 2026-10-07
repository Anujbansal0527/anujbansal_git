# Database review — REDVision

Reviewed 1 October 2026 using `Database/post.sql`, `Database/redtechn_databs (1).sql`, and the application source. This is an offline analysis: neither dump was imported and no database or app behavior was changed. Inserted personal data and credentials are omitted from this report.

## What the two files contain

| File | Export header time | Tables | Exported rows | Role |
| --- | --- | ---: | ---: | --- |
| `redtechn_databs (1).sql` | 1 October 2026, 12:14 PM | 43 | 37,890 | Main database snapshot |
| `post.sql` | 1 October 2026, 12:25 PM | 1 | 37 | Slightly later blog snapshot |

Times above are copied from export headers; their timezone is not specified. Both declare the same database, `redtechn_databs`, and MariaDB 5.5.68. The exporter reports PHP 8.4.24; that does not establish the application's PHP runtime.

The `post` definitions match. All 36 post rows in the full dump are identical to their counterparts in the separate dump. The separate dump adds post ID **216**, with no changed or removed shared rows. Its next auto-increment is 221, versus 216 in the full dump; these counters are not row counts.

Both files contain `CREATE TABLE post` and inserts for shared primary keys. They are not sequential migrations. Importing the full dump and then blindly importing `post.sql` into the same database will encounter existing-table/duplicate-key conflicts. For a new staging restore, restore the full dump and deliberately reconcile the additional post; do not replace or drop a production table to merge one record. Neither file selects or creates the target database for you.

## Business data map

| Module | Tables | Significant row counts |
| --- | --- | --- |
| Authentication | `admin`, `admin_blog`, `otp_codes`, `otp_codes1`, `register` | 1 admin, 1 blog admin, 24 blog OTP records, 141 registrations |
| Recruitment | `candidate_data`, `candidate_table`, `career_vacancy` | 4,391 applications, 2 alternate candidate records, 0 vacancies |
| Lead acquisition | `leads`, `landing_leads`, `mail details`, `lms_api_testing`, `salesninjainsertLeads` | 1,955 leads, 5,194 mail-detail records, 52 Sales Ninja leads |
| Payments | `payonline`, `payment_info`, `payment_response` | 820 Easebuzz records, 1,065 older payment-info records, 12 older responses |
| Blog/content | `post`, `post_category`, `static_pages`, gallery/media/testimonial tables | 36 posts in full dump, 3 categories, 18 static pages |
| Fund/invoice reference | `fundmaster`, `mflocations`, city/postcode tables | 69 fund records, 1,293 location records |
| Public configuration | `rv_web_login`, `rv_web_calculators`, `header`, `popinfo` | 9 login-option records, 28 calculators |
| Analytics | `location`, `visitor`, `ip address`, `user` | 14,764 location records, 7,250 visitor records |

Counts are parsed from exported insert tuples, not estimated from auto-increment values. Empty tables are not proof that a feature is unused: code may use static content, another database, or an external service.

## Confirmed problems and priorities

### 1. High: all exported Sales Ninja mobile numbers have lost their original value

`salesninjainsertLeads.mobile` is signed `int(13)`. All **52 rows contain 2147483647**, the signed 32-bit maximum. The `(13)` does not provide 13-digit capacity. The PHP handler now binds the mobile as a string (`salesninja-rvscmail.php:135`), but the database still converts it to the integer column.

Change the column to a string appropriate for the accepted phone format. The handler currently accepts Indian 10-digit mobiles, whereas a future international format might need `varchar(20)`. Validate and normalize consistently. Existing original numbers cannot be recovered by changing the column; reconcile them from authorized external CRM records or other reliable backups. Preserve evidence of the damaged values rather than treating them as real contacts. `fArn int(8)` also deserves review because ARN is an identifier rather than an arithmetic quantity.

### 2. High: duplicate payment transactions are present, not merely possible

`payonline` has only an `id` primary key. Both transaction ID and gateway payment ID have **9 duplicate groups, representing 10 extra rows**. Each repeated transaction group has the same status. This supports the earlier concern about replay/duplicate inserts in `response.php`, although the originating cause is not proven.

Review the duplicates against gateway records, define a canonical transaction and retain any necessary event history. Then enforce the chosen gateway/transaction identity and make callback processing idempotent. Do not delete duplicates indiscriminately or add uniqueness before reconciling them.

`payonline.amount` is an integer, so it cannot preserve fractional currency amounts. Use a suitable `DECIMAL` with an explicit currency policy, or an integer minor-unit representation with matching application conversions. The older tables store amounts as strings, so parsing and rounding must be explicit during migration. `payment_info.oid` is blank in **1,000 of 1,065 rows**; older reconciliation cannot safely rely on that field alone. `payment_response.oid` is blank in 6 rows and has one repeated nonblank group; multiple payment events may be legitimate there.

### 3. High: plaintext-looking legacy credentials coexist with bcrypt credentials

Both admin tables contain a nonempty, plaintext-looking `password` value and a bcrypt-formatted `smpassword` value. This aligns with the code: newer login verifies a hash while old endpoints compare `password` directly and can create an authenticated session without OTP. The dump makes the existence of legacy credential material concrete; no login attempt was made.

The registration table mixes **116 hex strings of hash-like lengths** with **25 plaintext-looking values**. Shape classification does not identify a specific hash algorithm or prove how every registration value is used. Locate all consumers, migrate/reset legacy credentials deliberately, remove usable old login paths, and stop emailing stored passwords. Do not simply hash an already-hashed value or drop columns before checking dependencies.

### 4. High: schema and code disagree on required fields and a required table

The supplied dump contains no `advisertax_info`, but `gst_invoice_new_pdf.php:100-112` queries and writes it using the `redtechn_databs` connection. A restore using just these dumps cannot satisfy those queries unless a separate migration creates it. Obtain the authoritative schema; inventing columns from the few visible queries would not establish all required constraints and consumers.

Both OTP tables declare `attempts` and `used` as `NOT NULL` without defaults. Initial OTP inserts omit them; AJAX resend additionally omits `ip`. `otp_codes1.ip` is `int(45)` while career OTP IP is correctly a `varchar(45)`. Passing an IP address string to the integer column cannot preserve the address as written. Add explicit initial values/defaults and align IP storage with the actual representation.

Blog creation omits `head_teg` and `blog_part`, also declared `NOT NULL` without defaults. These writes can fail under strict SQL mode. The dump explicitly sets a permissive mode, so a restore can mask defects that reappear on another server. Make inserts valid independently of permissive coercion and test with the intended session SQL mode.

### 5. Medium/high: lead timestamps and identifiers undermine deduplication

All **1,955 lead ARN values have a trailing space**, matching the insert code. Every exported lead timestamp parses as `m/d/y,h:i:s:A`; the observed range is 19 December 2024 through 30 September 2026. The column is `varchar(255)`, and the application compares those strings with `>` for a three-day window. Month-first text does not order chronologically across year boundaries.

There are **59 repeated normalized mobile/ARN groups, representing 133 extra rows**. Repeat inquiries over different dates may be legitimate; these counts alone do not prove violations of the three-day policy. Convert timestamps with the known source timezone and explicit format, trim identifiers consistently, and implement a time-window policy. Do not impose a permanent unique mobile/ARN constraint if future inquiries are allowed.

`leads.message` is limited to 255 characters; 2 rows reach that limit. This indicates a possible truncation boundary, not proof of lost text. Match the column and server validation to the product's intended message length.

### 6. Medium: important lookup indexes and relationship constraints are missing

The dump declares **zero foreign keys**. Apart from primary keys, its only nonredundant unique index is on `google_reviews_history.review_time`; several other unique `id` indexes repeat an existing primary key.

Suggested indexes must be checked with real queries and `EXPLAIN` in staging:

- `post.slug_url`: lookup index, potentially unique after checking both snapshots and defining slug semantics. No blank or duplicate slugs were found in the full snapshot.
- Admin usernames: unique indexes after checking identity/case rules.
- OTP `(email, used, created_at)` for latest unused code lookup; `(email, created_at)` for send counts if needed, plus expiry cleanup support.
- Leads `(mobile, arn, created_at)` after creating a typed timestamp and normalizing identifiers.
- Canonical payment identifiers after reconciliation and reasonable field-length changes; current `varchar(1000)` identifiers complicate full-key indexing.
- `fundmaster.CO_CODE` and `rv_web_calculators.urlName` for current equality lookups.

`mflocations` already has a composite primary key beginning with `EntityCode, LocationType`; do not add a redundant identical-prefix index without a query-plan reason. Eleven location rows have no matching `fundmaster.CO_CODE` in this dump. Verify whether master data is incomplete or these rows are obsolete before enforcing a relationship.

`post` has no category foreign-key column. `blog_part` is used by the renderer as a display flag, so it should not be assumed to reference `post_category`. Candidate jobs are stored as text rather than a vacancy reference; adding a foreign key would require reconciling the empty vacancy table and historical job names first.

### 7. Medium: mixed engines and encodings increase migration risk

There are **26 InnoDB and 17 MyISAM tables**. Blog and all three payment tables use MyISAM. A `START TRANSACTION` in the dump does not make writes to MyISAM transactional; these tables cannot participate in ordinary rollback guarantees and use table-level locking.

Plan InnoDB conversion with backup, staging checks, key-length checks and downtime/locking expectations. Normalize encodings deliberately: tables mix latin1, utf8 and utf8mb4, while several blog columns explicitly use utf16. Setting `SET NAMES utf8mb4` in an export does not change column encodings. Verify actual stored characters and PHP connection settings before conversion to avoid double conversion or garbled text.

## Corrections to the earlier app review

`rv_web_login` contains UI option fields (`login_type`, `radio_name`, `radio_value`, `status`), not user passwords. Its public response is therefore not evidence of credential exposure.

Conversely, all **28 calculator records have a nonempty `apikey`**. The public calculator endpoints use `SELECT *`, including that field. Determine whether these are intentionally public embed keys or server secrets; their presence alone does not establish privilege. Return a deliberate allowlist and keep privileged keys server-side.

The payment table has no database uniqueness constraint protecting transaction identifiers, and repeated identifiers are present. The lead timestamp column is confirmed to be text. Those earlier schema-dependent concerns are now supported by the dump.

The SQL files themselves contain credential material and personal records and now reside inside the app directory. The inspected root rewrite rules serve existing files and contain no `.sql` denial; no `Database/.htaccess` was found. If this folder is deployed under the web document root without external restrictions, the dumps may be downloadable. Keep them outside served/deployed files or apply explicit server denial. No live download was attempted.

## Safe sequence for improvement

1. Secure backups and create an isolated restore target. Reconcile the extra blog post explicitly.
2. Restore-test the complete schema and obtain the missing GST table; verify application connections and SQL mode.
3. Fix mobile/IP/amount types, required-field inserts and unsafe authentication/query paths before new data is written.
4. Preserve original records while reconciling corrupted phones, payment duplicates and legacy credentials.
5. Migrate lead timestamps/identifiers, then introduce justified indexes and constraints. Change PHP and schema together.
6. Convert engines/encodings in staging and validate Unicode, payment callbacks, OTP flows, invoices, recruitment and blog creation end to end.

Changing types does not repair data already truncated or coerced. A prepared statement protects query structure but does not correct a wrongly typed column. A permanent unique constraint is not a replacement for a time-window business rule.

## Reproducibility and limits

`tools/database_audit.py` parses definitions and quoted insert tuples without executing SQL. It validates insert column counts, calculates actual row counts, compares post rows, and outputs only schema/aggregate results to `Database/audit_summary.json`. No inserted credentials, names, emails, phone numbers, card values or post bodies are included in that output. Credential labels are shape-based classifications, not cryptographic verification. Card-field formatting was inspected only in aggregate; no claim is made that full card numbers are present.

No MySQL/MariaDB executable was available through this command environment, so restore execution, query plans, current server settings and live data were not verified. Snapshot findings describe the supplied exports, which may differ from production. The proposed migrations are a sequence for review, not SQL executed against your main database.
