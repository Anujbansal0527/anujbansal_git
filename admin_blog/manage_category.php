<?php
require("include/session.php");
require("include/config.php");
require('include/function.php');

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
            <h3 class="page-header"><i class="fa fa-laptop"></i> Manage Category</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Manage Category</li>
            </ol>
          </div>
        </div>
        <div class="manage_post_main">
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Manage Category <a href="#myModal" data-toggle="modal" class="btn btn-success  btn-align-right">
                    Add New Category
                  </a>
                </header>
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th>#</th>
                      <th>Category Name</th>
                      <th>Action</th>
                    </tr>
                    <?php
                    $categories = getAllCategory($con);
                    $count = 1;
                    foreach ($categories as $cat) {
                    ?>
                      <tr>
                        <td><?= $count ?></td>
                        <td><?= $cat['name'] ?></td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-danger" href="remove_category.php?id=<?= $cat['id'] ?>"> Delete Category <i class="icon_close_alt2"></i></a>
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

  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Add New Category</h4>
        </div>
        <div class="modal-body">

          <form role="form" method="post" action="add_category.php">
            <div class="form-group">
              <label for="exampleInputEmail1">Category</label>
              <input type="text" class="form-control" id="exampleInputEmail3" name="category_name" placeholder="Category Name">
            </div>

            <button type="submit" name="addcat" class="btn btn-primary">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>