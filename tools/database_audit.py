"""Read phpMyAdmin dumps without importing them; emit aggregate, non-personal results."""
from pathlib import Path
import re
import json
from collections import Counter
from datetime import datetime

ROOT = Path(__file__).resolve().parents[1]


def split_sql(text, delimiter=','):
    result, start, quote, depth, i = [], 0, False, 0, 0
    while i < len(text):
        char = text[i]
        if quote:
            if char == '\\':
                i += 2
                continue
            if char == "'":
                if i + 1 < len(text) and text[i + 1] == "'":
                    i += 2
                    continue
                quote = False
        elif char == "'":
            quote = True
        elif char == '(':
            depth += 1
        elif char == ')':
            depth -= 1
        elif char == delimiter and depth == 0:
            result.append(text[start:i].strip())
            start = i + 1
        i += 1
    result.append(text[start:].strip())
    return result


def value(raw):
    if raw.upper() == 'NULL':
        return None
    if raw.startswith("'") and raw.endswith("'"):
        raw = raw[1:-1].replace("''", "'")
        return re.sub(r'\\(.)', lambda m: {'n': '\n', 'r': '\r', 't': '\t', '0': '\0'}.get(m[1], m[1]), raw)
    return raw


def duplicates(rows, fields, normalize=False):
    keys = []
    blank = 0
    for row in rows:
        key = tuple(str(row.get(f) or '') for f in fields)
        if normalize:
            key = tuple(v.strip().lower() for v in key)
        if any(not v for v in key):
            blank += 1
            continue
        keys.append(key)
    counts = Counter(keys)
    return {'duplicate_groups': sum(n > 1 for n in counts.values()),
            'extra_rows': sum(n - 1 for n in counts.values()), 'blank_key_rows': blank}


