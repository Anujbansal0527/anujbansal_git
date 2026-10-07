<?php
session_start();

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = trim($_POST['cname']);
	$arn = trim($_POST['arn']);
	$mobile = trim($_POST['mobile']);
	$captcha = trim($_POST['captcha']);

	// Validation
	if (empty($name) || empty($arn) || empty($mobile) || empty($captcha)) {
		echo '<p style="color: red;">All fields are required.</p>';
		exit;
	}

	if ($_SESSION['captcha'] !== $captcha) {
		echo '<p style="color: red;">Invalid captcha.</p>';
		exit;
	}

	$body = '<html><body>';
	$body .= '<table rules="all" style="border-color: #738691; color:#0b171e; border-radius:5px; width:100%;" cellpadding="10">';
	$body .= '<table rules="all" style="border-color: #666; color:#000;" cellpadding="10">';
	$body .= "<tr style='background: #eee;'><td><strong>Company Name:</strong> </td><td>" . $name . "</td></tr>";
	$body .= "<tr style='background: #eee;'><td><strong>ARN:</strong> </td><td>" . $arn . "</td></tr>";
	$body .= "<tr style='background: #eee;'><td><strong>Mobile:</strong> </td><td>" . $mobile . "</td></tr>";
	$body .= "</table>";
	$body .= "</body></html>";

	$subject = "Query from REDVision Landing Page";
	$mail = new PHPMailer();
	$mail->SMTPDebug = 3;
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "arun.redvision@gmail.com"; // Server Mail ID
	$mail->Password = 'REPLACE_WITH_PRIVATE_VALUE';
	$mail->SetFrom('arun.redvision@gmail.com'); // From Mail ID
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress("sumitkeliya@gmail.com"); //Recieve Mail ID
	$mail->AddCC("sumit.keliya@redvisionglobal.com");
	if (!$mail->Send()) {
		print "<p class='Error'>Problem in Sending Mail.</p>";
	} else {
		echo '<p style="color: green;">Mail sent succesfully, We will contact you soon</p>';
	}
} else {
	echo '<p style="color: red;">Invalid request.</p>';
}
