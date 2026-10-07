<?php include("config.php"); include("session.php");
if(isset($_POST['update']))
{
	$select = $_POST['pop'];
	echo $select;
	$update_info=mysqli_query($con,"UPDATE popinfo set status='$select'") or die(mysqli_error($con));
	$mess="updated successfully.";
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
            <h3 class="page-header"><i class="fa fa-laptop"></i> Update popup status</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Update popup status</li>
            </ol>
          </div>
        </div>



<form action="" name="status" method="post">

		<?php if(isset($mess)){echo $mess;}else{echo "";}?>

<label class="style3">Enable/Disable Popup</label>
<div class="form-group">
<select class="form-control" name="pop">
	<option value="">--</option>
	<option value="1">Enable</option>
	<option value="0">Disable</option>
</select>
</div>
<span class="style1">
<?php
$select_gallery=mysqli_query($con,"SELECT * from popinfo")or die(mysqli_error($con));
$gallery= mysqli_fetch_array($select_gallery);
?>
<?php 
      if($gallery['status']=='1')
      { 
	  echo "Current Status:- Enable";
	  }
	  else
	  {
	  echo "Current Status:-Disabled";
	  }
 ?>
     </span>

<div class="form-group">
<input class="btn btn-success" type="submit" name="update" value="Update">
</div>
</form>


<!-- end of right content-->

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
