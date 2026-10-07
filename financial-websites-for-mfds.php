<?php  include ('include/config.php'); ?>
<?php  include ('include/function.php'); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Favicon -->
    <!-- Required meta tags -->


    <title>Build Financial website | Create Logo and Template | Make Web Page</title>
    <meta name="description"
        content="REDVision Technologies Build professional financial websites for distributors with logo & Select the best templates for your company's web page.">
    <meta name="keywords"
        content="make professional finance website, build finance investment website, create business website, creating online website for business, best financial news websites, build website for investment business, my web page, best company websites, make finance sites in India, make business to business websites in india, best business sites in indore, best website to start a business, create finance logo and mockup designs, get business logo designs, start a website for my business, build company website, company web page, redvision technologies website build company in indore, best website designing company in india, best website designers in india, web designers in india, professional web designers in india, financial website development services in indore, professional financial services web design and development company, finance website template, top finance companies in Indore, hire web development services, hire web development companies" />
    <link rel="canonical" href="<?= $rvuserinfo['base_url']?>/mutual-fund-software.php">

    <?php include("include/head.php"); ?>
</head>

<body>
    <!-- BANNER -->
    <!-- /BANNER -->

    <?php include("include/header-inner.php"); ?>

    <main>

         

        <?php allPagesBanner($con, 'Financial Website', '', '')?>

        <?php 

