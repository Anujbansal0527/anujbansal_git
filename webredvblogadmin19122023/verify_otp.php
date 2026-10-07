
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Email Otp | <?= $userinfo['name']; ?></title>
		<link href="./rvlogin.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	</head>

	<body>
		<section class="rvlogin-section">
			<div class="rv-card">
				<div class="rv-card-body">

					<?php
					session_start();

					require '../PHPMailer-master/src/PHPMailer.php';
					require '../PHPMailer-master/src/SMTP.php';
					require '../PHPMailer-master/src/Exception.php';

					require("./config.php");

					$config = require __DIR__ . '/sfa_config.php';

					$db = new PDO($config['db']['dsn'], $config['db']['user'], $config['db']['pass'], [
						PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
					]);

					session_start();
					$email = $_SESSION['smtpemail'];

					$input = trim($_POST['otp'] ?? '');

					if (!$email || $input === '') {
						http_response_code(400);
						echo "Invalid request";
						//header("Location: ../index.php");
						exit;
					}

					// fetch latest unused otp
					$sth = $db->prepare("SELECT * FROM otp_codes1 WHERE email=:email AND used=0 ORDER BY created_at DESC LIMIT 1");
					$sth->execute([':email' => $email]);
					$row = $sth->fetch(PDO::FETCH_ASSOC);

					if (!$row) {

					?>
					<div class="rv-hadding">
						<h1 class="text-primary"> OTP </h1>
						<h3 style="color:#2196f3; margin-top:10px;"><?php  echo "No OTP requested. Please request a new code."; exit; ?></h3>
					</div>
					<?php
					}

					// check expiry
					if (time() > $row['expires_at']) {
						$db->prepare("UPDATE otp_codes1 SET used=1 WHERE id=:id")->execute([':id' => $row['id']]);

					?>
					<div class="rv-hadding">
						<h1 class="text-primary"> OTP </h1>
						<h3 style="color:#2196f3; margin-top:10px;"><?php  echo "OTP expired. Request again."; exit; ?></h3>
					</div>
					<?php
					}

					// increment attempts
					$attempts = $row['attempts'] + 1;
					$db->prepare("UPDATE otp_codes1 SET attempts=:a WHERE id=:id")->execute([':a' => $attempts, ':id' => $row['id']]);

					if ($attempts > $config['otp']['max_attempts']) {
						$db->prepare("UPDATE otp_codes1 SET used=1 WHERE id=:id")->execute([':id' => $row['id']]);


					?>
					<div class="rv-hadding">
						<h1 class="text-primary"> OTP </h1>
						<h3 style="color:#ff1100; margin-top:10px;"><?php  echo "Too many attempts. Request a new OTP."; exit; ?></h3>

					</div>
					<?php
					}

					// verify OTP
					if (password_verify($input, $row['otp_hash'])) {

						// mark otp used
						$db->prepare("UPDATE otp_codes1 SET used=1 WHERE id=:id")->execute([':id' => $row['id']]);

						// save session
						$_SESSION['admin_blog_login'] = $email;

						// redirect
						 header("Location: ../admin_blog/home.php");
						exit;

					} else {?>

					<div class="rv-hadding">
						<h1 class="text-primary"> OTP </h1>
						<h3 style="color:#f44336; margin-top:10px;"><?php   echo "Invalid OTP. Attempts left: " . ($config['otp']['max_attempts'] - $attempts);   exit; ?></h3>

					</div>

					<?php
						   }
					?>
				</div>
			</div>
		</section>
	</body>
</html>