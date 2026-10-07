<?php session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $form_part  = $_POST["form_part"];

    //////=====Contact Script Start Here =======///////
    if ($form_part == 'contact') {
        $chk_action = $_POST["action_chk"];

        if ($chk_action == 'not_self') {

            $con_captcha = isset($_POST['con_cap']) ? trim($_POST['con_cap']) : '';

            if ($con_captcha != $_SESSION['digit']) {
                echo json_encode(['status' => 'captcha_error', 'errors' => "Please Enter Correct Captcha"]);
            } else {

                $name                 = isset($_POST['contact_name']) ? trim($_POST['contact_name']) : '';
                $mobile               = isset($_POST['contact_mobile']) ? trim($_POST['contact_mobile']) : '';
                $email                = isset($_POST['contact_email']) ? trim($_POST['contact_email']) : '';
                $city                 = isset($_POST['contact_city']) ? trim($_POST['contact_city']) : '';
                $contact_message      = isset($_POST['contact_message']) ? trim($_POST['contact_message']) : '';
                $intersted            = isset($_POST['cal_option']) ? trim($_POST['cal_option']) : $_POST['service'];
                $arn_no               = isset($_POST['contact_arn_No']) ? trim($_POST['contact_arn_No']) : '';

                $corner          = "Contact Us Page";
                $to =          "sumit.keliya@redvisionglobal.com";

                /*data insert in to db */
                $timezone        = date_default_timezone_set('Asia/Kolkata');

                $mail_time       =  date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A');

                //check mobile and arn is exits or not in prev 3 days
                $last_three_days = date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A', strtotime("-3 day"));

                $contact_query = "SELECT * FROM leads WHERE mobile = '" . $mobile . "' AND arn = '" . $arn_no . "' AND mail_time > '" . $last_three_days . "'";
                $result = mysqli_query($con, $contact_query);

                if (mysqli_num_rows($result) > 0) {
                   echo json_encode(['status' => 'existing_error', 'errors' => "Request already Submitted"]);
               } else {
                    $mail_time =  date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A');
                    $s2 = mysqli_query($con, "INSERT INTO leads(`name`, `email`, `mobile`, `arn`, `city`, `corner`, `message`, `mail_time`) VALUES ('$name','$email','$mobile','$arn_no ','$city','$corner','$contact_message','$mail_time')");
                    /*data insert in to db */

                    /*=================== Using Api Send Mail And Message =================*/

                    $website              = 'redvisiontechnologies.com';
                    $ch                   = curl_init();
                    $url                  = "https://wealthelite.in/Login/login/submit-request-call-back-right";
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
                    curl_setopt($ch, CURLOPT_POSTFIELDS, "name=$name&mobile=$mobile&email=$email&city=$city&intersted=$intersted&website=$website&arnno=$arn_no&contact_message=$contact_message&corner=$corner"); // define what you want to post
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
                    $output              = curl_exec($ch); // execute
                    curl_close($ch); // close curl handle
                    $result       = json_decode($output, true);
                    $final        = $result['status'];
                    /*============================= End =============================*/

                    // Response
                    if ($final == 1) {
                        echo json_encode(['status' => 'success', 'message' => 'Form submitted successfully!']);
                    } else {
                        echo json_encode(['status' => 'error', 'errors' => "Somthing went wrong please try again"]);
                    }
                }
            }
        }
    }
}