def audit(path):
    text = path.read_text(encoding='utf-8-sig')
    tables, rows = {}, {}
    for match in re.finditer(r'CREATE TABLE `([^`]+)`\s*\((.*?)\) ENGINE=(\w+)(.*?);', text, re.S):
        name, body, engine, options = match.groups()
        columns = dict(re.findall(r'^\s*`([^`]+)`\s+(.+?)(?:,)?$', body, re.M))
        tables[name] = {'schema_line': text.count('\n', 0, match.start()) + 1,
                        'engine': engine, 'options': options.strip(), 'columns': columns,
                        'indexes': [], 'rows': 0}
        rows[name] = []
    for match in re.finditer(r'ALTER TABLE `([^`]+)`\s+(.*?);', text, re.S):
        if match[1] in tables:
            tables[match[1]]['indexes'].extend(re.findall(r'ADD (.*?)(?=,\s*ADD |;|$)', match[2], re.S))
    for match in re.finditer(r'INSERT INTO `([^`]+)`\s*\(([^)]*)\)\s*VALUES\s*', text):
        table = match[1]
        if table not in rows:
            raise ValueError('Insert without schema: ' + table)
        columns = re.findall(r'`([^`]+)`', match[2])
        # Find statement terminator outside SQL strings, without logging row content.
        i, quote = match.end(), False
        while i < len(text):
            char = text[i]
            if quote:
                if char == '\\':
                    i += 2
                    continue
                if char == "'":
                    if i + 1 < len(text) and text[i + 1] == "'":
                        i += 2
                        continue
                    quote = False
            elif char == "'":
                quote = True
            elif char == ';':
                break
            i += 1
        for raw in split_sql(text[match.end():i]):
            if not raw.startswith('(') or not raw.endswith(')'):
                raise ValueError('Unexpected tuple in ' + table)
            fields = split_sql(raw[1:-1])
            if len(fields) != len(columns):
                raise ValueError('Column count mismatch in ' + table)
            rows[table].append(dict(zip(columns, map(value, fields))))
    for name, entries in rows.items():
        tables[name]['rows'] = len(entries)
        primary = 'file_id' if name == 'files' else 'loction_id' if name == 'location' else 'mail_id' if name == 'mail details' else 'id'
        if primary in tables[name]['columns']:
            tables[name]['primary_duplicates'] = duplicates(entries, [primary])
    result = {'file': path.name, 'bytes': path.stat().st_size, 'table_count': len(tables),
              'total_rows': sum(len(v) for v in rows.values()),
              'engines': dict(Counter(v['engine'] for v in tables.values())),
              'foreign_key_count': len(re.findall(r'FOREIGN KEY', text)), 'tables': tables}
    checks = {}
    for name, fields in [('post', ['slug_url']), ('payonline', ['transactionId']),
                         ('payonline', ['easebuzzpayid']), ('payment_info', ['oid']),
                         ('payment_response', ['oid']), ('fundmaster', ['CO_CODE']),
                         ('rv_web_calculators', ['urlName']), ('leads', ['mobile', 'arn'])]:
        if name in rows:
            checks[name + ':' + ','.join(fields)] = duplicates(rows[name], fields, True)
    for name in ['admin', 'admin_blog', 'register']:
        if name not in rows:
            continue
        checks[name + ':credentials'] = {}
        for field in ['password', 'smpassword']:
            if field in tables[name]['columns']:
                counts = Counter('empty' if not row.get(field) else 'bcrypt' if str(row[field]).startswith(('$2a$', '$2b$', '$2y$')) else 'argon2' if str(row[field]).startswith('$argon2') else 'other_nonempty' for row in rows[name])
                checks[name + ':credentials'][field] = dict(counts)
    if 'leads' in rows:
        entries = rows['leads']
        valid_dates = []
        bad_dates = 0
        for row in entries:
            try:
                valid_dates.append(datetime.strptime(row['mail_time'], '%m/%d/%y,%I:%M:%S:%p'))
            except (ValueError, TypeError):
                bad_dates += 1
        checks['leads:data_quality'] = {'arn_trailing_space_rows': sum(str(r.get('arn') or '').endswith(' ') for r in entries),
                                      'unparsed_mail_time_rows': bad_dates,
                                      'date_range': [str(min(valid_dates)), str(max(valid_dates))] if valid_dates else [],
                                      'message_at_255_characters_rows': sum(len(str(r.get('message') or '')) == 255 for r in entries)}
    if 'salesninjainsertLeads' in rows:
        checks['salesninjainsertLeads:mobile'] = {'signed_int_max_rows': sum(r['mobile'] == '2147483647' for r in rows['salesninjainsertLeads']), 'zero_rows': sum(r['mobile'] == '0' for r in rows['salesninjainsertLeads'])}
    if 'otp_codes1' in rows:
        checks['otp_codes1:ip'] = {'zero_rows': sum(r['ip'] == '0' for r in rows['otp_codes1']),
                                  'signed_int_max_rows': sum(r['ip'] == '2147483647' for r in rows['otp_codes1']),
                                  'integer_between_0_and_255_rows': sum(str(r['ip']).isdigit() and 0 <= int(r['ip']) <= 255 for r in rows['otp_codes1'])}
    if 'payment_response' in rows:
        checks['payment_response:cardnumber'] = dict(Counter('empty' if not r.get('cardnumber') else 'masked' if re.search(r'[xX*]', r['cardnumber']) else 'unmasked_looking' for r in rows['payment_response']))
        checks['payment_response:cardnumber_lengths'] = dict(Counter(len(r['cardnumber']) for r in rows['payment_response'] if r.get('cardnumber')))
        checks['payment_response:cardnumber_format'] = {
            'digits_only_nonempty_rows': sum(bool(r.get('cardnumber')) and r['cardnumber'].isdigit() for r in rows['payment_response']),
            'non_digit_nonempty_rows': sum(bool(r.get('cardnumber')) and not r['cardnumber'].isdigit() for r in rows['payment_response'])}
    for name in ['admin', 'admin_blog', 'register']:
        if name in rows:
            checks[name + ':legacy_password_shape'] = dict(Counter(
                'empty' if not r.get('password') else
                'modern_hash' if str(r['password']).startswith(('$2a$', '$2b$', '$2y$', '$argon2')) else
                'hex_hash_length' if re.fullmatch(r'[0-9a-fA-F]{32}|[0-9a-fA-F]{40}|[0-9a-fA-F]{64}|[0-9a-fA-F]{128}', str(r['password'])) else
                'plaintext_looking' for r in rows[name]))
    if 'mflocations' in rows and 'fundmaster' in rows:
        codes = {r['CO_CODE'] for r in rows['fundmaster']}
        checks['mflocations:fundmaster_reference'] = {
            'rows_without_matching_CO_CODE': sum(r['EntityCode'] not in codes for r in rows['mflocations']),
            'primary_duplicates': duplicates(rows['mflocations'], ['EntityCode', 'LocationType', 'Address'])}
    if 'payonline' in rows:
        grouped = {}
        for row in rows['payonline']:
            grouped.setdefault(row['transactionId'], []).append(row)
        checks['payonline:repeat_details'] = {
            'duplicate_groups_same_status': sum(len(v) > 1 and len({r['status'] for r in v}) == 1 for v in grouped.values()),
            'duplicate_groups_different_status': sum(len(v) > 1 and len({r['status'] for r in v}) > 1 for v in grouped.values())}
    if 'rv_web_calculators' in rows:
        checks['rv_web_calculators:apikey'] = {'nonempty_rows': sum(bool(r.get('apikey')) for r in rows['rv_web_calculators'])}
    result['checks'] = checks
    return result, rows


if __name__ == '__main__':
    full, full_rows = audit(ROOT / 'Database' / 'redtechn_databs (1).sql')
    post, post_rows = audit(ROOT / 'Database' / 'post.sql')
    a = {r['id']: r for r in full_rows['post']}
    b = {r['id']: r for r in post_rows['post']}
    overlap = a.keys() & b.keys()
    result = {'full_dump': full, 'post_dump': post, 'post_comparison': {
        'same_create_schema': full['tables']['post']['columns'] == post['tables']['post']['columns'],
        'shared_ids': len(overlap), 'identical_shared_rows': sum(a[k] == b[k] for k in overlap),
        'changed_shared_rows': sum(a[k] != b[k] for k in overlap),
        'only_full_dump_ids': sorted(a.keys() - b.keys(), key=int),
        'only_post_dump_ids': sorted(b.keys() - a.keys(), key=int)}}
    target = ROOT / 'Database' / 'audit_summary.json'
    target.write_text(json.dumps(result, indent=2), encoding='utf-8')
    # Output only counts, schema and aggregate checks, never inserted values.
    print(json.dumps({'table_count': full['table_count'], 'total_rows': full['total_rows'],
                      'engines': full['engines'], 'foreign_key_count': full['foreign_key_count'],
                      'row_counts': {k: v['rows'] for k, v in full['tables'].items()},
                      'checks': full['checks'], 'post_comparison': result['post_comparison']}, indent=2))
