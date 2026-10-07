<?php require("config.php"); require("session.php");
if(isset($_POST['update']))
{
$sql = "UPDATE mutual_fund SET title = '".addslashes($_REQUEST['title'])."', description = '".addslashes($_REQUEST["elm1"])."' WHERE id = '".$_REQUEST['id']."'";
mysqli_query($con,$sql) or die(mysqli_error());
$mess="Content has been updated successfully."; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>IN ADMIN PANEL</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--[if IE]><script type="text/javascript" src="js/excanvas.js"></script><![endif]-->
<script type="text/javascript" src="js/coolclock.js"></script>
<script type="text/javascript" src="js/moreskins.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,forecolor,backcolor,|,insertdate,inserttime,preview",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
			],
});
</script>
<!-- /TinyMCE -->
<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />
</head>
<body onload="CoolClock.findAndCreateClocks()">
<div id="main_container">
<?php include("inc/header.php");?>
<div class="center_content">  
<?php include("inc/left.php"); ?>  
<div class="right_content">            
<h2>Update Static Contents </h2> 
<h2>&nbsp;</h2>
<?php
if(isset($mess))
{
	echo "<center><b>".$mess."</b></center>";
} ?>
<form method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="100%" cellspacing="3" align="center" class="admin_form" border="0">
<tr><td width="30%"></td><td width="70%"></td></tr>
<?php 
$select_user=mysqli_query($con,"select * from mutual_fund where id='".$_GET['id']."'") or die(mysqli_error());
if(mysqli_num_rows($select_user)>0){ $row=mysqli_fetch_array($select_user); } ?>
<tr class="heading"><td align="center" colspan="2"><strong></strong ></td></tr>
<tr><td width="10%">
<strong>Page Title</strong></td>
<td width="90%">
<input name="title" type="text" value="<?php echo $row['title']; ?>" size="50" /></td>
</tr>
<tr><td valign="top" width="30%" class="admin_form_label" colspan="2"><strong>Description :</strong></td></tr>
<tr><td colspan="2">
<textarea id="elm1" name="elm1" rows="15" cols="50" style="width:80%"><?php echo $row['description']; ?></textarea>
</td></tr>
<tr><td width="70%" class="admin_form_field" colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" align="center" class="admin_form_footer">
<input type="submit" name="update" value="Update"  id="sub_button"/>&nbsp;
<input type="button" name="cancel" value="Cancel" id="sub_button" onclick="javascript:window.location.href='home.php'"/></td></tr>
</table>
</form></td></tr></table></div><!-- end of right content-->
</div><!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->
<div class="footer">
<div class="left_footer_login">IN ADMIN PANEL | Powered by <a href="http://www.redvisiontech.com" target="_blank">REDVision Technologies</a></div>
<div class="right_footer_login"></div>
</div>
</div>	
</body></html>