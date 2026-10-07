<?php
include('../admin_blog/include/config.php');
include('../admin_blog/include/function.php');
$base_url = 'https://www.redvisiontechnologies.com';

?>
<?php if (isset($_SERVER['PATH_INFO'])) { ?>
    <?php
    $slug_url = addslashes(trim($_SERVER['PATH_INFO']));
    $post = getPostBySlug($con, $slug_url);

    $post_id = $post['id'];
    $blog_id = $post['category_id'];

    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Favicon -->
        <link rel="icon" href="<?= $base_url; ?>/assets/images/favicon.ico" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php if ($post['head_teg'] == '') { ?>


            <title><?= $post['meta_title']; ?></title>
            <meta name="description" content="<?= $post['meta_description']; ?>">
            <meta name="keywords" content="<?= $post['meta_keywords']; ?>" />
            <meta name="author" content="REDVision Technologies Pvt. Ltd.">
            <link rel="canonical" href="<?= $canonical; ?>">


        <?php } else { ?>
            <?= $post['head_teg'] ?>
        <?php } ?>

        <link href="<?= $base_url; ?>/assets/css/mdb.min.css" rel="preload" as="style" onload="this.rel='stylesheet'" />
        <!-- Fonts -->
        <link href="<?= $base_url; ?>/assets/fonts/whyte/font.css" rel="preload" as="style"
            onload="this.rel='stylesheet'" />
        <link href="<?= $base_url; ?>/assets/fonts/oswald/font.css" rel="preload" as="style"
            onload="this.rel='stylesheet'" />
        <link href="<?= $base_url; ?>/assets/fonts/the-unseen/font.css" rel="preload" as="style"
            onload="this.rel='stylesheet'" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="preload" as="style"
            onload="this.rel='stylesheet'" />
        <link rel="preload" as="style" onload="this.rel='stylesheet'" href="<?= $base_url; ?>/assets/css/animate.css" />
        <link rel="preload" as="style" onload="this.rel='stylesheet'" href="<?= $base_url; ?>/assets/css/animate.min.css" />
        <link rel="preload" as="style" onload="this.rel='stylesheet'"
            href="<?= $base_url; ?>/assets/css/owl.carousel.min.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="preload" as="style"
            onload="this.rel='stylesheet'">
        <link rel="preload" as="style" onload="this.rel='stylesheet'"
            href="<?= $base_url; ?>/assets/light-gallery/css/lightgallery.css" />
        <link rel="preload" as="style" onload="this.rel='stylesheet'"
            href="<?= $base_url; ?>/assets/light-gallery/css/lg-thumbnail.css" />
        <link rel="preload" as="style" onload="this.rel='stylesheet'"
            href="<?= $base_url; ?>/assets/light-gallery/css/lg-zoom.css" />
        <link rel="preload" as="style" onload="this.rel='stylesheet'"
            href="<?= $base_url; ?>/assets/fonts/bootstrap-icon/bootstrap-icons.css" />
        <link rel="preload" as="style" onload="this.rel='stylesheet'"
            href="<?= $base_url; ?>/assets/fonts/themify-icon/themify-icons.css" />
        <!-- venobox -->
        <link rel="preload" as="style" onload="this.rel='stylesheet'" type="text/css"
            href="<?= $base_url; ?>/assets/venobox/venobox.css" />
        <!-- <link href="<?= $base_url; ?>/assets/css/whatsapp-chat.css" rel="preload" as="style"
            onload="this.rel='stylesheet'"/> -->
        <link href="<?= $base_url; ?>/assets/css/style.css" rel="stylesheet" />
        <link href="<?= $base_url; ?>/assets/css/responsive.css" rel="stylesheet" />
    </head>

    <body>
        <!-- BANNER -->
        <!-- /BANNER -->
        <header class="header_main">
            <div class="top-bar">
                <div class="container container-xl">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <a class="navbar-brand mt-2 mt-lg-0" href="<?= $rvuserinfo['base_url'] ?>/">
                                <img class="logo1" src="<?= $rvuserinfo['base_url'] ?>/assets/images/logo.png" alt="Logo1" />
                                <img class="logo2" src="<?= $rvuserinfo['base_url'] ?>/assets/images/logo-white-full.png"
                                    alt="Logo2" />
                            </a>
                        </div>
                        <div class="col-md-9 col-lg-9 col-xl-9">
                            <div class="social">
                                <ul class="list-item">
                                    <li><a href="https://www.facebook.com/redvisiontechnologies" target="_blank"
                                            aria-label="Facebook" rel="nofollow"><img
                                                src="<?= $rvuserinfo['base_url'] ?>/assets/images/icons/facebook.svg"
                                                alt="facebook"></a></li>
                                    <li><a href="https://twitter.com/redvisionindore" target="_blank" aria-label="Twitter"
                                            rel="nofollow"><img
                                                src="<?= $rvuserinfo['base_url'] ?>/assets/images/icons/twitter.svg"
                                                alt="twitter"></a></li>
                                    <li><a href="https://www.linkedin.com/company/redvisiontechnologies/" target="_blank"
                                            aria-label="Linkedin" rel="nofollow"><img
                                                src="<?= $rvuserinfo['base_url'] ?>/assets/images/icons/linkedin.svg"
                                                alt="linkedin"></a></li>
                                    <li><a href="https://www.instagram.com/redvisiontechnologies/" target="_blank"
                                            aria-label="Instagram" rel="nofollow"><img
                                                src="<?= $rvuserinfo['base_url'] ?>/assets/images/icons/instagram.svg"
                                                alt="instagram"></a></li>
                                    <li><a href="https://www.youtube.com/@redvisiontechnologies/" target="_blank"
                                            aria-label="Youtube" rel="nofollow"><img
                                                src="<?= $rvuserinfo['base_url'] ?>/assets/images/icons/youtube.svg"
                                                alt="youtube"></a></li>
                                    <li class="li-wa-icon"><a class="wa-icon" href="https://wa.me/+919039822000" target="_blank"
                                            aria-label="Whatsapp" rel="nofollow"><img
                                                src="<?= $rvuserinfo['base_url'] ?>/assets/images/icons/whatsapp.svg"
                                                alt="whatsapp"></a></li>
                                </ul>
                            </div>
                            <!-- Navbar -->
                            <span class="toggle-btn menu-btn d-none">
                                <i class="ti-menu-alt"></i>
                            </span>
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <span class="close-menu-btn d-none">
                                    <i class="ti-close"></i>
                                </span>
                                <!-- Navbar brand -->
                                <!-- Left links -->
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= $rvuserinfo['base_url'] ?>/">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" href="<?= $rvuserinfo['base_url'] ?>/about.php">About Us</a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                            data-mdb-toggle="dropdown" aria-expanded="false">
                                            Products
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item"
                                                href="<?= $base_url; ?>/mutual-fund-software-for-distributors.php">Wealth
                                                Elite</a>
                                            <a class="dropdown-item" href="<?= $base_url; ?>/robo-advisory-software.php">Robo
                                                Applications</a>
                                            <a class="dropdown-item" href="<?= $base_url; ?>/mutual-fund-software.php">Advisor X
                                                App</a>
                                            <a class="dropdown-item" href="<?= $base_url; ?>/web-robo.php">Web Robo
                                            </a>
                                            <a class="dropdown-item"
                                                href="<?= $base_url; ?>/financial-websites-for-mfds.php">Financial Website</a>
                                            <a class="dropdown-item"
                                                href="<?= $base_url; ?>/mutual-fund-software-in-india.php">Business Booster
                                                Platform</a>
                                            <a class="dropdown-item" href="<?= $base_url; ?>/digital-marketing.php">Digital
                                                Marketing </a>
                                            <!-- <a class="dropdown-item" href="https://salesninjacrm.com/" target="_">Sales Ninja</a> -->
                                            <!--<a class="dropdown-item" href="<?= $rvuserinfo['base_url'] ?>/brand-ambassador">Brand Ambassador</a>-->
                                        </ul>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="<?= $rvuserinfo['base_url'] ?>/digital-marketing.php">Digital
                                            Marketing</a>
                                    </li> -->

                                    <!--<li class="nav-item dropdown">-->
                                    <!--  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">-->
                                    <!--    Opportunities-->
                                    <!--  </a>-->
                                    <!--  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">-->
                                    <!--    <a class="dropdown-item" href="career.php">Careers</a>-->
                                    <!--    <a class="dropdown-item" href="integration-partner.php">Integrations</a>-->
                                    <!--  </ul>-->
                                    <!--</li>-->

                                    <!-- <li class="nav-item">
                                        <a class="nav-link px-3" href="<?= $rvuserinfo['base_url'] ?>/career.php">Careers</a>
                                    </li> -->
                                    <li class="nav-item new-img-f">
                                        <a class="nav-link px-3"
                                            href="<?= $rvuserinfo['base_url'] ?>/sales-crm-for-mutual-fund-distributors-in-india.php">Sales
                                            Ninja CRM <img
                                                src="<?= $rvuserinfo['base_url'] ?>/assets/salesninjacrm/new_ellipse_starburst.gif"
                                                class="img-b" alt="new_ellipse"></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= $rvuserinfo['base_url'] ?>/success-stories.php">Success
                                            Stories</a>
                                    </li>
                                    <li class=" nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                            data-mdb-toggle="dropdown" aria-expanded="false">
                                            MFDs Hub
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="<?= $rvuserinfo['base_url'] ?>/pay-online.php">Pay
                                                Online</a>
                                            <a class="dropdown-item" href="<?= $rvuserinfo['base_url'] ?>/invoice.php">IFA
                                                Zone</a>
                                            <a class="dropdown-item"
                                                href="<?= $rvuserinfo['base_url'] ?>/utilities.php">Utilities</a>
                                        </ul>
                                    </li>
                                    <!-- <li class="nav-item">
                                    <a class="nav-link" href="pay-online.php">Pay Online</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="invoice.php">IFA Zone</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="utilities.php">Utilities</a>
                                    </li> -->
                                                    <!-- <li class="nav-item">
                                    <a class="nav-link" href="index.php#blogSection">Blog</a>
                                    </li> -->
                                    <!--<li class="nav-item">-->
                                    <!--  <a class="nav-link" href="contact.php">Contact Us</a>-->
                                    <!--</li>-->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                            data-mdb-toggle="dropdown" aria-expanded="false">
                                            Get In Touch
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="<?= $rvuserinfo['base_url'] ?>/contact.php">Contact
                                                Us</a>
                                            <a class="dropdown-item"
                                                href="<?= $rvuserinfo['base_url'] ?>/integration-partner.php">Partner With
                                                Us</a>
                                            <a class="dropdown-item"
                                                href="<?= $rvuserinfo['base_url'] ?>/career.php">Careers</a>
                                        </ul>
                                    </li>
                                </ul>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>

            <section class="inner_banner_section">
                <div class="container container-xl">
                    <div class="banner-content">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="title wow fadeInLeft" data-wow-delay="0.2s">
                                    <h2><?= $post['title'] ?></h2>
                                    <!-- <p>Successfully Building an Empire of Mutual Fund Distributors through World-Class Fintech Solutions Over the Last 15 Years.</p> -->
                                </div>
                            </div>
                            <!--  <div class="col-md-6 col-lg-6">-->
                            <!--  <div class="breadcrumb-bar wow fadeInRight" data-wow-delay="0.2s">-->
                            <!--  <nav aria-label="breadcrumb">-->
                            <!--<ol class="breadcrumb">-->
                            <!--  <li class="breadcrumb-item"><a href="#!">Home</a></li>-->
                            <!--  <li class="breadcrumb-item active" aria-current="page"><?= $post['title'] ?></li>-->
                            <!--</ol>-->
                            <!--</nav>-->
                            <!--</div>-->
                            <!--  </div>-->
                        </div>
                    </div>
                </div>
                <div class="inner_banner_shape1"></div>
                <div class="inner_banner_shape2"></div>
                <div class="inner_banner_shape3"></div>
                <div class="inner_banner_shape4"></div>
            </section>

            <section class="main-section blog_section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="post-detail">
                                <?php if ($post['blog_part'] == 0) { ?>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?= $base_url; ?>">Home</a></li>
                                            <li class="breadcrumb-item"><a href="<?= $base_url; ?>/blog/">Blog</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?= $post['title'] ?></li>
                                        </ol>
                                    </nav>
                                    <h3 class="blog_title"><?= $post['title'] ?></h3>
                                    <h4 class="blog_sub_title"><?= $post['sub_title'] ?></h4>
                                    <div class="blog-buttons">
                                        <span class="time">
                                            <span
                                                class="badge bg-primary"><?= date('F jS, Y', strtotime($post['added_on'])) ?></span>
                                        </span>
                                        <!--<span class="category">-->
                                        <!--  <a class="badge bg-secondary"><?= getCategory($con, $post['category_id']) ?></a>-->
                                        <!--</span>-->
                                    </div>
                                    <div class="view_img">
                                        <img class="d-block w-100"
                                            src="<?= $base_url; ?>/assets/images/admin/blog/<?= $post['image'] ?>"
                                            alt="<?= $post['title'] ?>">
                                    </div>
                                <?php } ?>
                                <div class="blog-content">
                                    <?= $post['content'] ?>
                                </div>
                                <div class="social-media-share">
                                    <h4>Share On Social Media</h4>
                                    <ul>
                                        <li><a href="http://www.facebook.com/sharer.php?u=<?= $base_url; ?>/blog<?= $post['slug_url'] ?>"
                                                aria-label="Facebook" target="_blank" data-toggle="tooltip"
                                                data-placement="top" title="Facebook"><i class="bi bi-facebook"></i></a>
                                        </li>
                                        <li><a href="http://twitter.com/share?url=<?= $base_url; ?>/blog<?= $post['slug_url'] ?>"
                                                aria-label="Twitter" target="_blank" data-toggle="tooltip"
                                                data-placement="top" title="Twitter"><i class="bi bi-twitter"></i></a></li>
                                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?= $base_url; ?>/blog<?= $post['slug_url'] ?>"
                                                aria-label="Linkedin" target="_blank" data-toggle="tooltip"
                                                data-placement="top" title="Linkedin"><i class="bi bi-linkedin"></i></a>
                                        </li>
                                        <li><a href="https://telegram.me/share?url=<?= $base_url; ?>/blog<?= $post['slug_url'] ?>"
                                                aria-label="Telegram" target="_blank" data-toggle="tooltip"
                                                data-placement="top" title="Telegram"><i class="bi bi-telegram"></i></a>
                                        </li>

                                        <li><a href="whatsapp://send?text=<?= $base_url; ?>/blog<?= $post['slug_url'] ?>"
                                                aria-label="Whatsapp" target="_blank" data-toggle="tooltip"
                                                data-placement="top" title="Whatsapp"><i class="bi bi-whatsapp"></i></a>
                                        </li>
                                        <li><a href="mailto:?Subject=Article &Body=<?= $base_url; ?>/blog<?= $post['slug_url'] ?>"
                                                aria-label="gmail" target="_blank" data-toggle="tooltip"
                                                data-placement="top" title="Email"><i class="bi bi-google"></i></a></li>
                                        <li><span id="clickCopyString" aria-label="Copy" data-toggle="tooltip"
                                                data-placement="top" title="Copy Link"><i
                                                    class="bi bi-file-earmark-text"></i></span></li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h4>Related Post</h4>




                            <div class="related-blogs sidebar">
                                <ul class="sidebar-items">

                                    <?php
                                    $query = "SELECT * FROM post ORDER BY id DESC";
                                    $query_run = mysqli_query($con, $query);
                                    while ($post = mysqli_fetch_array($query_run)) {
                                        if ($post['id'] == $post_id) {
                                            continue;
                                        }
                                        ?>
                                        <li class="item">
                                            <div class="content">
                                                <div class="image"><img
                                                        src="<?= $base_url; ?>/assets/images/admin/blog/<?php echo $post['image']; ?>"
                                                        alt="<?php echo $post['title']; ?>" width="80px"></div>
                                                <a
                                                    href="<?= $base_url; ?>/blog<?= $post['slug_url'] ?>"><?php echo $post['title']; ?></a>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </section>



            <?php
} else {
    $query = "SELECT * FROM post ORDER BY id DESC";
    $query_run = mysqli_query($con, $query);
    ?>

            <!doctype html>
            <html lang="en">

            <head>
                <!-- Favicon -->
                <link rel="icon" href="<?= $base_url; ?>/assets/images/favicon.ico" />
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>Best Mutual Fund Software in India | Top Wealth Management Platform</title>
                <meta name="description"
                    content="REDVision Technologies offers the best mutual fund software in India to simplify asset management with automation, white labeling, Video KYC and expert support.">
                <meta name="keywords"
                    content="mutual fund software, mutual fund software for distributors, mutual fund software for ifa, best digital wealth management platform in India, top mutual fund software in india, best online wealth management reporting software in Indore, best mutual fund software in india, best financial planning software for mfd and ifa, best mutual fund software, mutual fund portfolio analysis tool, Top wealth management software companies in Indore, retirement planning software for mfds, portfolio management software for financial distributors, best mutual fund distributor software in india, best software for mutual fund distributor, mutual fund distributors client management software, best mutual fund software for ifa in india, mutual fund management software, Top Mutual Fund Software for Ifa in India, Best Mutual Fund Software for Distributors in India, wealth tracking software, wealth portfolio management software, best tax planning software for mutual fund distributors, mutual fund back office software, investment management software market, financial planning software companies in india, free mutual fund distributor software, wealth assistant software, best software mutual funds, mutual fund distributor back office software, mutual fund portfolio management software, mutual fund trading software, red vision mutual fund software, personal financial planner software, mutual fund analysis software, client management software for mfds, software mutual fund, mutual fund tracking software, top mutual fund software, mutual fund software companies, mutual fund software for distributors free, mutual fund portfolio software, mutual fund software india, Best online platform for mutual fund distributor, mf software in india, top mutual fund software for distributors in india, mf distributors software." />
                <meta name="author" content="REDVision Technologies Pvt. Ltd.">
                <link rel="canonical" href="<?= $canonical; ?>">
                <link href="<?= $base_url; ?>/assets/css/mdb.min.css" rel="preload" as="style"
                    onload="this.rel='stylesheet'" />
                <!-- Fonts -->
                <link href="<?= $base_url; ?>/assets/fonts/whyte/font.css" rel="preload" as="style"
                    onload="this.rel='stylesheet'" />
                <link href="<?= $base_url; ?>/assets/fonts/oswald/font.css" rel="preload" as="style"
                    onload="this.rel='stylesheet'" />
                <link href="<?= $base_url; ?>/assets/fonts/the-unseen/font.css" rel="preload" as="style"
                    onload="this.rel='stylesheet'" />
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="preload"
                    as="style" onload="this.rel='stylesheet'" />
                <link rel="preload" as="style" onload="this.rel='stylesheet'"
                    href="<?= $base_url; ?>/assets/css/animate.css" />
                <link rel="preload" as="style" onload="this.rel='stylesheet'"
                    href="<?= $base_url; ?>/assets/css/animate.min.css" />
                <link rel="preload" as="style" onload="this.rel='stylesheet'"
                    href="<?= $base_url; ?>/assets/css/owl.carousel.min.css" />
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="preload"
                    as="style" onload="this.rel='stylesheet'">
                <link rel="preload" as="style" onload="this.rel='stylesheet'"
                    href="<?= $base_url; ?>/assets/light-gallery/css/lightgallery.css" />
                <link rel="preload" as="style" onload="this.rel='stylesheet'"
                    href="<?= $base_url; ?>/assets/light-gallery/css/lg-thumbnail.css" />
                <link rel="preload" as="style" onload="this.rel='stylesheet'"
                    href="<?= $base_url; ?>/assets/light-gallery/css/lg-zoom.css" />
                <link rel="preload" as="style" onload="this.rel='stylesheet'"
                    href="<?= $base_url; ?>/assets/fonts/bootstrap-icon/bootstrap-icons.css" />
                <link rel="preload" as="style" onload="this.rel='stylesheet'"
                    href="<?= $base_url; ?>/assets/fonts/themify-icon/themify-icons.css" />
                <!-- venobox -->
                <link rel="preload" as="style" onload="this.rel='stylesheet'" type="text/css"
                    href="<?= $base_url; ?>/assets/venobox/venobox.css" />
                <!-- <link href="<?= $base_url; ?>/assets/css/whatsapp-chat.css" rel="preload" as="style"
            onload="this.rel='stylesheet'"/> -->
                <link href="<?= $base_url; ?>/assets/css/style.css" rel="stylesheet" />
                <link href="<?= $base_url; ?>/assets/css/responsive.css" rel="stylesheet" />
            </head>

            <body>
                <!-- BANNER -->
                <!-- /BANNER -->

<header class="header_main">
    <div class="top-bar">
        <div class="container container-xl">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <a class="navbar-brand mt-2 mt-lg-0" href="<?= $rvuserinfo['base_url'] ?>/">
                        <img class="logo1" src="<?= $rvuserinfo['base_url'] ?>/assets/images/logo.png" alt="Logo1" />
                        <img class="logo2" src="<?= $rvuserinfo['base_url'] ?>/assets/images/logo-white-full.png"
                            alt="Logo2" />
                    </a>
                </div>
                <div class="col-md-9 col-lg-9 col-xl-9">
                    <div class="social">
                        <ul class="list-item">
                            <li><a href="https://www.facebook.com/redvisiontechnologies" target="_blank"
                                    aria-label="Facebook" rel="nofollow"><img
                                        src="<?= $rvuserinfo['base_url'] ?>/assets/images/icons/facebook.svg"
                                        alt="facebook"></a></li>
                            <li><a href="https://twitter.com/redvisionindore" target="_blank" aria-label="Twitter"
                                    rel="nofollow"><img
                                        src="<?= $rvuserinfo['base_url'] ?>/assets/images/icons/twitter.svg"
                                        alt="twitter"></a></li>
                            <li><a href="https://www.linkedin.com/company/redvisiontechnologies/" target="_blank"
                                    aria-label="Linkedin" rel="nofollow"><img
                                        src="<?= $rvuserinfo['base_url'] ?>/assets/images/icons/linkedin.svg"
                                        alt="linkedin"></a></li>
                            <li><a href="https://www.instagram.com/redvisiontechnologies/" target="_blank"
                                    aria-label="Instagram" rel="nofollow"><img
                                        src="<?= $rvuserinfo['base_url'] ?>/assets/images/icons/instagram.svg"
                                        alt="instagram"></a></li>
                            <li><a href="https://www.youtube.com/@redvisiontechnologies/" target="_blank"
                                    aria-label="Youtube" rel="nofollow"><img
                                        src="<?= $rvuserinfo['base_url'] ?>/assets/images/icons/youtube.svg"
                                        alt="youtube"></a></li>
                            <li class="li-wa-icon"><a class="wa-icon" href="https://wa.me/+919039822000" target="_blank"
                                    aria-label="Whatsapp" rel="nofollow"><img
                                        src="<?= $rvuserinfo['base_url'] ?>/assets/images/icons/whatsapp.svg"
                                        alt="whatsapp"></a></li>
                        </ul>
                    </div>
                    <!-- Navbar -->
                    <span class="toggle-btn menu-btn d-none">
                        <i class="ti-menu-alt"></i>
                    </span>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <span class="close-menu-btn d-none">
                            <i class="ti-close"></i>
                        </span>
                        <!-- Navbar brand -->
                        <!-- Left links -->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $rvuserinfo['base_url'] ?>/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3" href="<?= $rvuserinfo['base_url'] ?>/about.php">About Us</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-mdb-toggle="dropdown" aria-expanded="false">
                                    Products
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item"
                                        href="<?= $base_url; ?>/mutual-fund-software-for-distributors.php">Wealth
                                        Elite</a>
                                    <a class="dropdown-item" href="<?= $base_url; ?>/robo-advisory-software.php">Robo
                                        Applications</a>
                                    <a class="dropdown-item" href="<?= $base_url; ?>/mutual-fund-software.php">Advisor X
                                        App</a>
                                    <a class="dropdown-item" href="<?= $base_url; ?>/web-robo.php">Web Robo
                                    </a>
                                    <a class="dropdown-item"
                                        href="<?= $base_url; ?>/financial-websites-for-mfds.php">Financial Website</a>
                                    <a class="dropdown-item"
                                        href="<?= $base_url; ?>/mutual-fund-software-in-india.php">Business Booster
                                        Platform</a>
                                    <a class="dropdown-item" href="<?= $base_url; ?>/digital-marketing.php">Digital
                                        Marketing </a>
                                    <!-- <a class="dropdown-item" href="https://salesninjacrm.com/" target="_">Sales Ninja</a> -->
                                    <!--<a class="dropdown-item" href="<?= $rvuserinfo['base_url'] ?>/brand-ambassador">Brand Ambassador</a>-->
                                </ul>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="<?= $rvuserinfo['base_url'] ?>/digital-marketing.php">Digital
                                    Marketing</a>
                            </li> -->

                            <!--<li class="nav-item dropdown">-->
                            <!--  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">-->
                            <!--    Opportunities-->
                            <!--  </a>-->
                            <!--  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">-->
                            <!--    <a class="dropdown-item" href="career.php">Careers</a>-->
                            <!--    <a class="dropdown-item" href="integration-partner.php">Integrations</a>-->
                            <!--  </ul>-->
                            <!--</li>-->

                            <!-- <li class="nav-item">
                                <a class="nav-link px-3" href="<?= $rvuserinfo['base_url'] ?>/career.php">Careers</a>
                            </li> -->
                            <li class="nav-item new-img-f">
                                <a class="nav-link px-3"
                                    href="<?= $rvuserinfo['base_url'] ?>/sales-crm-for-mutual-fund-distributors-in-india.php">Sales
                                    Ninja CRM <img
                                        src="<?= $rvuserinfo['base_url'] ?>/assets/salesninjacrm/new_ellipse_starburst.gif"
                                        class="img-b" alt="new_ellipse"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $rvuserinfo['base_url'] ?>/success-stories.php">Success
                                    Stories</a>
                            </li>
                            <li class=" nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-mdb-toggle="dropdown" aria-expanded="false">
                                    MFDs Hub
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?= $rvuserinfo['base_url'] ?>/pay-online.php">Pay
                                        Online</a>
                                    <a class="dropdown-item" href="<?= $rvuserinfo['base_url'] ?>/invoice.php">IFA
                                        Zone</a>
                                    <a class="dropdown-item"
                                        href="<?= $rvuserinfo['base_url'] ?>/utilities.php">Utilities</a>
                                </ul>
                            </li>
                            <!-- <li class="nav-item">
              <a class="nav-link" href="pay-online.php">Pay Online</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="invoice.php">IFA Zone</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="utilities.php">Utilities</a>
            </li> -->
                            <!-- <li class="nav-item">
              <a class="nav-link" href="index.php#blogSection">Blog</a>
            </li> -->
                            <!--<li class="nav-item">-->
                            <!--  <a class="nav-link" href="contact.php">Contact Us</a>-->
                            <!--</li>-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-mdb-toggle="dropdown" aria-expanded="false">
                                    Get In Touch
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?= $rvuserinfo['base_url'] ?>/contact.php">Contact
                                        Us</a>
                                    <a class="dropdown-item"
                                        href="<?= $rvuserinfo['base_url'] ?>/integration-partner.php">Partner With
                                        Us</a>
                                    <a class="dropdown-item"
                                        href="<?= $rvuserinfo['base_url'] ?>/career.php">Careers</a>
                                </ul>
                            </li>
                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
                <main>

                    <section class="inner_banner_section">
                        <div class="container container-xl">
                            <div class="banner-content">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="title wow fadeInLeft" data-wow-delay="0.2s">
                                            <h1>Blog </h1>
                                            <!-- <p>Successfully Building an Empire of Mutual Fund Distributors through World-Class Fintech Solutions Over the Last 15 Years.</p> -->
                                        </div>
                                    </div>
                                    <!--  <div class="col-md-6 col-lg-6">-->
                                    <!--  <div class="breadcrumb-bar wow fadeInRight" data-wow-delay="0.2s">-->
                                    <!--  <nav aria-label="breadcrumb">-->
                                    <!--<ol class="breadcrumb">-->
                                    <!--  <li class="breadcrumb-item"><a href="#!">Home</a></li>-->
                                    <!--  <li class="breadcrumb-item active" aria-current="page">Blog</li>-->
                                    <!--</ol>-->
                                    <!--</nav>-->
                                    <!--</div>-->
                                    <!--  </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="inner_banner_shape1"></div>
                        <div class="inner_banner_shape2"></div>
                        <div class="inner_banner_shape3"></div>
                        <div class="inner_banner_shape4"></div>
                    </section>

                    <section class="main-section blog_section">
                        <div class="container">
                            <div class="row">
                                <?php
                                while ($post = mysqli_fetch_array($query_run)) {
                                    ?>

                                    <div class="col-sm-4">
                                        <div class="blog-item">
                                            <div class="thumbnail">
                                                <a href="<?= $base_url; ?>/blog<?= $post['slug_url'] ?>"><img
                                                        src="<?= $base_url; ?>/assets/images/admin/blog/<?php echo $post['image']; ?>"
                                                        alt="Blog Images"></a>
                                            </div>
                                            <div class="blog-content">
                                                <div class="date">
                                                    <span class="meta-date"><i class="fa fa-calendar"></i>
                                                        <?= date('F jS, Y', strtotime($post['added_on'])) ?></span>
                                                </div>
                                                <di class="blog_page_title pb-1">
                                                    <h3><a href="<?= $base_url; ?>/blog<?= $post['slug_url'] ?>">
                                                            <?php echo $post['title']; ?></a></h3>
                                                </di>
                                                <div class="blog_page_button">
                                                    <a href="<?= $base_url; ?>/blog<?= $post['slug_url'] ?>"
                                                        class="btn btn-line-dark">Read More <i
                                                            class="fa fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </section>
                    <?php
}
?>


            </main>


            <!-- Footer -->
            <footer class="footer-main footer-dark">
                <div class="footer-inside">
                    <div class="footer-top">
                        <div class="container container-xl">
                            <div class="titlebar">
                                <h2>Start Your Journey with REDVision Today</h2>
                                <div class="footer-h6">Delivering a full digital ecosystem for MFDs with  mutual fund software, mobile apps, and more
                                </div>
                                <a class="btn btn-primary" href="contact.php">Get A Call From Us</a>
                            </div>
                            <div class="footer-widget">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <div class="menu">
                                            <h4 class="widget-title">Quick Links</h4>
                                            <ul class="list-item">
                                                <li><a href="<?= $base_url; ?>/">Home</a></li>
                                                <li><a href="<?= $base_url; ?>/about.php">About Us</a></li>
                                                <li><a href="<?= $base_url; ?>/contact.php">Contact Us</a></li>
                                                <li><a href="<?= $base_url; ?>/career.php">Career</a></li>
                                                <li><a href="<?= $base_url; ?>/blog">Blogs</a></li>
                                                <li><a href="<?= $base_url; ?>/privacy-policy.php">Privacy Policy</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <div class="menu">
                                            <h4 class="widget-title">Our Products</h4>
                                            <ul class="list-item">
                                                <li><a href="<?= $base_url; ?>/mutual-fund-software.php">Wealth
                                                        Elite</a>
                                                </li>
                                                <li><a href="<?= $base_url; ?>/robo-advisory-software.php">Robo Advisory
                                                        Platform</a></li>
                                                <li><a
                                                        href="<?= $base_url; ?>/mutual-fund-software-for-distributors.php">Advisor
                                                        X App</a></li>
                                                <li><a href="<?= $base_url; ?>/financial-websites-for-mfds.php">Financial
                                                        Website</a></li>
                                                <li><a href="<?= $base_url; ?>/mutual-fund-software-in-india.php">Business
                                                        Booster Platform</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <div class="menu">
                                            <h4 class="widget-title">Get Our App</h4>
                                            <div class="store_btns">
                                                <a href="https://play.google.com/store/apps/details?id=com.redvision.wealth_elite&hl=en&gl=US"
                                                    target="_blank"><img
                                                        src="<?= $base_url; ?>/assets/images/google_play.webp"
                                                        alt="mutual fund software app"> </a>
                                                <a href="https://apps.apple.com/us/app/wealth-elite/id1518518606"
                                                    target="_blank"> <img
                                                        src="<?= $base_url; ?>/assets/images/apple_store.webp"
                                                        alt="mutual fund software app"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3 contact-widget">
                                        <div class="menu">
                                            <ul class="list-item">
                                                <h4 class="widget-title">Get In Touch</h4>
                                                <h6>For Sales Inquires</h6>
                                                <li><i class="bi bi-telephone"></i> <a href="tel:+919039822000">+91
                                                        9039822000</a></li>
                                                <li><i class="bi bi-envelope-open"></i> <a
                                                        href="mailto:info@redvisionglobal.com">info@redvisionglobal.com</a>
                                                </li>
                                                <h6>For Career Inquires</h6>
                                                <li><i class="bi bi-telephone"></i> <a href="tel:+919300910910">+91
                                                        9300910910</a></li>
                                                <li><i class="bi bi-envelope-open"></i> <a
                                                        href="mailto:hr@redvisionglobal.com">hr@redvisionglobal.com</a>
                                                </li>
                                                <li><i class="bi bi-geo-alt"></i> <a href="#!">101, 45 Hare Krishna
                                                        Vihar, Behind Advanced Academy, Nipania, Indore, 452010 (MP)</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom">
                        <div class="container container-xl">
                            <div class="row mt-3">
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <div class="logo">
                                        <a href="https://www.redvisiontechnologies.com"><img
                                                src="<?= $base_url; ?>/assets/images/logo-white.png"
                                                alt="logo-white"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6 text-center">
                                    <p>Copyright @ REDVision Global Technologies Pvt. Ltd.</p>

                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <div class="social">
                                        <ul class="list-item">
                                            <li><a href="https://www.facebook.com/redvisiontechnologies"
                                                    target="_blank"><img
                                                        src="<?= $base_url; ?>/assets/images/icons/facebook.png"
                                                        alt="facebook"></a></li>
                                            <li><a href="https://twitter.com/redvisionindore" target="_blank"><img
                                                        src="<?= $base_url; ?>/assets/images/icons/twitter.png"
                                                        alt="twitter"></a></li>
                                            <li><a href="https://www.linkedin.com/company/redvisiontechnologies/"
                                                    target="_blank"><img
                                                        src="<?= $base_url; ?>/assets/images/icons/linkedin.png"
                                                        alt="linkedin"></a></li>
                                            <li><a href="https://www.instagram.com/redvisiontechnologies/"
                                                    target="_blank"><img
                                                        src="<?= $base_url; ?>/assets/images/icons/instagram.png"
                                                        alt="instagram"></a></li>
                                            <li><a href="https://www.youtube.com/@redvisiontechnologies/"
                                                    target="_blank"><img
                                                        src="<?= $base_url; ?>/assets/images/icons/youtube.png"
                                                        alt="youtube"></a></li>
                                            <li class="li-wa-icon"><a class="wa-icon" href="https://wa.me/+919039822000"
                                                    target="_blank"><img
                                                        src="<?= $base_url; ?>/assets/images/icons/whatsapp.png"
                                                        alt="whatsapp"></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </footer>
            <!-- Footer -->





            <script src="<?= $base_url; ?>/assets/js/jquery-3.6.3.min.js"></script>
            <script src="<?= $base_url; ?>/assets/js/mdb.min.js"></script>
            <script type="text/javascript" src="<?= $base_url; ?>/assets/js/numscroller-1.0.js"></script>
            <script src="<?= $base_url; ?>/assets/js/owl.carousel.min.js"></script>
            <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
            <script src="<?= $base_url; ?>/assets/js/style.js"></script>
            <script src="<?= $base_url; ?>/assets/js/contactform-validation.js"></script>
            <script src="<?= $base_url; ?>/assets/js/wow.min.js"></script>

            <script>
                $('.request-popup-active-btn').click(function () {
                    $('.request-call-popup').addClass('show');
                });
                $('.close-pop').click(function () {
                    $('.request-call-popup').removeClass('show');
                });
            </script>

            <!-- Light Gallery -->
            <script type="text/javascript" src="<?= $base_url; ?>/assets/light-gallery/lightgallery.umd.js"></script>
            <script type="text/javascript" src="<?= $base_url; ?>/assets/light-gallery/lightgallery.min.js"></script>
            <script type="text/javascript" src="<?= $base_url; ?>/assets/light-gallery/plugins/zoom/lg-zoom.umd.js">
            </script>
            <script type="text/javascript"
                src="<?= $base_url; ?>/assets/light-gallery/plugins/thumbnail/lg-thumbnail.umd.js"></script>
            <script type="text/javascript"
                src="<?= $base_url; ?>/assets/light-gallery/plugins/autoplay/lg-autoplay.umd.js"></script>

            <!-- venobox js -->
            <script type="text/javascript" src="<?= $base_url; ?>/assets/venobox/venobox.js"></script>
            <script type="text/javascript" src="<?= $base_url; ?>/assets/venobox/venobox.min.js"></script>



            <script>
                // Initialize and add the map
                function initMap() {
                    // The location of Uluru
                    const uluru = {
                        lat: -25.344,
                        lng: 131.031
                    };
                    // The map, centered at Uluru
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 4,
                        center: uluru,
                    });
                    // The marker, positioned at Uluru
                    const marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                    });
                }

                window.initMap = initMap;
            </script>




            <script>
                $('#featuresCarousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: true,
                    autoplayHoverPause: true,
                    animateOut: 'fadeOut',
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        1000: {
                            items: 1
                        }
                    }
                });

                $('#successCarousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    animateOut: 'fadeOut',
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });


                $('#testimonialCarousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    animateOut: 'fadeOut',
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        1000: {
                            items: 2
                        }
                    }
                });

                $('#roboStepCarousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
                    animateOut: 'fadeOut',
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        1000: {
                            items: 1
                        }
                    }
                });

                $('#reportCarousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
                    animateOut: 'fadeOut',
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        1000: {
                            items: 1
                        }
                    }
                });

                $('.banner-carousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    nav: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        1000: {
                            items: 1
                        }
                    }
                });
            </script>


            <script>
                $(document).ready(function () {

                    $('.year1').hover(function () {
                        $('.journey').removeClass('year2 year3 year4 year5 year6 year7 year8');
                        $('.journey').toggleClass('year year1');
                    });
                    $('.year2').hover(function () {
                        $('.journey').removeClass('year1 year3 year4 year5 year6 year7 year8');
                        $('.journey').toggleClass('year year2');
                    });
                    $('.year3').hover(function () {
                        $('.journey').removeClass('year1 year2 year4 year5 year6 year7 year8');
                        $('.journey').toggleClass('year year3');
                    });
                    $('.year4').hover(function () {
                        $('.journey').removeClass('year1 year2 year3 year5 year6 year7 year8');
                        $('.journey').toggleClass('year year4');
                    });
                    $('.year5').hover(function () {
                        $('.journey').removeClass('year1 year2 year3 year4 year6 year7 year8');
                        $('.journey').toggleClass('year year5');
                    });
                    $('.year6').hover(function () {
                        $('.journey').removeClass('year1 year2 year3 year4 year5 year7 year8');
                        $('.journey').toggleClass('year year6');
                    });
                    $('.year7').hover(function () {
                        $('.journey').removeClass('year1 year2 year3 year4 year5 year6 year8');
                        $('.journey').toggleClass('year year7');
                    });
                    $('.year8').hover(function () {
                        $('.journey').removeClass('year1 year2 year3 year4 year5 year6 year7');
                        $('.journey').toggleClass('year year8');
                    });
                });
            </script>

            <!-- <script>
  lightGallery(document.getElementById('tornadoLightGallery'))
