<?php require("include/config.php");
require("include/session.php");
if (isset($_GET['f'])) {
	$select_admin = mysqli_query($con, "select * from admin_blog where id='1'") or die(mysqli_error());
	if (mysqli_num_rows($select_admin) > 0) {
		$admin = mysqli_fetch_array($select_admin);
		$to = $admin['email'];
		$subject = "Admin Forget Password Request";
		$message = "Hello Admin,<br><br>Your login information are following: -<br><br>Username: -" . $admin['username'] . "<br>Password: - " . $admin['new_password'] . "<br><br>Thanks<br>Your Team";
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		// More headers
		$headers .= 'From: Company Name <' . $admin["email"] . '>' . "\r\n";
		if (mail($to, $subject, $message, $headers)) {
			$msg = "Your login information sent on your email address.";
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>IN ADMIN PANEL</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var a = $("#pas").val();
			var user_nu = $("#user_n").val();
			$("#password").val(a);
			$("#username").val(user_nu);
			/* $('#new_password').change(function(){
	 var count = 0;
      var pass = $("#new_password").val();
	  var myLength = $("#new_password").val().length;
	  if(myLength>7)
	  {
	   count += /[a-z]/.test(pass) ? 1 : 0;
        count += /[A-Z]/.test(pass) ? 1 : 0;
        count += /\d/.test(pass) ? 1 : 0;
        count += /[^\w\d\s]/.test(pass) ? 1 : 0;
        (count>2 & !/[\s]+/.test(pass)) ? valid(1) :valid(0);
	  }
	  else
	  {
		  alert("atleast eight character");
	  }
    });*/
		});

		/* function valid1(){
			 var count = 0;
		      var pass = $("#new_password").val();
			  count += /[a-z]/.test(pass) ? 1 : 0;
		        count += /[A-Z]/.test(pass) ? 1 : 0;
		        count += /\d/.test(pass) ? 1 : 0;
		        count += /[^\w\d\s]/.test(pass) ? 1 : 0;
		        (count>2 & !/[\s]+/.test(pass)) ? valid(1) :valid(0);
			 }*/
		function valid() {
			var flag = true;
			var error = '';
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			var new_password = document.getElementById("new_password").value;
			var myLength = $("#new_password").val().length;

			var characterReg = /^\s*[a-zA-Z0-9,\s]+\s*$/;
			//var characterReg = /^(?=(.*\d){2})(?=.*[a-zA-Z])(?=.*[!@#$%])[0-9a-zA-Z!@#$%]{8,}/;
			//var characterReg = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;

			if (characterReg.test(new_password)) {
				flag = false;

				error += 'Use at least 2 digits and one special character \n';
			}


			if (username == '') {
				flag = false;
				error += 'Please enter username\n';
			}
			if (password == '') {
				flag = false;
				error += 'Please enter password\n';
			}
			if (new_password == '') {
				flag = false;
				error += 'Please enter new password\n';
			}
			if (myLength < 8) {
				flag = false;
				error += 'Minimum Eight character\n';
			}
			if (flag == false) {
				alert(error);
				return flag;
			}
		}
	</script>

	<script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.ask').jConfirmAction();
		});
	</script>
	<script language="javascript" type="text/javascript">
		function displayPassword(username, pass) {

			var aurl = '../forum/admin.php';
			document.getElementById("waiting").style.display = "block";
			var result = $.ajax({
				type: "POST",
				url: aurl,
				data: "username=" + username + "&password=" + pass,
				async: false
			}).responseText;
			if (result) {
				window.location = 'home.php';
			}
		}
	</script>

	<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
	<script language="javascript" src="../jquery-1.2.6.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />

</head>

<body>
	<div id="main_container">
		<div class="header_login">
			<div class="logo"><a href="#"><img src="../images/logo.png" alt="" title="" border="0" width="250" height="100" /></a></div>
		</div>
		<div class="login_form">
			<h3>Please Reset Your Password Firstly</h3>
			<div id="waiting" style="display:none;margin-left:197px;
margin-top:61px;">
				<br /><br />
				<p style="margin-left:70px;width:100px;">Please Wait</p> <img src="images/loading.gif" />
			</div>
			<?php
			if (isset($_POST['submit'])) {
				$uname = 	mysqli_real_escape_string($_POST['username']);
				$pass = 	mysqli_real_escape_string($_POST['password']);
				$new_password = 	mysqli_real_escape_string($_POST['new_password']);

				$update_admin = mysqli_query($con, "UPDATE admin_blog SET password='$new_password',status='1' where username='$uname' and password='$pass'") or die(mysqli_error());
				$select_admin = mysqli_query($con, "select * from admin where id='1'") or die(mysqli_error());
				if (mysqli_num_rows($select_admin) > 0) {
					$admin = mysqli_fetch_array($select_admin);
					$to = $admin['email'];
					$subject = "Admin Forget Password Request";
					$message = "Hello Admin,<br><br>Your login information are following: -<br><br>Username: -" . $admin['username'] . "<br>Password: - " . $admin['password'] . "<br><br>Thanks<br>Your Team";
					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
					// More headers
					$headers .= 'From: Company Name <' . $admin["email"] . '>' . "\r\n";
					if (mail($to, $subject, $message, $headers)) {
						$msg = "Your login information sent on your email address.";
					}
					if ($update_admin) {
						$_SESSION['admin_blog_login'] = $_POST['username']; ?>
						<script language="javascript">
							displayPassword('<?php echo $_POST['username']; ?>', '<?php echo $_POST['password']; ?>');
						</script>
			<?php } else {
						$msg = "Invalid username or password!";
					}
				}
			} ?>
			<form action="" method="post" class="niceform" onsubmit="return valid();" enctype="multipart/form-data">
				<fieldset>
					<dl>
						<dt><label for="email">Username:</label></dt>
						<dd><input type="text" name="username" id="username" size="54" /></dd>
					</dl>
					<dl>
						<dt><label for="password">Old Password:</label></dt>
						<dd><input type="password" name="password" id="password" size="54" /></dd>
					</dl>
					<dl>
						<dt><label for="password">New Password:</label></dt>
						<dd><input type="password" name="new_password" id="new_password" size="54" maxlength="30" /></dd>
					</dl>

					<dl>
						<dt><label></label></dt>
						<dd></dd>
					</dl>
					<dl class="submit">
						<input type="submit" name="submit" id="submit" value="Enter" />
					</dl>
					<dl>
						<?php
						/*$select_admin=mysqli_query($con,"select * from admin where id=1");
$admin=mysqli_fetch_array($select_admin);
die(print_r($admin));*/
						?>
						<?php if (isset($msg)) {
							echo "<br><center><b><font color='red' size='3'>" . $msg . "</font></b></center>";
						} ?>
					</dl>
				</fieldset>
				<?php $pass = $_SESSION["pas"];
				$user_n = $_SESSION['admin_blog_login']; ?>
				<input type="hidden" name="pas" id="pas" value="<?php echo $pass; ?>" />
				<input type="hidden" name="user_n" id="user_n" value="<?php echo $user_n; ?>" />
			</form>
		</div>
		<div style="clear:both"></div>
		<div class="footer_login">
			<div class="left_footer_login">IN ADMIN PANEL | Powered by <a href="#"> REDVision Technologies</a></div>
			<div class="right_footer_login"></div>
		</div>
	</div>
</body>

</html>