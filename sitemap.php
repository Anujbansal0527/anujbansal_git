<?php
ob_start();

require __DIR__ . '/rvm-include/config.php';

ob_clean();

header('Content-Type: application/xml; charset=utf-8');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

$baseUrl = 'https://www.redvisiontechnologies.com';

$lastmod = !empty($row['updated_at'])
    ? date('c', strtotime($row['updated_at']))
    : date('c');
?>


<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format"
    xmlns:xhtml="http://www.w3.org/1999/xhtml" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc><?= $baseUrl; ?>/</loc>
        <lastmod><?= $lastmod; ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>

    <?php
    $staticPages = [
        ['url' => 'about.php', 'priority' => '0.50',],
        ['url' => 'mutual-fund-software-for-distributors.php', 'priority' => '0.90',],
        ['url' => 'robo-advisory-software.php', 'priority' => '0.90',],
        ['url' => 'mutual-fund-software.php', 'priority' => '0.90',],
        ['url' => 'web-robo.php', 'priority' => '0.90',],
        ['url' => 'financial-websites-for-mfds.php', 'priority' => '0.90',],
        ['url' => 'mutual-fund-software-in-india.php', 'priority' => '0.90',],
        ['url' => 'digital-marketing.php', 'priority' => '0.90',],
        ['url' => 'sales-crm-for-mutual-fund-distributors-in-india.php', 'priority' => '0.90',],
        ['url' => 'success-stories.php', 'priority' => '0.80',],
        ['url' => 'pay-online.php', 'priority' => '0.80',],
        ['url' => 'invoice.php', 'priority' => '0.80',],
        ['url' => 'utilities.php', 'priority' => '0.80',],
        ['url' => 'contact.php', 'priority' => '0.50',],
        ['url' => 'integration-partner.php', 'priority' => '0.90',],
        ['url' => 'career.php', 'priority' => '0.80',],
        ['url' => 'how-super-bike-helped-a-mfd-to-achieve-success.php', 'priority' => '0.90',],
        ['url' => 'an-mfd-whose-business-runs-24X7.php', 'priority' => '0.90',],
        ['url' => 'solution-of-biggest-headache-of-mfd.php', 'priority' => '0.90',],
        ['url' => 'forget-10x-6-saal-me-119x-growth.php', 'priority' => '0.90',],
        ['url' => 'how-to-successfully-complete-180+-sips-within-single-day.php', 'priority' => '0.90',],
        ['url' => 'how-this-mfd-did-500-sips-within-a-single-day.php', 'priority' => '0.90',],
        ['url' => 'how-this-mfd-raised-1-crore-seed-funding-for-his-business.php', 'priority' => '0.90',],
        ['url' => 'blog/', 'priority' => '0.70',],
        ['url' => 'privacy-policy.php', 'priority' => '0.30',],
        ['url' => 'logo-design.php', 'priority' => '0.80',],
        ['url' => 'brand-kit.php', 'priority' => '0.64',],
        ['url' => 'ui-ux-design.php', 'priority' => '0.64',],
        ['url' => 'web-development.php', 'priority' => '0.64',],
        ['url' => 'search-engine-optimization.php', 'priority' => '0.64',],
        ['url' => 'content-marketing.php', 'priority' => '0.64',],
        ['url' => 'social-media-management.php', 'priority' => '0.64',],
        ['url' => 'paid-advertisement.php', 'priority' => '0.64',],
        ['url' => 'terms-and-conditions.php', 'priority' => '0.30',],
        ['url' => 'cams70.php', 'priority' => '0.64',],
        ['url' => 'cams71.php', 'priority' => '0.64',],
        ['url' => 'cams51.php', 'priority' => '0.64',],
        ['url' => 'cams77.php', 'priority' => '0.64',],
        ['url' => 'cams6.php', 'priority' => '0.64',],
        ['url' => 'karvy.php', 'priority' => '0.64',],
        ['url' => 'assets/files/Camp-wbr2.pdf', 'priority' => '0.64',],
        ['url' => 'assets/files/Camp-wbr9.pdf', 'priority' => '0.64',],
        ['url' => 'assets/files/Camp-wbr49.pdf', 'priority' => '0.64',],
        ['url' => 'assets/files/Karvi_201.pdf', 'priority' => '0.64',],
        ['url' => 'assets/files/KARVI_211.pdf', 'priority' => '0.64',],
        ['url' => 'assets/files/Karvi_243.pdf', 'priority' => '0.64',],
        ['url' => 'waterpark.php', 'priority' => '0.64',],
        ['url' => 'amusmentpark.php', 'priority' => '0.64',],
        ['url' => 'adventuretrip.php', 'priority' => '0.64',],
        ['url' => 'project-coordinator.php', 'priority' => '0.64',],
        ['url' => 'software-consultant-sales.php', 'priority' => '0.80',],
        ['url' => 'software-consultant-sales-2024.php', 'priority' => '0.80',],
        ['url' => 'business-development-sales-mutual-fund-finTech.php', 'priority' => '0.80',],
        ['url' => 'business-development-executive.php', 'priority' => '0.80',],
        ['url' => 'business-development-executive-dm.php', 'priority' => '0.80',],
        ['url' => 'business-development-project-coordinator.php', 'priority' => '0.80',],
        ['url' => 'experienced-in-customer-relationships.php', 'priority' => '0.80',],
        ['url' => 'business-collaboration-partnership-executive.php', 'priority' => '0.80',],
        ['url' => 'research-and-data-intern.php', 'priority' => '0.80',],
    ];
    if (isset($con)) {

        $result = $con->query("SELECT slug_url, updated_at FROM post ORDER BY id ASC");

        if ($result) {
            while ($row = $result->fetch_assoc()) {

                $slug = trim($row['slug_url']);
                $slug = ltrim($slug, '/');

                $staticPages[] = [
                    'url' => 'blog/' . $slug,
                    'priority' => '0.64',
                    'lastmod' => !empty($row['updated_at'])
                        ? date('c', strtotime($row['updated_at']))
                        : date('c')
                ];
            }
        }
    }
    usort($staticPages, function ($a, $b) {

        // Priority High → Low
        $priorityCompare = (float) $b['priority'] <=> (float) $a['priority'];

        if ($priorityCompare !== 0) {
            return $priorityCompare;
        }

        // Same priority ho to URL ke according A → Z
        return strcasecmp($a['url'], $b['url']);
    });
    foreach ($staticPages as $page) {

        $url = rtrim($baseUrl, '/') . '/' . ltrim($page['url'], '/');

        $pageLastmod = !empty($page['lastmod'])
            ? $page['lastmod']
            : $lastmod;
        ?>
        <url>
            <loc><?php echo htmlspecialchars($url, ENT_XML1, 'UTF-8'); ?></loc>
            <lastmod><?php echo htmlspecialchars($pageLastmod, ENT_XML1, 'UTF-8'); ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority><?php echo htmlspecialchars($page['priority'], ENT_XML1, 'UTF-8'); ?></priority>
        </url>
    <?php } ?>

</urlset>