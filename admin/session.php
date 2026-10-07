<?php session_start(); 
if((!isset($_SESSION['admin_login'])) || (trim($_SESSION['admin_login'])==""))
{
	header("location:logout.php");	
	die();
}
?>