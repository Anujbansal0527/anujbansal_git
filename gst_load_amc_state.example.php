<?php $host = "localhost";
$user = "redtechn_user";
$pass = "REPLACE_WITH_PRIVATE_VALUE";
$data = "redtechn_databs";
$con = mysqli_connect($host,$user,$pass,$data);
$e_code= $_GET['entity_code'];


$sql_amc=mysqli_query($con,"select StateName from mflocations where EntityCode='$e_code' and LocationType='Head Office' limit 1"); 

	$rowmn=mysqli_fetch_array($sql_amc);      
	
	echo $rowmn['StateName'];
   
?>