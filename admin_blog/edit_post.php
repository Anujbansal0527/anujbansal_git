<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php require("include/session.php");
require("include/config.php");
require('include/function.php');
$categories = getAllCategory($con);
if (isset($_REQUEST['update'])) {

	$id = $_GET['id'];

	$select = "SELECT * FROM post WHERE id =$id";
	$query = mysqli_query($con, $select);
	$item = mysqli_fetch_array($query);
	$img = $item['image'];
	unlink('../assets/images/admin/blog/' . $img);


	$meta_title = $_POST['meta_title'];
	$meta_description = $_POST['meta_description'];
	$meta_keywords = $_POST['meta_keywords'];
	$title = $_POST['name'];
	$slug_url = $_POST['slug_url'];
	$title_url = strtolower($slug_url);
	$title_url = str_replace("'", "", $title_url);
	$title_url = str_replace(':', '', $title_url);
	$title_url = str_replace(',', '', $title_url);
	$title_url = str_replace('?', '', $title_url);
	$title_url = str_replace('%', 'percent', $title_url);
	$slug_url = '/' . str_replace(' ', '-', $title_url);

	$date = date('Y-m-d');
	$target_path = "../assets/images/admin/blog/";
	$total = 2728640;
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

					$insert_join = mysqli_query($con, "update post set meta_title='" . addslashes(trim($meta_title)) . "', meta_description='" . addslashes(trim($meta_description)) . "', meta_keywords='" . addslashes(trim($meta_keywords)) . "', title='" . addslashes(trim($_POST['name'])) . "', content='" . addslashes(trim($_POST['content'])) . "', slug_url='" . addslashes(trim($slug_url)) . "', image='" . $file . "' where id='" . $_GET['id'] . "'") or die(mysqli_error($con));


					header("Location: manage_post.php");

					$msg = "Post Successfully Updated!";
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
		$msg = "File size should be less than 15MB!!";
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
} ?>
<script language="javascript">
function valid() {
    var flag = true;
    var error = '';
    var url = document.getElementById("url").value;
    if (url == '') {
        flag = false;
        error += 'Please enter ad url!\n';
        document.gallery_form.url.focus();
    }
    if (flag == false) {
        alert(error);
        return flag;
    }
}
</script>
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
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"
        media="screen" />
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
    <!-- <link href="assets/ckeditor/ckeditor.css" rel="stylesheet"> -->
    <link href="assets/summernote/summernote.css" rel="stylesheet">
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
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Edit Post</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                            <li><i class="fa fa-laptop"></i>Edit Post</li>
                        </ol>
                    </div>
                </div>
                <div class="add_post_form">
                    <div class="row">
                        <div class="col-lg-12" style="padding: 0 30px;">
                            <section class="panel">
                                <header class="panel-heading">
                                    Edit Post
                                </header>
                                <div class="panel-body">
                                    <div class="form">
                                        <?php
										if (isset($msg)) {
											echo "<center><font color='red'><b>" . $msg . "</b></font></center>";
										}
										?>
                                        <?php
										$select_gallery = mysqli_query($con, "select * from post where id='" . $_GET['id'] . "'") or (die(mysqli_error($con)));
										$gallery = mysqli_fetch_array($select_gallery);
										?>
                                        <form method="post" id="gallery_form" enctype="multipart/form-data"
                                            name="gallery_form" class="new_user">
                                            <div class="alert alert-danger fade in"><span>File Format Suppported : .jpg
                                                    .gif .png .bmp </span></div>
                                            <div class="form-group">
                                                <label>Slug URL</label>
                                                <input type="text" name="slug_url"
                                                    value="<?php echo $gallery['slug_url']; ?>" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <input type="text" name="meta_title"
                                                    value="<?php echo $gallery['meta_title']; ?>" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <input type="text" name="meta_description"
                                                    value="<?php echo $gallery['meta_description']; ?>"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Keywords</label>
                                                <input type="text" name="meta_keywords"
                                                    value="<?php echo $gallery['meta_keywords']; ?>"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" type="text" name="name"
                                                    value="<?php echo $gallery['title']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="style3">Image</label>
                                                <input class="form-control" type="file" name="files" id="files" />
                                            </div>
                                            <div class="alert alert-danger fade in"><span class="style1">Ex:- 245px x
                                                    260px and 2MB Max Size</span>
                                            </div>
                                            <div class="video_img_preview">
                                                <img src="../assets/images/admin/blog/<?php echo $gallery['image']; ?>"
                                                    width="100" height="100" />
                                            </div>
                                            <div class="form-group">
                                                <label>Content</label>

                                                <textarea id="editor1" class="form-control" name="content" rows="6">
												<?php echo $gallery['content']; ?>
												</textarea>

                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <input class="btn btn-success" type="submit" name="update"
                                                    value="Update" alt="Update">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

            </section>
            <!--main content end-->

        </section>
        <!-- container section start -->
        <!--footer start-->
        <?php include("include/footer.php"); ?>
        <!--footer end-->
        <script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('.ask').jConfirmAction();
        });
        </script>
</body>

</html>