$PackagesData = [
	[
		"id" => 1,
		"Packagestitle" => "Price ",
		"PackagesBasic" => "<b>₹ 30,000 + GST </b>",
		"PackagesAdvance" => "<b>₹ 45,000 + GST </b>",
	],
	[
		"id" => 2,
		"Packagestitle" => "AMC Charges (Yearly) ",
		"PackagesBasic" => "<b> ₹ 7000 + GST</b>",
		"PackagesAdvance" => "<b> ₹ 7000 + GST</b>",
	],
	[
		"id" => 3,
		"Packagestitle" => "Domain & Hosting<b>*</b> ",
		"PackagesBasic" => "Yes",
		"PackagesAdvance" => "Yes",
	],
/*	[
		"id" => 4,
		"Packagestitle" => "Sub domain",
		"PackagesBasic" => "Upto 1",
		"PackagesAdvance" => "Upto 2",
	],*/
	[
		"id" => 5,
		"Packagestitle" => "Hosting Storage ",
		"PackagesBasic" => "Upto 200 MB",
		"PackagesAdvance" => "Upto 300 MB",
	],
	[
		"id" => 6,
		"Packagestitle" => "SSL Certificates",
		"PackagesBasic" => "Yes",
		"PackagesAdvance" => "Yes",
	],
	[
		"id" => 7,
		"Packagestitle" => "Responsive Design",
		"PackagesBasic" => "Yes",
		"PackagesAdvance" => "Yes",
	],
	[
		"id" => 8,
		"Packagestitle" => "No. of pages",
		"PackagesBasic" => "Upto 18",
		"PackagesAdvance" => "Upto 25",
	],
// 	[
// 		"id" => 9,
// 		"Packagestitle" => "Demo Link Time",
// 		"PackagesBasic" => "20 Days",
// 		"PackagesAdvance" => "25 Days",
// 	],
// 	[
// 		"id" => 10,
// 		"Packagestitle" => "Duration",
// 		"PackagesBasic" => "40 Days",
// 		"PackagesAdvance" => "45 Days",
// 	],
	[
		"id" => 11,
		"Packagestitle" => "No. of form with Captcha ",
		"PackagesBasic" => "2",
		"PackagesAdvance" => "3",
	],
	[
		"id" => 12,
		"Packagestitle" => "Logo",
		"PackagesBasic" => "Na",
		"PackagesAdvance" => "3",
	],
	[
		"id" => 13,
		"Packagestitle" => "Web Mails (ZOHO free subscription)",
		"PackagesBasic" => "Upto 5",
		"PackagesAdvance" => "Upto 5",
	],
	[
		"id" => 14,
		"Packagestitle" => "Financial Calculator",
		"PackagesBasic" => "12",
		"PackagesAdvance" => "20",
	],
	[
		"id" => 15,
		"Packagestitle" => "Fund Performance",
		"PackagesBasic" => "Yes",
		"PackagesAdvance" => "Yes",
	],
	[
		"id" => 16,
		"Packagestitle" => "SIP Calculator",
		"PackagesBasic" => "Yes",
		"PackagesAdvance" => "Yes",
	],
		[
		"id" => 16,
		"Packagestitle" => "Mutual Fund Search",
		"PackagesBasic" => "Na",
		"PackagesAdvance" => "Yes",
	],
		[
		"id" => 16,
		"Packagestitle" => "Funds & category option from software",
		"PackagesBasic" => "Na",
		"PackagesAdvance" => "Yes",
	],
		[
		"id" => 16,
		"Packagestitle" => "BSE Data(With Chart)",
		"PackagesBasic" => "Na",
		"PackagesAdvance" => "Yes",
	],
	
	[
		"id" => 17,
		"Packagestitle" => "Risk Profile",
		"PackagesBasic" => "Na",
		"PackagesAdvance" => "Yes",
	],
	[
		"id" => 18,
		"Packagestitle" => "Health Checkup",
		"PackagesBasic" => "Yes",
		"PackagesAdvance" => "Yes",
	],
// 	[
// 		"id" => 19,
// 		"Packagestitle" => "Download Form ",
// 		"PackagesBasic" => "Yes",
// 		"PackagesAdvance" => "Yes",
// 	],
	[
		"id" => 20,
		"Packagestitle" => "Ticker",
		"PackagesBasic" => "Yes",
		"PackagesAdvance" => "Yes",
	],
	[
		"id" => 21,
		"Packagestitle" => "Whatsapp Chat",
		"PackagesBasic" => "Na",
		"PackagesAdvance" => "Yes",
	],
	[
		"id" => 22,
		"Packagestitle" => "Blog (From Admin)",
		"PackagesBasic" => "Na",
		"PackagesAdvance" => "Yes (Add up to 50 blogs)",
	],

	[
		"id" => 24,
		"Packagestitle" => "Custom Design",
		"PackagesBasic" => "Na",
		"PackagesAdvance" => "With in  ( Any 3 Templates )",
	],
	[
		"id" => 25,
		"Packagestitle" => "Content",
		"PackagesBasic" => "Default",
		"PackagesAdvance" => "Default",
	],

];
 ?>
        <style>
        .package-box .pakage-price {
            display: flex;
            align-content: center;
            flex-wrap: wrap;
            align-items: center;
            min-height: 126px;
        }

        .package-box .pakage-price h2,
        .package-box .pakage-price h5 {
            display: block;
            text-align: center;
            width: 100%;

        }

        .package-box.features .pakage-price {
            padding-top: 20px;
        }

        .package-box h2.actual-price {
            width: fit-content;
            margin: 0 auto;
        }

        .features .pakage-price h2 {
            margin-bottom: 0;
        }
        </style>

        <section class="main-section package-section">
            <div class="container container-xl">
                <div class="heading text-center">
                    <h2>Packages</h2>

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
                                    <?php foreach (array_slice($PackagesData, 2, 27) as $Packages): ?>
                                    <li><?= $Packages['Packagestitle'];?></li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="package-col-4">
                        <div class="package-box platinum">
                            <div class="pakage-name">
                                <h5 class="popular-tag">Most Popular</h5>
                                <h2>Advance </h2>
                            </div>
                            <div class="pakage-price">
                                <!--<h2 class="actual-price">₹ 55,000</h2>-->
                                <?php foreach (array_slice($PackagesData, 0, 1) as $Packages): ?>
                                <!-- <h2 class="actual-price">₹ 45,000</h2> -->
                                <h2 class="offer-price"> <?=  $Packages['PackagesAdvance'];?></h2>
                                <?php endforeach; ?>
                                <?php foreach (array_slice($PackagesData, 1, 1) as $Packages): ?>
                                <!-- <h2 class="actual-price">₹ 45,000</h2> -->
                                <h5><?=  $Packages['Packagestitle'];?> : <?=  $Packages['PackagesAdvance'];?></h5>
                                <?php endforeach; ?>

                            </div>
                            <div class="pakage-features">
                                <ul>
                                    <?php foreach (array_slice($PackagesData, 2, 27) as $Packages): ?>
                                    <li>
                                        <?php if ($Packages['PackagesAdvance'] == 'Yes'): ?>
                                        <img src="assets/images/icons/right.png" title="platinum_right1"
                                            alt="platinum_right1">
                                        <?php elseif ($Packages['PackagesAdvance'] == 'Na'): ?>
                                        <img src="assets/images/icons/cancel.png" title="gold_cancel2"
                                            alt="gold_cancel2">
                                        <?php else: ?>
                                        <?= htmlspecialchars($Packages['PackagesAdvance']); ?>
                                        <?php endif; ?>
                                    </li>
                                    <?php endforeach; ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="package-col-4">
                        <div class="package-box gold">
                            <div class="pakage-name">
                                <h2>Basic</h2>
                            </div>
                            <div class="pakage-price">
                                <?php foreach (array_slice($PackagesData, 0, 1) as $Packages): ?>
                                <!-- <h2 class="actual-price">₹ 45,000</h2> -->
                                <h2 class="offer-price"> <?=  $Packages['PackagesBasic'];?></h2>
                                <?php endforeach; ?>
                                <?php foreach (array_slice($PackagesData, 1, 1) as $Packages): ?>
                                <!-- <h2 class="actual-price">₹ 45,000</h2> -->
                                <h5><?=  $Packages['Packagestitle'];?> : <?=  $Packages['PackagesBasic'];?></h5>
                                <?php endforeach; ?>
                            </div>
                            <div class="pakage-features">
                                <ul>
                                    <?php foreach (array_slice($PackagesData, 2, 27) as $Packages): ?>
                                    <li>
                                        <?php if ($Packages['PackagesBasic'] == 'Yes'): ?>
                                        <img src="assets/images/icons/right.png" title="platinum_right1"
                                            alt="platinum_right1">
                                        <?php elseif ($Packages['PackagesBasic'] == 'Na'): ?>
                                        <img src="assets/images/icons/cancel.png" title="gold_cancel2"
                                            alt="gold_cancel2">
                                        <?php else: ?>
                                        <?= htmlspecialchars($Packages['PackagesBasic']); ?>
                                        <?php endif; ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="package-col-3">
                        <div class="package-box silver">
                            <div class="pakage-name">
                                <h2>Silver</h2>
                            </div>
                            <div class="pakage-price">
                                <h2 class="actual-price">₹ 25,000</h2>
                                <h2 class="offer-price">₹ 15,000 + GST</h2>
                                <h5>Annual Charges : ₹ 5000 + GST</h5>
                            </div>
                            <div class="pakage-features">
                                <ul>
                                    <li> <img src="assets/images/icons/right.png" title="silver_right1"
                                            alt="silver_right1"> </li>
                                    <li> <img src="assets/images/icons/right.png" title="silver_right2"
                                            alt="silver_right2"> </li>
                                    <li> Upto 7 Pages </li>
                                    <li> 1 </li>
                                    <li> All 8 Calculators </li>
                                    <li> <img src="assets/images/icons/right.png" title="silver_right3"
                                            alt="silver_right3"> </li>
                                    <li> <img src="assets/images/icons/cancel.png" title="silver_cancel1"
                                            alt="silver_cancel1"> </li>
                                    <li> <img src="assets/images/icons/cancel.png" title="silver_cancel2"
                                            alt="silver_cancel2"> </li>
                                    <li> <img src="assets/images/icons/cancel.png" title="silver_cancel3"
                                            alt="silver_cancel3"> </li>
                                    <li> <img src="assets/images/icons/right.png" title="silver_right4"
                                            alt="silver_right4"> </li>
                                    <li> <img src="assets/images/icons/right.png" title="silver_right5"
                                            alt="silver_right5"> </li>
                                    <li> <img src="assets/images/icons/cancel.png" title="" alt=""> </li>
                                    <li> 2 </li>
                                    <li> <img src="assets/images/icons/cancel.png" title="silver_cancel4"
                                            alt="silver_cancel4"> </li>
                                    <li> <img src="assets/images/icons/right.png" title="silver_right6"
                                            alt="silver_right6"> </li>
                                    <li> <img src="assets/images/icons/right.png" title="silver_right7"
                                            alt="silver_right7"> </li>

                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!--<div class="mt-3">-->
                <!--  <ol>-->
                <!--    <li>If the domain is already owned by the client, there will be no deduction in the total amount of the package. </li>-->
                <!--    <li>If the client does not provide their inputs after receiving the demo link and 2-3 follow-ups, the website will be made live after 45 days. </li>-->
                <!--  </ol>-->
                <!--  <p class="mb-0"><b>Admin</b></p>-->
                <!--  <p class="mb-0"><b>Basic:</b> Services Pages, About Us, Contact Us, Leads, Popup, Video, Testimonial </p>-->
                <!--  <p class=""><b>Advance:</b> Services Pages, About Us, Contact Us, Leads, Popup, Video, Testimonial, AMC Logo, Advertisement, Blog , Gallery, FAQ, Social Media </p>-->
                <!--  <p><b>*</b> Domain provided only upto ₹1000 </p>-->
                <!--</div>-->
                <div class="text-center mt-4">
                    <a href="<?= $rvuserinfo['base_url']?>/contact.php" target="_blank" class="btn btn-primary">Get
                        Started</a>
                </div>
            </div>
        </section>

        <section class="main-section package-mobile-section d-none">
            <div class="container container-xl">
                <div class="heading text-center">
                    <h2>Packages</h2>

                </div>
                <div class="packages-row">
                    <div class="package-col-4">
                        <div class="package-box platinum">
                            <div class="pakage-name">
                                <h5 class="popular-tag">Most Popular</h5>
                                <h2>Advance</h2>
                            </div>
                            <div class="pakage-price">
								<!--<h2 class="actual-price">₹ 55,000</h2>-->
                                <h2>₹ 45,000 + GST</h2>
                                <h5>Annual Charges : ₹ 7000 + GST</h5>
                            </div>
                            <div class="pakage-features">
                                <ul>
                                    <li>Domain+Hosting*</li>
                                    <li>Hosting Storage</li>
                                    <li>SSL Certificates</li>
                                    <li>Responsive Design</li>
                                    <li>Upto 25 Pages</li>
                                    <li>Lead Capture Tools : Enquiry Forms/Health Checkup/Risk Profile</li>
                                    <li>Logo : 3 Sample</li>
                                    <li>Web Mails (ZOHO free subscription) : Upto 5</li>
                                    <li>Financial Calculator: 20</li>
                                    <li>Fund Performance</li>
                                    <li>SIP Calculator</li>
                                    <li>Mutual Fund Search</li>
                                    <li>Funds & category option from software</li>
                                    <li>BSE Data(With Chart)</li>
                                    <li>Risk Profile</li>
                                    <li>Health Checkup</li>
                                    <li>Ticker</li>
                                    <li>Whatsapp Chat</li>
                                    <li>Blog (From Admin) upto 50</li>
                                    <li>Custom Design: Within Templates & Reference Link</li>
                                    <li>Content: Default</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="package-col-4">
                        <div class="package-box gold">
                            <div class="pakage-name">
                                <h2>Basic</h2>
                            </div>
                            <div class="pakage-price">
                                <h2>₹ 30,000 + GST</h2>
                                <h5>Annual Charges : ₹ 7000 + GST</h5>
                            </div>
                            <div class="pakage-features">
                                <ul>
                                    <li>Domain+Hosting*</li>
                                    <li>Hosting Storage</li>
                                    <li>SSL Certificates</li>
                                    <li>Responsive Design</li>
                                    <li>Upto 18 Pages</li>
                                    <li>Lead Capture Tools : Enquiry Forms/Health Checkup</li>
                                    <li>Web Mails (ZOHO free subscription) : Upto 5</li>
                                    <li>Financial Calculator: 12</li>
                                    <li>Fund Performance</li>
                                    <li>SIP Calculator</li>
                                    <li>Health Checkup</li>
                                    <li>Ticker</li>
                                    <li>Blog (From Admin) upto 50</li>
                                    <li>Custom Design: Within Templates (3)</li>
                                    <li>Content: Default</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="<?= $rvuserinfo['base_url']?>/contact.php" target="_blank" class="btn btn-primary">Get
                        Started</a>
                </div>
            </div>
        </section>

        <?php include("include/footer.php"); ?>
        <?php include("include/foot.php"); ?>