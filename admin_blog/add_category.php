<?php
include('include/config.php');
if (isset($_POST['addcat'])) {
     $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
     $query2 = "INSERT INTO post_category (name) VALUES ('$category_name')";
     $run2 = mysqli_query($con, $query2);
     header("location:manage_category.php");
}
