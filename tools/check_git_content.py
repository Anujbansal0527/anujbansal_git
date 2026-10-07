"""Check staged files for private paths, oversized blobs, and known local secrets."""
from pathlib import Path
import subprocess
import json
from prepare_git import ROOT, PATTERNS, TOKEN, findings


def git(*args):
    return subprocess.check_output(['git', *args], cwd=ROOT)


if __name__ == '__main__':
    manifest = json.loads((ROOT / 'tools/local_files_manifest.json').read_text())
    secrets = set()
    for entry in manifest:
        text = (ROOT / entry['local_file']).read_text(encoding='utf-8-sig', errors='replace')
        for start, end in findings(text):
            literal = text[start:end]
            if len(literal) >= 8 and literal.lower() not in {'xxxxxxxxx', 'password', 'your_api_key', 'secret', 'secretkey'}:
                secrets.add(literal.encode())
    errors, total, count, biggest = [], 0, 0, []
    batch = subprocess.Popen(['git', 'cat-file', '--batch'], cwd=ROOT,
                             stdin=subprocess.PIPE, stdout=subprocess.PIPE)
    for line in git('ls-files', '--stage', '-z').split(b'\0'):
        if not line:
            continue
        metadata, raw_path = line.split(b'\t', 1)
        path = raw_path.decode('utf-8')
        blob = metadata.split()[1].decode()
        batch.stdin.write((blob + '\n').encode())
        batch.stdin.flush()
        header = batch.stdout.readline().split()
        data = batch.stdout.read(int(header[2]))
        batch.stdout.read(1)
        count += 1
        total += len(data)
        biggest.append((len(data), path))
        if len(data) >= 50 * 1024 * 1024:
            errors.append({'path': path, 'reason': 'over 50 MiB'})
        if path.startswith(('Database/', 'careerdata/', 'admin/careerdata/', 'admin/candidate_assets/')) or path.endswith(('.sql', '.log')):
            errors.append({'path': path, 'reason': 'private/generated data'})
        if any(secret in data for secret in secrets):
            errors.append({'path': path, 'reason': 'matches a known local credential'})
        if path.endswith(('.php', '.js', '.html', '.json')):
            text = data.decode('utf-8', errors='replace')
            if TOKEN.search(text):
                errors.append({'path': path, 'reason': 'recognizable token format'})
            if path.endswith('.php') and findings(text):
                errors.append({'path': path, 'reason': 'credential literal requires review'})
    batch.stdin.close()
    batch.wait()
    print(json.dumps({'files': count, 'total_MiB': round(total / 1048576, 2),
                      'largest_files': [(round(size / 1048576, 2), path) for size, path in sorted(biggest, reverse=True)[:5]],
                      'errors': errors}, indent=2))
    raise SystemExit(bool(errors))
