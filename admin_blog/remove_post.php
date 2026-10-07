<?php
include('include/config.php');
if (isset($_GET['id'])) {
     $id = $_GET['id'];

     $select = "SELECT * FROM post WHERE id =$id";
     $query = mysqli_query($con, $select);
     $item = mysqli_fetch_array($query);
     $img = $item['image'];
     unlink('../assets/images/admin/blog/' . $img);

     $query2 = "DELETE FROM post WHERE id=$id";
     $run2 = mysqli_query($con, $query2);
     header("location:manage_post.php");
}
