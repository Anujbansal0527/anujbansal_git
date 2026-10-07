    <?php include 'rvm-include/config.php' ?>
    <?php  include ('include/function.php'); ?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Favicon -->

        <title>MFDs Automated Onboarding Software | IFA Customer Onboarding Platform</title>
        <meta name="description"
            content="Business Booster is automated onboarding software for MFDs and IFA customers that platform is a single process for Video KYC, NSE-BSE-MFU, and SIP Mandate.">
        <meta name="keywords"
            content="onboarding platform, mf distributors in india, stripe connect onboarding, employee onboarding platform, list of mutual fund distributors in india, top individual mutual fund distributors in india, automated onboarding software, customer onboarding platform, digital onboarding platform, onboarding automation software, platform onboarding, best onboarding platforms in India, automated employee onboarding software, onboarding platform vendors, platform onboarding process, sales onboarding platform, mutual fund back office software, walkme onboarding tasks, stripe connect express onboarding, oracle cloud onboarding, stripe connect account onboarding, onboarding management software, stripe connect onboarding example, mutual fund trading software, red vision onboarding platform, outsystems onboarding, online onboarding platform, remote onboarding platform in India, new hire onboarding platform in india." />
        <link rel="canonical" href="<?= $rvuserinfo['base_url']?>/mutual-fund-software-in-india.php">

        <?php include("include/head.php"); ?>
    </head>

    <body>
        <!-- BANNER -->
        <!-- /BANNER -->

        <?php include("include/header-inner.php"); ?>

        <main>

            <?php allPagesBanner($con, 'Business Booster', '', '')?>


            <section class="productinfo-section business-booster pt-4">
                <div class="container container-xl">
                    <div class="row">

                        <div class="col-md-5 col-lg-5 col-xl-5">
                            <div class="product-content mt-5">
                                <h1 class="product-title">Clients’ Web <br> Based<span>Onboarding</span> Platform</h1>
                                <p>Business Booster conducts <b>Paperless Onboarding</b> from your Website, Single
                                    Automated
                                    Process for <b>V-KYC, NSE-BSE-MFU*, and SIP Mandate.</b> Enhances cost efficiency by
                                    removing the paper trail and digitally tracking the onboarding progress.</p>
                                <div class="card-item">
                                    <div class="item">
                                        <div class="icon">
                                            <img src="assets/images/icons/login.png" title="login" alt="login">
                                        </div>
                                        <div class="text">
                                            <h4>Quick Investor Signup</h4>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon">
                                            <img src="assets/images/icons/video.png" title="video" alt="video">
                                        </div>
                                        <div class="text">
                                            <h4>Complete KYC process</h4>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon">
                                            <img src="assets/images/icons/registration.png" title="registration"
                                                alt="registration">
                                        </div>
                                        <div class="text">
                                            <h4>Consolidate Onboarding</h4>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon">
                                            <img src="assets/images/icons/onboard.png" title="onboard" alt="onboard">
                                        </div>
                                        <div class="text">
                                            <h4>Check onboarded Clients</h4>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon">
                                            <img src="assets/images/icons/seo.png" title="seo" alt="seo">
                                        </div>
                                        <div class="text">
                                            <h4>Digital Marketing</h4>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon">
                                            <img src="assets/images/icons/tools.png" title="tools" alt="tools">
                                        </div>
                                        <div class="text">
                                            <h4> Financial tools and Calculator</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-xl-7">
                            <div class="product-image booster-video">
                                <video width="850px" height="550px" autoplay loop muted>
                                    <source src="assets/video/business-booster.mp4" type="video/mp4">
                                </video>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php 
		$productfeaturesData = [
			[
				"id" => 0,
				"title" => "Registration",
				"icone_title" => "Registration",
				"discription" => "",
				"images_disc" => "products/business-booster/registration.png",
				"image_icone"=>"icons/registration.png",
			],
            
			[
				"id" => 1,
				"title" => "Login",
				"icone_title" => "Login",
				"discription" => "",
				"images_disc" => "products/business-booster/login.png",
				"image_icone"=>"icons/login.png",
			],
            
			[
				"id" => 2,
				"title" => "Link Profile",
				"icone_title" => "Link Profile",
				"discription" => "",
				"images_disc" => "products/business-booster/profile.png",
				"image_icone"=>"icons/link.png",
			],
            
			[
				"id" => 3,
				"title" => "Create KYC",
				"icone_title" => "Create KYC",
				"discription" => "",
				"images_disc" => "products/business-booster/kyc.png",
				"image_icone"=>"icons/create-kyc.png",
			],
            
			 
             
		 
		];

		?>

            <section
                class="main-section features-section product-features-section rvnew-product-features-section new-robo-advisory-software">
                <div class="container container-xl">
                    <div class="heading text-center">
                        <h2>Top Features</h2>
                        <p>Simplifying & Automating Business Journey of Mutual Fund Distributors in India.</p>
                    </div>
                    <div class="row features">
                        <div class="col-md-3 features-col">
                            <div class="feature-menu rvcolsm">
                                <?php   foreach ($productfeaturesData as $productfeaturesitems){?>

                                <div class="rvn-menu-item <?php switch($productfeaturesitems['id']){
								case 0 : echo 'active'; break;
							}?>" data-slide="<?= $productfeaturesitems['id']; ?>">
                                    <div class="rv-cardf">
                                        <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/images/<?= $productfeaturesitems['image_icone'];?>"
                                            alt="<?= $productfeaturesitems['icone_title'];?>">
                                        <h6><?= $productfeaturesitems['icone_title'];?></h6>
                                    </div>
                                </div>
                                <?php   } ?>

                            </div>
                        </div>

                        <div class="col-md-9 features-col">
                            <div class="features-value">
                                <div class="rvn-feature-slider owl-carousel owl-theme">
                                    <?php foreach ($productfeaturesData as $productfeaturesitems){?>
                                    <div class="item">

                                        <div class="image">
                                            <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/images/<?= $productfeaturesitems['images_disc'];?>"
                                                title="<?= $productfeaturesitems['title'];?>"
                                                alt="<?= $productfeaturesitems['title'];?>">
                                        </div>

                                    </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </section>




            <section class="main-section package-section">
                <div class="container container-xl">
                    <div class="heading text-center">
                        <h2>How We Work</h2>
                        <p>In order to reduce the complexity, increase the visibility and reach of the work as well as
                            firm,
                            one must situate his business on the internet in the form of a website..</p>
                    </div>
                    <div class="packages-row">
                        <div class="package-col-4">
                            <div class="package-box features">
                                <div class="pakage-name">
                                </div>
                                <div class="pakage-price">
                                    <h2>Features</h2>
                                </div>
                                <div class="pakage-features">
                                    <ul>
                                        <li>Desktop</li>
                                        <li>Onboarding Link</li>
                                        <li>Authorization Process</li>
                                        <li>Document Checking Process</li>
                                        <li>Mobile</li>
                                        <li>Digital Marketing</li>
                                        <li>Financial Planning Tools</li>
                                        <li>KYC</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="package-col-4">
                            <div class="package-box basic">
                                <div class="pakage-name">
                                    <h2>Basic</h2>
                                </div>
                                <div class="pakage-price">
                                    <h2>₹ 10,000 + GST</h2>
                                    <h5>Annual Charges : ₹ 5000 + GST</h5>
                                </div>
                                <div class="pakage-features">
                                    <ul>
                                        <li> <img src="assets/images/icons/right.png" title="right_one" alt="right_one">
                                        </li>
                                        <li> <img src="assets/images/icons/right.png" title="right_two" alt="right_two">
                                        </li>
                                        <li> <img src="assets/images/icons/right.png" title="right_three"
                                                alt="right_three">
                                        </li>
                                        <li> <img src="assets/images/icons/right.png" title="right_four"
                                                alt="right_four">
                                        </li>
                                        <li> <img src="assets/images/icons/cancel.png" title="cancel_one"
                                                alt="cancel_one">
                                        </li>
                                        <li> <img src="assets/images/icons/cancel.png" title="cancel_two"
                                                alt="cancel_two">
                                        </li>
                                        <li> <img src="assets/images/icons/cancel.png" title="cancel_three"
                                                alt="cancel_three"> </li>
                                        <li> 50 </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="package-col-4">
                            <div class="package-box advance">
                                <div class="pakage-name">
                                    <h2>Advanced</h2>
                                </div>
                                <div class="pakage-price">
                                    <h2>Coming Soon...</h2>
                                </div>
                                <div class="pakage-features">
                                    <ul>
                                        <li> <img src="assets/images/icons/right.png" title="right_five"
                                                alt="right_five">
                                        </li>
                                        <li> <img src="assets/images/icons/right.png" title="right_six" alt="right_six">
                                        </li>
                                        <li> <img src="assets/images/icons/right.png" title="right_seven"
                                                alt="right_seven">
                                        </li>
                                        <li> <img src="assets/images/icons/right.png" title="right_eight"
                                                alt="right_eight">
                                        </li>
                                        <li> <img src="assets/images/icons/right.png" title="right_nine"
                                                alt="right_nine">
                                        </li>
                                        <li> <img src="assets/images/icons/right.png" title="right_ten" alt="right_ten">
                                        </li>
                                        <li> <img src="assets/images/icons/right.png" title="right_eleven"
                                                alt="right_eleven"> </li>
                                        <li>Upcoming </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="text-center mt-4">
                        <a href="https://clientonboarding.mfbusinessbooster.com/site/signup" target="_blank"
                            class="btn btn-primary">Get Started</a>
                    </div>
                </div>
            </section>

            <section class="main-section package-mobile-section d-none">
                <div class="container container-xl">
                    <div class="heading text-center">
                        <h2>How We Work</h2>
                        <p>In order to reduce the complexity, increase the visibility and reach of the work as well as
                            firm,
                            one must situate his business on the internet in the form of a website..</p>
                    </div>
                    <div class="packages-row">
                        <div class="package-col-4">
                            <div class="package-box basic">
                                <div class="pakage-name">
                                    <h2>Basic</h2>
                                </div>
                                <div class="pakage-price">
                                    <h2>₹ 10,000 + GST</h2>
                                    <h5>Annual Charges : ₹ 5000 + GST</h5>
                                </div>
                                <div class="pakage-features">
                                    <ul>
                                        <li>Desktop</li>
                                        <li>Onboarding Link</li>
                                        <li>Authorization Process</li>
                                        <li>Document Checking Process</li>
                                        <li>50 KYC</li>
                                    </ul>
                                </div>
                                <div class="text-center my-4">
                                    <a href="https://clientonboarding.mfbusinessbooster.com/site/signup" target="_blank"
                                        class="btn btn-primary">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="package-col-4">
                            <div class="package-box advance">
                                <div class="pakage-name">
                                    <h2>Advanced</h2>
                                </div>
                                <div class="pakage-price">
                                    <h2>Coming Soon...</h2>
                                </div>
                                <div class="pakage-features">
                                    <ul>
                                        <li>Desktop</li>
                                        <li>Onboarding Link</li>
                                        <li>Authorization Process</li>
                                        <li>Document Checking Process</li>
                                        <li>Mobile</li>
                                        <li>Digital Marketing</li>
                                        <li>Financial Planning Tools</li>
                                        <li>KYC</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </section>


            <?php include('footer.php'); ?>