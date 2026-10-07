<?php session_start();
if ((!isset($_SESSION['admin_blog_login'])) || (trim($_SESSION['admin_blog_login']) == "")) {
	header("location:logout.php");
	die();
}
