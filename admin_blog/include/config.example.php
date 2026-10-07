<?php
$con=mysqli_connect("localhost","redtechn_user","REPLACE_WITH_PRIVATE_VALUE","redtechn_databs")or die(mysqli_error());
// Use Unicode for blog reads and writes (including rupee symbols and emoji).
if (!mysqli_set_charset($con, "utf8mb4")) {
    throw new RuntimeException("Unable to configure the database character set.");
}
?>