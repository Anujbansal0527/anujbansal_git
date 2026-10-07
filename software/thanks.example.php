<?php session_start(); ?>
<?php ob_start(); ?>
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
    <section class="inner_banner_section">
      <div class="container container-xl">
        <div class="banner-content">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="title">
                <h2>Thank You</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <style>
      .thankssection {
        text-align: center;
        padding: 70px 0 30px 0;
      }

      .thankssection h1 i {
        display: block;
      }

      .thankssection h1 i::before {
        color: red;
      }


      .thankssection h1 i::before {
        color: #bb190d;
        font-weight: lighter;
        font-size: 23px;
        border: 1px solid #1ac05e;
        border-radius: 50%;
        height: 45px;
        width: 45px;
        padding: 10px;
      }

      .thankssection h1 i {
        display: block;
        margin-bottom: 20px;
      }

      .thankssection h1 {
        padding-bottom: 9px;
        margin: 0px 0 0px;
        text-align: center;
        display: block;
        font-size: 40px;
        color: #74b13d;
      }

      .thankssection p {
        color: #74b13d;
        font-size: 24px;
      }

      section.thankspage {
        background-color: #F5F5F5;
        padding-top: 20px;
        padding-bottom: 15px;
        margin-top: -22px;
      }


      .conectwithus h3 {
        font-size: 25px !important;
        margin-bottom: 10px !important;
        font-family: abel-regular !important;
        color: #1ac05e !important;
      }

      .conectwithus {
        text-align: center;
        margin-top: 60px;
      }

      .conectwithus ul li {
        display: inline-block;
        margin-left: 10px;
      }

      .conectwithus ul {
        padding-left: 0;
        margin-bottom: 2px;
      }

      .conectwithus ul li a {
        color: #000;
        font-size: 22px;
      }

      .conectwithus ul li a:hover {
        color: #bb190d;
      }


      .double_line {
        border-top: 1px solid #1ac05e;
        border-bottom: 1px solid #1ac05e;
        height: 3px;
        width: 18%;
        margin: 0 auto;
      }

      .watchproduct {
        margin-top: 60px;
      }

      .watchproduct .panel-heading {
        text-align: center;
      }

      section.thankspage .graw_bg {
        margin-top: 0;
      }
    </style>






    <section class="thankspage" id="thankspage">
      <div class="container graw_bg">
        <div class="row">
          <div class="col-xs-12 col-md-12 col-sm-12">
            <div class="row">

              <div class="main_section thankssection" id="thankssection">
                <div class="img">
                  <img src="assets/images/success-img.gif">
                </div>
                <h1 class="title">Thank you!</h1>

                <?php if (isset($_GET['req'])) { ?>
                  <p>Request already Submitted</p>
                <?php } elseif ($_GET['car'] == 'career') { ?>
                  <p>Thank you for your intrest, We will contact you Soon...</p>
                <?php
                } else { ?>
                  <p>You will get a call from us very shortly, Our team will help you untill you get success!!!</p>
                <?php } ?>


              </div>



            </div>
          </div>

        </div>
      </div>
    </section>

    <?php include('footer.php'); ?>
  </div><!----wrapper--->



  <?php
  $form_part  = $_POST["form_part"];

  //////=====Contact Script Start Here =======///////
  if ($form_part == 'contact') {
    $chk_action = $_POST["action_chk"];

    if ($chk_action == 'not_self') {
      $host = "localhost";
      $user = "redvisiontechnol_user";
      $pass = "REPLACE_WITH_PRIVATE_VALUE";
      $data = "redvisiontechnol_data";
      $con = mysqli_connect($host, $user, $pass, $data);

      $con_fil_value      = addslashes($_POST['con_cap']);
      $con_page_name      = $_POST['con_page_name'];

      if (isset($_POST['contact_us_submit'])) {

        if ($con_fil_value != $_SESSION['digit']) {
          header("location:https://redvisiontechnologies.com/rv-landing?con_new#contact_form_box");
        } else {

          $name                 = $_REQUEST['contact_name'];
          $mobile               = $_REQUEST['contact_mobile'];
          $email                = $_REQUEST['contact_email'];
          $city                 = $_REQUEST['contact_city'];
          $contact_message      = $_REQUEST['contact_message'];
          $intersted            = $_REQUEST['cal_option'];
          $arn_no               = $_REQUEST['contact_arn_No'];

          $corner          = "Contact Us Page";
          $to              = "query@redvisiontech.com";

          $to =          "sumit.web@redvisiontech.com";
          /*data insert in to db */
          $timezone        = date_default_timezone_set('Asia/Kolkata');

          $mail_time       =  date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A');

          //check mobile and arn is exits or not in prev 3 days
          $last_three_days = date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A', strtotime("-3 day"));

          $contact_query = "SELECT * FROM mail_details WHERE mobile = '" . $mobile . "' AND arn = '" . $arn_no . "' AND mail_time > '" . $last_three_days . "'";
          $result = mysqli_query($con, $contact_query);

          if (mysqli_num_rows($result) > 0) {
            header("location:https://redvisiontechnologies.com/rv-landing/thanks.php?req=err");
          } else {
            $mail_time =  date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A');
            $s2 = mysqli_query($con, "INSERT INTO mail_details(`name`, `email`, `mobile`, `arn`, `city`, `corner`, `message`, `mail_time`) VALUES ('$name','$email','$mobile','$arn_no ','$city','$corner','$contact_message','$mail_time')");
            /*data insert in to db */


            /*=================== Using Api Send Mail And Message =================*/

            $website              = 'redvisiontechnologies.com';
            $ch                   = curl_init();
            $url                  = "https://my-eoffice.com/lms_admin/api_lms_lead_submit.php";
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
            curl_setopt($ch, CURLOPT_POSTFIELDS, "name=$name&mobile=$mobile&email=$email&city=$city&intersted=$intersted&website=$website&arn_no=$arn_no&contact_message=$contact_message&corner=$corner"); // define what you want to post
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
            $output              = curl_exec($ch); // execute
            curl_close($ch); // close curl handle
            $result       = json_decode($output, true);
            $final        = $result['status'];
            /*============================= End =============================*/
          }
        }
      }
    }
  }
  /////////////==============Contact Script End  Here ===========/////////////////////////// 

  $popup_part  = $_POST["popup_part"];
  //////=====Request A Call Popup Script Start Here =======///////
  if ($popup_part == 'requestpopup') {
    $pop_action = $_POST["action_popup"];

    if ($pop_action == 'not_self') {
      $host = "localhost";
      $user = "redvisiontechnol_user";
      $pass = "REPLACE_WITH_PRIVATE_VALUE";
      $data = "redvisiontechnol_data";
      $con = mysqli_connect($host, $user, $pass, $data);

      $pop_fil_value      = addslashes($_POST['popup_captcha']);
      $pop_page_name      = $_POST['popup_page_name'];

      if (isset($_POST['popop_us_submit'])) {

        if ($pop_fil_value != $_SESSION['digit']) {
          header("location:https://redvisiontechnologies.com/rv-landing?con_new#contact_form_box");
        } else {

          $popname                 = $_REQUEST['popup_name'];
          $popmobile               = $_REQUEST['popup_mobile'];
          $popemail                = $_REQUEST['popup_email'];
          $popcity                 = $_REQUEST['popup_city'];
          $pop_message             = $_REQUEST['popup_message'];
          $popintersted            = $_REQUEST['pop_pro_option'];
          $poparn_no               = $_REQUEST['popup_arn_No'];

          $popcorner          = "Request A Callback Form";
          $to              = "query@redvisiontech.com";

          $to =          "sumit.web@redvisiontech.com";
          /*data insert in to db */
          $timezone        = date_default_timezone_set('Asia/Kolkata');

          $mail_time       =  date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A');

          //check mobile and arn is exits or not in prev 3 days
          $last_three_days = date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A', strtotime("-3 day"));

          $contact_query = "SELECT * FROM mail_details WHERE mobile = '" . $mobile . "' AND arn = '" . $arn_no . "' AND mail_time > '" . $last_three_days . "'";
          $result = mysqli_query($con, $contact_query);

          if (mysqli_num_rows($result) > 0) {
            header("location:https://redvisiontechnologies.com/rv-landing/thanks.php?req=err");
          } else {
            $mail_time =  date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A');
            $s2 = mysqli_query($con, "INSERT INTO mail_details(`name`, `email`, `mobile`, `arn`, `city`, `corner`, `message`, `mail_time`) VALUES ('$popname','$popemail','$popmobile','$poparn_no ','$popcity','$popcorner','$pop_message','$mail_time')");
            /*data insert in to db */


            /*=================== Using Api Send Mail And Message =================*/

            $popwebsite              = 'redvisiontechnologies.com';
            $ch                   = curl_init();
            $url                  = "https://my-eoffice.com/lms_admin/api_lms_lead_submit.php";
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
            curl_setopt($ch, CURLOPT_POSTFIELDS, "name=$popname&mobile=$popmobile&email=$popemail&city=$popcity&intersted=$popintersted&website=$popwebsite&arn_no=$poparn_no&contact_message=$pop_message&corner=$popcorner"); // define what you want to post
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
            $output              = curl_exec($ch); // execute
            curl_close($ch); // close curl handle
            $result       = json_decode($output, true);
            $final        = $result['status'];
            /*============================= End =============================*/
          }
        }
      }
    }
  }
  /////////////==============Request A Call Popup Script End  Here ===========/////////////////////////// 

  ?>


</body>
<script>
  document.onkeydown = function(e) {
    if (event.keyCode == 123) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)) {
      return false;
    }
  }
</script>

<?php include('includes/foot.php'); ?>