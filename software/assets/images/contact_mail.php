<?php

// Get form data
$name = $_POST['userName'];
$mobile = $_POST['userMobile'];
$email = $_POST['userEmail'];
$arn_no = $_POST['arnNo'];

$final = 0;

/*=================== Using Api Send Mail And Message =================*/
// $corner          = "REDVision Landing Page";
// $website              = 'redvisiontechnologies.com';
// $ch                   = curl_init();
// $url                  = "https://my-eoffice.com/lms_admin/api_lms_lead_submit.php";
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
// curl_setopt($ch, CURLOPT_POSTFIELDS, "name=$name&mobile=$mobile&email=$email&city=''&intersted=''&website=$website&arn_no=$arn_no&contact_message=''&corner=$corner"); // define what you want to post
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
// $output              = curl_exec($ch); // execute
// curl_close($ch); // close curl handle
// $result       = json_decode($output, true);
// $final        = $result['status'];



if ($final === 1) {
	echo json_encode(['status' => $final, 'message' => 'Form submitted successfully! We will get back to you shortly with the details of our most recent offer.']);
} else {
	echo json_encode(['status' => $final, 'message' => 'Failed to submit form. Please try again later.']);
}
/*============================= End =============================*/
