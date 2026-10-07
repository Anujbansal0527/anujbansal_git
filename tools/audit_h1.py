"""Source-only H1 inventory; does not execute PHP or connect to databases."""
from pathlib import Path
import re
import csv
from database_audit import audit

ROOT = Path(__file__).resolve().parents[1]
EXCLUDED = {'vendor', 'node_modules', 'assets', 'tinymce', 'MPDF81', 'MPDF57', 'TCPDF-main', 'PHPMailer-master', 'phpmailer', 'easebuzz-lib', '.git'}
def clean(text):
    return re.sub(r'<!--.*?-->', '', text, flags=re.S)
def headings(text):
    return list(re.finditer(r'<h1\b[^>]*>', clean(text), re.I))
files = {p.resolve(): p.read_text(encoding='utf-8-sig', errors='replace') for p in ROOT.rglob('*') if p.suffix.lower() in {'.php', '.html', '.htm'} and not any(x in EXCLUDED for x in p.relative_to(ROOT).parts) and '.example.' not in p.name}
def included(p, seen=None):
    seen = set() if seen is None else seen
    if p in seen:
        return []
    seen = seen | {p}
    result = []
    for m in re.finditer(r'\b(?:include|require)(?:_once)?\s*\(?\s*[\'"]([^\'"]+)[\'"]', clean(files[p])):
        target = (p.parent / m[1]).resolve()
        if target in files:
            result.append(target)
            result.extend(included(target, seen))
    return result
rows = []
for p, text in sorted(files.items()):
    own = len(headings(text))
    sources = [q for q in included(p) if headings(files[q])]
    extra = sum(len(headings(files[q])) for q in sources)
    rows.append([p.relative_to(ROOT).as_posix(), own, extra, own+extra, '; '.join(q.relative_to(ROOT).as_posix() for q in sources)])
with (ROOT / 'H1_AUDIT.csv').open('w', newline='', encoding='utf-8') as f:
    w = csv.writer(f)
    w.writerow(['file', 'direct_h1', 'included_h1', 'source_total', 'included_h1_sources'])
    w.writerows(rows)
multiple = [r for r in rows if r[3] > 1]
report = ['# H1 source audit', '', 'Checked local application PHP/HTML files and literal includes. Excluded third-party libraries, asset samples, and example configuration copies. HTML comments are excluded. Counts are source counts, not live DOM measurements; conditional PHP branches and loops require separate interpretation. No website code was changed.', '', f'Files inventoried: {len(rows)}. Files with more than one source H1 after literal includes: {len(multiple)}. Full inventory: H1_AUDIT.csv.', '', '## Files with multiple H1 sources', '', '| File | Direct | Included | Total |', '| --- | ---: | ---: | ---: |']
report.extend(f'| {r[0]} | {r[1]} | {r[2]} | {r[3]} |' for r in multiple)
report += ['', '## Shared cause', '', '`footer.php:19` and `include/footer.php:13` each add an H1: Start Your Journey with REDVision Today. Any page with its own H1 and either footer will have multiple H1s when those sections render.', '', '## Database blog content', '']
_, tables = audit(ROOT / 'Database' / 'post.sql')
posts = tables.get('post', [])
report.append(f'Checked {len(posts)} posts in the local post.sql snapshot. The blog article template renders titles as H2/H3 and its common footer contributes one H1 (blog/index.php:696).')
for post in posts:
    n = len(headings(post.get('content') or ''))
    if n:
        report.append(f'- /blog{post["slug_url"]}: {n} H1 in stored content plus one common footer H1 = {n+1} H1s. blog_part={post.get("blog_part")}; content renders outside the blog_part condition.')
report += ['', '## Interpretation and next steps', '', '- about.php, career.php, independence_day.php, contact.php and the marketing service pages contain several independent H1 sections.', '- The static growth-strategy article has an article H1 and its own footer H1.', '- easebuzz.php, transaction.php, and the admin OTP pages contain alternative status branches: source totals do not mean all headings appear simultaneously. transaction.php also includes the shared footer, so its rendered status H1 plus footer gives two.', '- blog/index.php serves listing and article branches; database content is assessed separately above.', '- For one main H1 per page, change footer headings and secondary section headings to H2 or styled non-heading text, then provide a main H1 on pages that currently rely solely on the footer.', '- Dynamic includes, current database changes, injected HTML, JavaScript cloning, and live server output are outside this source inventory.']
(ROOT / 'H1_AUDIT.md').write_text('\n'.join(report)+'\n', encoding='utf-8')
print(f'Inventoried {len(rows)} files; {len(multiple)} have multiple source H1s. Reports: H1_AUDIT.md and H1_AUDIT.csv')
for r in multiple:
    print(r[:4])
