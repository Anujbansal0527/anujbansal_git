<?php

$host = "localhost";
$user = "redtechn_user";
$pass = "REPLACE_WITH_PRIVATE_VALUE";
$data = "redtechn_databs";
$con = mysqli_connect($host, $user, $pass, $data);
$e_code = $_GET['aID'];

$sql_que = mysqli_query($con, "SELECT TRUSTNAME FROM `fundmaster` where CO_CODE ='$e_code'");
$sql_amc = mysqli_query($con, "select Address, Fax,Pincode,EmailID,CityName from mflocations where EntityCode='$e_code' and LocationType='Head Office' ORDER BY `entry_date` DESC limit 1");
if ($rowan = mysqli_fetch_array($sql_que)) {
    $rowmn = mysqli_fetch_array($sql_amc);

    echo $rowmn['Address'] . " " . $rowmn['CityName'] . " " . "Pincode" . " " . $rowmn['Pincode'] . " " . "Email Id" . " " . $rowmn['EmailID'];
}
?>