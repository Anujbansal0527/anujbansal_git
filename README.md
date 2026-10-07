# REDVision website

PHP/MySQL company website with blog administration, recruitment, lead forms, payments, PDF utilities and external service integrations.

## What is versioned

This repository contains application source, shared frontend assets, Composer manifests, required legacy library source, and the app/database review reports. Large document/media collections, applicant uploads, database dumps, runtime logs, server-specific PHP settings, and local credential-bearing files are excluded by `.gitignore`. Local files have not been deleted.

In particular, `careerdata/`, `Database/`, uploaded content under `assets/images/admin/`, document archives and videos must be backed up or distributed privately outside Git. Some of these are required content for the running website; a checkout alone is not a complete deployment backup.

## Prepare a development or deployment checkout

1. Install PHP and required extensions for the app and its Composer packages. Run `composer install` using the committed lockfile to recreate `vendor/`. The actual production runtime must be checked; dump-export PHP metadata is not a runtime requirement.
2. Copy each required `*.example.php` to the original filename listed in `tools/local_files_manifest.json`. Keep the local original if one already exists. Replace every `REPLACE_WITH_PRIVATE_VALUE` using your private configuration. Examples preserve the full file's code; some are endpoint files with embedded credentials, not just database configuration. Avoid exposing example files on the public server.
3. Restore the database in an isolated environment using a privately supplied dump and reconcile the additional blog record as described in `DATABASE_ANALYSIS.md`. Obtain the missing `advisertax_info` schema before testing GST invoices.
4. Restore required excluded public documents, videos, and authored images from the private asset backup. Restore private applicant uploads only in an environment authorized to access them.
5. Configure Apache/PHP, session storage and external services for that environment. Several source files contain production absolute URLs; do not test actions against live services unintentionally.

This source snapshot retains the existing application behavior and known issues documented in `APP_ANALYSIS.md` and `DATABASE_ANALYSIS.md`. Preparing Git exclusions does not fix those application defects.

## Repository preparation and verification

`tools/prepare_git.py` creates sanitized example files, the local-file manifest, and `.gitignore` without altering the original PHP files. Review its output when adding deployment files; it detects common literal credential patterns, not every possible secret format. It rewrites `.gitignore`, so merge any later custom ignore rules deliberately before rerunning it.

After staging, run `python tools/check_git_content.py` to check tracked blobs for oversized files, private-data paths, recognizable tokens and credentials identified in local files. It prints filenames and aggregate sizes, never credential values. This is a focused check, not a guarantee that all sensitive data has been detected.

`tools/database_audit.py` reads the private SQL dumps and produces an ignored aggregate summary without executing SQL.
