<?php 
require("config.php");
include('phpmailer/smtp/PHPMailerAutoload.php');
$candidate_id = $_POST["candidate_status_id"];
$candidate_status = $_POST["candidate_status"];
$candidate_email = $_POST["candidate_email"];
echo $result = $candidate_id . '_' . $candidate_status;

$insert_join=mysqli_query($con,"update candidate_data set status='". $_POST["candidate_status"]."' WHERE id='".$_POST["candidate_status_id"]."'") or die(mysqli_error($con));

// $subject = "Career application status";
// $mail = new PHPMailer(); 
// // $mail->SMTPDebug=3;
// $mail->IsSMTP(); 
// $mail->SMTPAuth = true; 
// $mail->SMTPSecure = 'tls'; 
// $mail->Host = "smtp.gmail.com";
// $mail->Port = 587; 
// $mail->IsHTML(true);
// $mail->CharSet = 'UTF-8';
// $mail->Username = "webredvision@gmail.com"; // Server Mail ID
// $mail->Password = 'REPLACE_WITH_PRIVATE_VALUE';
// $mail->SetFrom('webredvision@gmail.com'); // From Mail ID
// $mail->Subject = $subject;
// $mail->Body = "You are Interview Scheduled";
// $mail->AddAddress($candidate_email); //Recieve Mail ID
// if(!$mail->Send()){
// }else{
// }


?>