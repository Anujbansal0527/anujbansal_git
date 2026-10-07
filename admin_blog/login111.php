<?php ob_start();
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php ob_start();
require("include/config.php");
// $ip = $_SERVER['REMOTE_ADDR'];
//  if($ip == '103.231.44.222')
//  {
//      	header("location:home.php");
//      	exit;
//  }
if (isset($_GET['f'])) {
	$select_admin = mysqli_query($con, "select * from admin_blog where id='1'") or die("Please Contact Administrator.");
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
		if (mail($to, $subject, $message, $headers)); {
			$msg = "Your login information sent on your email address.";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keyword" content="">
	<link rel="shortcut icon" href="img/favicon.png">
	<title>Admin Panel</title>
	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- bootstrap theme -->
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<!--external css-->
	<!-- font icon -->
	<link href="css/elegant-icons-style.css" rel="stylesheet" />
	<link href="css/font-awesome.css" rel="stylesheet" />
	<!-- Custom styles -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style-responsive.css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		function valid() {
			var flag = true;
			var error = '';
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			if (username == '') {
				flag = false;
				error += 'Please enter username\n';
			}
			if (password == '') {
				flag = false;
				error += 'Please enter password\n';
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
	<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
	<script language="javascript" src="../jquery-1.2.6.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />
</head>

<body class="login-img3-body">
	<div class="container">
		<!-- <div class="header_login">
					<div class="logo"><a href="#"><img src="../images/logo.png" alt="" title="" border="0" width="250" height="100" /></a></div>
			</div> -->

		<?php
		if (isset($_POST['submit'])) {
			$uname = 	mysqli_real_escape_string($con, $_POST['username']);
			$pass = 	mysqli_real_escape_string($con, $_POST['password']);
			$ip             =   ($_SERVER['REMOTE_ADDR']);
			date_default_timezone_set("Asia/Kolkata");
			$timestamp =    date('Y-m-d h:i:s');
			$select_admin = mysqli_query($con, "select * from admin_blog where username='" . $uname . "' and password='" . $pass . "'") or die(mysqli_error());
			if (mysqli_num_rows($select_admin) > 0) {
				$select_admin_first = mysqli_query($con, "select * from admin_blog where username='" . $uname . "' and password='" . $pass . "' and status='1'") or die(mysqli_error());
				// 	mysqli_query($con,"INSERT INTO `ip address`(`id`, `ip`, `date`) VALUES ('','$ip','$timestamp')") or die(mysqli_error());
				if (mysqli_num_rows($select_admin_first) > 0) {
					//session_start();
					$_SESSION['admin_blog_login'] = $_POST['username'];
					header("Location: home.php");
				} else {
					$msg = "Your Login is Disabled. Please Contact Administrator.";
					//$_SESSION["pas"]=$pass;
					//$_SESSION['admin_blog_login']=$_POST['username'];
					//FunJavaScriptRedirection("password_reset.php");
				}
			} else {
				$msg = "Invalid username or password!";
			}
		}
		function FunJavaScriptRedirection($url)
		{
			header("Location: " . $url);
		}
		?>
		<form class="login-form" method="post" onsubmit="return valid();" enctype="multipart/form-data">

			<div class="login-wrap">
				<div class="row">
					<div class="col-md-12 login_img">
						<img src="images/login1.png" width="100%">
					</div>
					<div class="col-md-12 login_form_content">

						<h3>Welcome to Admin Panel</h3>
						<p>Please fill the below information to login your account</p>

						<div class="input-group">
							<span class="input-group-addon"><i class="icon_profile"></i></span>
							<input type="text" class="form-control" name="username" placeholder="Username" autofocus required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="icon_key_alt"></i></span>
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						<div class="input-group password">
							<a href="login.php?f=f" class="forgot_pass">Forgot password</a>
							<div id="waiting" style="display:none;margin-left:197px;
						margin-top:61px;">
								<br /><br />
								<p style="margin-left:70px;width:100px;">Please Wait</p> <img src="images/loading.gif" />
							</div>
						</div>
						<button class="btn btn-primary btn-lg btn-block" name="submit" id="submit" type="submit">Login</button>
						<?php if (isset($msg)) {
							echo "<br><center><b><font color='red' size='3'>" . $msg . "</font></b></center>";
						} ?>
					</div>


				</div>
			</div>
		</form>
		<div style="clear:both"></div>

	</div>
</body>

</html>