<?php

function getCategory($config,$id){
	$query = "SELECT * FROM post_category WHERE id = $id";
	$qu = mysqli_query($con,$query);
	$data = mysqli_fetch_assoc($qu);
	return $data['name'];
}

function getAllCategory($config){
	$query1 = "SELECT * FROM post_category";
	$qu1 = mysqli_query($con,$query1);
	$data1 = array();

	while ($d1  = mysqli_fetch_assoc($qu1)) {
		$data1[] = $d1;
	}
	return $data1;
}

function getAllCategoryTutorial($config){
	$query1 = "SELECT * FROM tutorial_category";
	$qu1 = mysqli_query($con,$query1);
	$data1 = array();

	while ($d1  = mysqli_fetch_assoc($qu1)) {
		$data1[] = $d1;
	}
	return $data1;
}

function getImagesByPost($config,$post_id){
	$query = "SELECT * FROM post_images WHERE post_id = $post_id";
	$qu = mysqli_query($con,$query);
	$data = array();

	while ($d  = mysqli_fetch_assoc($qu)) {
		$data[] = $d;
	}
	return $data;
}

function getAdminInfo($config,$username){
	$query = "SELECT * FROM admin_blog WHERE username=$username";
	$qu = mysqli_query($con,$query);
	$data = mysqli_fetch_assoc($qu);
	return $data;
}

function getPostThumb($config,$id){
	$query = "SELECT * FROM post_images WHERE post_id=$id";
	$qu = mysqli_query($con,$query);
	$data = mysqli_fetch_assoc($qu);
	return $data['image'];
}

function getAllPost($config){
	$query = "SELECT * FROM post ORDER BY id DESC";
	$qu = mysqli_query($con,$query);
	$data = array();

	while ($d  = mysqli_fetch_assoc($qu)) {
		$data[] = $d;
	}
	return $data;
}


?>