</script> -->

            <script type="text/javascript">
                lightGallery(document.getElementById('tornadoLightGallery'), {
                    plugins: [lgThumbnail],
                    speed: 100,
                });

                lightGallery(document.getElementById('eliteLightGallery'), {
                    plugins: [lgThumbnail],
                    speed: 100,
                });

                lightGallery(document.getElementById('websiteLightGallery'), {
                    plugins: [lgThumbnail],
                    speed: 100,
                });
                lightGallery(document.getElementById('rvGalleryOne'), {
                    plugins: [lgThumbnail],
                    speed: 100,
                });
                lightGallery(document.getElementById('rvGalleryTwo'), {
                    plugins: [lgThumbnail],
                    speed: 100,
                });
                lightGallery(document.getElementById('rvGalleryThree'), {
                    plugins: [lgThumbnail],
                    speed: 100,
                });
            </script>

            <script>
                $(window).scroll(function () {
                    var scroll = $(window).scrollTop();
                    if (scroll >= 150) {
                        $('.header_main').addClass('sticky_header');
                    } else {
                        $('.header_main').removeClass('sticky_header');
                    }

                });
            </script>


            <script>
                $(document).ready(function () {
                    $('.toggle-btn.menu-btn').click(function () {
                        $('.header_main .navbar').addClass('show');
                    });
                    $('.close-menu-btn').click(function () {
                        $('.header_main .navbar').removeClass('show');
                    });
                });
            </script>

            <script>
                new WOW().init();
            </script>

            <script src="<?= $base_url; ?>/assets/js/modal-control.js"></script>
