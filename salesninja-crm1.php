<?php
ob_start();
session_start();

include("./rvm-include/config.php");
include "./rvm-include/rvfcaptcha_generate.php";



$formval = 'cont';
$formKey = 'rvcontact';
$formKeyName = 'Contact Us';
$rvrrf = $formval . 'rvrrf';

$captcha_contact = handleCaptcha($formKey . '_' . $formval);
if (!isset($_SESSION[$rvrrf]) || !is_array($_SESSION[$rvrrf])) {
    $_SESSION[$rvrrf] = [];
}
if (empty($_SESSION[$rvrrf][$formKey])) {
    $_SESSION[$rvrrf][$formKey] = bin2hex(random_bytes(32));
}

//include("./assets/salesninjacrm/data.php");
$salesninjaData = require __DIR__ . '/./assets/salesninjacrm/data.php';
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no user-scalable=no">
    <title>Sales Ninja CRM - From Lead Management to Conversion, In One CRM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&family=Bebas+Neue&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/assets/salesninjacrm/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
        href="<?= $config['rvuserinfo']['base_url']; ?><?= $config['rvrhcinfo']['rvrhc_rvrh_css']; ?>">
    <link rel="icon" href="<?= $config['rvuserinfo']['base_url']; ?>/assets/salesninjacrm/favicon.ico" />
    <style>
        .hero-h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: clamp(48px, 7vw, 60px);
            line-height: 1.1;
            letter-spacing: -.04em;
            position: relative;
            z-index: 1;
            animation: fadeu .55s ease .08s both;
            max-width: 1100px;
            margin-bottom: 20px;
        }

        .hero-h1 .line2 {
            color: var(--ink);

        }

        .hero-h1 .line1 {
            font-size: clamp(48px, 9vw, 90px);
            letter-spacing: -1px;
            display: block;
            line-height: 85px;
            color: #f30228;
        }

        .hero-h1 .line2,
        .hero-h1 .line3 {
            display: unset;
            font-size: clamp(38px, 7vw, 70px);
            line-height: 120px;
        }

        .hero-h1 .line3 {
            font-size: clamp(58px, 11vw, 110px);
            color: transparent;
            line-height: 80px;
        }

        .hero-acts {
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <!-- <div id="cur"></div>
    <div id="cur-r"></div> -->

    <!-- NAV -->
    <nav>
        <span class="logo">
            <!-- <div class="logo-mark"></div>
      Sales Ninja -->
            <img src="<?= $config['rvuserinfo']['base_url']; ?>/assets/salesninjacrm/logo.png" alt="logo"
                style="width: 200px;">
        </span>
        <div class="nav-c">
            <?php foreach ($salesninjaData['naveData'] as $naveitems) { ?>
                <a href="<?= $naveitems['url']; ?>"><?= $naveitems['title']; ?></a>
            <?php } ?>

        </div>
        <div class="nav-right">
            <!-- <a href="#" c  lass="btn-ghost">Sign In</a> -->
            <!-- <a href="#contact-us" class="btn-fill">Book Free Demo</a> -->
            <a href="<?= $config['rvuserinfo']['base_url']; ?>" class="btn-fill">Home</a>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero" id="home">
        <div class="hero-canvas">
            <div class="grid-bg"></div>
            <div class="blob1"></div>
            <div class="blob2"></div>
            <div class="blob3"></div>
        </div>

        <!-- <div class="pill"><span class="pill-live"></span> AI-Optimized CRM - Built exclusively for MFDs</div> -->

        <!-- <h1 class="hero-h1">
            <span class="line1">From Lead Management</span>
            <span class="line2"> to <span class="line2-1">Conversion,</span> <span class="line2-2">Introducing</span></span>
            <span class="line4"><span class="line4-1">Sales Ninja</span><span class="line4-2">AI-optimized</span></span>
             <span class="line2"> MFD CRM</span>
            <span class="line3"> MFD CRM</span>
            <span class="line3">AI-optimized MFD CRM</span>
        </h1> -->

        <h1 class="hero-h1">
            <span class="line1">Sales Ninja</span>
            <span class="line2">AI-optimized Lead Management </span>
            <span class="line3"> MFD CRM</span>
        </h1>

        <!-- <p class="hero-sub">Built exclusively for MFDs to manage &amp; convert more investors. </p> -->

        <div class="hero-acts">
            <a href="#contact-us" class="btn-big"> Book Free Demo <svg width="14" height="14" viewBox="0 0 14 14"
                    fill="none">
                    <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg></a>
            <!-- <a href="#!" class="btn-big copenModal" dataid="watchdata"> Watch the Demo <svg width="14" height="14"
                    viewBox="0 0 14 14" fill="none">
                    <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg></a> -->
            <!-- <a href="#features" class="btn-big-ghost">See Features</a> -->
        </div>

        <p class="hero-sub" style=" margin-bottom: 0;">Built for MFDs who want: </p>

        <div class="hero-trust" style=" margin-top: 20px;">
            <div class="trust-bullets">
                <div class="trust-pill"><span class="trust-pill-dot"></span> More Conversions</div>
                <div class="trust-pill"><span class="trust-pill-dot"></span> Better Follow-ups</div>
                <div class="trust-pill"><span class="trust-pill-dot"></span> Clear Pipeline Visibility</div>
                <div class="trust-pill"><span class="trust-pill-dot"></span> Less Manual Work</div>
            </div>
        </div>

        <!-- DASHBOARD MOCK -->
        <div class="hero-dash-wrap rev">
            <div class="browser-frame">
                <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/dashboard-image.jpg"
                    alt="dashboard-image" style="width:100%">


            </div>
        </div>
    </section>

    <!-- TICKER -->
    <div class="ticker-sec">
        <div class="ticker-inner">
            <div class="ticker-item"><strong>More Conversions</strong> for every MFD <span class="ticker-sep">·</span>
            </div>
            <div class="ticker-item"><strong>Better Follow-ups</strong> automated & on time <span
                    class="ticker-sep">·</span>
            </div>
            <div class="ticker-item"><strong>Clear Pipeline</strong> visibility at a glance <span
                    class="ticker-sep">·</span>
            </div>
            <div class="ticker-item"><strong>Less Manual Work</strong> - focus on investors <span
                    class="ticker-sep">·</span>
            </div>
            <div class="ticker-item"><strong>SIP & Lumpsum</strong> opportunity tracking <span
                    class="ticker-sep">·</span>
            </div>
            <div class="ticker-item"><strong>AI-Optimized</strong> CRM for MFDs <span class="ticker-sep">·</span></div>
            <div class="ticker-item"><strong>More Conversions</strong> for every MFD <span class="ticker-sep">·</span>
            </div>
            <div class="ticker-item"><strong>Better Follow-ups</strong> automated & on time <span
                    class="ticker-sep">·</span>
            </div>
            <div class="ticker-item"><strong>Clear Pipeline</strong> visibility at a glance <span
                    class="ticker-sep">·</span>
            </div>
            <div class="ticker-item"><strong>Less Manual Work</strong> - focus on investors <span
                    class="ticker-sep">·</span>
            </div>
            <div class="ticker-item"><strong>SIP & Lumpsum</strong> opportunity tracking <span
                    class="ticker-sep">·</span>
            </div>
            <div class="ticker-item"><strong>AI-Optimized</strong> CRM for MFDs <span class="ticker-sep">·</span></div>
        </div>
    </div>


    <section class="feat-sec main-section service-section" id="features">
        <div class="rev text-center section-hadding">
            <div class="sec-label">Core Features</div>
            <h2 class="sec-h2">Everything an MFD Needs to<br><em>Nurture &amp; Convert Leads</em></h2>
            <p>Replace
                spreadsheets,
                sticky notes, and 5 different tools with one focused CRM built around your daily MFD workflow.</p>
        </div>
        <div class="service-cards">
            <div class="service-card-row">
                <div class="left-card">
                    <div class="service-card  card<?= $salesninjaData['featuresData'][0]['id']; ?>"
                        style="--fbg-color:<?= $salesninjaData['featuresData'][0]['b-color']; ?>;--fcolor:<?= $salesninjaData['featuresData'][0]['f-color']; ?>;">
                        <div class="service-body">
                            <div class="f-icon-wrap">
                                <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/<?= $salesninjaData['featuresData'][0]['icone']; ?>"
                                    alt="<?= $salesninjaData['featuresData'][0]['title']; ?>">
                            </div>
                            <h3 class="f-title"><?= $salesninjaData['featuresData'][0]['title']; ?></h3>
                            <p class="f-desc"><?= $salesninjaData['featuresData'][0]['desc']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="right-card">
                    <?php
                    $featuresId = [2, 3];
                    $i = 1;
                    foreach ($salesninjaData['featuresData'] as $salesninjaitems) {
                        if (in_array($salesninjaitems['id'], $featuresId)) {
                            ?>
                            <div class="service-card   card<?= $salesninjaitems['id']; ?>"
                                style="--fbg-color:<?= $salesninjaitems['b-color']; ?>;--fcolor:<?= $salesninjaitems['f-color']; ?>;">
                                <div class="service-body">
                                    <div class="f-icon-wrap">
                                        <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/<?= $salesninjaitems['icone']; ?>"
                                            alt="<?= $salesninjaitems['title']; ?>">
                                    </div>
                                    <h3 class="f-title"><?= $salesninjaitems['title']; ?></h3>
                                    <p class="f-desc"><?= $salesninjaitems['desc']; ?></p>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
            <div class="service-card-row2">
                <?php
                $featuresId = [4, 5, 6];
                $i = 1;
                foreach ($salesninjaData['featuresData'] as $salesninjaitems) {
                    if (in_array($salesninjaitems['id'], $featuresId)) {
                        ?>
                        <div class="service-card  card<?= $salesninjaitems['id']; ?>"
                            style="--fbg-color:<?= $salesninjaitems['b-color']; ?>;--fcolor:<?= $salesninjaitems['f-color']; ?>;">
                            <div class="service-body">
                                <div class="f-icon-wrap">
                                    <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/<?= $salesninjaitems['icone']; ?>"
                                        alt="<?= $salesninjaitems['title']; ?>">
                                </div>
                                <h3 class="f-title"><?= $salesninjaitems['title']; ?></h3>
                                <p class="f-desc"><?= $salesninjaitems['desc']; ?></p>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>

        </div>
    </section>

    <section class=" rvpricing-section main-section" id="pricing">
        <div class="rvpricing-container">
            <div class="rev text-center section-hadding">
                <div class="sec-label">Simple, Transparent Pricing</div>
                <h2 class="sec-h2">One Plan. Built for <br><em> Growing MFDs</em></h2>
                <!-- <p> No hidden fees. Cancel anytime. Launch offer available for a limited time.</p> -->
            </div>


            <div class="rvpricing-grid">

                <!-- CARD 1 -->
                <div class="rvpricing-card">

                    <div class="rvplan-label">
                        SALES NINJA MFD CRM
                    </div>

                    <div class="rvprice">
                        ₹29,500 <span> /user/year </span>
                    </div>

                    <p class="rvsmall">
                        Complete business management platform for Mutual Fund Distributors
                    </p>

                    <ul>
                        <li><b>Features:</b></li>
                        <li>Investor lifecycle & relationship management</li>
                        <li>WealthElite integration</li>
                        <li>Intuitive dashboard</li>
                        <li>RM/employee/branch/broker activity monitoring</li>
                        <li>Smart lead assignment & prospect pipeline</li>
                        <li>Follow-up reminders, tasks & engagement tracking</li>
                        <li>Document vault & investor profile history</li>
                        <li>Meeting logs, notes & interaction timeline</li>
                        <li>Custom reports & performance insights</li>
                        <li>Multi-user role & access management</li>
                        <li>Mobile app for field teams & RMs</li>
                    </ul>

                    <a href="#contact-us" class="rvbtn">
                        Get Started
                    </a>

                </div>

                <!-- CARD 2 -->
                <div class="rvpricing-card active">
                    <span class="new-top-poular">Recommended</span>
                    <div class="rvplan-label">
                        SALES NINJA MFD CRM + CALL CRM
                    </div>

                    <div class="rvprice">
                        ₹14,400 <span>/user/year</span>
                    </div>

                    <p class="rvsmall">
                        MFD CRM combined with advanced calling productivity & monitoring tools
                    </p>

                    <ul>
                        <li><b>Features:</b></li>
                        <li>Everything included in MFD CRM</li>
                        <li>Automatic business call tracking</li>
                        <li>Call recording & conversation history</li>
                        <li>Lead-wise call activity timeline</li>
                        <li>Daily employee productivity reports</li>
                        <li>Call analytics & performance monitoring</li>
                        <li>Team calling activity dashboard</li>
                        <li>Missed follow-up & idle time tracking</li>
                        <li>Calling insights for better investor engagement</li>
                        <li>Mobile app with integrated call monitoring</li>
                    </ul>

                    <a href="#contact-us" class="rvbtn">
                        Get Started
                    </a>

                </div>

                <!-- CARD 3 -->
                <!-- <div class="rvpricing-card">

                    <div class="rvplan-label">
                        SALES NINJA MFD CRM + CALL CRM
                    </div>

                    <div class="rvprice">
                        ₹14,400 <span>/user/year</span>
                    </div>

                    <p class="rvsmall">
                        MFD CRM combined with advanced calling productivity & monitoring tools
                    </p>

                    <ul>
                        <li><b>Features:</b></li>
                        <li>Everything included in MFD CRM</li>
                        <li>Automatic business call tracking</li>
                        <li>Call recording & conversation history</li>
                        <li>Lead-wise call activity timeline</li>
                        <li>Daily employee productivity reports</li>
                        <li>Call analytics & performance monitoring</li>
                        <li>Team calling activity dashboard</li>
                        <li>Missed follow-up & idle time tracking</li>
                        <li>Calling insights for better investor engagement</li>
                        <li>Mobile app with integrated call monitoring</li>
                    </ul>

                    <a href="#" class="rvbtn">
                        Get Started
                    </a>

                </div> -->

            </div>

            <!-- <div class="rvbottom-text">
                All plans include free 14-day trial · No credit card required · GST extra
            </div> -->

        </div>

    </section>

    <section class="rvintegration-section pipe-sec main-section" id="upcoming-feature">

        <div class="rvintegration-container">

            <div class="rvintegration-row">

                <!-- LEFT CONTENT -->

                <div class="rvintegration-left">
                    <div class="rev section-hadding">
                        <div class="sec-label">Integrations</div>
                        <h2 class="sec-h2">Future-Ready Integrations Built for <em> MFD Workflows</em></h2>
                        <p style="">
                            From investor management to communication and calling - Sales Ninja integrates seamlessly
                            with your business ecosystem to simplify operations and improve productivity.

                        </p>
                        <ul class="rvintegration-list">
                            <li>Direct Wealth Elite integration for investor & portfolio sync</li>
                            <li>Native WhatsApp integration for automated investor communication</li>
                            <li>Cloud telephony integration for centralized call tracking & monitoring</li>
                            <li>Email integration for campaigns, alerts & investor communication</li>
                            <li>Microsoft Teams integration for internal collaboration & productivity</li>
                            <li>Zoho CRM integration for connected lead & business workflows</li>
                            <li>API-ready architecture for future custom integrations</li>

                        </ul>
                    </div>




                </div>

                <!-- RIGHT GRID -->

                <div class="rvintegration-right">

                    <div class="rvintegration-grid">
                        <?php foreach ($salesninjaData['upcomingfeature'] as $featuresitems) { ?>
                            <div class="rvintegration-card">
                                <div class="rvintegration-icon rvgreen"
                                    style="background: <?= $featuresitems['background']; ?>;"><img
                                        src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/<?= $featuresitems['icons']; ?>"
                                        alt="<?= $featuresitems['title']; ?>">
                                </div>
                                <div class="rvintegration-name">
                                    <?= $featuresitems['title']; ?>
                                </div>
                            </div>
                        <?php } ?>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="main-section contact-section" id="contact-us">
        <div class="cta-glow"></div>
        <div class="rev text-center section-hadding">
            <div class="sec-label">Contact Us</div>
            <h2 class="sec-h2">Book Your Free <br><em>Demo </em> Today</h2>
            <p>Fill in your details and our team will reach out to you. No sales pressure, just your workflow discussion
                & the features that can benefit you.</p>
        </div>
        <div class="form-box">
            <?php include('salesninja-form.php'); ?>
        </div>


    </section>




    <section class="rvpricing-section main-section faq-section" id="faq">
        <div class="rvpricing-container">
            <div class="rev section-hadding text-center ">
                <div class="sec-label">FAQs</div>
                <h2 class="sec-h2">Got Questions? <br> We've Got <em> Answers</em></h2>
                <p style=""> Everything
                    you need to know about Sales Ninja MFD CRM.

                </p>
            </div>

            <div class="tebBar-box">
                <?php $i = 1;
                foreach ($salesninjaData['faqdata'] as $faqitems) { ?>
                    <div class="tebBar-card">
                        <div class="tebActione" tebOpen="faq<?= $i ?>">
                            <span> <?= $faqitems['title']; ?></span>
                        </div>
                        <div class="disc-box divOpen" id="faq<?= $i ?>">
                            <?= $faqitems['discr']; ?>

                        </div>
                    </div>
                    <?php $i++;
                } ?>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-sec main-section" id="cta">
        <div class="cta-glow"></div>
        <h2 class="rev">Convert Leads into <br><em>Investors</em></h2>
        <p class="rev d1">Join hundreds of advisors already growing their AUM with AI-optimized Sales Ninja CRM.</p>
        <div class="cta-btns rev d2">
            <a href="#contact-us" class="btn-big" style="background:var(--orange)"> Book Free Demo</a>
            <a href="#features" class="btn-big-ghost"
                style="border-color:rgba(255,255,255,.3);color:rgba(255,255,255,.8)">See
                All
                Features</a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div>
            <span class="f-logo">
                <!-- <div class="f-logo-mark"></div>Sales Ninja -->
                <img src="<?= $config['rvuserinfo']['base_url']; ?>/assets/salesninjacrm/logo.png" alt="f-logo"
                    style="width: 200px;margin-bottom:20px">
            </span>
            <p class="f-about"> Sales Ninja is an AI-Optimized CRM built for Mutual Fund Distributors (MFDs) to manage
                leads, follow-ups, client interactions, opportunities, and investor conversion - all in one place.
            </p>
            <p class="f-about">From lead management to final investment execution, Sales Ninja keeps your complete
                business workflow
                organized and connected.</p>
        </div>
        <div>
            <div class="f-col-title">Quick Links</div>
            <ul class="f-links">
                <?php foreach ($salesninjaData['naveData'] as $naveitems) { ?>
                    <li><a href="<?= $naveitems['url']; ?>"><?= $naveitems['title']; ?></a></li>
                <?php } ?>


            </ul>
        </div>
        <div>
            <div class="f-col-title">Get In Touch</div>
            <ul class="f-links">
                <li><a href="tel:+919039822000"><i class="fa-solid fa-phone"></i> +91 9039822000</a></li>
                <li><a href="mailto:info@redvisionglobal.com"><i class="fa-solid fa-envelope"></i>
                        info@redvisionglobal.com</a></li>
            </ul>
        </div>
        <!--<div>
            <div class="f-col-title">Support</div>
            <ul class="f-links">
                <li><a href="#">Help Center</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Book a Demo</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div> -->
        <div class="f-bottom" style="justify-content:center;">
            <span class="f-copy">© <?= date('Y'); ?> Sales Ninja CRM. All Rights Reserved.</span>
            <!-- <span class="f-copy">Convert leads into investors. 🥷</span> -->
        </div>
    </footer>

    <div class="modalbody">
        <a href="javascript:void(0);" class="copenModal cmodalclose"><span></span></a>

        <div class="copenModal modalbg"></div>
        <div class="Cmodalcard">
            <div class="maincontentmodal">

                <div class="modaldatashow show" id="watchdata">
                    <!-- <div class="modalheader">
                        <h4>Get in Touch</h4>
                    </div> -->
                    <div class="content">
                        <div class="iframe">
                            <iframe src="https://www.youtube.com/embed/7rt8J3zQ-0c?si=6jsgG8l5Re7q6shj"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer;   clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $config['rvuserinfo']['base_url']; ?><?= $config['rvrhcinfo']['rvrhc_jquery360']; ?>"></script>
    <div id="scroll-percentage">
        <span id="scroll-percentage-value">
            <i class="fa-solid fa-arrow-up"></i>
        </span>
    </div>
    <script>
        // const cur = document.getElementById('cur'),
        //     curR = document.getElementById('cur-r');
        // let mx = 0,
        //     my = 0,
        //     rx = 0,
        //     ry = 0;
        // document.addEventListener('mousemove', e => {
        //     mx = e.clientX;
        //     my = e.clientY;
        //     cur.style.left = mx + 'px';
        //     cur.style.top = my + 'px'
        // });
        // (function loop() {
        //     rx += (mx - rx) * .13;
        //     ry += (my - ry) * .13;
        //     curR.style.left = rx + 'px';
        //     curR.style.top = ry + 'px';
        //     requestAnimationFrame(loop)
        // })();
        document.querySelectorAll('a,button,.feat-cell,.t-card,.p-card,.fu-card').forEach(el => {
            el.addEventListener('mouseenter', () => document.body.classList.add('hov'));
            el.addEventListener('mouseleave', () => document.body.classList.remove('hov'));
        });
        const ro = new IntersectionObserver(es => es.forEach(e => {
            if (e.isIntersecting) e.target.classList.add('on')
        }), {
            threshold: .08
        });
        document.querySelectorAll('.rev').forEach(el => ro.observe(el));
        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', e => {
                const id = a.getAttribute('href').slice(1);
                const t = document.getElementById(id);
                if (t) {
                    e.preventDefault();
                    t.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    })
                }
            });
        });
        window.addEventListener('scroll', () => {
            document.querySelector('nav').style.boxShadow = window.scrollY > 40 ?
                '0 4px 24px rgba(18,17,14,.08)' :
                'none';
        });
    </script>
    <script>
        $(document).on('click', '.tebActione', function () {
            const dataTebClass = $(this).attr("class");
            const dataTebId = $(this).attr("tebOpen");
            $(".tebActione").removeClass("active");
            if (dataTebClass === "tebActione active") {
                $(".tebActione").removeClass("active");
                $(".divOpen").slideUp('slow');
            } else {
                $(this).toggleClass("active");
                $(".divOpen").slideUp('slow');
                $("#" + dataTebId).slideDown('slow');
            }
        });
        if (jQuery('.copenModal').length) {
            jQuery(document).on('click', '.copenModal', function () {
                const datashow = jQuery(this).attr('dataid')
                jQuery('body').toggleClass("showmodal");
                jQuery('.modaldatashow').removeClass('show');
                jQuery('#' + datashow).addClass('show');
            });
        }
    </script>
    <script src="<?= $config['rvuserinfo']['base_url']; ?>/assets/salesninjacrm/index.js"></script>
    <?php ob_end_flush(); ?>
</body>

</html>