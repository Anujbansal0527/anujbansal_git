<?php
require __DIR__ . '/../rvm-include/config.php';
function rvFetchAllData($con, $table)
{
  // Create a prepared statement
  $stmt = mysqli_prepare($con, "SELECT * FROM $table");
  if ($stmt === false) {
    // Handle error - in a real-world application, you might log this and return an appropriate response
    die('Prepare failed: ' . htmlspecialchars(mysqli_error($con)));
  }
  // Execute query
  if (!mysqli_stmt_execute($stmt)) {
    // Handle error - in a real-world application, you might log this and return an appropriate response
    die('Execute failed: ' . htmlspecialchars(mysqli_stmt_error($stmt)));
  }
  // Get the result set from the prepared statement
  $resultAll = mysqli_stmt_get_result($stmt);
  if ($resultAll === false) {
    // Handle error - in a real-world application, you might log this and return an appropriate response
    die('Get result failed: ' . htmlspecialchars(mysqli_stmt_error($stmt)));
  }
  // Fetch all rows as an associative array
  $dataAll = [];
  while ($row = mysqli_fetch_assoc($resultAll)) {
    // Optionally, you can sanitize the output here if you plan to display it directly
    $dataAll[] = $row;
  }
  // Free the result set
  mysqli_free_result($resultAll);
  // Close the statement
  mysqli_stmt_close($stmt);
  return $dataAll;
}
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
            <h3 class="page-header"><i class="fa fa-laptop"></i> Manage Career Vacancy</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Manage Career Vacancy</li>
            </ol>
          </div>
        </div>
        <div class="manage_post_main">
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Manage Career Vacancy <a href="add_manage_vacancy.php" class="btn btn-success  btn-align-right">
                    Add New Career Vacancy
                  </a>
                </header>
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th>#</th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>Graduation</th>
                      <th>Location</th>
                      <th>Experience</th>
                      <th>Description</th>
                      <th>Img File</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                    <?php
                    $careerData = rvFetchAllData($con, 'career_vacancy');
                    $count = 1;
                    foreach ($careerData as $careeitems) {
                      ?>
                      <tr>
                        <td><?= $count ?></td>
                        <td><?= $careeitems['category_type'] ?></td>
                        <td><?= $careeitems['title'] ?></td>
                        <td><?= $careeitems['graduation'] ?></td>
                        <td><?= $careeitems['location'] ?></td>
                        <td><?= $careeitems['experience'] ?></td>
                        <td><?= $careeitems['description'] ?></td>
                        <td><img
                            src="<?= $config['rvuserinfo']['base_url']; ?>/assets/images/admin/career/<?= $careeitems['img_file'] ?>"
                            width="150px" alt=""> </td>
                        <td><?= date('F jS, Y', strtotime($careeitems['datetime'])) ?></td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-success" href="edit_career_vacancy.php?id=<?= $careeitems['id'] ?>"
                              style="margin-right: 9px;"> Edit Career Vacancy <i class="icon_close_alt2"></i></a>
                            <a class="btn btn-danger" href="manage_vacancy.php?id=<?= $careeitems['id'] ?>"> Delete
                              Career Vacancy <i class="icon_close_alt2"></i></a>
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
  <?php include("inc/footer.php"); ?>
  <!--footer end-->
</body>

</html>