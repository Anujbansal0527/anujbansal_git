<?php 

$host = "localhost";
$user = "redtechn_user";
$pass = "REPLACE_WITH_PRIVATE_VALUE";
$data = "redtechn_databs";
$con = mysqli_connect($host,$user,$pass,$data);

$name                 = "Test"; 
$mobile               = "9898989898";
$email                = "arun.yadav@redvisionglobal.com";
$city                 = "Indore";
$contact_message      = "API Cron Testing";
$intersted            = "Testing";
$arn_no               = "12345";
$corner          = "Testing Mode";
$website              = 'redvisiontechnologies.com-test';

/*data insert in to db */

$s2 = mysqli_query($con,"INSERT INTO lms_api_testing(`name`, `email`, `mobile`, `arn`, `city`, `corner`, `message`) VALUES ('$name','$email','$mobile','$arn_no ','$city','$corner','$contact_message')");
    /*data insert in to db */
 /*=================== Using Api Send Mail And Message =================*/

                    
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

?>