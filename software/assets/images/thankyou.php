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
          <div class="col-lg-12 col-md-12" data-aos="fade-right" data-aos-duration="1500">
            <!-- banner text -->
            <div class="banner_text text-center mt-5 mb-5">
              <h1>Thank You</h1>
            </div>
          </div>
        </div>
        <!-- row end -->
      </div>
      <!-- container end -->
    </section>
    <!-- Banner-Section-end -->

    <section class="section thankyou-section">
      <div class="container">

        <div class="content" data-aos="fade-in" data-aos-duration="1500">
          <?php
          $status = isset($_GET['status']) ? $_GET['status'] : '';
          $message = isset($_GET['message']) ? urldecode($_GET['message']) : '';
          if ($status == 'success') {
          ?>
            <div class="img">
              <img src="assets/images/success-img.gif">
            </div>
            <div class="title">
              <h2>Thank You for Your Interest</h2>
              <p><?php echo $message ?></p>
            </div>
          <?php
          } else {
          ?>
            <div class="img">
              <img src="assets/images/error-img.gif">
            </div>
            <div class="title">
              <h2>Thank You for Your Interest</h2>
              <p><?php echo $message ?></p>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </section>

    <?php include('includes/footer.php'); ?>
    <?php include('includes/foot.php'); ?>