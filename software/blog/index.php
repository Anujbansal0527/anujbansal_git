
<?php
include('../includes/config.php');
include('../includes/function.php');
$base_url = 'https://www.redvisiontechnologies.com/software';
if ($_SERVER['ORIG_PATH_INFO']) {
  $slug_url = addslashes(trim($_SERVER['ORIG_PATH_INFO']));
  $query = "SELECT * FROM post where slug_url='$slug_url'";
  $query_run = mysqli_query($con, $query);
  $post = mysqli_fetch_assoc($query_run);
  $post_id = $post['id'];
  $canonical =  $base_url . $_SERVER[REQUEST_URI];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Favicon -->
    <link rel="icon" href="<?=$base_url;?>/assets/images/favicon.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$post['meta_title'];?></title>
    <meta name="description" content="<?=$post['meta_description'];?>">
    <meta name="keywords" content="<?=$post['meta_keywords'];?>"/>
    <meta name="author" content="REDVision Technologies Pvt. Ltd.">
    <link rel="canonical" href="<?=$canonical;?>">
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=$base_url;?>/assets/images/favicon.png" type="image/x-icon">
        <!-- icofont-css-link -->
        <link rel="stylesheet" href="<?=$base_url;?>/assets/css/icofont.min.css">
        <!-- Owl-Carosal-Style-link -->
        <link rel="stylesheet" href="<?=$base_url;?>/assets/css/owl.carousel.min.css">
        <!-- Bootstrap-Style-link -->
        <link rel="stylesheet" href="<?=$base_url;?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Aos-Style-link -->
        <link rel="stylesheet" href="<?=$base_url;?>/assets/css/aos.css">
        <!-- Coustome-Style-link -->
        <link rel="stylesheet" href="<?=$base_url;?>/assets/css/style.css">
        <!-- Responsive-Style-link -->
        <link rel="stylesheet" href="<?=$base_url;?>/assets/css/responsive.css">

  </head>
  <body>
    <!-- BANNER -->
    <!-- /BANNER -->
  <!-- Header Start -->
<header>
    <!-- container start -->
    <div class="container">
        <!-- navigation bar -->
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="<?=$base_url;?>/best-mutual-fund-software.php">
                <img src="<?=$base_url;?>/assets/images/logo.png" alt="image">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <!-- <i class="icofont-navigation-menu ico_menu"></i> -->
                    <div class="toggle-wrap">
                        <span class="toggle-bar"></span>
                    </div>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!-- secondery menu start -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>/best-mutual-fund-software.php#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>/best-mutual-fund-software.php#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>/best-mutual-fund-software.php#whyUs">Why Choose Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>/best-mutual-fund-software.php#blogs">Blogs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>/best-mutual-fund-software.php#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dark_btn" href="<?= $base_url ?>/best-mutual-fund-software.php#contact">GET STARTED</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- navigation end -->
    </div>
    <!-- container end -->
</header>
<main>

<section class="inner-banner-section">
<div class="container container-xl">
<div class="banner-content">
<div class="row">
    <div class="col-md-6 col-lg-6">
      <div class="title wow fadeInLeft" data-wow-delay="0.2s">
       <h2><?= $post['title'] ?></h2>
    </div>
    </div>
    </div>
</div>
</div>
  </section>

    <section class="section blog_section">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div class="post-detail">
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
                  <a class="badge bg-primary"><?= date('F jS, Y', strtotime($post['added_on'])) ?></a>
                </span>
                <!--<span class="category">-->
                <!--  <a class="badge bg-secondary"><?= getCategory($con, $post['category_id']) ?></a>-->
                <!--</span>-->
              </div>
              <div class="view_img">
                <img class="d-block w-100" src="https://www.redvisiontechnologies.com/assets/images/admin/blog/<?= $post['image'] ?>" alt="">
              </div>
              <div class="blog-content">
                <p class=""><?= $post['content'] ?></p>
              </div>
              <div class="social-media-share">
                <h4>Share On Social Media</h4>
                <ul>
                  <li><a href="http://www.facebook.com/sharer.php?u=<?= $base_url; ?>/blog<?= $post['slug_url'] ?>" aria-label="Facebook" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="bi bi-facebook"></i></a></li>
                  <li><a href="http://twitter.com/share?url=<?= $base_url; ?>/blog<?= $post['slug_url'] ?>" aria-label="Twitter" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="bi bi-twitter"></i></a></li>
                  <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?= $base_url; ?>/blog<?= $post['slug_url'] ?>" aria-label="Linkedin" target="_blank" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="bi bi-linkedin"></i></a></li>
                  <li><a href="https://telegram.me/share?url=<?= $base_url; ?>/blog<?= $post['slug_url'] ?>" aria-label="Telegram" target="_blank" data-toggle="tooltip" data-placement="top" title="Telegram"><i class="bi bi-telegram"></i></a></li>

                  <li><a href="whatsapp://send?text=<?= $base_url; ?>/blog<?= $post['slug_url'] ?>" aria-label="Whatsapp" target="_blank" data-toggle="tooltip" data-placement="top" title="Whatsapp"><i class="bi bi-whatsapp"></i></a></li>
                  <li><a href="mailto:?Subject=Article &Body=<?= $base_url; ?>/blog<?= $post['slug_url'] ?>" aria-label="gmail" target="_blank" data-toggle="tooltip" data-placement="top" title="Email"><i class="bi bi-google"></i></a></li>
                  <li><span id="clickCopyString" aria-label="Copy" data-toggle="tooltip" data-placement="top" title="Copy Link"><i class="bi bi-file-earmark-text"></i></span></li>
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
                    <div class="image"><img src="https://www.redvisiontechnologies.com/assets/images/admin/blog/<?php echo $post['image']; ?>" alt="" width="80px"></div>
                    <a href="<?= $base_url; ?>/blog<?= $post['slug_url'] ?>"><?php echo $post['title']; ?></a>
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
    <link rel="icon" href="<?=$base_url;?>/assets/images/favicon.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$post['meta_title'];?></title>
    <meta name="description" content="<?=$post['meta_description'];?>">
    <meta name="keywords" content="<?=$post['meta_keywords'];?>"/>
    <meta name="author" content="REDVision Technologies Pvt. Ltd.">
    <link rel="canonical" href="<?=$canonical;?>">
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=$base_url;?>/assets/images/favicon.png" type="image/x-icon">
        <!-- icofont-css-link -->
        <link rel="stylesheet" href="<?=$base_url;?>/assets/css/icofont.min.css">
        <!-- Owl-Carosal-Style-link -->
        <link rel="stylesheet" href="<?=$base_url;?>/assets/css/owl.carousel.min.css">
        <!-- Bootstrap-Style-link -->
        <link rel="stylesheet" href="<?=$base_url;?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Aos-Style-link -->
        <link rel="stylesheet" href="<?=$base_url;?>/assets/css/aos.css">
        <!-- Coustome-Style-link -->
        <link rel="stylesheet" href="<?=$base_url;?>/assets/css/style.css">
        <!-- Responsive-Style-link -->
        <link rel="stylesheet" href="<?=$base_url;?>/assets/css/responsive.css">
        
  </head>
  <body>
    <!-- BANNER -->
    <!-- /BANNER -->
  <!-- Header Start -->
<header>
    <!-- container start -->
    <div class="container">
        <!-- navigation bar -->
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="<?=$base_url;?>/best-mutual-fund-software.php">
                <img src="<?=$base_url;?>/assets/images/logo.png" alt="image">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <!-- <i class="icofont-navigation-menu ico_menu"></i> -->
                    <div class="toggle-wrap">
                        <span class="toggle-bar"></span>
                    </div>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!-- secondery menu start -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>/best-mutual-fund-software.php#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>/best-mutual-fund-software.php#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>/best-mutual-fund-software.php#whyUs">Why Choose Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>/best-mutual-fund-software.php#blogs">Blogs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>/best-mutual-fund-software.php#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dark_btn" href="<?= $base_url ?>/best-mutual-fund-software.php#contact">GET STARTED</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- navigation end -->
    </div>
    <!-- container end -->
</header>
<main>

<section class="inner-banner-section">
<div class="container container-xl">
<div class="banner-content">
<div class="row">
    <div class="col-md-6 col-lg-6">
      <div class="title wow fadeInLeft" data-wow-delay="0.2s">
       <h2>Blog</h2>
    </div>
    </div>
    </div>
</div>
</div>
  </section>

       <section id="blogs" class="row_am latest_story" id="blog">
        <div class="container">
          <div class="row">
            <?php
          $query = "SELECT * FROM post ORDER BY id DESC";
          $query_run = mysqli_query($con, $query);
          while ($post = mysqli_fetch_array($query_run)) {
          ?>

              <div class="col-sm-4">
               <div class="story_box mb-3" data-aos="fade-up" data-aos-duration="1500">
                <div class="story_img">
                  <a href="<?=$base_url;?>/blog<?= $post['slug_url'] ?>"><img src="https://www.redvisiontechnologies.com/assets/images/admin/blog/<?php echo $post['image']; ?>" alt="Blog Images"></a>
                  <span class="meta-date"><i class="fa fa-calendar"></i> <?= date('j F Y', strtotime($post['added_on'])) ?></span>
                </div>
                <div class="story_text">
                  <div class="date">

                  </div>
                  <di class="blog_page_title pb-1">
                    <h3> <?php echo $post['title']; ?></h3>
                  </di>
                  <div class="blog_page_button">
                    <a href="<?=$base_url;?>/blog<?= $post['slug_url'] ?>" class="btn btn-line-dark">Read More <i class="fa fa-long-arrow-right"></i></a>
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

    <!-- News-Letter-Section-Start -->
    <section id="contact" class="newsletter_section">
      <!-- container start -->
      <div class="container">
        <div class="newsletter_box">
          <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
            <h2>Enquire Today's Best Offer For You</h2>

            <div class="row">
              <?php include('../form.php'); ?>
            </div>
          </div>
        </div>
      </div>
      <!-- container end -->
    </section>
    <!-- News-Letter-Section-end -->
<!-- Footer-Section start -->
<footer>
    <div class="top_footer" id="contact">
        <!-- container start -->
        <div class="container">
            <!-- row start -->
            <div class="row">
                <!-- footer link 1 -->
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="abt_side">
                        <div class="logo"> <img src="https://www.redvisiontechnologies.com/assets/images/logo-white.png" alt="image"></div>
                        <ul>
                            <li><a href="#"><i class="icofont-ui-call"></i> +91 9999999999</a></li>
                            <li><a href="#"><i class="icofont-envelope"></i> info@redvisiontechnologies.com</a></li>
                            <li><a href="#"><i class="icofont-google-map"></i> 101, 45 Hare Krishna Vihar, Behind Advanced Academy, Nipania, Indore, 452010 (MP)</a></li>

                        </ul>
                        <ul class="social_media">
                            <li><a href="https://www.facebook.com/redvisiontechnologies" target="_blank"><i class="icofont-facebook"></i></a></li>
                            <li><a href="https://twitter.com/redvisionindore" target="_blank"><i class="icofont-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/redvisiontechnologies" target="_blank"><i class="icofont-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/redvisiontechnologies" target="_blank"><i class="icofont-linkedin"></i></a></li>
                            <li><a href="https://www.youtube.com/@redvisiontechnologies" target="_blank"><i class="icofont-youtube"></i></a></li>
                            <li><a href="https://wa.me/+919039822000" target="_blank"><i class="icofont-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- footer link 2 -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="links">
                        <h3>Useful Links</h3>
                        <ul>
                            <li><a href="<?= $base_url ?>/best-mutual-fund-software.php#features">Features</a></li>
                            <li><a href="<?= $base_url ?>/best-mutual-fund-software.php#whyUs">Why Us</a></li>
                            <li><a href="<?= $base_url ?>/best-mutual-fund-software.php#services">Services</a></li>
                            <li><a href="<?= $base_url ?>/blog">Blog</a></li>
                            <li><a href="<?= $base_url ?>/best-mutual-fund-software.php#contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <!-- footer link 4 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="try_out">
                        <h3>Let’s Try Out</h3>
                        <ul class="app_btn">
                            <li>
                                <a href="https://play.google.com/store/apps/details?id=com.redvision.wealth_elite&hl=en&gl=US" target="_blank">
                                    <img src="<?= $base_url ?>/assets/images/appstore.png" alt="image">
                                </a>
                            </li>
                            <li>
                                <a href="https://apps.apple.com/us/app/wealth-elite/id1518518606" target="_blank">
                                    <img src="<?= $base_url ?>/assets/images/googleplay.png" alt="image">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container end -->
    </div>

    <!-- last footer -->
    <div class="bottom_footer">
        <!-- container start -->
        <div class="container">
            <!-- row start -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>© Copyrights <?= date('Y') ?>. All rights reserved.</p>
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container end -->
    </div>

    <!-- go top button -->
    <div class="go_top">
        <span><i class="icofont-long-arrow-up"></i></span>
    </div>
</footer>
<!-- Footer-Section end -->

<!-- VIDEO MODAL -->
<div class="modal fade youtube-video" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button id="close-video" type="button" class="button btn btn-default text-right" data-dismiss="modal">
                <i class="icofont-close-line-circled"></i>
            </button>
            <div class="modal-body">
                <div id="video-container" class="video-container">
                    <iframe id="youtubevideo" src="#" width="640" height="360" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="purple_backdrop"></div>

</div>
<!-- Page-wrapper-End -->

<!-- Jquery-js-Link -->
<script src="<?=$base_url;?>/assets/js/jquery.js"></script>
<!-- owl-js-Link -->
<script src="<?=$base_url;?>/assets/js/owl.carousel.min.js"></script>
<!-- bootstrap-js-Link -->
<script src="<?=$base_url;?>/assets/js/bootstrap.min.js"></script>
<!-- aos-js-Link -->
<script src="<?=$base_url;?>/assets/js/aos.js"></script>
<script src="<?=$base_url;?>/assets/js/gsap.js"></script>
<script src="<?=$base_url;?>/assets/js/gsap-scroll-to-plugin.js"></script>
<script src="<?=$base_url;?>/assets/js/gsap-scroll-smoother.js"></script>
<script src="<?=$base_url;?>/assets/js/gsap-scroll-trigger.js"></script>
<script src="<?=$base_url;?>/assets/js/gsap-split-text.js"></script>
<script src="<?=$base_url;?>/assets/js/chroma.min.js"></script>
<!-- main-js-Link -->
<script src="<?=$base_url;?>/assets/js/main.js"></script>
<script src="<?=$base_url;?>/assets/js/style.js"></script>

</body>

</html>