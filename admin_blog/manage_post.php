<?php
require("include/session.php");
require("include/config.php");
require('include/function.php');
$categories = getAllCategory($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
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
            <h3 class="page-header"><i class="fa fa-laptop"></i> Manage Post</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Manage Post</li>
            </ol>
          </div>
        </div>
        <div class="manage_post_main">
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Manage Post <a href="add_post.php" class="btn btn-success  btn-align-right">
                    Add New Post
                  </a>
                </header>
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th>#</th>
                      <th>Post Title</th>
                      <th>Post Category</th>
                      <th>Post Image</th>
                      <th>Post Date</th>
                      <th>Action</th>
                    </tr>
                    <?php
                    $posts = getAllPost($con);
                    $count = 1;
                    foreach ($posts as $post) {
                    ?>
                      <tr>
                        <td><?= $count ?></td>
                        <td><?= $post['title'] ?></td>
                        <td><?= getCategory($con, $post['category_id']) ?></td>
                        <td><img src="../assets/images/admin/blog/<?= $post['image'] ?>" width="150px" alt=""> </td>
                        <td><?= date('F jS, Y', strtotime($post['added_on'])) ?></td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-success" href="edit_post.php?id=<?= $post['id'] ?>" style="margin-right: 9px;"> Edit Post <i class="icon_close_alt2"></i></a>
                            <a class="btn btn-danger" href="remove_post.php?id=<?= $post['id'] ?>"> Delete Post <i class="icon_close_alt2"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php
                      $count++;
                    }
                    ?>

                  </tbody>
                </table>
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