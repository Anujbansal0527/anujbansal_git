<?php require("config.php"); require("session.php");
if(isset($_POST['update']))
{
	$date=date('Y-m-d');
	$target_path = "../images/";
	$target_path = $target_path . basename( $_FILES['ad_image']['name']); 
	$type=$_FILES['ad_image']['type'];
	if(($type=="image/jpeg") || ($type=="image/gif") || ($type=="image/bmp") || ($type=="image/png"))
	{
		$nm = strrev($_FILES['ad_image']['name']);
		$nmar = explode(".",$nm);
		$ext = strrev($nmar[0]);
		if(($ext=="jpeg") || ($ext=="jpg") || ($ext=="gif") || ($ext=="png") || ($ext=="bmp"))
		{
			if($_FILES['ad_image']['name']!='')
			{
				$filename=$_FILES['ad_image']['name'];
				if(move_uploaded_file($_FILES['ad_image']['tmp_name'], $target_path))
				{
					$insert_join=mysqli_query($con,"update popinfo set img='".$filename."',mesage='".addslashes($_POST["elm1"])."',status='".addslashes($_REQUEST["pop"])."' where id='1'") or die(mysqli_error());
					$msg="Popup Info Successfully Updated!";
				}
				else
				{
					$msg="There was an error uploading the file, please try again!";
				}
			}
			else
			{
				$insert_join=mysqli_query($con,"update popinfo set mesage='".addslashes($_POST["elm1"])."',status='".$_REQUEST["pop"]."' where id='1'") or die(mysqli_error());
				$msg="Popup Info Successfully Updated!";
			}
		}
		else
		{
			$msg="Type not supported!!";
		}
	}
	else
	{
		$msg="Type not supported!!";
	}
} ?>
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
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
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
<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />
<style type="text/css">
<!--
.style1 {font-size: 10px}
-->
</style>
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
</head>
<body>
<div id="main_container">
<?php include("inc/header.php");?>
<div class="center_content">  
<?php include("inc/left.php"); ?>  
<div class="right_content">            
<h2>Edit Popup Info</h2> 
<?php
if(isset($msg))
{
echo "<center><font color='red'><b>".$msg."</b></font></center>";
}
?>
<h2>&nbsp;</h2>
<?php
$select_gallery=mysqli_query($con,"select * from popinfo") or die(mysqli_error());
if(mysqli_num_rows($select_gallery)>0){ $gallery=mysqli_fetch_array($select_gallery); }
?>
<form method="post" id="gallery_form" enctype="multipart/form-data" name="gallery_form" class="new_user" onsubmit="return valid();">
<font color="#990000">File Format Suppported : .jpg .gif .png .bmp </font><br />
<table cellpadding="5" width="100%">
<tr><td>
<label class="style3">Popup Image</label></td>
<td><img src="../img/<?php echo $gallery['img'];?>" width="100" height="100" /><br />	<input type="file" name="ad_image" />
<span class="style1">230px X 235px and 2MB Max Size</span> 
</td></tr>
<tr><td>
<label class="style3">Enable/Disable Popup</label></td>
<td><select name="pop"><option value="">--</option><option value="1">Enable</option><option value="2">Disable</option></select>
<span class="style1"><?php if($gallery['status']==1) echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Current status :- Enabled"; else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Current status :- Disabled"; ?></span>
</td></tr>
<tr><td width="10%" colspan="2">
<label>Message</label></td></tr>
<tr><td width="90%" colspan="2">
<textarea id="elm1" name="elm1" rows="15" cols="50" style="width:80%"><?php echo $gallery['mesage']; ?></textarea></td></tr>
<tr><td colspan="2" align="center">
<input type="submit" name="update" value="Update" alt="Update">
</td></tr></table>
</form>
<h2>&nbsp;</h2>
</div>
<!-- end of right content-->
</div>   <!--end of center content -->               
<div class="clear"></div>
</div><!--end of main content-->
<div class="footer">
<div class="left_footer_login">IN ADMIN PANEL | Powered by <a href="http://redvisiontech.com" target="_blank">Powered by REDVision Technologies</a></div>
</div></div>		
</body>
</html>