<?php
function googleAvatarColor($string)
{
    $hash = crc32($string);

    $hue = $hash % 360;      // 0–359 → pure color variation
    $saturation = 55;       // soft but colorful
    $lightness = 55;       // light shade (Google feel)

    return "hsl($hue, {$saturation}%, {$lightness}%)";
}

$con->set_charset("utf8mb4");

$sql = "
    SELECT author_name, rating, review_text, review_time
    FROM google_reviews_history
    ORDER BY review_time DESC
    LIMIT 6
";

$result = $con->query($sql);
?>
<?php
$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
?>
<section class="main-section google-reviews-section pt-0">
    <div class="container container-xl">
        <div class="heading text-center mb-5">
            <img src="<?= $rvuserinfo['base_url'] ?>/assets/images/google.webp" alt=" Google Reviews" />
            <div class="mt-2 subhaddng"> Reviews</div>
            <h2 class="title">Trusted by Thousands</h2>
        </div>

        <div class="google-reviews-carousel owl-carousel owl-theme">

            <?php $i = 1;
            foreach ($rows as $row): ?>


                <?php
                $uniqueKey = $row['author_name'] . $row['review_time'];
                $bgColor = googleAvatarColor($uniqueKey);
                ?>

                <a href="#!" class="copenModal" dataid="google-reviews<?= $row['review_time']; ?>">
                    <div class="gr-card">
                        <div class="gr-author">
                            <div class="gimg" style="background: <?= $bgColor ?>;">
                                <?= htmlspecialchars(mb_substr($row['author_name'], 0, 1, 'UTF-8')) ?>
                                <img src="<?= $rvuserinfo['base_url'] ?>/assets/images/google-icon.webp"
                                    alt=" <?= htmlspecialchars($row['author_name']) ?>" />
                            </div>
                            <?= htmlspecialchars($row['author_name']) ?>
                        </div>
                        <div class="gr-stars">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="<?= $i <= $row['rating'] ? 'filled' : '' ?>">★</span>
                            <?php endfor; ?>
                        </div>

                        <p class="gr-text text-line" style="--textline:4;">
                            <?= htmlspecialchars($row['review_text']) ?>
                        </p>
                        <p class="gr-read ">Read More <i class="fa fa-arrow-right"></i></p>
                    </div>
                </a>
                <?php $i++; endforeach; ?>

        </div>

        <div class="gr-button-wrap text-center">
            <a href="https://search.google.com/local/reviews?placeid=ChIJMykM5TX9YjkR3ovp76K78cs" target="_blank"
                class="btn btn-primary">
                View all Google reviews →
            </a>
        </div>

    </div>
</section>
<div class="modalbody">
    <div class="copenModal modalbg"></div>
    <div class="Cmodalcard">
        <div class="maincontentmodal">
            <a href="#!" class="copenModal cmodalclose"><span></span></a>
            <?php $i = 1;
            foreach ($rows as $row): ?>
                <?php
                $uniqueKey = $row['author_name'] . $row['review_time'];
                $bgColor = googleAvatarColor($uniqueKey);
                ?>

                <div class="modaldatashow show" id="google-reviews<?= $row['review_time']; ?>">
                    <div class="modalheader">
                        <div class="gr-card">
                            <div class="gr-author">
                                <div class="gimg" style="background: <?= $bgColor ?>;">
                                    <?= htmlspecialchars(mb_substr($row['author_name'], 0, 1, 'UTF-8')) ?>
                                    <img src="<?= $rvuserinfo['base_url'] ?>/assets/images/google-icon.webp"
                                        alt=" <?= htmlspecialchars($row['author_name']) ?>" />
                                </div>
                                <?= htmlspecialchars($row['author_name']) ?>
                            </div>
                            <div class="gr-stars">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <span class="<?= $i <= $row['rating'] ? 'filled' : '' ?>">★</span>
                                <?php endfor; ?>
                            </div>
                        </div>

                    </div>
                    <div class="content">
                        <p class="gr-text ">
                            <?= htmlspecialchars($row['review_text']) ?>
                        </p>
                    </div>
                </div>
                <?php $i++; endforeach; ?>
        </div>
    </div>
</div>