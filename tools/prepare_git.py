"""Prepare credential-safe example files and ignore local deployment originals.

Run before the first commit. Does not change original PHP files or delete assets.
"""
from pathlib import Path
import re
import json

ROOT = Path(__file__).resolve().parents[1]
IGNORES = '''# Local database dumps contain private data and credentials
/Database/
*.sql
*.sql.gz

# Reproducible Composer dependencies; run composer install
/vendor/
/node_modules/

# Private uploads and runtime output
/careerdata/
/admin/careerdata/
/admin/candidate_assets/
/admin/files/
/assets/files/
/assets/images/admin/
**/uploads/
error_log
error_log.*
*.log
__pycache__/
*.pyc
.env
.env.*
!.env.example
/.aws/
/.ssh/
auth.json
*.key
*.p12
*.pfx
.ftpquota
/.user.ini
/php.ini

# Document archives and large media are distributed outside Git
*.pdf
*.doc
*.docx
*.xls
*.xlsx
*.ppt
*.pptx
*.mp4
*.mov
*.avi
*.webm
*.zip
*.rar
*.7z
*.tar
*.gz
*.bak
*.tmp
*.swp
*.psd
*.ai
.DS_Store
Thumbs.db

# Third-party sample/test material is not used by the website
/phpmailer-old/examples/
/phpmailer-old/test/
**/PHPMailer-master/examples/
**/phpmailer/smtp/examples/
/form/TCPDF-main/examples/
/form/TCPDF-main/tools/

# Local credential-bearing files; safe examples are tracked instead
'''

SENSITIVE = r'(?:pass(?:word|wd)?|smtp_?password|smpassword|salt|merchant_?key|api_?key|apikey|client_?secret|access_?token|auth_?token|secret)'
PATTERNS = [
    re.compile(r'\$(?:[A-Za-z0-9]+_)*(?:' + SENSITIVE + r')\s*=\s*([\'\"])((?:\\.|(?!\1).)*)\1', re.I),
    re.compile(r'->(?:Password|apiKey|accessToken)\s*=\s*([\'\"])((?:\\.|(?!\1).)*)\1', re.I),
    re.compile(r'[\'\"](?:r|db_)?' + SENSITIVE + r'[\'\"]\s*=>\s*([\'\"])((?:\\.|(?!\1).)*)\1', re.I),
    re.compile(r'mysqli_connect\s*\(\s*[\'\"][^\'\"]*[\'\"]\s*,\s*[\'\"][^\'\"]*[\'\"]\s*,\s*([\'\"])((?:\\.|(?!\1).)*)\1', re.I),
    re.compile(r'setAPIKey\s*\(\s*([\'\"])((?:\\.|(?!\1).)*)\1', re.I),
    re.compile(r'\$(?:[A-Za-z0-9]+_)*(?:api_?key|access_?token|auth_?token)\s*(?:!==|===|!=|==)\s*([\'\"])((?:\\.|(?!\1).)*)\1', re.I),
]
TOKEN = re.compile(r'AIza[\w-]{30,}|gh[pousr]_[A-Za-z0-9_]{20,}|github_pat_[A-Za-z0-9_]{20,}|sk_live_[A-Za-z0-9]{16,}')


def findings(text):
    matches = []
    for pattern in PATTERNS:
        for match in pattern.finditer(text):
            # PHP variable interpolation is not a literal secret.
            if match[2] and '$' not in match[2] and match[2] != 'REPLACE_WITH_PRIVATE_VALUE':
                matches.append((match.start(2), match.end(2)))
    matches.extend((m.start(), m.end()) for m in TOKEN.finditer(text))
    return matches


if __name__ == '__main__':
    manifest = []
    for path in sorted(ROOT.rglob('*.php')):
        rel = path.relative_to(ROOT).as_posix()
        if any(part in {'.git', 'vendor', 'node_modules', 'Database', 'examples', 'test'} for part in path.relative_to(ROOT).parts) or path.name.endswith('.example.php'):
            continue
        text = path.read_text(encoding='utf-8-sig', errors='replace')
        spans = findings(text)
        config = path.name in {'config.php', 'sfa_config.php'} and not rel.startswith('MPDF')
        if not spans and not config:
            continue
        example_text = text
        for start, end in sorted(set(spans), reverse=True):
            example_text = example_text[:start] + 'REPLACE_WITH_PRIVATE_VALUE' + example_text[end:]
        if findings(example_text):
            raise RuntimeError('Sanitization incomplete: ' + rel)
        example = path.with_name(path.stem + '.example.php')
        example.write_text(example_text, encoding='utf-8', newline='\n')
        manifest.append({'local_file': rel, 'example_file': example.relative_to(ROOT).as_posix(),
                         'credential_literals_removed': len(set(spans))})
    (ROOT / '.gitignore').write_text(IGNORES + ''.join('/' + entry['local_file'] + '\n' for entry in manifest), encoding='utf-8', newline='\n')
    (ROOT / 'tools' / 'local_files_manifest.json').write_text(json.dumps(manifest, indent=2) + '\n', encoding='utf-8', newline='\n')
    print(json.dumps({'example_files': len(manifest), 'files': manifest}, indent=2))
