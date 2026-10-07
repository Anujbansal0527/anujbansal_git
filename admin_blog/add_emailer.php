<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
require("include/session.php");
require("include/config.php");
require('include/function.php');

if (isset($_POST['submit'])) {
  $url = $_POST['url'];
  $htmlFileName = !empty($_POST['html_file_name']) ? $_POST['html_file_name'] : 'emailer';

  // Format file name: remove spaces and convert to lowercase
  $htmlFileName = strtolower(str_replace(' ', '', $htmlFileName)) . '.html';



  $date = date('Y-m-d');
  $target_path = "../assets/images/admin/emailer/";
  $total = 2728644;
  $size = $_FILES['files']['size'];

  if ($total >= $size) {
    $file_name_path = $_FILES['files'];
    $filename = $_FILES['files']['name'];
    if ($filename != '') {
      $nm = strrev($_FILES['files']['name']);
      $nmar = explode(".", $nm);
      $ext = strrev($nmar[0]);
      if (($ext == "png") || ($ext == "jpg") || ($ext == "jpeg")) {
        $id = generate_unique_id();
        $target_path = $target_path . basename($id);
        if ($file_name_path["type"] == "image/png")
          $target_path = $target_path . ".png";
        if ($file_name_path["type"] == "image/jpg")
          $target_path = $target_path . ".jpg";
        if ($file_name_path["type"] == "image/jpeg")
          $target_path = $target_path . ".jpeg";
        if (move_uploaded_file($file_name_path['tmp_name'], $target_path)) {

          $imagePath = "https://www.redvisiontechnologies.com/" . $target_path;

          // Generate HTML content
          $htmlContent = "
    <!doctype html>
<html>

<head>
	<meta charset='utf-8'>
	<title>Digital Marketing Webinar</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<style type='text/css'>
		html,
		body {
			margin: 0;
			padding: 0;
			width: 100% !important;
		}

		table {
			border-collapse: collapse;
			border-spacing: 0px;
		}

		table,
		table th,
		table td {
			padding: 0px;
			margin: 0px;
			line-height: 0;
		}

		table a {
			float: left;
			width: 100%;
			overflow: hidden;
		}

		.robo-emailer-middle {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.robo-emailer-middle img {
			width: 100%;
		}

		/* HEADER FOOTER TABLE */
		.header-footer-table tr td {
			display: block;
		}

		.header-footer-table .emailer-footer {
			display: flex !important;
			background: #000;
			width: 100%;
			height: 50px;
			justify-content: center;
			align-items: center;
		}

		.header-footer-table .emailer-footer .emailer-footer-inner {
			width: 300px;
			display: flex !important;
		}

		.header-footer-table .emailer-footer .emailer-footer-inner img {
			width: 30px;
		}

		@media (max-width: 799.9px) {
			.full-width {
				width: 100% !important;
				max-width: 100% !important;
			}

			img {
				max-width: 100%;
			}

		}
	</style>
</head>

<body>
	<table class='header-footer-table' border='0' cellpadding='0' cellspacing='0' width='100%'
		style='table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;'>
		<tr>
			<td align='center' valign='top'>
				<table class='full-width' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0' width='800'>
					<tr>
						<td align='center' valign='top' class='emailer-body'>
							<a href='$url' target='_blank'>
								<img src='$imagePath'
									alt='Content Marketing' width='800' />
							</a>
						</td>
						<td align='center' valign='top' class='emailer-footer'>
							<span class='emailer-footer-inner'>
								<a href='https://www.facebook.com/redvisiontechnologies' target='_blank'>
									<img src='https://www.redvisiontechnologies.com/assets/images/icons/facebook.png'
										alt='Facebook' />
								</a>
								<a href='https://twitter.com/redvisionindore' target='_blank'>
									<img src='https://www.redvisiontechnologies.com/assets/images/icons/twitter.png'
										alt='Facebook' />
								</a>
								<a href='https://www.linkedin.com/company/redvisiontechnologies/' target='_blank'>
									<img src='https://www.redvisiontechnologies.com/assets/images/icons/linkedin.png'
										alt='Facebook' />
								</a>
								<a href='https://www.instagram.com/redvisiontechnologies/' target='_blank'>
									<img src='https://www.redvisiontechnologies.com/assets/images/icons/instagram.png'
										alt='Facebook' />
								</a>
								<a href='https://www.youtube.com/@redvisiontechnologies/' target='_blank'>
									<img src='https://www.redvisiontechnologies.com/assets/images/icons/youtube.png'
										alt='Facebook' />
								</a>
								<a href='https://wa.me/+919039822000' target='_blank'>
									<img src='https://www.redvisiontechnologies.com/assets/images/icons/whatsapp.png'
										alt='Facebook' />
								</a>
							</span>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

</body>

</html>";
          // Save HTML to file
          file_put_contents($htmlFileName, $htmlContent);
          echo "<div><a class='btn btn-success' href='$htmlFileName' download>Download Emailer</a></div>";

          $msg = "Emailer Successfully Generated!";
        } else {
          $msg = "There was an error uploading the file, please try again!";
        }
      } else {
        $msg = "File Type Not Supported";
      }
    } else {
      $msg = "Please select a file";
    }
  } else {
    $msg = "File size should be less than 2MB!!";
  }
}
function generate_unique_id()
{
  $day = date('d', time());
  $month = date('m', time());
  $year = date('Y', time());
  $hour = date('H', time());
  $min = date('i', time());
  $sec = date('s', time());
  $un_id = sprintf("%02d%04d%02d", rand(0, 999), rand(0, 99), $sec);
  //echo $un_id=round(rand(99,999)*rand(1234,8965)*$sec*$min);
  return $un_id;
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
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <link href="assets/ckeditor/ckeditor.css" rel="stylesheet">

  <style>
    .btn-success {
      color: #ffffff;
      background-color: #f00;
      border-color: #f00;
      position: absolute;
      top: 80px;
      right: 15px;
      z-index: 9;
    }

    .btn-success:hover {
      color: #f00;
      background-color: transparent;
      border-color: #f00;
    }
  </style>

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">

    <!--header start-->
    <?php include("include/header.php"); ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include("include/left.php"); ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Add New</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Add New Emailer</li>
            </ol>
          </div>
        </div>


        <div class="add_post_form">
          <div class="row">
            <div class="col-lg-12" style="padding: 0 30px;">
              <section class="panel">
                <header class="panel-heading">
                  ADD Emailer
                </header>
                <div class="panel-body">
                  <div class="form">
                    <?php if (isset($msg)) {
                      echo "<center><font color='red'><b>" . $msg . "</b></font></center>";
                    } ?>
                    <form method="post" id="post_form" enctype="multipart/form-data" name="post_form" class="form-horizontal new_user">

                      <div class="form-group">
                        <label>Images</label>
                        <input class="form-control" type="file" name="files" id="files" />
                      </div>
                      <div class="form-group">
                        <label>URL</label>
                        <input type="text" name="url" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>File Name</label>
                        <input type="text" name="html_file_name" id="html_file_name" placeholder="File Name" class="form-control">
                      </div>


                      <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Generate Emailer">
                      </div>
                    </form>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>












      </section>

    </section>
    <!--main content end-->

  </section>
  <!-- container section start -->

  <!--footer start-->
  <?php include("include/footer.php"); ?>
  <!--footer end-->

</body>

</html>