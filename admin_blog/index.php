<?php session_start();
if(isset($_SESSION['admin_blog_login']) && ($_SESSION['admin_blog_login']!="")){
	header("location:home.php");
}else{
	header("location:../index.php");
} ?>                                                                                            
