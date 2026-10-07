# H1 source audit

Checked local application PHP/HTML files and literal includes. Excluded third-party libraries, asset samples, and example configuration copies. HTML comments are excluded. Counts are source counts, not live DOM measurements; conditional PHP branches and loops require separate interpretation. No website code was changed.

Files inventoried: 650. Files with more than one source H1 after literal includes: 34. Full inventory: H1_AUDIT.csv.

## Files with multiple H1 sources

| File | Direct | Included | Total |
| --- | ---: | ---: | ---: |
| about.php | 7 | 1 | 8 |
| advisor-x.php | 1 | 1 | 2 |
| blog/mutual-fund-software-in-india-complete-growth-strategy-for-indian-rupee500-cr-aum/index.php | 2 | 0 | 2 |
| blog/new-blog3.php | 1 | 1 | 2 |
| blog/new-blog4.php | 1 | 1 | 2 |
| brand-kit.php | 2 | 1 | 3 |
| business-booster-platform.php | 1 | 1 | 2 |
| career.php | 3 | 1 | 4 |
| contact.php | 2 | 1 | 3 |
| content-marketing.php | 2 | 1 | 3 |
| easebuzz.php | 3 | 0 | 3 |
| email-marketing.php | 2 | 1 | 3 |
| financial-websites-for-mfds-old.php | 1 | 1 | 2 |
| hiring-react-native.php | 1 | 1 | 2 |
| independence_day.php | 3 | 1 | 4 |
| logo-design.php | 2 | 1 | 3 |
| mutual-fund-software-for-distributors.php | 1 | 1 | 2 |
| mutual-fund-software-in-india.php | 1 | 1 | 2 |
| mutual-fund-software.php | 1 | 1 | 2 |
| paid-advertisement.php | 2 | 1 | 3 |
| robo-advisory-platform.php | 1 | 1 | 2 |
| robo-advisory-software.php | 1 | 1 | 2 |
| search-engine-optimization.php | 2 | 1 | 3 |
| social-media-management.php | 2 | 1 | 3 |
| thanks.php | 1 | 1 | 2 |
| transaction.php | 3 | 1 | 4 |
| ui-ux-design.php | 2 | 1 | 3 |
| wealth-elite.php | 1 | 1 | 2 |
| web-development.php | 2 | 1 | 3 |
| web-robo.php | 1 | 1 | 2 |
| webredvblogadmin19122023/send_otp.php | 2 | 0 | 2 |
| webredvblogadmin19122023/verify_otp.php | 4 | 0 | 4 |
| webredvcareeradmin19122023/send_otp.php | 2 | 0 | 2 |
| webredvcareeradmin19122023/verify_otp.php | 4 | 0 | 4 |

## Shared cause

`footer.php:19` and `include/footer.php:13` each add an H1: Start Your Journey with REDVision Today. Any page with its own H1 and either footer will have multiple H1s when those sections render.

## Database blog content

Checked 37 posts in the local post.sql snapshot. The blog article template renders titles as H2/H3 and its common footer contributes one H1 (blog/index.php:696).
- /blog/best-mutual-fund-software-every-distributor-needs-in-2026: 1 H1 in stored content plus one common footer H1 = 2 H1s. blog_part=1; content renders outside the blog_part condition.
- /blog/best-mutual-fund-software-in-india-9-features-growing-mfds-must-check: 1 H1 in stored content plus one common footer H1 = 2 H1s. blog_part=1; content renders outside the blog_part condition.

## Interpretation and next steps

- about.php, career.php, independence_day.php, contact.php and the marketing service pages contain several independent H1 sections.
- The static growth-strategy article has an article H1 and its own footer H1.
- easebuzz.php, transaction.php, and the admin OTP pages contain alternative status branches: source totals do not mean all headings appear simultaneously. transaction.php also includes the shared footer, so its rendered status H1 plus footer gives two.
- blog/index.php serves listing and article branches; database content is assessed separately above.
- For one main H1 per page, change footer headings and secondary section headings to H2 or styled non-heading text, then provide a main H1 on pages that currently rely solely on the footer.
- Dynamic includes, current database changes, injected HTML, JavaScript cloning, and live server output are outside this source inventory.
