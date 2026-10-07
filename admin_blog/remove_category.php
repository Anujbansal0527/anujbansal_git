<?php
include('include/config.php');
if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $query2 = "DELETE FROM post_category WHERE id=$id";
     $run2 = mysqli_query($con, $query2);
     header("location:manage_category.php");
}
