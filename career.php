<?php include('include/config.php'); ?>
<?php include('include/function.php'); ?>
<!doctype html>
<html lang="en">

<head>

    <title>Career | Full Stack React Native Node JS PHP Developer | Technical Support Manager</title>
    <meta name="description"
        content="Accelerate your career with REDVision Technologies entry level opportunities. We are Hiring in multiple categories. Explore challenging and exciting opportunities.">
    <meta name="keywords"
        content="React Native Developer, Node JS Developer, PHP Developer, customer support executive, technical support manager, Software Consultant Sales, Technical Support Manager, Human Resource Intern, UI UX Designer, red vision career, Software Development, Web Development, Digital Marketing, Strategy Team" />
    <link rel="canonical" href="<?= $rvuserinfo['base_url'] ?>/career.php">
    <?php include("include/head.php"); ?>


</head>

<body class="career-page" id="career-page">
    <!-- BANNER -->
    <!-- /BANNER -->

    <?php include("include/header-inner.php"); ?>

    <main>
        <?php allPagesBanner($con, 'Career', '', '') ?>




        <section class="main-section video-section">
            <div class="container">
                <!-- <div class="heading_main text-center">
        <h2>Why Join Us</h2>
        </div> -->

                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="video-frame">
                            <iframe width="100%" height="768" src="https://www.youtube.com/embed/7b-4-LgOZPc"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </section>



        <section class="trip-section">
            <div class="container container-xl">
                <!-- <div class="heading_main text-center">
        <h2>Why Join Us</h2>
        </div> -->

                <div class="row">
                    <div class="col-md-5">
                        <div class="trip-content">
                            <h2>Work Hard – Have Fun<br> Make a Difference</h2>
                            <h3>With work, we never forget to have fun. Whether it's a party at Water Park, enjoyment at
                                Amusement Park or an offsite Adventure Trip, we Work Hard and Party Harder.</h3>
                            <a href="#careerForm" class="btn btn-line-white mt-4">Join Our Team</a>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-5 pt-5 pb-3">
                        <div class="row trips">
                            <div class="col-md-12">
                                <div class="trip-box">
                                    <a href="waterpark.php">
                                        <img src="assets/images/career/waterpark-cover.webp" alt="">
                                        <div class="trip_text">
                                            <h2>Water Park (Tornado Water Park)</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="trip-box">
                                    <a href="amusmentpark.php">
                                        <img src="assets/images/career/amusment-cover.webp" alt="">
                                        <div class="trip_text">
                                            <h2>Amusement Park (The Grand Machal)</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="trip-box">
                                    <a href="adventuretrip.php">
                                        <img src="assets/images/career/adventure-cover.webp" alt="">
                                        <div class="trip_text">
                                            <h2>Adventur Trip (Bamniya Kund)</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>

            </div>
        </section>




        <section class="main-section vacancy-section bg-light">
            <div class="container container-xl">
                <div class="vacancy-tab">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Tab navs -->
                            <div class="nav flex-column nav-tabs text-center" id="v-tabs-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-tabs-vacancy-two" data-mdb-toggle="tab"
                                    href="#v-tabs-vacancytwo" role="tab" aria-controls="v-tabs-vacancytwo"
                                    aria-selected="false">Digital Marketing</a>
                                <a class="nav-link" id="v-tabs-vacancy-one" data-mdb-toggle="tab"
                                    href="#v-tabs-vacancyone" role="tab" aria-controls="v-tabs-vacancyone"
                                    aria-selected="true">Design & Development</a>
                                <a class="nav-link" id="v-tabs-vacancy-three" data-mdb-toggle="tab"
                                    href="#v-tabs-vacancythree" role="tab" aria-controls="v-tabs-vacancythree"
                                    aria-selected="false">Sales</a>
                                <a class="nav-link" id="v-tabs-vacancy-four" data-mdb-toggle="tab"
                                    href="#v-tabs-vacancyfour" role="tab" aria-controls="v-tabs-vacancyfour"
                                    aria-selected="false">Support</a>
                                <a class="nav-link" id="v-tabs-vacancy-five" data-mdb-toggle="tab"
                                    href="#v-tabs-vacancyfive" role="tab" aria-controls="v-tabs-vacancyfive"
                                    aria-selected="false">Strategy and Alliances</a>
                                <a class="nav-link" id="v-tabs-vacancy-six" data-mdb-toggle="tab"
                                    href="#v-tabs-vacancysix" role="tab" aria-controls="v-tabs-vacancysix"
                                    aria-selected="false">HR & Admin</a>
                            </div>
                            <!-- Tab navs -->
                        </div>

                        <div class="col-md-9">
                            <!-- Tab content -->
                            <div class="tab-content" id="v-tabs-tabContent">
                                <div class="tab-pane fade show active" id="v-tabs-vacancytwo" role="tabpanel"
                                    aria-labelledby="v-tabs-vacancy-two">
                                    <div class="vacancy-list">
                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/seo_s.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>Social Media Executive</h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Graduation &
                                                    Same </p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 0.6 - 1 Years
                                                </p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <!-- <a href="#" class="btn btn-dark">Know More</a> -->
                                            </div>
                                        </div>
                                        <!-- Item 1 -->
                                        <!-- <div class="list-items">
                      <div class="icon">
                        <img src="assets/images/icons/salesman.png" alt="">
                      </div>
                      <div class="info">
                        <h4>Sr. Business Development Manager</h4>
                        <p><img src="assets/images/icons/graduation.png" alt=""> Graduation & Same</p>
                        <p><img src="assets/images/icons/experience.png" alt=""> 0 - 3 Years</p>
                      </div>
                      <div class="btns">
                        <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                      </div>
                    </div>


                    <div class="list-items">
                      <div class="icon">
                        <img src="assets/images/icons/writer.png" alt="">
                      </div>
                      <div class="info">
                        <h4>Finance Sr. Content Writer</h4>
                        <p><img src="assets/images/icons/graduation.png" alt=""> Proven experience as a finance content writer. </p>
                        <p><img src="assets/images/icons/experience.png" alt=""> 2 - 4 Years</p>
                      </div>
                      <div class="btns">
                        <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                      </div>
                    </div> -->


                                        <!-- <div class="list-items">
                      <div class="icon">
                        <img src="assets/images/icons/writer.png" alt="">
                      </div>
                      <div class="info">
                        <h4>Business Development Executive</h4>
                        <p><img src="assets/images/icons/graduation.png" alt=""> Experienced in Customer Acquisition </p>
                        <p><img src="assets/images/icons/experience.png" alt=""> 1-3 Years</p>
                      </div>
                      <div class="btns">
                        <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                        <a href="#" class="btn btn-dark">Know More</a>
                        <a href="business-development-executive.php" class="btn btn-dark" contenteditable="false" style="cursor: pointer;">Know More</a>


                      </div>
                    </div> -->

                                        <!-- <div class="list-items">
                      <div class="icon">
                        <img src="assets/images/icons/writer.png" alt="">
                      </div>
                      <div class="info">
                        <h4>Project Coordinator</h4>
                        <p><img src="assets/images/icons/graduation.png" alt=""> Experienced in Communication & Project Management </p>
                        <p><img src="assets/images/icons/experience.png" alt=""> 6 Months -3 Years</p>
                      </div>
                      <div class="btns">
                        <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                        <a href="project-coordinator.php" class="btn btn-dark" contenteditable="false" style="cursor: pointer;">Know More</a>
                      </div>
                    </div> -->


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-tabs-vacancyone" role="tabpanel"
                                    aria-labelledby="v-tabs-vacancy-one">
                                    <div class="vacancy-list">
                                        <!-- Item 1 -->
                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/website.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>Project Coordinator – Website Development (Urgent Requirement)</h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Graduation &
                                                    Same </p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 1+ Years</p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <a href="project-coordinator.php" class="btn btn-dark">Know More</a>
                                            </div>
                                        </div>
                                        <!-- Item 1 -->
                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/website.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>Sr. Full Stack Developer</h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Graduation &
                                                    Same </p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 5+ Years</p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <!-- <a href="#" class="btn btn-dark">Know More</a> -->
                                            </div>
                                        </div>
                                        <!-- Item 2 -->
                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/website.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>Web Developer</h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Graduation &
                                                    Same</p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 2+ Years</p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <!-- <a href="#" class="btn btn-dark">Know More</a> -->
                                            </div>
                                        </div>
                                        <!-- Item 3 -->
                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/website.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>Graphics</h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Graduation &
                                                    Same</p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 1+ Years</p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                            </div>
                                        </div>
                                        <!-- Item 4 -->
                                        <!-- <div class="list-items">
                      <div class="icon">
                        <img src="assets/images/icons/php.png" alt="">
                      </div>
                      <div class="info">
                        <h4>Sr. PHP Developer</h4>
                        <p><img src="assets/images/icons/graduation.png" alt=""> Graduation & Same</p>
                        <p><img src="assets/images/icons/experience.png" alt=""> 5 - 10 Years</p>
                      </div>
                      <div class="btns">
                        <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                      </div>
                    </div> -->
                                        <!-- Item 5 -->
                                        <!-- <div class="list-items">
                      <div class="icon">
                        <img src="assets/images/icons/python.png" alt="Python Icon">
                      </div>
                      <div class="info">
                        <h4>Python AI Developer</h4>
                        <p><img src="assets/images/icons/graduation.png" alt=""> Graduation & Same</p>
                        <p><img src="assets/images/icons/experience.png" alt=""> Above 3 years</p>
                      </div>
                      <div class="btns">
                        <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                        <a href="python-developer.php" class="btn btn-dark">Know More</a>
                      </div>
                    </div> -->
                                        <!-- Item 6 -->
                                        <!-- <div class="list-items">
                      <div class="icon">
                        <img src="assets/images/icons/react.png" alt="React Icon">
                      </div>
                      <div class="info">
                        <h4>MERN Stack Developer</h4>
                        <p><img src="assets/images/icons/graduation.png" alt=""> Graduation & Same</p>
                        <p><img src="assets/images/icons/experience.png" alt=""> 2-3 Years in React</p>
                      </div>
                      <div class="btns">
                        <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                        <a href="mern-stack-developer.php" class="btn btn-dark">Know More</a>
                      </div>
                    </div> -->
                                        <!-- Item 7 -->
                                        <!-- <div class="list-items">
                      <div class="icon">
                        <img src="assets/images/icons/website.png" alt="Graphic Icon">
                      </div>
                      <div class="info">
                        <h4>Graphics and UI/UX Designer</h4>
                        <p><img src="assets/images/icons/graduation.png" alt=""> Graduation & Same</p>
                        <p><img src="assets/images/icons/experience.png" alt=""> 2-3 Years</p>
                      </div>
                      <div class="btns">
                        <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                        <a href="ui-ux-designer.php" class="btn btn-dark">Know More</a>
                      </div>
                    </div> -->

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-tabs-vacancythree" role="tabpanel"
                                    aria-labelledby="v-tabs-vacancy-three">
                                    <div class="vacancy-list">


                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/support.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4> Software Consultant - Sales (Urgent Requirement)</h4>
                                                <p><img src="assets/images/icons/graduation.png" alt="graduation">
                                                    Experience of
                                                    Sales & Software Preferred. </p>
                                                <p><img src="assets/images/icons/location.webp" alt="location"> Indore
                                                </p>

                                                <p><img src="assets/images/icons/experience.png" alt="experience"> 2+
                                                    Years</p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <a href="software-consultant-sales.php" class="btn btn-dark">Know
                                                    More</a>
                                            </div>
                                        </div>


                                        <!-- new software consultance 2024 -->
                                        <div class="list-items d-none">
                                            <div class="icon">
                                                <img src="assets/images/icons/support.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4> Software Consultant- Sales </h4>
                                                <p><img src="assets/images/icons/graduation.png" alt="graduation">
                                                    Graduate and
                                                    above </p>
                                                <p><img src="assets/images/icons/experience.png" alt="experience"> 0 - 3
                                                    Years
                                                </p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <a href="software-consultant-sales-2024.php" class="btn btn-dark">Know
                                                    More</a>
                                            </div>
                                        </div>
                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/support.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4> Business Development / Sales (Mutual Fund / FinTech) </h4>
                                                <p><img src="assets/images/icons/graduation.png" alt="graduation">
                                                    Graduate and
                                                    above </p>
                                                <p><img src="assets/images/icons/location.webp" alt="location">
                                                    Bangalore | Pune
                                                    | Ahmedabad | Mumbai | Surat - <b>REMOTE</b> </p>

                                                <p><img src="assets/images/icons/experience.png" alt="experience"> 2+

                                                    Years
                                                </p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <a href="business-development-sales-mutual-fund-finTech.php"
                                                    class="btn btn-dark">Know
                                                    More</a>
                                            </div>
                                        </div>
                                        <!-- new software consultance 2024 -->

                                        <!--  Sales and Support Executive 2024 -->
                                        <!-- <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/support.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4> Sales and Support Executive (Urgent Requirement) </h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Bachelor’s
                                                    degree in Business, Marketing, IT, or related field </p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 2+ years </p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <a href="sales-and-support--executive.php" class="btn btn-dark">Know
                                                    More</a>
                                            </div>
                                        </div> -->
                                        <!--  Sales and Support Executive 2024 -->

                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/support.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4> Business Development Executive (Urgent Requirement) </h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Experience of
                                                    Sales & Software Preferred. </p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> Minimum 1 Year
                                                </p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <a href="business-development-executive.php" class="btn btn-dark">Know
                                                    More</a>

                                            </div>
                                        </div>

                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/support.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4> Business Development Executive – Digital Marketing (Urgent
                                                    Requirement) </h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Experience of
                                                    Sales & Software Preferred. </p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> Minimum 1 Year
                                                </p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <a href="business-development-executive-dm.php"
                                                    class="btn btn-dark">Know More</a>

                                            </div>
                                        </div>
                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/support.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4> Business Development & Project Coordinator (Tech Sales + Delivery)
                                                </h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Graduate and
                                                    above </p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 2–5 years
                                                </p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <a href="business-development-project-coordinator.php"
                                                    class="btn btn-dark">Know
                                                    More</a>
                                            </div>
                                        </div>

                                        <!-- Item 1 -->
                                        <!--<div class="list-items">-->
                                        <!--  <div class="icon">-->
                                        <!--   <img src="assets/images/icons/support.png" alt="">-->
                                        <!--  </div>-->
                                        <!--  <div class="info">-->
                                        <!--    <h4>Software Consultant - Sales</h4>-->
                                        <!--    <p><img src="assets/images/icons/graduation.png" alt=""> Graduation & Same</p>-->
                                        <!--    <p><img src="assets/images/icons/experience.png" alt=""> 0 - 1 Years</p>-->
                                        <!--  </div>-->
                                        <!--  <div class="btns">-->
                                        <!--    <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>-->
                                        <!-- <a href="#" class="btn btn-dark">Know More</a> -->
                                        <!--  </div>-->
                                        <!--</div>-->

                                        <!--<div class="list-items">-->
                                        <!--  <div class="icon">-->
                                        <!--    <img src="assets/images/icons/support.png" alt="">-->
                                        <!--  </div>-->
                                        <!--  <div class="info">-->
                                        <!--    <h4>Business Collaboration and Partnership Manager </h4>-->
                                        <!--    <p><img src="assets/images/icons/graduation.png" alt=""> Knowledge of legal aspects related to partnerships and contract negotiation </p>-->
                                        <!--    <p><img src="assets/images/icons/experience.png" alt=""> 2 - 5 Years</p>-->
                                        <!--  </div>-->
                                        <!--  <div class="btns">-->
                                        <!--    <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>-->
                                        <!--    <a href="business-collaboration-partnership-executive.php" class="btn btn-dark">Know More</a>-->

                                        <!--  </div>-->
                                        <!--</div>-->

                                        <!-- <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/support.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>Business Relationship Executive </h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Knowledge of
                                                    Equity </p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 0- 3 Years</p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <a href="business-relationship-executive.php" class="btn btn-dark">Know
                                                    More</a>

                                            </div>
                                        </div> -->





                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-tabs-vacancyfour" role="tabpanel"
                                    aria-labelledby="v-tabs-vacancy-four">
                                    <div class="vacancy-list">
                                        <!-- Item 1 -->
                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/hr.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>Relationship Manager (Urgent Requirement)</h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Graduation &
                                                    Same</p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 0 - 1 Years</p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <!--<a href="relationship-manager.php" class="btn btn-dark">Know More</a> -->
                                            </div>
                                        </div>

                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/hr.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>Experienced in Customer Relationships</h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Graduation &
                                                    Same</p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 0-3 Years</p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <a href="experienced-in-customer-relationships.php" class="btn btn-dark"
                                                    contenteditable="false" style="cursor: pointer;">Know More</a>
                                                <!-- <a href="#" class="btn btn-dark">Know More</a> -->
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-tabs-vacancyfive" role="tabpanel"
                                    aria-labelledby="v-tabs-vacancy-five">
                                    <div class="vacancy-list">

                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/support.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>Business Collaboration and Partnership Manager (Urgent Requirement)
                                                </h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Knowledge of
                                                    legal aspects related to partnerships and contract negotiation </p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 2 - 5 Years</p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <a href="business-collaboration-partnership-executive.php"
                                                    class="btn btn-dark">Know More</a>

                                            </div>
                                        </div>

                                        <!-- new profiles 26-12-2024 -->
                                        <!--<div class="list-items">-->
                                        <!--  <div class="icon">-->
                                        <!--    <img src="assets/images/icons/hr.png" alt="">-->
                                        <!--  </div>-->
                                        <!--  <div class="info">-->
                                        <!--    <h4> Senior Full Stack Developer </h4>-->
                                        <!--    <p><img src="assets/images/icons/graduation.png" alt=""> Bachelor's degree in Computer Science, IT, or related field (Master's degree preferred). </p>-->
                                        <!--    <p><img src="assets/images/icons/experience.png" alt=""> 5+ year</p>-->
                                        <!--  </div>-->
                                        <!--  <div class="btns">-->
                                        <!--    <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>-->
                                        <!--    <a href="senior-full-stack-developer.php" class="btn btn-dark">Know More</a>-->
                                        <!--  </div>-->
                                        <!--</div>-->
                                        <!-- new profiles 26-12-2024 -->

                                        <!-- Item 1 -->
                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/hr.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>Strategy and Alliances </h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Graduation &
                                                    Same</p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 0 - 1 Years</p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <!-- <a href="#" class="btn btn-dark">Know More</a> -->
                                            </div>
                                        </div>
                                        <!-- Item 1 -->
                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/hr.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>Research and Data Intern - Mutual Fund Distributors </h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Graduation &
                                                    Same</p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 0 - 1 Years</p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <a href="research-and-data-intern.php" class="btn btn-dark">Know
                                                    More</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-tabs-vacancysix" role="tabpanel"
                                    aria-labelledby="v-tabs-vacancy-six">
                                    <div class="vacancy-list">
                                        <!-- Item 1 -->
                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/hr.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>Human Resource - Intern </h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> Graduation &
                                                    Same</p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 0 - 1 Years</p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <!-- <a href="#" class="btn btn-dark">Know More</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vacancy-list">
                                        <!-- Item 1 -->
                                        <div class="list-items">
                                            <div class="icon">
                                                <img src="assets/images/icons/executive.png" alt="">
                                            </div>
                                            <div class="info">
                                                <h4>IT and Admin Executive </h4>
                                                <p><img src="assets/images/icons/graduation.png" alt=""> IT
                                                    certifications(e.g., CompTIA A+, Network+, Security+) </p>
                                                <p><img src="assets/images/icons/experience.png" alt=""> 2+ years </p>
                                            </div>
                                            <div class="btns">
                                                <a href="career.php#applyNow" class="btn btn-line-dark">Apply Now</a>
                                                <!-- <a href="#" class="btn btn-dark">Know More</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="applyNow" class="careerform-section">
            <div class="container container-xl">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading text-center">
                            <h2>Apply & Join Our Team</h2>

                        </div>
                        <div class="form-box wow fadeInUp" data-wow-delay="0.5s">
                            <div class="rvg-form">


                                <form id="careerForm" action="career_mail.php" method="post"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="vacancyname" id="vacancyname"
                                                    placeholder="Name" class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="vacancyemail" id="vacancyemail"
                                                    placeholder="Email" class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="vacancymobile" id="vacancymobile"
                                                    placeholder="Mobile" class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group drop_item">
                                                <select name="position" id="position" class="form-control"
                                                    required="required">
                                                    <option value="">Select Job</option>
                                                    <option value="SEO Specialist (Onpage / Offpage)">SEO Specialist
                                                        (Onpage / Offpage)</option>
                                                    <option value="Web Designer & Developer">Web Designer & Developer
                                                    </option>
                                                    <option value="UI-UX Designer">UI-UX Designer</option>
                                                    <option value="Full Stack Developer cum Team Lead">Full Stack
                                                        Developer cum Team Lead</option>
                                                    <option value="Senior PHP Developer">Senior PHP Developer</option>
                                                    <option value="Senior Nodejs Developer">Senior Nodejs Developer
                                                    </option>
                                                    <option value="React Native Developer">React Native Developer
                                                    </option>
                                                    <option value="Relationship Manager">Relationship Manager</option>
                                                    <option value="Automation Tester">Automation Tester</option>
                                                    <option value="Business Development Manager">Business Development
                                                        Manager</option>
                                                    <option value="BDM/Sales Internship">BDM/Sales Internship</option>
                                                    <option value="Finance Content Writer">Finance Content Writer
                                                    </option>
                                                    <option value="Project Coordinator">Project Coordinator</option>
                                                    <option value="Business Development Executive - Advertising Agency">
                                                        Business Development Executive - Advertising Agency</option>
                                                    <option value="Business Relationship Executive">Business
                                                        Relationship Executive</option>
                                                    <option
                                                        value="Business Development Executive - Sales & Software Preferred">
                                                        Business Development Executive - Sales & Software Preferred
                                                    </option>
                                                    <option value="After Sales Manager">After Sales Manager</option>
                                                    <option value="Human Resource Intern">Human Resource Intern</option>
                                                    <option value="Software Consultant - Sales">Software Consultant -
                                                        Sales</option>
                                                    <option value="Team Leader - Sales">Team Leader - Sales</option>
                                                    <option value="Sales Head">Sales Head</option>
                                                    <option value="Research and Data Intern">Research and Data Intern
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="current_ctc" id="current_ctc"
                                                    placeholder="Current CTC" class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="expected_ctc" id="expected_ctc"
                                                    placeholder="Expected CTC" class="form-control" required="required">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number" name="notice_period" id="notice_period"
                                                    placeholder="Notice Period (In Month)" class="form-control"
                                                    required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="file" name="resume" id="resume" placeholder=""
                                                    class="form-control" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-line-primary" type="submit" name="careerSubmit"
                                                    id="careerSubmit" onClick="return dvalid();">Submit</button>
                                            </div>
                                        </div>

                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="benefits-section bg-shape-full overlay-dark">
            <div class="container">
                <div class="heading_main text-center">
                    <h2>Why Join Us</h2>
                    <p>Our people are our biggest asset. We believe that the success of any business organization rests
                        on the shoulders of its people, their talent, passion & integrity. We ensure to provide our
                        people with a platform where they can perform their best, identify their true potential, & grow
                        quickly.</p>
                </div>

                <div class="row">
                    <div class="col-md-3 text-center">
                        <div class="benefits_box">
                            <div class="content">
                                <div class="front">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/trophy.png"
                                            alt="REDVision achievement awards">
                                    </div>
                                    <h4>Achievement Awards</h4>
                                </div>
                                <div class="back">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/trophy2.png"
                                            alt="REDVision achievement awards">
                                    </div>
                                    <h4>Achievement Awards</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="benefits_box">
                            <div class="content">
                                <div class="front">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/incentive.png"
                                            alt="REDVision employee allowance">
                                    </div>
                                    <h4>Employee Allowance</h4>
                                </div>
                                <div class="back">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/incentive2.png"
                                            alt="REDVision employee allowance">
                                    </div>
                                    <h4>Employee Allowance</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="benefits_box">
                            <div class="content">
                                <div class="front">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/health-insurance.png"
                                            alt="REDVision health insurance">
                                    </div>
                                    <h4>Health Insurance</h4>
                                </div>
                                <div class="back">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/health-insurance2.png"
                                            alt="REDVision health insurance">
                                    </div>
                                    <h4>Health Insurance</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="benefits_box">
                            <div class="content">
                                <div class="front">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/salary.png" alt="REDVision on time salary">
                                    </div>
                                    <h4>On Time Salary</h4>
                                </div>
                                <div class="back">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/salary2.png"
                                            alt="REDVision on time salary">
                                    </div>
                                    <h4>On Time Salary</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="benefits_box">
                            <div class="content">
                                <div class="front">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/sunbed.png" alt="REDVision paid vacations">
                                    </div>
                                    <h4>Paid Vacations</h4>
                                </div>
                                <div class="back">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/sunbed2.png"
                                            alt="REDVision paid vacations">
                                    </div>
                                    <h4>Paid Vacations</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="benefits_box">
                            <div class="content">
                                <div class="front">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/like.png" alt="REDVision perks & bonuses">
                                    </div>
                                    <h4>Perks & Bonuses</h4>
                                </div>
                                <div class="back">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/like2.png" alt="REDVision perks & bonuses">
                                    </div>
                                    <h4>Perks & Bonuses</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="benefits_box">
                            <div class="content">
                                <div class="front">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/snack.png"
                                            alt="REDVision breakfast & evening snacks">
                                    </div>
                                    <h4>Breakfast & Evening Snacks</h4>
                                </div>
                                <div class="back">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/snack2.png"
                                            alt="REDVision breakfast & evening snacks">
                                    </div>
                                    <h4>Breakfast & Evening Snacks</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="benefits_box">
                            <div class="content">
                                <div class="front">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/lock.png" alt="REDVision social security">
                                    </div>
                                    <h4>Social Security</h4>
                                </div>
                                <div class="back">
                                    <div class="icon">
                                        <img src="assets/images/career/icons/lock2.png" alt="REDVision social security">
                                    </div>
                                    <h4>Social Security</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="main-section team-section">
            <div class="container container-xl">
                <div class="heading text-center">
                    <h2>Our Dedicated Team</h2>
                    <p>It is a long established fact that a reader will be<br> distracted content of a page when
                        looking.</p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="team-box wow fadeInUp" data-wow-delay="0.2s">
                            <img src="assets/images/team/dev.jpg" alt="">
                            <span class="team-tag">Software Development Team</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-box wow fadeInUp" data-wow-delay="0.4s">
                            <img src="assets/images/team/web.jpg" alt="">
                            <span class="team-tag">Web Development Team</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-box wow fadeInUp" data-wow-delay="0.6s">
                            <img src="assets/images/team/sales.jpg" alt="">
                            <span class="team-tag">Sales Team</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-box wow fadeInUp" data-wow-delay="0.7s">
                            <img src="assets/images/team/support.jpg" alt="">
                            <span class="team-tag">Support Team</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-box wow fadeInUp" data-wow-delay="1s">
                            <img src="assets/images/team/seo.jpg" alt="">
                            <span class="team-tag">Digital Marketing Team</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-box wow fadeInUp" data-wow-delay="1.2s">
                            <img src="assets/images/team/strategy.jpg" alt="">
                            <span class="team-tag">Strategy Team</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <?php $footerHeadingTag = "h2"; include("include/footer.php"); ?>
        <?php include("include/foot.php"); ?>