<script type="text/javascript">
                $(window).on('load', function () {
                    window.rvSetModal('#nfo_modal', 'show');

                });
                var video = document.querySelector('video');
                $('.btn-close').click(function () {
                    // video.pause();
                    window.rvSetModal('#nfo_modal', 'hide');
                });
            </script>

            <script>
                const window_load_modal = () => {
                    window.rvSetModal('.window_load_modal', 'show');

                }
                window_load_modal();
            </script>





            <!-- Copy Clipboard JS -->
            <script>
                const copyButton = document.getElementById("clickCopyString");
                if (copyButton) copyButton.onclick = function () {
                    copyToClipboard('<?php echo $base_url; ?>/blog<?php echo $slug_url; ?>');
                    this.classList.add("active");
                    setTimeout(() => {
                        this.classList.remove("active");
                    }, 1000);
                }

                function copyToClipboard(e) {
                    var tempItem = document.createElement('input');
                    tempItem.setAttribute('type', 'text');
                    tempItem.setAttribute('display', 'none');
                    let content = e;
                    if (e instanceof HTMLElement) {
                        content = e.innerHTML;
                    }
                    tempItem.setAttribute('value', content);
                    document.body.appendChild(tempItem);
                    tempItem.select();
                    document.execCommand('Copy');
                    tempItem.parentElement.removeChild(tempItem);
                }
                $(".accordion-item .heading").on("click", function (e) {
                    e.preventDefault();

                    if ($(this).closest(".accordion-item").hasClass("active")) {
                        $(".accordion-item").removeClass("active");
                    } else {
                        $(".accordion-item").removeClass("active");

                        $(this).closest(".accordion-item").addClass("active");
                    }
                    var $content = $(this).next();
                    $content.slideToggle(100);
                    $(".accordion-item .content").not($content).slideUp("fast");
                });
            </script>


        </body>

        </html>