<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include ('config.php');
session_start();
if(isset($_POST['careerSubmit']))
{
	$from_email         = $_POST['vacancyemail']; //from mail, sender email addrress
    $recipient_email    = 'hr@redvisionglobal.com'; //recipient email addrress
    // $recipient_email    = 'sumit.web@redvisiontech.com'; //recipient email addrress
     
    //Load POST data from HTML form
    $sender_name    = $_POST['vacancyname']; //sender name
    $reply_to_email = 'hr@redvisionglobal.com'; //sender email, it will be used in "reply-to" header
    //$reply_to_email = 'sumit.web@redvisiontech.com'; //sender email, it will be used in "reply-to" header
    //$subject        = $_POST["subject"] //subject for the email
    //$message        = $_POST["message"] //body of the email
    $subject = "Resume & CV REDVision ";
	$message = '<html><body>';
	$message .= '<table rules="all" style="border-color: #666; color:#000;" cellpadding="10">';
	$message .= "<tr style='background: #eee;'><td><strong>Position:</strong> </td><td>". $_POST['position'] ."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>". $_POST['vacancyname'] ."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>".$_POST['vacancyemail']."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>Phone:</strong> </td><td>". $_POST['vacancymobile'] ."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>Current CTC:</strong> </td><td>". $_POST['current_ctc'] ."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>Expected CTC:</strong> </td><td>". $_POST['expected_ctc'] ."</td></tr>";
	$message .= "<tr style='background: #eee;'><td><strong>Notice Period:</strong> </td><td>". $_POST['notice_period'] ."</td></tr>";
	// $message .= "<tr style='background: #eee;'><td><strong>resume:</strong> </td><td>". $_FILES['resume']['tmp_name'] ."</td></tr>";
	$message .= "</table>";
	$message .= "</body></html>"; 
 
    /*Always remember to validate the form fields like this
    if(strlen($sender_name)<1)
    {
        die('Name is too short or empty!');
    }
    */
     
    //Get uploaded file data using $_FILES array
    $tmp_name    = $_FILES['resume']['tmp_name']; // get the temporary file name of the file on the server
    $name        = $_FILES['resume']['name'];  // get the name of the file
    $size        = $_FILES['resume']['size'];  // get size of the file for size validation
    $type        = $_FILES['resume']['type'];  // get type of the file
    $error       = $_FILES['resume']['error']; // get the error (if any)
 
    //validate form field for attaching the file
    // if($file_error > 0)
    // {
    //     die('Upload error or No files uploaded');
    // }
 
    //read from the uploaded file & base64_encode content
    $handle = fopen($tmp_name, "r");  // set the file handle only for reading the file
    $content = fread($handle, $size); // reading the file
    fclose($handle);                  // close upon completion
 
    $encoded_content = chunk_split(base64_encode($content));
 
    $boundary = md5("random"); // define boundary with a md5 hashed value
 
    //header
    $headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version
    $headers .= "From:".$from_email."\r\n"; // Sender Email
    $headers .= "Reply-To: ".$reply_to_email."\r\n"; // Email addrress to reach back
    $headers .= "Content-Type: multipart/mixed;"; // Defining Content-Type
    $headers .= "boundary = $boundary\r\n"; //Defining the Boundary
         
    //plain text
    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= chunk_split(base64_encode($message));
         
    //attachment
    $body .= "--$boundary\r\n";
    $body .="Content-Type: $type; name=".$name."\r\n";
    $body .="Content-Disposition: attachment; filename=".$name."\r\n";
    $body .="Content-Transfer-Encoding: base64\r\n";
    $body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";
    $body .= $encoded_content; // Attaching the encoded file with email
     
    

    $date=date('Y-m-d');
    $target_path = "careerdata/";
    $total=15728640;
    $size=$_FILES['resume']['size'];
    if($total>=$size)
    {
        $file_name_path=$_FILES['resume'];
        $filename=$_FILES['resume']['name'];
        if($filename!='')
        {
            $nm = strrev($_FILES['resume']['name']);
            $nmar = explode(".",$nm);
            $ext = strrev($nmar[0]);
            if(($ext=="pdf") || ($ext=="doc"))
            {
                $id=uniqid();
                $target_path = $target_path.basename($id);
                if ($file_name_path["type"] == "application/pdf")
                    $target_path = $target_path.".pdf";
                if ($file_name_path["type"] == "application/msword")
                    $target_path = $target_path.".doc";
                // if ($file_name_path["type"] == "image/jpg")
                //     $target_path = $target_path.".jpg";
                // if ($file_name_path["type"] == "image/png")
                //     $target_path = $target_path.".png";
                if(move_uploaded_file($file_name_path['tmp_name'],$target_path))
                {
                    $file=substr($target_path,6);
                    $insert_join=mysqli_query($con,"insert into candidate_data set candidate='". $_POST['vacancyname'] ."', email='". $_POST['vacancyemail'] ."', mobile='". $_POST['vacancymobile'] ."', job='". $_POST['position'] ."', resume='".$target_path."', ctc='". $_POST['current_ctc'] ."',  expected_ctc='". $_POST['expected_ctc'] ."', notice_period='". $_POST['notice_period'] ."'");

                    $sentMailResult = mail($recipient_email, $subject, $body, $headers);
 
                   if($sentMailResult ){
                    ?>
                        <script type="text/javascript">
                            window.location.href="thanks.php?car=career";
                        </script>
                        <?php
                     } 
                    else {
              
                    ?>
        <script type="text/javascript">
            alert('Problem in Sending Mail.')

        </script>
        <?php
                    }


                    
                }
                else
                {
                    ?>
        <script type="text/javascript">
            alert("There was an error uploading the file, please try again!")
        </script>
        <?php
                }
            }
            else
            {
                  ?>
        <script type="text/javascript">
            alert("File Type Not Supported, Please upload PDF OR DOC File");
            window.location.href="career.php#applyNow";
        </script>
        <?php
            }
        }
        else
        {
            ?>
        <script type="text/javascript">
            alert("Please select a file")
        </script>
        <?php
        }
    }else{
        ?>
        <script type="text/javascript">
            alert("File size should be less than 15MB!!")
        </script>
        <?php
    }
   

    } 
    ?>
