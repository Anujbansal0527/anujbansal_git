<?php require("config.php"); require("session.php");
if(isset($_POST['update']))
{
	$description = "";
	$description = trim($_POST['elm1']);
	do
	{
		$pos = strpos($description,"<iframe");
		$pos2 = strpos($description,"</iframe>")+9;
		if($pos!==false)
			$description = substr_replace($description," ",$pos,($pos2-$pos));
	}
	while($pos!==false);
	
	do
	{
		$pos3 = strpos($description,"<script");
		$pos4 = strpos($description,"</script>")+9;
		if($pos3!==false)
			$description = substr_replace($description," ",$pos3,($pos4-$pos3));
	}
	while($pos3!==false);
	$update_info=mysqli_query($con,"update static_pages set title='".addslashes(trim($_POST['title']))."', description = '".trim($description)."', 
				 metadescription = '".addslashes(trim($_REQUEST['description']))."', keyword = '".addslashes(trim($_REQUEST['keyword']))."', 
				 footer = '".addslashes(trim($_REQUEST['footer']))."' where id='".addslashes(trim($_POST['id']))."'") or die(mysqli_error());
	$mess="Content has been updated successfully."; 
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
    <!-- easy pie chart-->
  <link href="assets/summernote/summernote.css" rel="stylesheet" type="text/css" media="screen" />
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
            <h3 class="page-header"><i class="fa fa-laptop"></i> Page Content</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Add Page Content</li>
            </ol>
          </div>
        </div>

		<?php
		if(isset($mess))
		{
			echo "<center><b>".$mess."</b></center>";
		} ?>

        <div class="add_post_form">
          <div class="row">
          <div class="col-lg-12" style="padding: 0 30px;">
                <section class="panel">
                  <header class="panel-heading">
                    Static Page Content
                  </header>
                  <div class="panel-body">
                    <div class="form">
                      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                      		<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
                      	<?php 
						$select_user=mysqli_query($con,"select * from static_pages where id='".$_GET['id']."'");
						$row=mysqli_fetch_array($select_user); ?>
                        <div class="form-group">
                          <label>Page Title</label>
                          <input name="title" type="text" value="<?php echo $row['title']; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Page Meta Description</label>
                          <input name="description" type="text" value="<?php echo $row['metadescription']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Page Meta Keywords</label>
                          <input name="keyword" type="text" value="<?php echo $row['keyword']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                          <label>Page Description</label>
                            <textarea id="summernote" class="form-control" id="elm1" name="elm1" rows="15" cols="50"><?php echo stripslashes($row['description']); ?></textarea>
                        </div>
                       <!-- <div class="form-group">-->
                       <!--<label>Page Footer</label>-->
                       <!-- <input class="form-control" name="footer" type="text" value="<?php echo $row['footer']; ?>" size="50" />-->
                       <!-- </div>-->
                        <div class="form-group">
                          <input class="btn btn-success" type="submit" name="update" value="Update"  id="sub_button"/>&nbsp;
                          <input class="btn btn-danger" type="button" name="cancel" value="Cancel" id="sub_button" onclick="javascript:window.location.href='home.php'"/>
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