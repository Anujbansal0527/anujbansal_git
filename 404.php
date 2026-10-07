<?php  include ('include/config.php'); ?>
<?php  include ('include/function.php'); ?>
<!doctype html>
<html lang="en">
	<head>

		<title>REDVision Technologies</title>
		<meta name="description" content="REDVision Technologies">
		<meta name="keywords" content="REDVision Technologies" />
		<meta name="author" content="REDVision Global Technologies Pvt. Ltd.">
		<link rel="canonical" href="<?= $rvuserinfo['base_url']?>/404.php">
		<?php include("include/head.php"); ?>
	</head>

	<body>
		<!-- BANNER -->
		<!-- /BANNER -->
		<?php include("include/header-inner.php"); ?>

		<main>

			<?php allPagesBanner($con, 'Not Found', '','')?>

			<section class="main-section notfound-section">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<div class="notfound-box">
								<h2>404 Page Not Found</h2>
								<p>This File/Document requested are not found in this server</p>
							</div>
						</div>
					</div>
				</div>
			</section>

			<?php include("include/footer.php"); ?>
			<?php include("include/foot.php"); ?>
