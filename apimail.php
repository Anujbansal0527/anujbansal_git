<?php ob_start();
$form_part = $_POST["form_part"];
//////=====Contact Script Start Here =======///////
if ($form_part == 'contact') {
  $chk_action = $_POST["action_chk"];

  if ($chk_action == 'not_self') {

    $con_fil_value = addslashes($_POST['con_cap']);
    $con_page_name = $_POST['con_page_name'];

    if (isset($_POST['contact_us_submit'])) {

      echo $name = $_REQUEST['contact_name'];
      echo "</br>";
      echo $mobile = $_REQUEST['contact_mobile'];
      echo "</br>";
      echo $email = $_REQUEST['contact_email'];
      echo "</br>";
      echo $city = $_REQUEST['contact_city'];
      echo "</br>";
      echo $contact_message = $_REQUEST['contact_message'];
      echo "</br>";
      echo $intersted = $_REQUEST['cal_option'];
      echo "</br>";
      echo $arn_no = $_REQUEST['contact_arn_No'];
      echo "</br>";

      $corner = "Contact Us Page";
      /*data insert in to db */
      $timezone = date_default_timezone_set('Asia/Kolkata');

      $mail_time = date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A');

      //check mobile and arn is exits or not in prev 3 days
      $last_three_days = date('m' . '/' . 'd' . '/' . 'y' . ',' . 'h' . ':' . 'i' . ':' . 's' . ':' . 'A', strtotime("-3 day"));


      /*=================== Using Api Send Mail And Message =================*/

      $website = 'redvisiontechnologies.com';
      $ch = curl_init();
      $url = "https://my-eoffice.com/lms_admin/api_lms_lead_submit.php";
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, true);  // tell curl you want to post something
      curl_setopt($ch, CURLOPT_POSTFIELDS, "name=$name&mobile=$mobile&email=$email&city=$city&intersted=$intersted&website=$website&arn_no=$arn_no&contact_message=$contact_message&corner=$corner"); // define what you want to post
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
      $output = curl_exec($ch); // execute
      curl_close($ch); // close curl handle
      $result = json_decode($output, true);
      $final = $result['status'];
      echo "Status:" . $final;
      echo "</br>";
      $message = $result['msg'];
      echo "Message:" . $message;
      /*============================= End =============================*/
    }
  }
}
/////////////==============Contact Script End  Here ===========/////////////////////////// 
?>

<script>
  document.onkeydown = function (e) {
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