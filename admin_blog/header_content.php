<?php require("include/config.php");
require("include/session.php");
if (isset($_POST['update'])) {
	$insert_join = mysqli_query($con, "UPDATE header SET description = '" . addslashes($_REQUEST['description']) . "', keyword = '" . addslashes($_REQUEST['keyword']) . "', `title` = '" . addslashes($_REQUEST['title']) . "' WHERE id = 1;") or die(mysqli_error());
	$msg = "Header Content Successfully Updated!";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>IN ADMIN PANEL</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<!--[if IE]><script type="text/javascript" src="js/excanvas.js"></script><![endif]-->
	<script type="text/javascript" src="js/coolclock.js"></script>
	<script type="text/javascript" src="js/moreskins.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/ddaccordion.js"></script>
	<script type="text/javascript">
		ddaccordion.init({
			headerclass: "submenuheader", //Shared CSS class name of headers group
			contentclass: "submenu", //Shared CSS class name of contents group
			revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
			mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
			collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
			defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
			onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
			animatedefault: false, //Should contents open by default be animated into view?
			persiststate: true, //persist state of opened contents within browser session?
			toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
			togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
			animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
			oninit: function(headers, expandedindices) { //custom code to run when headers have initalized
				//do nothing
			},
			onopenclose: function(header, index, state, isuseractivated) { //custom code to run whenever a header is opened or closed
				//do nothing
			}
		})
	</script>
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
	<script type="text/javascript">
		$(document).ready(function() {
			$('.ask').jConfirmAction();
		});
	</script>
	<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />
	<style type="text/css">
		<!--
		.style1 {
			font-size: 10px
		}
		-->
	</style>
</head>

<body onload="CoolClock.findAndCreateClocks()">
	<div id="main_container">
		<?php include("inc/header.php"); ?>
		<div class="center_content">
			<?php include("inc/left.php"); ?>
			<div class="right_content">
				<h2>Edit Popup Info</h2>
				<?php
				if (isset($msg)) {
					echo "<center><font color='red'><b>" . $msg . "</b></font></center>";
				}
				?>
				<h2>&nbsp;</h2>
				<?php
				$select_gallery = mysqli_query($con, "select * from header");
				$gallery = mysqli_fetch_array($select_gallery);
				?>
				<form method="post" id="gallery_form" enctype="multipart/form-data" name="gallery_form" class="new_user" onsubmit="return valid();">
					<table cellpadding="5" width="100%">
						<tr>
							<td width="10%">
								<label>Home Page Title</label>
							</td>
							<td width="90%">
								<textarea name="title" rows="10" cols="50"><?php echo $gallery['title']; ?></textarea>
							</td>
						</tr>
						<tr>
							<td width="10%">
								<label>Home Page Description</label>
							</td>
							<td width="90%">
								<textarea name="description" rows="10" cols="50"><?php echo $gallery['description']; ?></textarea>
							</td>
						</tr>
						<tr>
							<td width="10%">
								<label>Home Page Keyword</label>
							</td>
							<td width="90%">
								<textarea name="keyword" rows="10" cols="50"><?php echo $gallery['keyword']; ?></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="submit" name="update" value="Update" alt="Update">
							</td>
						</tr>
					</table>
				</form>
				<h2>&nbsp;</h2>
			</div>
			<!-- end of right content-->
		</div> <!--end of center content -->
		<div class="clear"></div>
	</div><!--end of main content-->
	<div class="footer">
		<div class="left_footer_login">IN ADMIN PANEL | Powered by <a href="http://redvisiontech.com" target="_blank">Powered by REDVision Technologies</a></div>
	</div>
	</div>
</body>

</html>