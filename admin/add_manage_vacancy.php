<?php
require __DIR__ . '/../rvm-include/config.php';

if (isset($_POST['submit'])) {
  $meta_title = $_POST['meta_title'];
  $meta_description = $_POST['meta_description'];
  $meta_keywords = $_POST['meta_keywords'];
  $title = $_POST['name'];
  $content = $_POST['post_content'];
  $title_url = strtolower($title);
  $title_url = str_replace("'", "", $title_url);
  $title_url = str_replace(':', '', $title_url);
  $title_url = str_replace(',', '', $title_url);
  $title_url = str_replace('?', '', $title_url);
  $title_url = str_replace('%', 'percent', $title_url);
  $slug_url = '/' . str_replace(' ', '-', $title_url);

  $date = date('Y-m-d');
  $target_path = "../assets/images/admin/blog/";
  $total = 2728644;
  $size = $_FILES['files']['size'];

  if ($total >= $size) {
    $file_name_path = $_FILES['files'];
    $filename = $_FILES['files']['name'];
    if ($filename != '') {
      $nm = strrev($_FILES['files']['name']);
      $nmar = explode(".", $nm);
      $ext = strrev($nmar[0]);
      if (($ext == "png") || ($ext == "jpg") || ($ext == "jpeg") || ($ext == "webp")) {
        $id = generate_unique_id();
        $target_path = $target_path . basename($id);
        if ($file_name_path["type"] == "image/webp")
          $target_path = $target_path . ".webp";
        if ($file_name_path["type"] == "image/png")
          $target_path = $target_path . ".png";
        if ($file_name_path["type"] == "image/jpg")
          $target_path = $target_path . ".jpg";
        if ($file_name_path["type"] == "image/jpeg")
          $target_path = $target_path . ".jpeg";
        if (move_uploaded_file($file_name_path['tmp_name'], $target_path)) {
          $file = substr($target_path, 28);
          $insert_join = mysqli_query($con, "insert into post set meta_title='" . addslashes(trim($meta_title)) . "', meta_description='" . addslashes(trim($meta_description)) . "', meta_keywords='" . addslashes(trim($meta_keywords)) . "', title='" . addslashes(trim($title)) . "', content='" . addslashes(trim($content)) . "', slug_url='" . addslashes(trim($slug_url)) . "', image='" . $file . "'") or die(mysqli_error($con));
          $msg = "Item Successfully Added!";
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

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">

    <!--header start-->
    <?php include("inc/header.php"); ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include("inc/left.php"); ?>
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
              <li><i class="fa fa-laptop"></i>Add New Career Vacancy</li>
            </ol>
          </div>
        </div>


        <div class="add_post_form">
          <div class="row">
            <div class="col-lg-12" style="padding: 0 30px;">
              <section class="panel">
                <header class="panel-heading">
                  ADD Career Vacancy
                </header>
                <div class="panel-body">
                  <div class="form">
                    <?php if (isset($msg)) {
                      echo "<center><font color='red'><b>" . $msg . "</b></font></center>";
                    } ?>
                    <form method="career_vacancy" id="career_vacancy_form" enctype="multipart/form-data"
                      name="career_vacancy_form" class="form-horizontal new_user">
                      <div class="row">
                        <div class="col-md-12 col-lg-6">
                          <div class="form-group">
                            <label>Meta Title</label>
                            <select name="category_type" class="form-control" required>
                              <option value=""></option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                          <div class="form-group">
                            <label>Slug URL</label>
                            <input type="text" name="slug_url" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                          <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                          <div class="form-group">
                            <label>Graduation</label>
                            <input type="text" name="graduation" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                          <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                          <div class="form-group">
                            <label>Experience</label>
                            <input type="text" name="experience" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                          <div class="form-group">
                            <label>Share</label>
                            <input type="text" name="share" class="form-control" required>
                          </div>
                        </div>


                        <div class="col-md-12 col-lg-12">
                          <div class="form-group">
                            <label>Content</label>
                            <textarea id="" class="form-control ckeditor" name="description" rows="6"></textarea>
                          </div>
                        </div>
                      </div>




                      <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Add Post">
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
  <?php include("inc/footer.php"); ?>
  <!--footer end-->
  <script type="text/javascript" src="<?= $userinfo['base_url']; ?>/admin/assets/ckeditor/ckeditor.js"></script>
</body>

</html>