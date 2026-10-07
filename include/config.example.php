<?php
 $con = mysqli_connect("localhost", "redtechn_user","REPLACE_WITH_PRIVATE_VALUE","redtechn_databs");
// $con = mysqli_connect("localhost", "root", "", "kaimaassets");

if (!$con) {
die("Connection failed: " . mysqli_connect_error());
}

?>