<?php require("config.php"); require("session.php");
$s1          =   mysqli_query($con,"SELECT MAX(`id`) FROM `static_pages`") or die("Please Contact Administrator.");
if(mysqli_num_rows($s1)>0)
{
	$s2          =   mysqli_fetch_array($s1);
	$s3          = $s2 ['0'];  
	for($i=1;$i<=$s3;$i++)
	{
		mysqli_query($con,"UPDATE `static_pages` SET `title`='',`description`='',`metadescription`='',`keyword`='',`footer`='' WHERE `id` = $i;") or die("Please Contact Administrator.");
		echo "data delete from id='$i'<br>";
	}
}
?>