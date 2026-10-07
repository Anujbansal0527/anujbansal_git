# Single-file custom articles

Each custom article is one folder containing only `index.php`. Its database lookup, SEO metadata, sidebar and custom HTML are in that file. Shared CSS/JavaScript live in `blog/assets/css/article.css` and `blog/assets/js/article.js`. The article uses the existing `rvFetchSingleData` and `rvFetchAllDataLimit` functions in `include/function.php`, plus the existing site header/footer.

## Add another article

1. Copy the existing slug folder and rename it to your new lowercase, hyphen-separated slug. The folder name automatically becomes the article slug.
2. Change `$articleConfig['description']` and, if needed, the author at the top of `index.php`.
3. Edit the article HTML inside `<div class="rv-blog-content">`. Keep the dynamic H1 and banner if they should continue matching the database. Add/change sections, tables, images and FAQs as needed. Give each FAQ button/answer matching, unique `aria-controls`/`id` values.
4. Add the matching database title, leading-slash slug and banner filename. No article body needs to be saved in the database. The existing schema still requires empty legacy fields in strict SQL mode:

```sql
INSERT INTO post (title, slug_url, image, content, head_teg, blog_part)
VALUES ('Your article title', '/your-new-slug', 'your-banner.webp', '', '', 0);
```

Verify slug uniqueness before inserting; the existing schema does not enforce it. Post 216 exists in the newer supplied `post.sql`, but not in the full dump. Confirm its presence on the deployment database rather than inserting it twice. The local development database was restored from the supplied dumps; production was not changed.

5. Upload the banner to `assets/images/admin/blog/` or `assets/images/blog/`, and deploy the article folder with both shared asset files and the modified PHP files. Optionally set `modified_at` in the article configuration to an ISO date/time with timezone when updating content; publication time comes from the database.

## The three dynamic locations

- Homepage: the existing latest-four query continues reading `post`; shared helpers generate the correct article URL and banner.
- Blog listing: the existing database query continues reading `post`; new folder articles use trailing-slash URLs, and old database-only articles retain their old URLs.
- Detail sidebar: the existing latest-post function supplies up to six recent other posts and excludes the current ID. With only title/slug/image metadata, these are other recent articles rather than topic-ranked recommendations.

The article returns 404 for a missing matching row and 503 on connection failure. It outputs one article H1, canonical/social metadata, `BlogPosting` and breadcrumb JSON-LD, and the existing site header/footer. The blank legacy `content` column is intentionally unused for this folder page.

## Images and deployment

The supplied banner and client illustration are `assets/images/blog/blog-image8-6ab60e266b066.png` and `blog-image9-6ab60e266b066.png`. Post 216's existing `.webp` banner filename resolves to the matching supplied `.png` when the `.webp` is absent. The same resolution is used by homepage/listing/sidebar cards.

Restore ignored local database configuration and legacy uploaded images privately. Deploy the new supplied PNG files as source assets. There is no automatic SQL import or fabricated fallback post.

The page uses the existing `admin.base_url` setting. The article reuses existing site navigation/footer behavior.

The root `.htaccess` maps the advertised `sitemap.xml` to the dynamic `sitemap.php`, which uses `added_on` rather than the nonexistent `updated_at` column and recognizes folder URLs. Check these rules on Apache in staging; PHP's development server does not execute `.htaccess`.

Before release, verify homepage/listing links, matching title/banner, sidebar exclusion, mobile table scrolling, keyboard FAQs, metadata, sitemap output and missing-row 404 behavior. Deploy the files before making a new row visible. Renaming existing slugs requires deliberate redirects.
