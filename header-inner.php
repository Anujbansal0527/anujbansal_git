<?php
$base_url = "https://www.redvisiontechnologies.com";



?>
<?php include('include/allpageData.php'); ?>
<header class="header_main header_inner">
    <div class="top-bar">
        <div class="container container-xl">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <a class="navbar-brand mt-2 mt-lg-0" href="<?= $base_url; ?>">
                        <img class="logo2" src="<?= $base_url; ?>/assets/images/logo.png" alt="Logo1" />
                        <img class="logo1" src="<?= $base_url; ?>/assets/images/logo-white.png" alt="Logo2" />
                    </a>
                </div>
                <div class="col-md-9 col-lg-9 col-xl-9">
                    <div class="social">
                        <ul class="list-item">
                            <li><a href="https://www.facebook.com/redvisiontechnologies" target="_blank"
                                    aria-label="Facebook" rel="nofollow"><img
                                        src="<?= $base_url; ?>/assets/images/icons/facebook.svg" alt="facebook"></a>
                            </li>
                            <li><a href="https://twitter.com/redvisionindore" target="_blank" aria-label="Twitter"
                                    rel="nofollow"><img src="<?= $base_url; ?>/assets/images/icons/twitter.svg"
                                        alt="twitter"></a></li>
                            <li><a href="https://www.linkedin.com/company/redvisiontechnologies/" target="_blank"
                                    aria-label="Linkedin" rel="nofollow"><img
                                        src="<?= $base_url; ?>/assets/images/icons/linkedin.svg" alt="linkedin"></a>
                            </li>
                            <li><a href="https://www.instagram.com/redvisiontechnologies/" target="_blank"
                                    aria-label="Instagram" rel="nofollow"><img
                                        src="<?= $base_url; ?>/assets/images/icons/instagram.svg" alt="instagram"></a>
                            </li>
                            <li><a href="https://www.youtube.com/@redvisiontechnologies/" target="_blank"
                                    aria-label="Youtube" rel="nofollow"><img
                                        src="<?= $base_url; ?>/assets/images/icons/youtube.svg" alt="youtube"></a></li>
                            <li class="li-wa-icon"><a class="wa-icon" href="https://wa.me/+919039822000" target="_blank"
                                    aria-label="Whatsapp" rel="nofollow"><img
                                        src="<?= $base_url; ?>/assets/images/icons/whatsapp.svg" alt="whatsapp"></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Navbar -->
                    <span class="toggle-btn menu-btn d-none">
                        <i class="ti-menu-alt"></i>
                        <!-- <img src="assets/images/menu-bar.png" alt=""> -->
                    </span>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <span class="close-menu-btn d-none">
                            <i class="ti-close"></i>
                        </span>
                        <!-- Left links -->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $base_url; ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3" href="<?= $base_url; ?>/about.php">About Us</a>
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
                                    <!-- <a class="dropdown-item" href="https://salesninjacrm.com/" target="_">Sales
                                        Ninja</a> -->
                                </ul>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="<?= $base_url; ?>/digital-marketing.php">Digital Marketing</a>
                            </li> -->

                            <!-- <li class="nav-item">
                                <a class="nav-link px-3" href="<?= $base_url; ?>/career.php">Careers</a>
                            </li> -->
                            <li class="nav-item new-img-f">
                                <a class="nav-link px-3"
                                    href="<?= $rvuserinfo['base_url'] ?>/sales-crm-for-mutual-fund-distributors-in-india.php">Sales
                                    Ninja CRM <img
                                        src="<?= $rvuserinfo['base_url'] ?>/assets/salesninjacrm/new_ellipse_starburst.gif"
                                        class="img-b" alt="new_ellipse"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $base_url; ?>/success-stories.php">Success Stories</a>
                            </li>
                            <!--<li class="nav-item dropdown">-->
                            <!--  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">-->
                            <!--    Opportunities-->
                            <!--  </a>-->
                            <!--  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">-->
                            <!--    <a class="dropdown-item" href="career.php">Careers</a>-->
                            <!--    <a class="dropdown-item" href="integration-partner.php">Integrations</a>-->
                            <!--  </ul>-->
                            <!--</li>-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-mdb-toggle="dropdown" aria-expanded="false">
                                    MFDs Hub
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="<?= $base_url; ?>/pay-online.php">Pay Online</a>
                                    <a class="dropdown-item" href="<?= $base_url; ?>/invoice.php">IFA Zone</a>
                                    <a class="dropdown-item" href="<?= $base_url; ?>/utilities.php">Utilities</a>
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
                                    <a class="dropdown-item" href="<?= $base_url; ?>/contact.php">Contact Us</a>
                                    <a class="dropdown-item" href="<?= $base_url; ?>/integration-partner.php">Partner
                                        With Us</a>
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