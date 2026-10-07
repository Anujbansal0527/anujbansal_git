<?php require("include/config.php");
require("include/session.php");
if (isset($_POST['edit'])) {
  $pass  =  $_POST['old_password'];
  $res = mysqli_query($con, "select * from admin_blog where password='$pass'") or die(mysqli_error($con));
  if (mysqli_num_rows($res) > 0) {
    $insert_cat = mysqli_query($con, "update admin_blog set name='" . $_POST['fullname'] . "', username='" . $_POST['username'] . "', password='" . $_POST['password'] . "', email='" . $_POST['email'] . "', mobile='" . $_POST['number'] . "' where id='1'") or die(mysqli_error());
    $msg = "Admin setting updated successfully!";
  } else {
    $msg = "Old Password you entered is Not Right!";
  }
} ?>

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
  <style>
    #sub {
      width: 91px;
      height: 32px;
      background-color: #fce783;
      border: 1px solid #dbc767;
      cursor: pointer
    }

    #sub:hover {
      background: #dbc767;
      border: 1px solid #bdaa52;
      color: #fff;
    }
  </style>
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
            <h3 class="page-header"><i class="fa fa-laptop"></i> Admin Setting</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Admin Setting</li>
            </ol>
          </div>
        </div>

        <?php
        if (isset($mess)) {
          echo "<center><b>" . $mess . "</b></center>";
        } ?>

        <div class="add_post_form">
          <div class="row">
            <div class="col-lg-12" style="padding: 0 30px;">
              <section class="panel">
                <header class="panel-heading">
                  Admin Setting
                </header>
                <div class="panel-body">
                  <div class="form">

                    <?php
                    $select_cat = mysqli_query($con, "select * from admin_blog") or die(mysqli_error($con));
                    if (mysqli_num_rows($select_cat) > 0) {
                      $cat = mysqli_fetch_array($select_cat);
                    }
                    ?>
                    <?php if (isset($msg)) {
                      echo "<center><font color='red'><b>" . $msg . "</b></font></center>";
                    } ?>
                    <form method="post" onsubmit="return valid();" class="form-horizontal">
                      <input class="form-control" type="hidden" name="cat_id" value="<?php echo $_GET['id']; ?>" />

                      <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="fullname" id="fullname" value="<?php echo $cat['name']; ?>" />
                      </div>
                      <div class="form-group">
                        <label>Admin Email</label>
                        <input class="form-control" type="text" name="email" id="email" value="<?php echo $cat['email']; ?>" />
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control" type="text" name="number" id="number" value="<?php echo $cat['mobile']; ?>" />
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" id="username" value="<?php echo $cat['username']; ?>" />
                      </div>
                      <div class="form-group">
                        <label>Old Password</label>
                        <input class="form-control" type="password" name="old_password" id="old_password" value="" />
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" id="password" onkeyup="check_val(this.value)" value="" />
                      </div>
                      <div class="form-group">
                        <input class="form-control btn btn-success" type="submit" id="sub" name="edit" value="Edit" />
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
</body>

</html>