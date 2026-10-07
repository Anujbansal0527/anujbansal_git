<?php include('includes/config.php');
$base_url = 'https://www.redvisiontechnologies.com/rv-landing';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REDVision Global Technologies</title>
  <?php include('includes/head.php'); ?>
</head>

<body>
  <!-- Page-wrapper-Start -->
  <div class="page_wrapper">
    <!-- Preloader -->
    <div id="preloader">
      <div id="loader"></div>
    </div>
    <?php include('includes/header.php'); ?>

    <!-- Banner-Section-Start -->
    <section class="banner_section">
      <!-- container start -->
      <div class="container">
        <!-- vertical animation line -->
        <div class="anim_line">
          <span><img src="<?= $base_url ?>/assets/images/anim_line.png" alt="anim_line"></span>
          <span><img src="<?= $base_url ?>/assets/images/anim_line.png" alt="anim_line"></span>
          <span><img src="<?= $base_url ?>/assets/images/anim_line.png" alt="anim_line"></span>
          <span><img src="<?= $base_url ?>/assets/images/anim_line.png" alt="anim_line"></span>
          <span><img src="<?= $base_url ?>/assets/images/anim_line.png" alt="anim_line"></span>
          <span><img src="<?= $base_url ?>/assets/images/anim_line.png" alt="anim_line"></span>
          <span><img src="<?= $base_url ?>/assets/images/anim_line.png" alt="anim_line"></span>
          <span><img src="<?= $base_url ?>/assets/images/anim_line.png" alt="anim_line"></span>
          <span><img src="<?= $base_url ?>/assets/images/anim_line.png" alt="anim_line"></span>
        </div>
        <!-- row start -->
        <div class="row">
          <div class="col-lg-6 col-md-12" data-aos="fade-right" data-aos-duration="1500">
            <!-- banner text -->
            <div class="banner_text">
              <!-- h1 -->
              <h1>Wealth Management Partner of <span> 4500 MFDs</span> Across & Beyond India</h1>
              <!-- p -->
              <p>Empowering MFDs for 18+ years with Web & App solutions to attract, manage & retain investors effortlessly.</p>
            </div>
            <a class="btn white_btn" href="<?= $base_url ?>#contact" data-aos="fade-right">Book Demo</a>

            <div class="hero-statistics">
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <div class="count-box box1">
                    <div class="value">
                      <span data-purecounter-start="0" data-purecounter-end="4500" data-purecounter-duration="3" class="purecounter"></span>
                      <p>Mutual Fund Distributor</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                  <div class="count-box box2">
                    <div class="value"><span data-purecounter-start="0" data-purecounter-end="2000" data-purecounter-duration="3" class="purecounter"></span> <span class="suffix">B</span></div>
                    <p>Asset Under Management</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
                  <div class="count-box box3">
                    <div class="value">
                      <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="3" class="purecounter"></span> <span class="suffix">M</span>
                      <p>Portfolio<br>Users</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- banner slides start -->
          <div class="col-lg-6 col-md-12" data-aos="fade-in" data-aos-duration="1500">
            <!-- video section start -->
            <div class="hero-video">
              <div class="yt_video" data-aos="fade-in" data-aos-duration="1500">
                <div class="thumbnil">
                  <img src="<?= $base_url ?>/assets/images/thumbnail.webp" alt="image">
                  <a class="popup-youtube play-button" data-url="<?= $base_url ?>/assets/video/hero.mp4" data-toggle="modal" data-target="#myModal" title="XJj2PbenIsU">
                    <span class="play_btn">
                      <img src="<?= $base_url ?>/assets/images/play_icon.png" alt="image">
                      <div class="waves-block">
                        <div class="waves wave-1"></div>
                        <div class="waves wave-2"></div>
                        <div class="waves wave-3"></div>
                      </div>
                    </span>
                    Let's see virtually how it works
                    <span>Watch video</span>
                  </a>
                </div>
              </div>
            </div>
            <!-- video section end -->
          </div>
          <!-- banner slides end -->

        </div>
        <!-- row end -->
      </div>
      <!-- container end -->
    </section>
    <!-- Banner-Section-end -->

    <!-- Trusted Section start -->
    <section class="row_am trusted_section">
      <!-- container start -->
      <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
          <!-- h2 -->
          <h2>With great <span>AUM</span> <br>comes great <span>Responsibility</span></h2>
        </div>

        <!-- logos slider start -->
        <div class="company_logos">
          <div id="company_slider" class="owl-carousel owl-theme">
            <?php
            $counter = 1; // Start the counter from 1
            for ($i = 1; $i <= 12; $i++) { ?>
              <div class="item">
                <div class="logo">
                  <img src="<?= $base_url ?>/assets/images/logos/<?php echo 'client' . $i; ?>.webp" alt="image">
                </div>
              </div>
              <?php $counter++; // Increment counter for next iteration 
              ?>
            <?php } ?>
          </div>
        </div>
        <!-- logos slider end -->
      </div>
      <!-- container end -->
    </section>
    <!-- Trusted Section ends -->

    <section class="row_am modern_ui_section">
      <!-- container start -->
      <div class="container">
        <!-- row start -->
        <div class="row">
          <div class="col-lg-12">
            <div class="section_title text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
              <h2>MFDs All-in-One <br><span>Wealth Management Solution</span></h2>
              <p>REDVision, your all-in-one Multi-Asset Distribution Wealth Management Operating System. With a range of FinTech products, it empowers you to manage client relationships (CRM), gain AUM insights, create goal plans, craft model portfolios and more – all within a single, intuitive platform.</p>
              <p>This includes real-time client on-boarding, their transactions & portfolio reporting, analytics & tracking. Thereby allowing mutual fund distributors to provide similar investment experience like any large B2C Brand.</p>
            </div>
          </div>
          <div class="col-lg-6">
            <!-- UI content -->
            <div class="section_title aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
              <h2>Why <span>REDVision?</span></h2>
            </div>
            <div class="ui_text">

              <ul class="design_block">
                <li data-aos="fade-up" data-aos-duration="1500" class="aos-init aos-animate">White Labelling & Branding</li>
                <li data-aos="fade-up" data-aos-duration="1500" class="aos-init aos-animate">Real-time Digital Onboarding</li>
                <li data-aos="fade-up" data-aos-duration="1500" class="aos-init aos-animate">Advanced Portfolio Management</li>
                <li data-aos="fade-up" data-aos-duration="1500" class="aos-init aos-animate">Assets: Mutual Fund, Equities, IPO, Insurance, P2P, Fixed Income, LAMF, Financial Planning</li>
                <li data-aos="fade-up" data-aos-duration="1500" class="aos-init aos-animate">Personalized Client Experience</li>
                <li data-aos="fade-up" data-aos-duration="1500" class="aos-init aos-animate">Comission & Incentives</li>
                <li data-aos="fade-up" data-aos-duration="1500" class="aos-init aos-animate">Goal Management</li>
                <li data-aos="fade-up" data-aos-duration="1500" class="aos-init aos-animate">Reporting</li>

              </ul>
            </div>
          </div>
          <div class="col-lg-6 mt-5 pt-5">
            <!-- UI Image -->
            <div class="ui_images aos-init aos-animate" data-aos="fade-in" data-aos-duration="1500">
              <div class="left_img">
                <img class="moving_position_animatin" src="assets/images/statistics-data.png" alt="image">
              </div>
              <!-- UI Image -->
              <div class="right_img">
                <img class="moving_position_animatin" src="assets/images/statistics-data2.png" alt="image">
                <img class="moving_position_animatin" src="assets/images/statistics-data3.png" alt="image">
              </div>
            </div>
          </div>
        </div>
        <!-- row end -->
      </div>
      <!-- container end -->
    </section>



    <!-- How-It-Workes-Section-Start -->
    <section id="features" class="row_am how_it_works" id="how_it_work">
      <!-- container start -->
      <div class="container">
        <div class="how_it_inner">
          <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
            <!-- h2 -->
            <h2>Complete Wealth Management Solutions<br> For Your - <span>MFD Business</span></h2>
            <!-- p -->
            <p>These Mutual Fund Business products range to suit MFDs for their different budgets, requirements, potential client needs & MF business operations.</p>
          </div>
          <div class="step_block">
            <!-- UL -->
            <ul>
              <!-- step -->
              <li>
                <div class="step_text" data-aos="fade-right" data-aos-duration="1500">
                  <h4>Wealth Elite</h4>
                  <p>Simplify MFD business with unlimited AUM, automated reports, and advanced features</p>
                </div>
                <div class="step_number">
                  <h3>01</h3>
                </div>
                <div class="step_img" data-aos="fade-left" data-aos-duration="1500">
                  <img src="<?= $base_url ?>/assets/images/features/wealth-elite.png" alt="image">
                </div>
              </li>

              <!-- step -->
              <li>
                <div class="step_text" data-aos="fade-left" data-aos-duration="1500">
                  <h4>Wealth Elite Mobile App </h4>
                  <span>(4.8 Google Play Store Rating)</span>
                  <p>Your pocket-sized MFD office. Manage clients, transactions, and reports on the go with the Application.</p>
                </div>
                <div class="step_number">
                  <h3>02</h3>
                </div>
                <div class="step_img" data-aos="fade-right" data-aos-duration="1500">
                  <img src="<?= $base_url ?>/assets/images/features/wealth-elite-app.png" style="width: 45%; margin: 0 auto; display: block;" alt="image">
                </div>
              </li>

              <!-- step -->
              <li>
                <div class="step_text" data-aos="fade-right" data-aos-duration="1500">
                  <h4>Online Transaction Platform</h4>
                  <span> (BSE/NSE & MFU)</span>
                  <p>Access multiple AMCs from one platform, streamline operations, reduce paperwork & faster transaction processing with 3 platforms.</p>
                </div>
                <div class="step_number">
                  <h3>03</h3>
                </div>
                <div class="step_img" data-aos="fade-left" data-aos-duration="1500">
                  <img src="<?= $base_url ?>/assets/images/features/online-transaction.png" alt="image">
                </div>
              </li>

              <li>
                <div class="step_text" data-aos="fade-left" data-aos-duration="1500">
                  <h4>MF Elite</h4>
                  <p>A budget solution for MFDs to manage up to 25 Cr. AUM.</p>
                </div>
                <div class="step_number">
                  <h3>04</h3>
                </div>
                <div class="step_img" data-aos="fade-right" data-aos-duration="1500">
                  <img src="<?= $base_url ?>/assets/images/features/mf-elite.png" alt="image">
                </div>
              </li>

              <li>
                <div class="step_text" data-aos="fade-right" data-aos-duration="1500">
                  <h4>Advisor X</h4>
                  <p>Mobile application for MFDs to manage investor databases.</p>
                </div>
                <div class="step_number">
                  <h3>05</h3>
                </div>
                <div class="step_img" data-aos="fade-left" data-aos-duration="1500">
                  <img src="<?= $base_url ?>/assets/images/features/advisor-x.png" style="width: 75%; margin: 0 auto; display: block;" alt="image">
                </div>
              </li>

              <li>
                <div class="step_text" data-aos="fade-left" data-aos-duration="1500">
                  <h4>Robo Advisory</h4>
                  <p>Simple self-onboarding and investment app for investors with MFD branding.</p>
                </div>
                <div class="step_number">
                  <h3>06</h3>
                </div>
                <div class="step_img" data-aos="fade-right" data-aos-duration="1500">
                  <img src="<?= $base_url ?>/assets/images/features/robo-mobile.png" style="width: 80%; margin: 0 auto; display: block;" alt="image">
                </div>
              </li>


              <li>
                <div class="step_text" data-aos="fade-right" data-aos-duration="1500">
                  <h4>Business Booster</h4>
                  <p>Comprehensive onboarding tool linked to your website.</p>
                </div>
                <div class="step_number">
                  <h3>07</h3>
                </div>
                <div class="step_img" data-aos="fade-left" data-aos-duration="1500">
                  <img src="<?= $base_url ?>/assets/images/features/business-booster.png" alt="image">
                </div>
              </li>

            </ul>
          </div>
        </div>


      </div>
      <!-- container end -->
    </section>
    <!-- How-It-Workes-Section-end -->


    <!-- About-App-Section-Start -->
    <section id="services" class="row_am about_app_section">
      <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
        <!-- h2 -->
        <h2>Some awesome services <span>We Provide</span></h2>

        <p class="hidden-text">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been the
          industrys standard dummy text ever since the when an unknown printer took a galley of type and. Lorem
          ipsum dolor sit amet.
        </p>
      </div>
      <!-- container start -->
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="about_img" data-aos="fade-in" data-aos-duration="1500">
              <div class="frame_img">
                <img id="service-image" class="moving_position_animatin" src="<?= $base_url ?>/assets/images/features/feature-wealth-elite.png" alt="image">
              </div>
              <div class="screen_img">
                <img id="service-image-2" class="moving_animation" src="<?= $base_url ?>/assets/images/features/feature-elite-img1.png" alt="image">
              </div>
              <div class="screen_img2">
                <img id="service-image-3" class="moving_animation_two" src="<?= $base_url ?>/assets/images/features/feature-elite-img2.png" alt="image">
              </div>
            </div>
          </div>

          <div class="col-lg-6 rv-sercvices">
            <!-- Accordion Section -->
            <div class="accordion" id="servicesAccordion">
              <div class="accordion-item">
                <h2 class="accordion-header active" id="headingOne">
                  <button class="accordion-button" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Wealth Elite
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-parent="#servicesAccordion">
                  <div class="accordion-body">
                    <p>Manage your entire MFD business with Wealth Management Ecosystem, including software, mobile app, and 3 transaction platforms. Customize your platform with white label branding and simplify operations with instant online transactions and more.</p>
                    <ul>
                      <li><strong>White Label:</strong> Customize the platform with your own branding.</li>
                      <li><strong>Online ATM:</strong> Simplify fund transfers for your clients.</li>
                      <li><strong>Goal GPS:</strong> Help clients track and achieve their financial goals.</li>
                      <li><strong>Video KYC:</strong> Conduct secure KYC processes via video.</li>
                      <li><strong>Instant Online Transactions:</strong> Real-time, paperless transactions.</li>
                      <li><strong>Multi-Asset Management:</strong> Efficiently manage investments across various asset classes.</li>
                      <li><strong>Client Reporting:</strong> Generate comprehensive investment reports.</li>
                      <li><strong>Research & MF Tools:</strong> Access powerful tools for mutual fund analysis.</li>
                      <li><strong>Portfolio Analysis & Rebalancing:</strong> Monitor and optimize investment portfolios.</li>
                    </ul>
                    <p><strong>For:</strong> MFDs and their onboarded investors.</p>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    MF Elite
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-parent="#servicesAccordion">
                  <div class="accordion-body">
                    <p>Automate your small MF business and manage up to ₹25 Crore AUM with MF Elite. Leverage basic tools, investor login, and easy transaction tracking to streamline operations.</p>
                    <ul>
                      <li><strong>Basic Tools for Limited AUM Management:</strong> Access tools for small AUM management.</li>
                      <li><strong>Investor Login with Controlled Access:</strong> Secure login for investors with personalized access.</li>
                      <li><strong>Transaction Tracking:</strong> Easily track client transactions.</li>
                    </ul>
                    <p><strong>For:</strong> MFDs managing smaller AUMs and their investors.</p>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Advisor X
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-parent="#servicesAccordion">
                  <div class="accordion-body">
                    <p>Take your business on the go with Advisor X - the mobile app designed for MFDs to manage their mutual fund business from anywhere, anytime.</p>
                    <ul>
                      <li><strong>Onboard Investors:</strong> Securely onboard investors from your mobile device.</li>
                      <li><strong>Facilitate Transactions:</strong> Conduct transactions for investors anytime, anywhere.</li>
                      <li><strong>Report Sharing via WhatsApp:</strong> Share reports easily with clients via WhatsApp.</li>
                    </ul>
                    <p><strong>For:</strong> MFDs who require mobility in managing their business.</p>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Robo Advisory
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-parent="#servicesAccordion">
                  <div class="accordion-body">
                    <p>Work smarter and faster with Robo Advisory - a self-service platform for investors to manage their own investments with ease, from onboarding to transactions.</p>
                    <ul>
                      <li><strong>3-Minute Onboarding:</strong> Fast onboarding for investors.</li>
                      <li><strong>Self-Investment:</strong> Investors manage their own transactions.</li>
                      <li><strong>Attract Investors with Branding:</strong> Use your branding to draw in investors.</li>
                    </ul>
                    <p><strong>For:</strong> Investors who prefer self-management of their investments.</p>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                  <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Business Booster
                  </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-parent="#servicesAccordion">
                  <div class="accordion-body">
                    <p>Streamline investor onboarding with Business Booster, the most affordable web-based platform for onboarding investors across BSE/NSE and MFU platforms simultaneously.</p>
                    <ul>
                      <li><strong>Multi-Platform Onboarding:</strong> Onboard investors across multiple platforms.</li>
                      <li><strong>Full Control Over KYC Requests:</strong> Maintain full control over KYC processes.</li>
                    </ul>
                    <p><strong>For:</strong> MFDs with admin access who need efficient, scalable onboarding solutions.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- container end -->
    </section>
    <!-- About-App-Section-end -->




    <!-- Testimonial-Section start -->
    <section class="row_am testimonial_section">
      <!-- container start -->
      <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
          <!-- h2 -->
          <h2>What Our <span>Customers Say</span></h2>
          <!-- p -->
          <p>At RedVision Technologies, we take pride in delivering exceptional service. Here's what our valued clients have to say about their experiences with us:</p>

          <div class="testimonial_block" data-aos="fade-in" data-aos-duration="1500">
            <div id="testimonial_slider" class="owl-carousel owl-theme">
              <div class="item wow fadeInUp" data-wow-delay="0.3s">
                <div class="testimonial_slide_box">
                  <p class="review">
                    “ During the lockdown, all businesses were stalled but thanks to REDVision's Wealth Elite Software and Robo App, I ran my business 24X7. Client onboarding became quick and portfolio management became easy. Robo App brought my entire work to my fingertips, which helped me scale up and I could even accumulate foreign investors. ”
                  </p>
                  <div class="testimonial_img">
                    <img src="<?= $base_url ?>/assets/images/testimonial/chetan.webp" alt="image">
                  </div>
                  <h3>Chetan Sabhaya</h3>
                  <span class="designation">Rudra Finserv</span>
                </div>
              </div>

              <!-- user 2 -->
              <div class="item wow fadeInUp" data-wow-delay="0.6s">
                <div class="testimonial_slide_box">
                  <p class="review">
                    “ This is probably the best SAAS product that I've ever used. This got to be rated as the best Personal Financial Management Software in India. Hats off! Great Work! Keep Innovating. ”
                  </p>
                  <div class="testimonial_img">
                    <img src="<?= $base_url ?>/assets/images/testimonial/kishore.webp" alt="image">
                  </div>
                  <h3>Kishore Subramanian</h3>
                  <span class="designation">Shree Consultant</span>
                </div>
              </div>

              <!-- user 3 -->
              <div class="item wow fadeInUp" data-wow-delay="0.9s">
                <div class="testimonial_slide_box">
                  <p class="review">
                    “ Robo App was the game changer of our business. It has helped us scale our business. With its Easy, Fast, and Automated Client Onboarding, we could accumulate a huge client base from just a handful of numbers. ”
                  </p>
                  <div class="testimonial_img">
                    <img src="<?= $base_url ?>/assets/images/testimonial/praveen.webp" alt="image">
                  </div>
                  <h3>Praveen Verma</h3>
                  <span class="designation">Vardhanam</span>
                </div>
              </div>

              <!-- user 4 -->
              <div class="item wow fadeInUp" data-wow-delay="1.2s">
                <div class="testimonial_slide_box">
                  <p class="review">
                    “ Wealth Elite Software with BSE is very good. Now we make 99.9% of transactions using the software only. The thing which I liked the most is their adaptability to new functions as per the market changes. ”
                  </p>
                  <div class="testimonial_img">
                    <img src="<?= $base_url ?>/assets/images/testimonial/hardik.webp" alt="image">
                  </div>
                  <h3>Hardik Joshi</h3>
                  <span class="designation">Shrey Wealth</span>
                </div>
              </div>

              <!-- user 5 -->
              <div class="item wow fadeInUp" data-wow-delay="1.5s">
                <div class="testimonial_slide_box">
                  <p class="review">
                    “ I appreciate your support and patience while helping us create a website, which is exactly how my partner and I envisaged. You have been a tremendous help to us, and the website has come up beautifully. ”
                  </p>
                  <div class="testimonial_img">
                    <img src="<?= $base_url ?>/assets/images/testimonial/RiverStone-logo.webp" alt="image">
                  </div>
                  <h3>Mitul Shah</h3>
                  <span class="designation">RiverStone Financial</span>
                </div>
              </div>

              <!-- user 6 -->
              <div class="item wow fadeInUp" data-wow-delay="1.8s">
                <div class="testimonial_slide_box">
                  <p class="review">
                    “ The staff that is appointed to us is kind and patient, they delivered a website we wanted, and I am happy with their work and efforts. Our company is happy to work with REDVision. ”
                  </p>
                  <div class="testimonial_img">
                    <img src="<?= $base_url ?>/assets/images/testimonial/shakuntala-logo.webp" alt="image">
                  </div>
                  <h3>Vedansh Bhimonee</h3>
                  <span class="designation">SHAKUNTALA GLOBAL REACH LLP</span>
                </div>
              </div>

              <!-- user 7 -->
              <div class="item wow fadeInUp" data-wow-delay="2.1s">
                <div class="testimonial_slide_box">
                  <p class="review">
                    “ We have been associated with REDVision for the last 6 years and for the first time we got this kind of service/support. I appreciate them for their courteous behavior, eagerness to resolve the issue ASAP, availability and responsiveness. ”
                  </p>
                  <div class="testimonial_img">
                    <img src="<?= $base_url ?>/assets/images/testimonial/cliff-associates.webp" alt="image">
                  </div>
                  <h3>Tirth K. Gupt</h3>
                  <span class="designation">Cliff Associates LLP</span>
                </div>
              </div>

              <!-- user 8 -->
              <div class="item wow fadeInUp" data-wow-delay="2.4s">
                <div class="testimonial_slide_box">
                  <p class="review">
                    “ REDVision provides good and timely services with more options too to select for nice design. ”
                  </p>
                  <div class="testimonial_img">
                    <img src="<?= $base_url ?>/assets/images/testimonial/angel-finvest.webp" alt="image">
                  </div>
                  <h3>Jakka Seshu</h3>
                  <span class="designation">Angel Finvest</span>
                </div>
              </div>

              <!-- user 9 -->
              <div class="item wow fadeInUp" data-wow-delay="2.7s">
                <div class="testimonial_slide_box">
                  <p class="review">
                    “ I appreciate innovation, dedication and excellent work by the REDVision team ”
                  </p>
                  <div class="testimonial_img">
                    <img src="<?= $base_url ?>/assets/images/testimonial/emerzent-wealth.webp" alt="image">
                  </div>
                  <h3>Vinaya Santosh Bant</h3>
                  <span class="designation">Emerzent Wealth </span>
                </div>
              </div>
            </div>

            <!-- avtar faces -->
            <div class="avtar_faces">
              <img src="<?= $base_url ?>/assets/images/avtar_testimonial.png" alt="image">
            </div>
          </div>
        </div>
        <!-- container end -->
    </section>
    <!-- Testimonial-Section end -->


    <!-- Download-Free-App-section-Start  -->
    <section class="row_am free_app_section" id="getstarted">
      <!-- container start -->
      <div class="container">
        <div class="free_app_inner" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
          <!-- vertical line animation -->
          <div class="anim_line dark_bg">
            <span><img src="<?= $base_url ?>/assets/images/anim_line2.png" alt="anim_line"></span>
            <span><img src="<?= $base_url ?>/assets/images/anim_line2.png" alt="anim_line"></span>
            <span><img src="<?= $base_url ?>/assets/images/anim_line2.png" alt="anim_line"></span>
            <span><img src="<?= $base_url ?>/assets/images/anim_line2.png" alt="anim_line"></span>
            <span><img src="<?= $base_url ?>/assets/images/anim_line2.png" alt="anim_line"></span>
            <span><img src="<?= $base_url ?>/assets/images/anim_line2.png" alt="anim_line"></span>
            <span><img src="<?= $base_url ?>/assets/images/anim_line2.png" alt="anim_line"></span>
            <span><img src="<?= $base_url ?>/assets/images/anim_line2.png" alt="anim_line"></span>
            <span><img src="<?= $base_url ?>/assets/images/anim_line2.png" alt="anim_line"></span>
          </div>
          <!-- row start -->
          <div class="row">
            <!-- content -->
            <div class="col-md-6">
              <div class="free_text">
                <div class="section_title">
                  <h2>Let's finish a few <br>Cups of Coffee </h2>
                  <p>While understanding your Wealth Management Requirements.</p>
                </div>
                <a href="<?= $base_url ?>#contact" class="btn white_btn">Get Started</a>
              </div>
            </div>

            <!-- images -->
            <div class="col-md-6">
              <div class="free_img">
                <img class="mobile_mockup" src="<?= $base_url ?>/assets/images/cup.png" alt="image">
              </div>
            </div>
          </div>
          <!-- row end -->
        </div>
      </div>
      <!-- container end -->
    </section>
    <!-- Download-Free-App-section-end  -->

    <!-- Story-Section-Start -->
    <section id="blogs" class="row_am latest_story" id="blog">
      <!-- container start -->
      <div class="container">
        <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
          <h2>Read Latest <span>Story</span></h2>
        </div>


        <div class="row">
          <?php
          $query = "SELECT * FROM post ORDER BY id DESC LIMIT 3";
          $query_run = mysqli_query($con, $query);
          while ($post = mysqli_fetch_array($query_run)) {
          ?>

            <div class="col-sm-4">
              <div class="story_box" data-aos="fade-up" data-aos-duration="1500">
                <div class="story_img">
                  <a href="https://www.redvisiontechnologies.com/rv-landing/blog<?= $post['slug_url'] ?>"><img src="https://www.redvisiontechnologies.com/assets/images/admin/blog/<?php echo $post['image']; ?>" alt="Blog Images"></a>
                  <span class="meta-date"><i class="fa fa-calendar"></i> <?= date('j F Y', strtotime($post['added_on'])) ?></span>
                </div>
                <div class="story_text">
                  <div class="date">

                  </div>
                  <di class="blog_page_title pb-1">
                    <h3> <?php echo $post['title']; ?></h3>
                  </di>
                  <div class="blog_page_button">
                    <a href="https://www.redvisiontechnologies.com/rv-landing/blog<?= $post['slug_url'] ?>" class="btn btn-line-dark">Read More <i class="fa fa-long-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>

          <?php
          }
          ?>
        </div>

        <div class="text-center mt-5">
          <a href="<?= $base_url ?>/blog" class="btn white_btn">View All Blogs</a>
        </div>
      </div>
      <!-- container end -->
    </section>
    <!-- Story-Section-end -->

    <!-- News-Letter-Section-Start -->
    <section id="contact" class="newsletter_section">
      <!-- container start -->
      <div class="container">
        <div class="newsletter_box">
          <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
            <h2>Enquire Today's Best Offer For You</h2>

            <?php include('form.php'); ?>
          </div>
        </div>
      </div>
      <!-- container end -->
    </section>
    <!-- News-Letter-Section-end -->

    <?php include('includes/footer.php'); ?>
    <script>
      // Array of image sources corresponding to each service
      const serviceImages = [
        "<?= $base_url ?>/assets/images/features/feature-wealth-elite.png", // Image for Wealth Elite
        "<?= $base_url ?>/assets/images/features/feature-mf-elite.png", // Image for MF Elite
        "<?= $base_url ?>/assets/images/features/feature-advisor-x.png", // Image for Advisor X
        "<?= $base_url ?>/assets/images/features/feature-robo-mobile.png", // Image for Robo Advisory
        "<?= $base_url ?>/assets/images/features/feature-business-booster.png" // Image for Business Booster
      ];

      const serviceImages2 = [
        "<?= $base_url ?>/assets/images/features/feature-elite-img1.png", // Second image for Wealth Elite
        "<?= $base_url ?>/assets/images/features/feature-mfelite-img1.png", // Second image for MF Elite
        "<?= $base_url ?>/assets/images/features/feature-advisor-img1.png", // Second image for Advisor X
        "<?= $base_url ?>/assets/images/features/feature-common-img1.png", // Second image for Robo Advisory
        "<?= $base_url ?>/assets/images/features/feature-booster-img1.png" // Second image for Business Booster
      ];
      const serviceImages3 = [
        "<?= $base_url ?>/assets/images/features/feature-elite-img2.png", // Second image for Wealth Elite
        "<?= $base_url ?>/assets/images/features/feature-mfelite-img2.png", // Second image for MF Elite
        "<?= $base_url ?>/assets/images/features/feature-advisor-img2.png", // Second image for Advisor X
        "<?= $base_url ?>/assets/images/features/feature-common-img2.png", // Second image for Robo Advisory
        "<?= $base_url ?>/assets/images/features/feature-booster-img2.png" // Second image for Business Booster
      ];

      // Initialize variables for accordion and image elements
      const accordion = document.getElementById("servicesAccordion");
      const serviceImage = document.getElementById("service-image");
      const serviceImage2 = document.getElementById("service-image-2");
      const serviceImage3 = document.getElementById("service-image-3");
      let currentIndex = 0;

      // Function to change the accordion slide and images automatically
      function changeAccordionSlide() {
        // Get all accordion items
        const accordionItems = document.querySelectorAll(".accordion-item");

        // Collapse the currently opened accordion
        const currentAccordion = accordionItems[currentIndex];
        const collapseElement = currentAccordion.querySelector(".accordion-collapse");
        const buttonElement = currentAccordion.querySelector(".accordion-button");
        const bootstrapCollapse = new bootstrap.Collapse(collapseElement, {
          toggle: false,
        });
        bootstrapCollapseWatch videoide(); // Hide current section
        buttonElement.classList.add("collapsed"); // Add collapsed class to current button

        // Move to the next accordion section
        currentIndex = (currentIndex + 1) % accordionItems.length;

        // Show the new accordion section
        const nextAccordion = accordionItems[currentIndex];
        const nextCollapseElement = nextAccordion.querySelector(".accordion-collapse");
        const nextButtonElement = nextAccordion.querySelector(".accordion-button");
        const nextBootstrapCollapse = new bootstrap.Collapse(nextCollapseElement, {
          toggle: true,
        });
        nextButtonElement.classList.remove("collapsed"); // Remove collapsed class from next button

        // Change the images based on the current index
        serviceImage.src = serviceImages[currentIndex];
        serviceImage2.src = serviceImages2[currentIndex];
        serviceImage3.src = serviceImages3[currentIndex];
      }

      // Set interval for auto-change every 5 seconds
      setInterval(changeAccordionSlide, 15000); // Change every 5 seconds

      // Add event listener to manually change the accordion item when clicked
      accordion.addEventListener("click", function(e) {
        if (e.target && e.target.classList.contains("accordion-button")) {
          const index = Array.from(accordion.querySelectorAll(".accordion-button")).indexOf(e.target);
          currentIndex = index;

          // Update images based on the clicked accordion
          serviceImage.src = serviceImages[currentIndex];
          serviceImage2.src = serviceImages2[currentIndex];
          serviceImage3.src = serviceImages3[currentIndex];

          // Update collapsed class for all accordion buttons
          const allButtons = accordion.querySelectorAll(".accordion-button");
          allButtons.forEach((button, i) => {
            if (i === currentIndex) {
              button.classList.remove("collapsed");
            } else {
              button.classList.add("collapsed");
            }
          });
        }
      });

      // Listen for Bootstrap events to ensure correct collapsed state
      accordion.addEventListener("shown.bs.collapse", function(e) {
        const button = e.target.previousElementSibling.querySelector(".accordion-button");
        button.classList.remove("collapsed");
      });

      accordion.addEventListener("hidden.bs.collapse", function(e) {
        const button = e.target.previousElementSibling.querySelector(".accordion-button");
        button.classList.add("collapsed");
      });
    </script>

    <?php include('includes/foot.php'); ?>