<div class="iframe-section">
    <!-- <div class="browser-row">
        <div class="browser-left">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="browser-url"> salesninjacrm.com/<span class="idbrowserurl">dashboard</span></div>
    </div> -->
    <div class="dashboard-card">
        <!-- <div class="dashboard-left">
            <div class="dl-logo">
                <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/logo.png" alt="logo">
            </div>

        </div> -->
        <div class="dashboard-right">
            <div class="dr-header-top">
                <!-- <div class="mobileview mobilelogo">
                    <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/logo.png" alt="logo">
                </div> -->


                <!-- <span class="toggale-left"><img
                        src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/reviews/ic-right.svg"
                        alt="right"></span> -->
                <div class="toggale-nav">
                    <div class="mobileview">
                        <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/reviews/ic-search.svg"
                            alt="Global Search…">
                    </div>
                    <div class="dr-search"><img
                            src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/reviews/ic-search.svg"
                            alt="Global Search…"> Global Search…</div>
                    <div class="settings">
                        <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/reviews/ic-settings.svg"
                            alt="settings">
                    </div>
                    <div class="avatar">
                        <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/reviews/avatar-25.webp"
                            alt="avatar">
                    </div>
                    <!-- <div class="mobileview menutogale">
                        <span></span>
                    </div> -->
                </div>


            </div>
            <div class="bgmenutogale menutogale"></div>
            <div class="dr-panel">
                <?php foreach ($salesninjacrmDdata as $salesninjacrmDitems) { ?>
                    <div class="salesninjacrmright <?= $salesninjacrmDitems['urlname']; ?> <?php if ($salesninjacrmDitems['id'] == '1'):
                           echo 'active';
                       endif; ?>">





                        <?php if ($salesninjacrmDitems['urlname'] == 'dashboard') { ?>
                            <?php include('salesninja/dashboard.php'); ?>
                        <?php } elseif ($salesninjacrmDitems['urlname'] == 'leads') { ?>
                            <?php include('salesninja/leads.php'); ?>
                        <?php } elseif ($salesninjacrmDitems['urlname'] == 'followups') { ?>
                            <?php include('salesninja/followups.php'); ?>
                        <?php } elseif ($salesninjacrmDitems['urlname'] == 'interactions') { ?>
                            <?php include('salesninja/interactions.php'); ?>
                        <?php } elseif ($salesninjacrmDitems['urlname'] == 'mytask') { ?>
                            <?php include('salesninja/mytask.php'); ?>
                        <?php } elseif ($salesninjacrmDitems['urlname'] == 'portfolioreviews') { ?>
                            <?php include('salesninja/portfolioreviews.php'); ?>
                        <?php } elseif ($salesninjacrmDitems['urlname'] == 'teammanagement') { ?>
                            <?php include('salesninja/teammanagement.php'); ?>
                        <?php } elseif ($salesninjacrmDitems['urlname'] == 'usermanagement') { ?>
                            <?php include('salesninja/usermanagement.php'); ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script src="<?= $config['rvuserinfo']['base_url']; ?><?= $config['rvrhcinfo']['rvrhc_jquery360']; ?>"></script>