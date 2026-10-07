<?php
$whychooseusData = [
    ['id' => '1', 'imgsrc' => 'never-lose-a-potential-investor.webp', 'title' => 'Never  Lose a Potential Investor  ', 'disc' => 'Stay organized and ensure every prospect gets the attention they deserve. ',],
    ['id' => '2', 'imgsrc' => 'convert-more-leads.webp', 'title' => 'Convert More Leads  ', 'disc' => 'Structured tracking and timely follow-ups help improve conversion opportunities. ',],
    ['id' => '3', 'imgsrc' => 'save-hours-every-week.webp', 'title' => 'Save Hours Every Week ', 'disc' => 'Spend less time searching through Excel sheets, notes, and WhatsApp chats. ',],
    ['id' => '4', 'imgsrc' => 'make-smarter-business-decisions.webp', 'title' => 'Make Smarter Business Decisions ', 'disc' => 'Get complete visibility into your pipeline and focus on opportunities that matter most. ',],
    ['id' => '5', 'imgsrc' => 'stay-consistent-with-every-prospect.webp', 'title' => 'Stay Consistent with Every Prospect ', 'disc' => 'Deliver a professional experience through organized communication and follow-up management. ',],
    ['id' => '6', 'imgsrc' => 'increase-team-productivity.webp', 'title' => 'Increase Team Productivity ', 'disc' => 'Keep everyone aligned, accountable, and focused on business growth. ',],
];
?>
<section class="whychooseus-section pipe-sec  main-section" id="whychooseus">
    <div class="rvintegration-container">
        <div class="whychooseus-row">
            <!-- LEFT CONTENT -->
            <div class="whychooseus-left">
                <div class="rev section-hadding on">
                    <div class="sec-label">BUILT FOR MFDs</div>
                    <h2 class="sec-h2">Why MFDs Choose <em><br> Sales Ninja</em></h2>
                    <p style=""> Built specifically for Mutual Fund Distributors, Sales Ninja streamlines daily
                        operations with tools designed to support efficiency, organization, and business growth.</p>

                </div>
            </div>
            <!-- RIGHT GRID -->
            <div class="whychooseus-right">
                <div class="feature-card-row">
                    <?php foreach ($whychooseusData as $whychooseusitems) { ?>
                        <div class="feature-card"
                            style="--rcolor:<?= $whychooseusitems['color']; ?>;--bgrcolor:<?= $whychooseusitems['bgcolor']; ?>;">
                            <div class="feature-icon">
                                <img src="<?= $config['rvuserinfo']['base_url']; ?>/assets/salesninjacrm/reviews/<?= $whychooseusitems['imgsrc']; ?>"
                                    alt="Web & Mobile Access">
                            </div>
                            <div class="feature-content">
                                <h3><?= $whychooseusitems['title']; ?></h3>
                                <p><?= $whychooseusitems['disc']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>