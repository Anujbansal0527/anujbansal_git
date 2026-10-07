<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
include ('config.php');

$name = $_POST["name"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$arn = $_POST["arn"];
$ans1 = $_POST["surveyOne"];
$ans2 = $_POST["surveyTwo"];
$ans3 = $_POST["surveyThree"];
$ans4 = $_POST["surveyFour"];
$ans5 = $_POST["surveyFive"];


$ansFourOther = $_POST["surveyFourOption"];
$ansFiveOther = $_POST["surveyFiveOption"];




$subject = "Social Media Survey";
$message = '<html><body>';
$message .= '<table rules="all" style="border-color: #666; color:#000;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>". $_POST["name"] ."</td></tr>";
$message .= "<tr style='background: #eee;'><td><strong>Mobile:</strong> </td><td>".$_POST["mobile"]."</td></tr>";
$message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>".$_POST["email"]."</td></tr>";
$message .= "<tr style='background: #eee;'><td><strong>ARN No.:</strong> </td><td>".$_POST["arn"]."</td></tr>";
$message .= "<tr style='background: #eee;'><td><strong>Answer 1:</strong> </td><td>". $_POST["surveyOne"] ."</td></tr>";
$message .= "<tr style='background: #eee;'><td><strong>Answer 2:</strong> </td><td>". $_POST["surveyTwo"] ."</td></tr>";
$message .= "<tr style='background: #eee;'><td><strong>Answer 3:</strong> </td><td>". $_POST["surveyThree"] ."</td></tr>";
$message .= "<tr style='background: #eee;'><td><strong>Answer 4:</strong> </td><td>". $_POST["surveyFour"] ."</td></tr>";
$message .= "<tr style='background: #eee;'><td><strong>Answer 4 Other:</strong> </td><td>". $_POST["surveyFourOption"] ."</td></tr>";
$message .= "<tr style='background: #eee;'><td><strong>Answer 5:</strong> </td><td>". $_POST["surveyFive"] ."</td></tr>";
$message .= "<tr style='background: #eee;'><td><strong>Answer 5 Other:</strong> </td><td>". $_POST["surveyFiveOption"] ."</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
$toEmail = " redvision010716@gmail.com";
$mailHeaders = "From: " . $_POST["name"] . "<". $_POST["arn"] .">\r\n";
$mailHeaders .= "MIME-Version: 1.0\r\n";
$mailHeaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $sql = "SELECT * FROM online_survey WHERE arn = '$arn'";
	$query = mysqli_query($con, $sql);
	if (mysqli_num_rows($query) > 0) {
		echo json_encode(array('message' => 'The survey was previously filled with the ARN you entered.', 'status' => false));
	}
	else{
		echo json_encode(array('message' => 'Thank you, '. $_POST["name"] .', for your valuable feedback. We appreciate your time and input.', 'status' => true));
		if(mail($toEmail, $subject, $message, $mailHeaders)) {
		$query = "INSERT INTO online_survey(username, arn, email, mobile, ans_one, ans_two, ans_three, ans_four, ans_four_other, ans_five, ans_five_other) VALUES ('$name', '$arn', '$email', '$mobile', '$ans1', '$ans2', '$ans3', '$ans4', '$ansFourOther', '$ans5', '$ansFiveOther')";
		$runQ = mysqli_query($con, $query);

		$mfd_subject = "Social Media Survey";
		$mfd_message = '<html><body>';
		$mfd_message .= '<table rules="all" style="border:none; color:#000;" cellpadding="10">';
		$mfd_message .= "<tr style='border:none;'><td style='border:none;'>Dear ". $_POST["name"] .",</td></tr>";
		$mfd_message .= "<tr style='border:none;'><td style='border:none;'>Thank you for taking the time to share your feedback with us! Your insights are invaluable in helping us improve our services and better serve your needs. </td></tr>";
		$mfd_message .= "</table>";
		$mfd_message .= "</body></html>";

		$mfdmailHeader = "From: REDVision Technologies \r\n";
		$mfdmailHeader .= "MIME-Version: 1.0\r\n";
		$mfdmailHeader .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		mail($email, $mfd_subject, $mfd_message, $mfdmailHeader);
		
		}
		else {
		print "<p class='Error'>Problem in Sending Mail.</p>";
		}
	}


	

?>