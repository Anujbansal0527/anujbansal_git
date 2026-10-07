<?php session_start(); ?>
<?php ob_start();
include('header.php');

    $rvba_form_part  = $_POST["rvba_form_part"];

    //////=====Brand Ambassador Program Script Start Here =======///////
    if ($rvba_form_part == 'rvba_form_value') {
        $rvba_action_check = $_POST["rvba_action_check"];

        if ($rvba_action_check == 'not_self') {
            $host = "localhost";
            $user = "redtechnologies_user";
            $pass = "REPLACE_WITH_PRIVATE_VALUE";
            $data = "redtechnologies_databs";
            $con = mysqli_connect($host, $user, $pass, $data);

            $rvba_cap_value      = addslashes($_POST['rvba_captcha']);
            $con_page_name      = $_POST['con_page_name'];

            if (isset($_POST['rvba_submit'])) {

                if ($rvba_cap_value != $_SESSION['digit']) {
                    header("location:https://redvisiontechnologies.com/brand-ambassador/thankyou.php");
                } else {

                    $name                 = $_REQUEST['rvba_name'];
                    $mobile               = $_REQUEST['rvba_mobile'];
                    $email                = $_REQUEST['rvba_email'];
                    $city                 = $_REQUEST['rvba_city'];
                    $intersted            = $_REQUEST['rvba_product_option'];
                    $arn_no               = $_REQUEST['rvba_arn_no'];

                    $corner          = "REDVision Brand Ambassador Program Page";
                    $to              = "query@redvisiontech.com";

                    $to =          "sumit.web@redvisiontech.com";
                    /*data insert in to db */
                    $timezone        = date_default_timezone_set('Asia/Kolkata');

                    $mail_time       =  date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A');

                    //check mobile and arn is exits or not in prev 3 days
                    $last_three_days = date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A', strtotime("-3 day"));

                    $contact_query = "SELECT * FROM rvba_details WHERE mobile = " . $mobile . " AND arn = " . $arn_no . " AND mail_time > '" . $last_three_days . "'";
                    $result = mysqli_query($con, $contact_query);

                    if (mysqli_num_rows($result) > 0) {
                        header("location:https://redvisiontechnologies.com/brand-ambassador/thankyou.php?req=error");
                    } else {
                        $mail_time =  date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A');
                        $s2 = mysqli_query($con, "INSERT INTO rvba_details(`name`, `email`, `mobile`, `arn`, `city`, `interest`, `corner`, `mail_time`) VALUES ('$name','$email','$mobile','$arn_no ','$city', '$intersted ','$corner','$mail_time')");
                        /*data insert in to db */


                        /*=================== Using Api Send Mail And Message =================*/

                        $website              = 'REDVision Brand Ambassador';
                        $ch                   = curl_init();
                        $url                  = "https://my-eoffice.com/lms_admin/api_lms_lead_submit.php";
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
                        curl_setopt($ch, CURLOPT_POSTFIELDS, "name=$name&mobile=$mobile&email=$email&city=$city&intersted=$intersted&website=$website&arn_no=$arn_no&corner=$corner"); // define what you want to post
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
    /////////////==============Brand Ambassador Program Script End  Here ===========/////////////////////////// 
?>

<section class="section thankspage-section" id="thankspage">
    <div class="container">
        <div class="thankyou-box">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="img">
                        <img src="assets/images/success-img.gif">
                    </div>
                    <h1 class="title">Thank you!</h1>
                    <?php if ($_GET['req'] == 'error') { ?>
                        <p>Request already Submitted</p>
                    <?php }  else { ?>
                        <p>Thank you for your interest, We will contact you Soon...</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</section>

<?php include('footer.php'); ?>