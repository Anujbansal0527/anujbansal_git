<?php require("config.php"); require("session.php");
if(isset($_POST['gallery']))
{
	$insert_join=mysqli_query($con,"insert into video set path='".addslashes(trim($_POST['description']))."'") or die(mysqli_error());
	$msg="Video Successfully Added!";
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
            <h3 class="page-header"><i class="fa fa-laptop"></i> Add Video</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Add New Video</li>
            </ol>
          </div>
        </div>












        <div class="add_post_form">
          <div class="row">
          <div class="col-lg-12" style="padding: 0 30px;">
                <section class="panel">
                  <header class="panel-heading">
                    ADD POST
                  </header>
                  <div class="panel-body">
                    <div class="form">
                        <div class="form-group">
                          <label>Post Title</label>
                          <input type="text" name="post_title" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Post Images</label>
                          <input type="file" name="post_image[]" class="form-control" accept="image" multiple required>
                        </div>
                        <div class="form-group">
                          <label>Post Category</label>
                          <select name="post_category" class="form-control" required>
                            <?php
                            foreach($categories as $cat){
                              ?>
                             <option value="<?=$cat['id']?>"><?=$cat['name']?></option>
                              <?php
                          }
                          ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Post Content</label>
                            <textarea class="form-control ckeditor" name="post_content" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                          <input class="btn btn-primary" type="submit" name="addpost" value="Add Post">
                        </div>
                      </form>



                      <?php
if(isset($msg))
{
	echo "<center><font color='red'><b>".$msg."</b></font></center>";
}
?>
   
	  	<form method="post" id="gallery_form" enctype="multipart/form-data" name="gallery_form" class="new_user form-horizontal" onsubmit="return valid();">
	  		<div class="form-group">
       <label>Video URL</label>
		    <input type="text" value="" name="description" />
        </div>
		  <strong>Note : </strong> For URL Go to share button on youtube page after that select embed button. In this you find src(source) code copy that code and paste this URL here and then Submit.
        <img src="images/request.jpg" width="570" height="220" />
        <div class="form-group">
		   <input type="submit" name="gallery" value="Submit" alt="Submit">
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

    <script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
<script language="javascript">
function valid()
{
var flag=true;
var error='';
var url=document.getElementById("url").value;

if(url=='')
{
flag=false;
error+='Please enter ad url!\n';
document.gallery_form.url.focus();
}

if(flag==false)
{
alert(error);
return flag;
}
}
</script>

<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

</body>

</html>




