<?php include('include/config.php'); ?>
<?php include('include/function.php'); ?>
<!doctype html>
<html lang="en">

<head>

    <title>Integration Partners</title>
    <meta name="description"
        content="Accelerate your career with REDVision Technologies entry level opportunities. We are Hiring in multiple categories. Explore challenging and exciting opportunities.">
    <meta name="keywords"
        content="React Native Developer, Node JS Developer, PHP Developer, customer support executive, technical support manager, Software Consultant Sales, Technical Support Manager, Human Resource Intern, UI UX Designer, red vision career, Software Development, Web Development, Digital Marketing, Strategy Team" />
    <link rel="canonical" href="<?= $rvuserinfo['base_url'] ?>/integration-partner.php">
    <?php include("include/head.php"); ?>

</head>

<body>
    <!-- BANNER -->
    <!-- /BANNER -->

    <?php include("include/header-inner.php"); ?>

    <main>
        <?php allPagesBanner($con, 'Partners With Us', '', '') ?>



        <section class="main-section integration-partner-section">
            <div class="container container-xl">

                <div class="row">
                    <div class="col-md-4">
                        <div class="integration-content wow fadeInUp" data-wow-delay="0s">
                            <div class="inner-content">
                                <div class="heading_main">
                                    <h2>Empowering MFDs with Innovative Fintech Solutions</h2>
                                </div>
                                <p>REDVision Technologies is an award-winning B2B FinTech company with
                                    <?php $yearDatan = date('Y') - 2006; ?> years of
                                    experience. We partner with industry-leading brands to bring powerful tools and
                                    solutions directly to Mutual Fund Distributors (MFDs). This collaboration unlocks a
                                    wider range of investment options, including multiple asset classes, for investors,
                                    ultimately driving growth for all.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="integration-image integration-image-one wow fadeInUp" data-wow-delay="0.2s">
                            <img src="assets/images/integration-img.png" alt="Integration 1">
                            <div class="integration-image-items">
                                <div class="left-items">
                                    <div class="item wow fadeInRight" data-wow-delay="0.4s">
                                        <div class="text">
                                            <h4>Mutual Funds</h4>
                                            <p>Access mutual funds & NFOs anytime, anywhere. </p>
                                        </div>
                                    </div>
                                    <div class="item wow fadeInRight" data-wow-delay="1.2s">
                                        <div class="text">
                                            <h4>Equity</h4>
                                            <p>Make equity investing hassle-free, get more wallet share.</p>
                                        </div>
                                    </div>
                                    <div class="item wow fadeInRight" data-wow-delay="2.0s">
                                        <div class="text">
                                            <h4>IPOs</h4>
                                            <p>Effortlessly offer IPOs, stop clients from going direct. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="right-items">
                                    <div class="item wow fadeInLeft" data-wow-delay="0.8s">
                                        <div class="text">
                                            <h4>Loan Against Mutual Funds</h4>
                                            <p> Stop untimely redemption, offer loan against MF. </p>
                                        </div>
                                    </div>
                                    <div class="item wow fadeInLeft" data-wow-delay="1.6s">
                                        <div class="text">
                                            <h4>P2P Lending</h4>
                                            <p>Offer the best alternative to FDs with P2P lending.</p>
                                        </div>
                                    </div>
                                    <div class="item wow fadeInLeft" data-wow-delay="2.4s">
                                        <div class="text">
                                            <h4>Fixed Deposit</h4>
                                            <p>Offer FDs with leading NBFCs and small finance banks. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="integration-partner-section why-integration-partner-section">
            <div class="container container-xl">
                <div class="heading_main text-center wow fadeInUp" data-wow-delay="0s">
                    <h2>Why Partner with Redvision?</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="integration-box wow fadeInUp" data-wow-delay="0s">
                            <div class="icon">
                                <img src="assets/images/icons/reach.svg" alt="Extensive Reach">
                            </div>
                            <div class="text">
                                <h4>Extensive Reach</h4>
                                <p>Tap into our network of <?= $sfacount ?>+ HNI MFDs across <?= $CitiesPresence ?>+
                                    cities globally and 10 million+
                                    satisfied investors worldwide with 3.2 Lakh Crores AUM.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="integration-box wow fadeInUp" data-wow-delay="0.3s">
                            <div class="icon">
                                <img src="assets/images/icons/multi-product.svg" alt="Extensive Reach">
                            </div>
                            <div class="text">
                                <h4>Diverse Offerings</h4>
                                <p>Expand your services with our products like Wealth Elite - our next-gen wealth
                                    management software - and access to Mutual Funds, Loans against MFs, P2P
                                    Investments, and more.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="integration-box wow fadeInUp" data-wow-delay="0.6s">
                            <div class="icon">
                                <img src="assets/images/icons/agreement.svg" alt="Extensive Reach">
                            </div>
                            <div class="text">
                                <h4>Seamless Integrations</h4>
                                <p>Integrate seamlessly with leading partners like Volt Money, Fabits, LenDenClub,
                                    Dollarbull, stock exchanges (BSE/NSE/MFU).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="main-section integration-partner-section partner-integration-partner-section">
            <div class="container-fluid">
                <div class="heading_main text-center wow fadeInUp" data-wow-delay="0s">
                    <h2>Our Partners</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="our-partners">
                            <span class="item wow fadeInLeft" data-wow-delay="1.2s"><img
                                    src="assets/images/integration-partner/fabit.png" alt="Fabit"></span>
                            <span class="item wow fadeInLeft" data-wow-delay="1s"><img
                                    src="assets/images/integration-partner/lenden.png" alt="Lenden"></span>
                            <span class="item wow fadeInLeft" data-wow-delay="0.8s"><img
                                    src="assets/images/integration-partner/finzy.webp" alt="finzy"></span>
                            <span class="item wow fadeInLeft" data-wow-delay="0.8s"><img
                                    src="assets/images/integration-partner/fixerra.webp" alt="fixerra"></span>
                            <span class="item wow fadeInLeft" data-wow-delay="0.6s"><img
                                    src="assets/images/integration-partner/volt.png" alt="Volt"></span>
                            <span class="item wow fadeInLeft" data-wow-delay="0.4s"><img
                                    src="assets/images/integration-partner/dsp-mf.png" alt="DSP MF"></span>
                            <span class="item wow fadeInLeft" data-wow-delay="0.2s"><img
                                    src="assets/images/integration-partner/icici-mf.png" alt="ICICI MF"></span>
                            <span class="item wow fadeInLeft" data-wow-delay="0s"><img
                                    src="assets/images/integration-partner/abc-mf.png" alt="Motilal MF"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="main-section integration-partner-section contact-integration-partner-section pt-0">
            <div class="container container-xl">

                <div class="row">
                    <div class="col-md-6">
                        <div class="integration-image wow fadeInUp" data-wow-delay="0s">
                            <img src="assets/images/integration-contact.png" alt="Integration 2">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="integration-content wow fadeInUp" data-wow-delay="0.2s">
                            <div class="inner-content">
                                <div class="heading_main">
                                    <h2>We're Always Looking for Forward-Thinkers</h2>
                                </div>
                                <p>If your FinTech solution offers unique value to MFDs, we want to hear from you! </p>
                                <p>Contact us today to explore partnership opportunities.</p>
                                <div class="contact-items">
                                    <a href="mailto:strategyandpartnerships@redvisionglobal.com" class="rv-mail"><i
                                            class="bi bi-envelope"></i> strategyandpartnerships@redvisionglobal.com</a>
                                    <a href="tel:+919171713200"><i class="bi bi-phone"></i> +91 9171713200</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php include("include/footer.php"); ?>
        <?php include("include/foot.php"); ?>