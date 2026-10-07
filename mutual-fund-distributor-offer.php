<!doctype html>
<html lang="en">

<head>
    <title>REDVision Global Technologies - Best Mutual Fund Software in India</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/css/mdb.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="stylesheet" href="assets/fonts/bootstrap-icon/bootstrap-icons.css">
    <style>
        .section {
            padding: 80px 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #2b2a29 !important;
        }

        p,
        a,
        span,
        li {
            color: #4f4e4e !important;
        }

        ::placeholder {
            color: #2b2a29 !important;
        }

        .callBackButton.btnFixed .btn-callback span {
            color: #fff !important;
        }

        /* Landing Page CSS */
        .rvm-landing-header {
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 9;
        }

        .rvm-landing-header .navbar {
            background: transparent !important;
            box-shadow: none;
        }

        .rvm-landing-header .navbar-brand img {
            width: 240px;
        }

        .rvm-landing-banner {
            position: relative;
            padding-top: 120px;
        }

        .rvm-landing-banner::after {
            content: "";
            position: absolute;
            background-image: url(assets/images/landing/banner-shape.png);
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-position: right;
            background-size: contain;
            top: 0;
            right: 0;
            z-index: -1;
        }

        .rvm-landing-banner .banner-text {
            margin-top: 50px;
        }
        .rvm-landing-banner .banner-text .btn-landing-primary {
    margin-top: 25px;
}

        .rvm-landing-banner .banner-text .title {
            color: #2b2a29 !important;
            font-weight: 400;
            font-size: 62px;
        }

        .rvm-landing-banner .banner-text .title b {
            font-weight: 900;
        }

        .rvm-landing-banner .banner-text .title span {
            color: #dc273e !important;
            position: relative;
            font-weight: 700;
            margin-bottom: 20px;
            display: block;
            padding: 0px 0px;
            font-size: 58px;
            line-height: 62px;
        }

        .rvm-landing-banner .banner-text .title span::after {
            content: "";
            position: absolute;
            background: #e42f44;
            width: 85%;
            height: 10px;
            left: 0;
            bottom: 0;
            clip-path: polygon(0 60%, 90% 80%, 100% 100%, 0% 100%);
            /* content: ""; */
            /* position: absolute; */
            /* background-image: url(../images/head-shape.png); */
            /* background-repeat: no-repeat; */
            /* background-size: cover; */
            /* background-position: center; */
            /* width: 100%; */
            /* height: 100%; */
            /* left: 0; */
            /* top: 0; */
            /* z-index: -1; */
        }

        .rvm-landing-banner .banner-text h5 {
            color: #4f4e4e !important;
            font-weight: 400;
            line-height: 1.8rem;
            margin-top: 20px;
            font-size: 24px;
        }

        .btn-landing-primary {
            background: #e42f44;
            border: 1px solid #e42f44;
            box-shadow: none;
            color: #fff !important;
            font-size: 16px;
            padding: 12px 45px 12px 18px;
            border-radius: 30px;
        }

        .btn-landing-primary:hover {
            background: transparent;
            color: #dc273e !important;
            box-shadow: none !important;
            border-color: #dc273e;
        }

        .btn-landing-primary::after {
            content: "\F1BE";
            position: absolute;
            font-family: 'bootstrap-icons';
            font-size: 15px;
            top: 11px;
            right: 10px;
            display: flex;
            width: 28px;
            height: 28px;
            border-radius: 100%;
            color: #fff !important;
            justify-content: center;
            align-items: center;
        }

        .btn-landing-primary:hover::after {
            color: #e42f44 !important;
        }

        /* .rvm-landing-service {
    background: linear-gradient(90deg, #fff3f4 0%, rgba(144, 213, 236, 0) 60%);
} */
        /* .rvm-landing-service .service-image {
    margin-top: 30px;
} */
        .rvm-landing-service .service-image img {
            width: 70%;
            margin: 0 auto;
            text-align: center;
            display: block;
        }

        /* Service Two */
        .service-row {
            display: grid;
            grid-gap: 100px 0;
            grid-template-columns: repeat(16, 1fr);
            position: relative;
        }

        .service-row::after {
            content: "";
            position: absolute;
            background: #fbe9eb;
            width: 100%;
            height: 3px;
            top: 50%;
        }

        .service-box {
            background: #fbe9eb;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 0;
            position: relative;
            text-align: center;
        }

        .service-box:nth-child(1) {
            grid-row: 1/2;
            grid-column: 1/5;
        }

        .service-box:nth-child(2) {
            grid-row: 2/3;
            grid-column: 4/8;
        }

        .service-box:nth-child(3) {
            grid-row: 1/2;
            grid-column: 7/11;
        }

        .service-box:nth-child(4) {
            grid-row: 2/3;
            grid-column: 10/14;
        }

        .service-box:nth-child(5) {
            grid-row: 1/2;
            grid-column: 13/17;
        }

        .service-box:nth-child(2)::before {
            content: "";
            position: absolute;
            background: #fbe9eb;
            width: 12px;
            height: 12px;
            border-radius: 100%;
            top: -55px;
            left: 48%;
        }

        .service-box:nth-child(2)::after {
            content: "";
            position: absolute;
            background: #fbe9eb;
            width: 3px;
            height: 55px;
            top: -54px;
            left: 50%;
        }

        .service-box:nth-child(4)::before {
            content: "";
            position: absolute;
            background: #fbe9eb;
            width: 12px;
            height: 12px;
            border-radius: 100%;
            top: -55px;
            left: 48%;
        }

        .service-box:nth-child(4)::after {
            content: "";
            position: absolute;
            background: v#fbe9eb;
            width: 3px;
            height: 55px;
            top: -54px;
            left: 50%;
        }

        .service-box::before {
            content: "";
            position: absolute;
            background: #fbe9eb;
            width: 12px;
            height: 12px;
            border-radius: 100%;
            bottom: -57px;
            left: 48%;
        }

        .service-box::after {
            content: "";
            position: absolute;
            background: #fbe9eb;
            width: 3px;
            height: 55px;
            bottom: -54px;
            left: 50%;
        }

        .rvm-service-section.rvm-landing-service .service-box h4 {
            color: #e42f44 !important;
        }

        .rvm-service-section.rvm-landing-service .service-box .rvm-listing li::after {
            color: #e4272a !important;
        }

        section.section.rvm-service-section.rvm-landing-service .service-box {
            background: #fff5f6;
        }

        .landing-heading {
            margin-bottom: 40px;
        }

        .landing-heading .title {
            font-size: 36px;
        }

        .landing-heading .title span {
            color: #e42f44 !important;
            position: relative;
            padding: 0;
        }

        .landing-heading .title span::after {
            content: "";
            position: absolute;
            z-index: -1;
            background: #e42f44;
            width: 100%;
            height: 10px;
            left: 0;
            bottom: 0;
            clip-path: polygon(0 60%, 90% 80%, 100% 100%, 0% 100%);
        }

        .whyus-box {
            background: #fff;
            border-radius: 10px;
            padding: 15px 10px;
            box-shadow: 0 5px 15px 0 #00000026;
            display: flex;
            align-items: center;
            min-height: 105px;
        }

        .whyus-box .icon {
            margin-right: 15px;
            width: 60px;
            height: 55px;
        }

        .whyus-box .title {
            font-size: 18px;
            line-height: 22px;
            font-weight: 600;
        }

        .whyus-box .text p {
            margin: 0;
            line-height: 22px;
        }

        .rvm-landing-listing {
            list-style-type: none;
            padding: 0;
        }

        .rvm-landing-listing .item {
            position: relative;
            font-size: 18px;
            color: var(--rvm-black) !important;
            background: linear-gradient(45deg, #fff3f4, #fdeaeb);
            padding: 8px 10px;
            border-radius: 40px;
            margin-bottom: 10px;
            line-height: 22px;
            display: flex;
            align-items: center;
        }

        .rvm-landing-listing .item .number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 100%;
            padding: 0 2px;
            background: #e4272a;
            text-align: center;
            font-size: 28px;
            color: #fff !important;
        }

        .rvm-landing-listing .item .title {
            width: calc(100% - 50px);
            margin-left: 15px;
            font-weight: 500;
            color: #2b2a29 !important;
            font-size: 18px !important;
            line-height: 20px;
        }

        .rvm-landing-offer {
            overflow: hidden;
            position: relative;
        }

        .rvm-landing-offer::after {
            content: "";
            position: absolute;
            background: #dc273e;
            width: 550px;
            height: 550px;
            border-radius: 100%;
            backdrop-filter: blur(30px);
            filter: blur(50px);
            opacity: 0.1;
            bottom: -100px;
            right: -100px;
            z-index: -1;
        }

        .rvm-landing-offer .landing-heading {
            margin-bottom: 10px;
        }

        .rvm-landing-offer .offer-text {
            margin-top: 40px;
        }

        .rvm-landing-offer .offer-text h4 {
            font-weight: 400;
            margin-bottom: 25px;
        }

        .rvm-landing-offer .offer-image img {
            width: 80%;
            text-align: center;
            display: block;
            margin: 0 auto;
            margin-top: 60px;
        }

        .rvm-landing-contact .contact-image img {
            width: 88%;
        }

        .rvm-landing-contact .rvm-forms input,
        .rvm-landing-contact .rvm-forms textarea,
        .rvm-landing-contact .rvm-forms select {
            background: #fff5f5;
            border: 1px solid #fff5f5;
            border-bottom: 1px solid #ffffff4f;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 25px;
            outline: none;
            box-shadow: none;
            color: #2b2a29 !IMPORTANT;
        }

        .rvm-landing-contact .rvm-forms input:focus,
        .rvm-landing-contact .rvm-forms textarea:focus,
        .rvm-landing-contact .rvm-forms select:focus {
            background: #fff5f5;
            border: 1px solid #dc273e;
        }

        .rvm-landing-contact .rvm-forms .btn-refresh {
            background: #ff6678;
            border-radius: 25px;
            color: #fff;
            height: 50px;
            vertical-align: middle;
        }

        .rvm-landing-contact .rvm-forms #captcha {
            width: calc(100% - 220px);
        }

        .rvm-landing-contact #error-status p,
        .rvm-landing-contact #error-status-callback p {
            background: #dd2b43;
            padding: 5px 15px;
            border-radius: 5px;
            text-align: center;
            font-size: 15px;
            color: #fff !IMPORTANT;
        }

        .rvm-landing-contact .rvm-forms #captcha_code {
            width: 110px;
            border-radius: 30px;
            height: 50px;
        }

        .rvm-landing-contact .login_btn.btn-primary {
            border-radius: 30px;
            padding: 14px 15px;
            background: #e42f44;
            box-shadow: 0 4px 9px -4px #e42f44;
            width: 210px;
            font-size: 16px;
        }

        .rvm-landing-footer {
            position: relative;
            overflow: hidden;
        }

        .rvm-landing-footer::after {
            content: "";
            position: absolute;
            background: #dc273e;
            width: 60%;
            height: 400px;
            border-radius: 100%;
            backdrop-filter: blur(30px);
            filter: blur(50px);
            opacity: 0.1;
            bottom: -150px;
            right: 0;
            left: 0;
            margin: 0 auto;
            z-index: -1;
        }

        .rvm-landing-footer .footer-top {
            padding: 60px 0;
        }

        .rvm-landing-footer .footer-bottom .copyright-text {
            display: block;
        }

        .rvm-landing-thankyou {
            padding-top: 180px;
        }

        .rvm-landing-thankyou .thankyou-box {
            width: 60%;
            margin: 0 auto;
            background: #fff;
            box-shadow: 0 6px 15px 0 #0000003b;
            padding: 200px 30px 30px;
            text-align: center;
            border-radius: 30px;
            position: relative;
            overflow: hidden;
        }

        .rvm-landing-thankyou .thankyou-box img {
            position: absolute;
            top: -30px;
            left: 0;
            right: 0;
            width: 400px;
            margin: 0 auto;
        }

        .rvm-landing-thankyou .thankyou-box h2 {
            position: relative;
            margin-top: 40px;
        }

        .rvm-landing-thankyou .thankyou-box p {
            position: relative;
        }

        .footer-widget ul {
            padding: 0;
            list-style-type: none;
        }

        .footer-widget ul li {
            position: relative;
            padding-left: 25px;
        }

        .footer-widget ul li a {
            color: var(--rvm-white);
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .footer-widget ul li i {
            font-size: 18px;
            vertical-align: middle;
            margin-right: 5px;
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 30px;
            text-align: center;
            line-height: 38px;
            position: absolute;
            left: -5px;
            top: -5px;
        }

        .rvm-footer .social ul {
            display: flex;
        }

        .rvm-footer .social ul a {
            margin-right: 10px;
        }

        @media screen and (max-width:767px) {
            .rvm-landing-banner .banner-text .title {
                font-size: 42px;
            }

            .rvm-landing-banner::after {
                background-position: top;
            }

            .banner-image {
                margin-top: 30px;
            }

            .landing-heading .title {
                font-size: 30px;
            }

            .service-row {
                display: block;
            }

            section.section.rvm-service-section.rvm-landing-service .service-box {
                margin-bottom: 20px;
            }

            .service-row::after {
                display: none;
            }

            .service-box::before {
                display: none;
            }

            .service-box::after {
                display: none;
            }

            .contact-form {
                margin-top: 30px;
            }

            .footer-widget {
                margin-bottom: 30px;
            }

            .whyus-box {
                margin-bottom: 20px;
            }
        }

        .fintech-combination-section {
            background: #242424;
            padding: 130px 0 90px 0;
            clip-path: polygon(0 8%, 100% 0, 100% 100%, 0% 100%);
        }

        .fintech-combination-section .landing-heading .title span {
            color: #fff !important;
        }

        .fintech-combination-section .landing-heading .title span::after {
            background: #fff;
        }

        .fintech-combination-section .title {
            color: #fff !important;
        }

        .fintech-card {
            background: #343335;
            padding: 25px 25px 10px 25px;
            border-radius: 20px;
            min-height: 420px;
        }

        .fintech-card .icon {
            display: flex;
            width: 100px;
            height: 100px;
            background: #242424;
            border-radius: 100%;
            align-items: center;
            justify-content: center;
        }

        .fintech-card.fintech-card-one {
            margin-top: 60px;
        }

        .fintech-card.fintech-card-two {
            margin-top: 30px;
        }

        .fintech-card .content h4,
        .fintech-card .content p,
        .fintech-card .content li {
            color: #dad8dd !important;
        }

        .fintech-card .content h4 {
            margin-top: 15px;
        }

        .fintech-card .content ul {
            list-style-type: none;
            padding: 0;
        }

        .fintech-card .content ul li {
            position: relative;
            padding-left: 18px;
            margin-bottom: 5px;
        }

        .fintech-card .content ul li::after {
            content: "\F285";
            position: absolute;
            width: 7px;
            height: 7px;
            left: 0;
            top: 2px;
            color: #fff;
            font-family: bootstrap-icons;
            font-size: 14px;
        }

        .rvm-early-bird-offer {
            background: #f9f0f0;
        }

        .rvm-early-bird-offer h2 {
            color: #e42f44 !important;
            font-size: 52px;
            font-weight: 800;
        }

        /* .early-offer-content {
            margin-top: 50px;
        } */

        .early-offer-content h4 {
    font-size: 42px;
    width: 92%;
    font-weight: 400;
    line-height: 46px;
}

        .early-offer-content h4 span {
            font-weight: 800;
            color: #2b2a29 !important;
            font-size: 60px;
            display: block;
            line-height: 67px;
        }

        .early-offer-content h4 .red {
            font-weight: 800;
            color: #e42f44 !important;
            font-size: 62px;
            line-height: 64px;
        }

        .early-offer-image img {
            width: 47%;
            margin: 0 auto;
            display: block;
        }

        .rv-listing {
            list-style-type: none;
            padding: 0;
        }

        .rv-listing li {
            position: relative;
            padding-left: 18px;
            margin-bottom: 5px;
        }

        .rv-listing li::after {
            content: "\F285";
            position: absolute;
            width: 7px;
            height: 7px;
            left: 0;
            top: 2px;
            color: #e42f44;
            font-family: bootstrap-icons;
            font-size: 14px;
        }

        .rvm-early-bird-offer .rv-listing {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            margin-top: 30px;
        }

        .rvm-early-bird-offer .rv-listing li {
            margin-bottom: 20px;
            padding-left: 35px;
        }

        .rvm-early-bird-offer .rv-listing li::after {
            background: #e42f44;
            width: 28px;
            height: 28px;
            border-radius: 100%;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            top: 0px;
        }
    </style>

</head>

<body>
    <header class="rvm-landing-header">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <p class="navbar-brand me-2">
                    <img src="assets/images/logo.png" alt="Header Logo" loading="lazy" />
                </p>

            </div>
        </nav>
    </header>
    <main class="wrapper">

        <section class="section rvm-landing-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="banner-text">
                            <h2 class="title" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-delay="">Buy <b>3 Get 1 Free</b> <span>Best Fintech Combo </span> for MFDs </h2>
                            <h5 data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-delay="600">Acquire clients, manage AUM, grow business, repeat.</h5>
                            <a href="mutual-fund-distributor-offer.php#contact" class="btn btn-landing-primary" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-delay="900">Get Demo</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="banner-image" data-aos="zoom-in" data-aos-easing="ease-in-sine">
                            <img src="assets/images/landing/combo.png" alt="Media Banner" width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section id="whyMedia" class="section rvm-landing-whyus">
            <div class="container">
                <div class="landing-heading text-center">
                    <h2 class="title">What this <span>combination</span> has?</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="whyus-box" data-aos="flip-down" data-aos-delay="0">
                            <span class="icon">
                                <img src="assets/images/landing/software.png" alt="Wealth Elite">
                            </span>
                            <div class="text">
                                <h5 class="title">Wealth Elite</h5>
                                <p> Wealth Management Software</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="whyus-box" data-aos="flip-down" data-aos-delay="200">
                            <span class="icon">
                                <img src="assets/images/landing/transaction.png" alt="BSE, NSE, MFU">
                            </span>
                            <div class="text">
                                <h5 class="title">BSE, NSE, MFU</h5>
                                <p>Transaction Platforms</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="whyus-box" data-aos="flip-down" data-aos-delay="400">
                            <span class="icon">
                                <img src="assets/images/landing/mobile-app.png" alt="Personalized Mobile App">
                            </span>
                            <div class="text">
                                <h5 class="title">Personalized Mobile App</h5>
                                <p>Access Handy</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="whyus-box" data-aos="flip-down" data-aos-delay="600">
                            <span class="icon">
                                <img src="assets/images/landing/advisorx.png" alt="Advisor X">
                            </span>
                            <div class="text">
                                <h5 class="title">Advisor X</h5>
                                <p>Platform Application</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section id="fintech" class="section fintech-combination-section">
            <div class="container">
                <div class="landing-heading text-center">
                    <h2 class="title" data-aos="fade-up" data-aos-delay="0">What does this <span> Fintech Combination</span> include?</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="fintech-card fintech-card-one" data-aos="zoom-in-up" data-aos-delay="0">
                            <div class="icon"><img src="assets/images/landing/software.png" alt="Wealth Elite"></div>
                            <div class="content">
                                <h4>Wealth Elite Software</h4>
                                <p>Multi-asset transaction wealth management platform offers</p>
                                <ul>
                                    <li>White Labeling</li>
                                    <li>Video KYC</li>
                                    <li>Goal Planning</li>
                                    <li>Wealth Report</li>
                                    <li>Instant Transaction & More</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="fintech-card fintech-card-two" data-aos="zoom-in-up" data-aos-delay="300">
                            <div class="icon"><img src="assets/images/landing/transaction.png" alt="BSE, NSE, MFU"></div>
                            <div class="content">
                                <h4>Transaction Platforms</h4>
                                <p>Instant transaction using seamless integration with NSE, BSE, & MFU</p>
                                <ul>
                                    <li>Register Clients
                                    <li>Create Mandate
                                    <li>Buy/Sell/Switch
                                    <li>SIP/SWP/STP</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="fintech-card" data-aos="zoom-in-up" data-aos-delay="600">
                            <div class="icon"><img src="assets/images/landing/mobile-app.png" alt="Personalized Mobile App"></div>
                            <div class="content">
                                <h4>Personalized Mobile App</h4>
                                <p>Control your entire business at your fingertips with a customized application</p>
                                <ul>
                                    <li>Onboarding</li>
                                    <li>Reports on WhatsApp</li>
                                    <li>Portfolio Analysis</li>
                                    <li>Risk Profiling</li>
                                    <li>CAS & More</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="early-bird-offer" class="section rvm-early-bird-offer">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="early-offer-image" data-aos="flip-left">
                            <img src="assets/images/landing/advisor-x-dashboard.png" alt="Media Offer" width="100%">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="early-offer-content">
                            <h2 data-aos="fade-up" data-aos-delay="0">Special Early Bird Offer!</h2>
                            <h4 data-aos="fade-up" data-aos-delay="300">Buy this Fintech Combo at an unbelievable price & get <span>Advisor X Mobile App</span><span class="red">FREE</span></h4>
                            <ul class="rv-listing">
                                <li data-aos="fade-up" data-aos-delay="600">Share Reports on WhatsApp</li>
                                <li data-aos="fade-up" data-aos-delay="700">Financial Calculators</li>
                                <li data-aos="fade-up" data-aos-delay="800">Video KYC</li>
                                <li data-aos="fade-up" data-aos-delay="900">Attractive dashboard</li>
                                <li data-aos="fade-up" data-aos-delay="1000">Goal Planning</li>
                                <li data-aos="fade-up" data-aos-delay="1100">Portfolio Analysis</li>
                            </ul>
                            <a href="mutual-fund-distributor-offer.php#contact" class="btn btn-landing-primary" data-aos="fade-up" data-aos-delay="1300">Learn More</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="offer" class="section rvm-landing-offer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="offer-text">
                            <div class="landing-heading">
                                <h2 class="title" data-aos="fade-up" data-aos-delay="0">Why should you get <span> this combo?</span></h2>
                            </div>
                            <h4 data-aos="fade-up" data-aos-delay="200">Grow your business 3X with this powerful triplet.</h4>

                        </div>
                        <ul class="rvm-landing-listing">
                            <div class="item" data-aos="zoom-in-up" data-aos-delay="200">
                                <span class="number">1</span>
                                <span class="title">Boost your income with multiple assets </span>
                            </div>
                            <div class="item" data-aos="zoom-in-up" data-aos-delay="400">
                                <span class="number">2</span>
                                <span class="title">Build your brand & trust </span>
                            </div>
                            <div class="item" data-aos="zoom-in-up" data-aos-delay="600">
                                <span class="number">3</span>
                                <span class="title">Make financial plan in minutes</span>
                            </div>
                            <div class="item" data-aos="zoom-in-up" data-aos-delay="800">
                                <span class="number">4</span>
                                <span class="title">Web & mobile accessibility</span>
                            </div>
                            <div class="item" data-aos="zoom-in-up" data-aos-delay="1000">
                                <span class="number">5</span>
                                <span class="title">Comprehensive wealth reports </span>
                            </div>
                            <div class="item" data-aos="zoom-in-up" data-aos-delay="1200">
                                <span class="number">6</span>
                                <span class="title">Dedicated relationship manager </span>
                            </div>
                        </ul>

                        <a href="mutual-fund-distributor-offer.php#contact" class="btn btn-landing-primary" data-aos="fade-up" data-aos-delay="1200">Get Started</a>
                    </div>
                    <div class="col-md-6">
                        <div class="offer-image" data-aos="zoom-in">
                            <img src="assets/images/landing/combo-growth.png" alt="Media Offer" width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="service" class="section rvm-service-section rvm-landing-service">
            <div class="container">
                <div class="landing-heading text-center">
                    <h2 class="title">You can count on <span>REDVision</span></h2>
                </div>

                <div class="service-row">
                    <div class="service-box aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-sine">
                        <h4>4000+</h4>
                        <p>Satisfied MF Distributors</p>
                    </div>
                    <div class="service-box aos-init aos-animate" data-aos="fade-down" data-aos-easing="ease-in-sine" data-aos-delay="200">
                        <h4>2 lakh Cr+ </h4>
                        <p> Assets Under Management</p>
                    </div>
                    <div class="service-box aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-delay="400">
                        <h4>5.5 Mn</h4>
                        <p>Online Portfolio Users</p>
                    </div>
                    <div class="service-box aos-init aos-animate" data-aos="fade-down" data-aos-easing="ease-in-sine" data-aos-delay="600">
                        <h4>18+ </h4>
                        <p>Years in Business</p>
                    </div>
                    <div class="service-box aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-delay="800">
                        <h4>450+ </h4>
                        <p>Cities</p>
                    </div>
                </div>
            </div>
        </section>


        <section id="contact" class="section rvm-landing-contact">
            <div class="container">
                <div class="landing-heading text-center">
                    <h2 class="title">Fill the form for <span>Enquiry</span></h2>
                    <p>A Free demo awaits you. Fill out the form to discuss your unique needs and get the combo at an unbelievable price.</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-image" data-aos="zoom-in" data-aos-easing="ease-in-sine">
                            <img src="assets/images/landing/contact.png" alt="Media Contact" width="100%">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form" data-aos="zoom-in-up" data-aos-easing="ease-in-sine" data-aos-delay="200">
                            <?php include('form_landing.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <footer class="rvm-footer rvm-landing-footer">

            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="footer-widget" data-aos="zoom-in" data-aos-delay="0">
                                <div class="logo">
                                    <img src="assets/images/logo.png" alt="Footer Logo">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-widget contact-widget" data-aos="zoom-in" data-aos-delay="200">
                                <div class="text-box">
                                    <h4 class="title">Reach Us</h4>
                                    <ul>
                                        <li><a href="tel:+918889911223"><i class="bi bi-telephone-fill"></i> +91 9039822000</a></li>
                                        <li><a href="mailto:info@redvisionglobal.com"><i class="bi bi-envelope-fill"></i> info@redvisionglobal.com</a></li>
                                        <li><i class="bi bi-geo-alt-fill"></i> 101, 45 Hare Krishna Vihar, Behind Advanced Academy, Nipania, Indore, 452010 (MP)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="footer-widget subscribe-widget" data-aos="zoom-in" data-aos-delay="400">
                                <div class="text-box">
                                    <!-- <h4 class="title">Subscribe</h4> -->


                                    <h4 class="title">Follow Us</h4>
                                    <div class="social">
                                        <ul>
                                            <li><a href="https://www.facebook.com/redvisiontechnologies" target="_blank" aria-label="Facebook"><i class="bi bi-facebook"></i></a></li>
                                            <li><a href="https://www.linkedin.com/company/redvisiontechnologies/" target="_blank" aria-label="Linkedin"><i class="bi bi-linkedin"></i></a></li>
                                            <li><a href="https://twitter.com/redvisionindore" target="_blank" aria-label="Twitter"><i class="bi bi-twitter"></i></a></li>
                                            <li><a href="https://www.instagram.com/redvisiontechnologies/" target="_blank" aria-label="Instagram"><i class="bi bi-instagram"></i></a></li>
                                        </ul>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright-text text-center">
                                <p><?php echo date("Y"); ?> &copy; REDVision Global Technologies Pvt. Ltd.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="assets/js/mdb.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        //Landing Form Validation & AJAX Process
        function sendFormLanding() {
            var valid = validateFormLanding();

            if (valid) {
                jQuery.ajax({
                    url: "form_mail_landing.php",
                    data: 'rvm_user=' + $("#rvm_user").val() + '&rvm_email=' + $("#rvm_email").val() + '&rvm_mobile=' + $("#rvm_mobile").val() + '&rvm_city=' + $("#rvm_city").val() + '&rvm_arn=' + $("#rvm_arn").val() + '&captcha=' + $("#captcha").val(),
                    type: "POST",
                    success: function(data) {
                        $("#mail-status").html(data);
                        $("#rvm_user").val('');
                        $("#rvm_email").val('');
                        $("#rvm_mobile").val('');
                        $("#rvm_city").val('');
                        $("#rvm_arn").val('');
                        $("#captcha").val('');
                        setInterval(function() {
                            $("#mail-status").html('');
                        }, 3000);

                    },
                    error: function() {}
                });
            } else {
                msg = "<p>Please fill all the details below</p>";
                $("#error-status").html(msg);
            }
        }

        function validateFormLanding() {
            var valid = true;
            $(".demoInputBox").css('background-color', '');
            $(".info").html('');

            if (!$("#rvm_user").val()) {
                $("#rvm_user-info").html("(required)");
                $("#rvm_user").css('border-color', '#dd2b43');
                valid = false;
            }
            if (!$("#rvm_email").val()) {
                $("#rvm_email-info").html("(required)");
                $("#rvm_email").css('border-color', '#dd2b43');
                valid = false;
            }
            if (!$("#rvm_email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                $("#rvm_email-info").html("(invalid)");
                $("#rvm_email").css('border-color', '#dd2b43');
                valid = false;
            }

            if (!$("#rvm_mobile").val()) {
                $("#rvm_mobile").html("(required)");
                $("#rvm_mobile").css('border-color', '#dd2b43');
                valid = false;
            }
            if (!$("#rvm_city").val()) {
                $("#rvm_city").html("(required)");
                $("#rvm_city").css('border-color', '#dd2b43');
                valid = false;
            }
            if (!$("#rvm_arn").val()) {
                $("#rvm_arn").html("(required)");
                $("#rvm_arn").css('border-color', '#dd2b43');
                valid = false;
            }
            if (!$("#captcha").val()) {
                $("#captcha-info").html("(required)");
                $("#captcha").css('border-color', '#dd2b43');
                valid = false;
            }

            return valid;
        }

        function refreshCaptchaLanding() {
            var mytime = "ms=" + new Date().getMilliseconds();
            $("#captcha_code").attr('src', 'captcha_code_landing.php?' + mytime);
        }
    </script>

</body>

</html>