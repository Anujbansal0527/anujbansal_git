<?php require("../config.php"); require("session.php");
require_once('../GoogleMapAPI.class.php');
	$map = new GoogleMapAPI('map');
	// enter YOUR Google Map Key
	$map->setAPIKey('REPLACE_WITH_PRIVATE_VALUE');
	
	// create some map markers
	$select_bus=mysqli_query($con,"select * from buisness where id='".$_SESSION['bus_login_nm']."'") or die(mysqli_error());
	if(mysqli_num_rows($select_bus)>0)
	{
		$buss=mysqli_fetch_array($select_bus);
		$map->addMarkerByAddress($buss['address'],'Smartcoderszone','<b>Smartcoderszone</b>');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Index</title>
<link href="../css/template.css" rel="stylesheet" type="text/css" />
<link href="css/package.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet"
href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112"  media="screen"></LINK>
<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
<link href="css/style_merchantportal.css" rel="stylesheet" type="text/css">
<script language="javascript">
function check_agree()
{
	var flag=true;
	var error='';
	if(document.getElementById("businessAgreement").checked==false)
	{
		error='Please select terms and condition';
		flag=false;
	}
	if(flag==false)
	{
		alert(error);
		return flag;
	}
}
</script>
<?php $map->printHeaderJS(); ?>
<?php $map->printMapJS(); ?>
</head>
<body>
<div class="wrapper">
	<?php include("header.php");
	$select_buy=mysqli_query($con,"select * from buisness where id='".$_SESSION['bus_login_nm']."'") or die(mysqli_error());
	$bus=mysqli_fetch_array($select_buy);
?>
<div id="container">
	<div class="content_box">
		<div class="left_pannel">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
 				<tbody>
                	<tr>
						<td colspan="2" valign="top">
							<div style="position: relative;">
								<div style="z-index: 0; "><img src="images/bizowner7.jpg" galleryimg="no"></div>
								<div style="position: absolute; left: 690px; top: 75px; width: 270px; text-align: center; font-size: 16px; font-weight: bold;">
                                <form name="packageSelectForm" method="post" action="signup.php" enctype="multipart/form-data">
									<input name="fromPage" value="148" type="hidden">
									<input name="companyID" value="0" type="hidden"> 
									<input name="partnerTrack" value="" type="hidden"> 
									<input name="promoCode" value="DEFAULT" type="hidden"> 
									<input name="enhancedPath" value="false" type="hidden">
<?php
	if(isset($_SESSION['bus_login_nm']))
	{

	}
	else
	{
?>
									<input name="basicButton" src="images/btn_signup_green.gif" type="image" align="absmiddle" border="0"><br><br>
									List your<br>business today.
<?php
	}
?>
								</form>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2" height="5"></td>
				</tr>
				<tr>
					<td style="padding: 10px;" valign="top" colspan="2">
						<center>
							<form name="previewForm" method="post" action="" onsubmit=" return check_agree()" enctype="multipart/form-data">
								<input name="fromPage" value="204" type="hidden">
								<div class="formHead">
									<h1>Preview Your Profile</h1>
								</div>
								<div class="formErrors" style="clear: both;"></div>
								<div style="margin: 10px 0px;">
									<a href="">Preview Search Results </a> |  Preview Detailed Profile | <a href="">Preview Map </a>
								</div>
								<table style="margin: 15px;" border="0" cellpadding="0" cellspacing="0"><tbody><tr>
									<!--push for premium customers to fill out listing-->
									<td valign="top">	      	
										<table style="text-align: left;" cellpadding="0" cellspacing="0" width="100%">
											<tbody>
                                            	<tr>
													<td valign="top" width="100%">	      						
														<div style="margin-bottom: 7px;"><strong>Here's what your profile looks like right now.</strong></div>
														<div style="margin-bottom: 7px;">After you publish, you can edit and add to your profile &#8212; including photos, deals, attachments, and video.</div>
														<div style="margin-bottom: 7px;">Go to the bottom of this page to view the Business Agreement and publish your profile.</div>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="formBox">
							<div class="preview">
								<div class="previewSection">
									<table border="0" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td style="text-align: left;" valign="top" width="100%">
													<div id="topNav">
                                                    	<ul>
                                                        	<li class="topNavOn"><div><a href="o">Overview</a></div></li>
                                                            <li class="topNavOff"><div><a href="">Map</a></div></li>
                                                            <li class="topNavOff"><div><a>Reviews</a></div></li>
                                                            <li class="topNavOff"><div><a href="">Deals</a></div></li>
                                                            <li class="topNavOff"><div><a href="videodetail.php">Video</a></div></li>
														</ul>
													</div>
													<div class="profileBody"><div class="box4"><br></div></div>
													<div class="profileBody profilePadding">
														<table border="0" cellpadding="0" cellspacing="0" width="742">
															<tbody>
                                                            	<tr>
																	<td style="padding-top: 10px;" valign="top">
<?php
		$select_review=mysqli_query($con,"select count(bus_id) as tt from review where bus_id='".$_SESSION['bus_login_nm']."'") or die(mysqli_error());
		$total_rev=mysqli_fetch_array($select_review);
?>
																		<div style="padding-bottom: 6px;">
                                                                        	<div style="font-size: 18px; font-weight: bold; padding: 0px; margin: 0px;"><?php echo $bus['username'];?></div>
																		</div>
																		<div style="padding-bottom: 3px;">
                                                                        	<img src="images/newstars-0.gif">&nbsp;<span class="linkBlue"><?php echo $total_rev['tt'];?> reviews</span> &nbsp; <a href="rate_review.php?id=<?php echo $bus['id'];?>"><img src="images/btn_ratereview.gif" alt="Rate &amp; Review" align="middle" border="0"></a>&nbsp; <span class="linkBlue"><b>rate &amp; review</b></span>
																		</div>
																		<div style="float: left; padding: 10px 10px 21px 0px; text-align: center;">
                                                                        	<img src="images/merchantImages_002.jpeg" style="border: 0px none; margin-bottom: 7px;">
																		</div>
																		<table style="margin-top: 10px;" border="0" cellpadding="0" cellspacing="0">
      																		<tbody><tr>
																				<td colspan="2" style="padding-bottom: 5px;" valign="top">
<?php if($bus['hideOnSearch']=='on'){?>  <span style=" float:left;"><?php echo $bus['address'];?><br />
<?php echo $bus['city'];?> <?php echo $bus['state'];?></span><?php }else {?> (Location hidden)<?php } ?>&nbsp;&nbsp;
																				</td>
																			</tr>
																			<tr>
																				<td style="padding-right: 10px;" valign="top">Phone:</td>
																				<td valign="top" width="100%">(<?php $p=explode('&',$bus['phone']);echo "(".$p[0].") ".$p[1]."-".$p[2];?>&nbsp;
																				</td>
																			</tr>
																			<tr>
																				<td style="padding-right: 10px;" valign="top">Email:</td>
																				<td valign="top" width="100%">
																					<span class="linkBlue"><a href="mailto:<?php echo $bus['email'];?>">Email this business</a></span>&nbsp;&nbsp;
																				</td>
																			</tr>
																			<tr>
																				<td style="padding-right: 10px;" valign="top">Website:</td>
																				<td width="100%"><span class="linkBlue">
																					<?php echo $bus['url'];?>
																					</span>	&nbsp;&nbsp;
																					<a href="" class="editProfileLink">Edit</a>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																	<br clear="all">
																	<span class="linkBlue" style="font-weight: bold;">Save</span>&nbsp;&nbsp;|&nbsp;&nbsp;
																	<span class="linkBlue" style="font-weight: bold;">Share</span>&nbsp;&nbsp;|&nbsp;&nbsp;
																	<span class="linkBlue" style="font-weight: bold;">Print</span>&nbsp;&nbsp;&nbsp;
                                                                    <img src="images/icon_facebook.gif" align="absmiddle"> &nbsp;<span class="linkBlue" style="font-weight: bold;">Post to Facebook</span><br>
  </td>
  <td width="15" nowrap="nowrap"><br></td>
  <!--ratings block-->
  <td style="padding: 10px 12px;" align="right" valign="top">
    
  </td>
 </tr>
</tbody></table>
</div>
<div class="profileBody profilePadding">
<div style="height: 38px;"><br></div>					

<table border="0" cellpadding="0" cellspacing="0" width="742">
 <tbody><tr>
  <td valign="top" width="496">
  	<h2>Map</h2>
		
        <hr />
		<div class="google_map">
<?php $map->printMap(); ?>
</div>
</td>
    <td width="18"><br></td>
    <td valign="top" width="226">
    </td>
</tr>
</tbody></table>
</div>
<div class="profileBody"><div class="box2"><div class="box1"><br></div></div></div>
</td>
</tr>
</tbody></table>
</div>
</div>
</div>
<div class="buttons" style="padding-top: 5px;">
               <div style="padding: 10px 10px 15px;">
								<span class="blue_text">Accept Terms: </span>
								<span class="required">*</span>
								<br>
								<div style="padding-top: 5px; padding-left: 10px;">
								<input name="businessAgreement" id="businessAgreement" value="on" type="checkbox">I have read and agree with the terms set forth in the
     						<a href="">Business
								Agreement</a>.
								</div>
                </div>
						<a href=""><img src="images/btn_back.gif" align="absmiddle" border="0"></a>						
						<input name="payButton"  style="background:url(images/btn_publish.gif) no-repeat; border:none;height:30px;
width:113px;" value="" type="submit" >	
							&nbsp;<strong>Publish your profile.</strong> &nbsp; 					
</div>
</form>
</center>
	</td>
  </tr>
</tbody></table>
</div>
</div>
</div>
</div>
<?php include("footer.php"); ?>
</div>
</body>
</html>