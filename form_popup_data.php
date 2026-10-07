<?php session_start();
include('config.php');

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $popup_part  = $_POST["popup_part"];

    //////=====Contact Script Start Here =======///////
    if ($popup_part == 'requestpopup') {
        $action_popup = $_POST["action_popup"];

        if ($action_popup == 'not_self') {

            $pop_captcha = isset($_POST['pop_cap']) ? trim($_POST['pop_cap']) : '';

            if ($pop_captcha != $_SESSION['digit']) {
                echo json_encode(['status' => 'captcha_error', 'errors' => "Please Enter Correct Captcha"]);
            } else {

                $name                 = isset($_POST['pop_name']) ? trim($_POST['pop_name']) : '';
                $mobile               = isset($_POST['pop_mobile']) ? trim($_POST['pop_mobile']) : '';
                $email                = isset($_POST['pop_email']) ? trim($_POST['pop_email']) : '';
                $city                 = isset($_POST['pop_city']) ? trim($_POST['pop_city']) : '';
                $contact_message      = isset($_POST['pop_message']) ? trim($_POST['pop_message']) : '';
                $intersted            = isset($_POST['pop_service']) ? trim($_POST['pop_service']) : '';
                $arn_no               = isset($_POST['pop_arn']) ? trim($_POST['pop_arn']) : '';

                $corner          = "Request A Call";
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
