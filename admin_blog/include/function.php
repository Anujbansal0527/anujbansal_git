<?php

function getCategory($con, $id)
{
	$query = "SELECT * FROM post_category WHERE id = $id";
	$qu = mysqli_query($con, $query);
	$data = mysqli_fetch_assoc($qu);
	return $data['name'];
}

function getAllCategory($con)
{
	$query1 = "SELECT * FROM post_category";
	$qu1 = mysqli_query($con, $query1);
	$data1 = array();

	while ($d1  = mysqli_fetch_assoc($qu1)) {
		$data1[] = $d1;
	}
	return $data1;
}

function getAllCategoryTutorial($con)
{
	$query1 = "SELECT * FROM tutorial_category";
	$qu1 = mysqli_query($con, $query1);
	$data1 = array();

	while ($d1  = mysqli_fetch_assoc($qu1)) {
		$data1[] = $d1;
	}
	return $data1;
}

function getImagesByPost($con, $post_id)
{
	$query = "SELECT * FROM post_images WHERE post_id = $post_id";
	$qu = mysqli_query($con, $query);
	$data = array();

	while ($d  = mysqli_fetch_assoc($qu)) {
		$data[] = $d;
	}
	return $data;
}

function getAdminInfo($con, $username)
{
	$query = "SELECT * FROM admin_blog WHERE username=$username";
	$qu = mysqli_query($con, $query);
	$data = mysqli_fetch_assoc($qu);
	return $data;
}

function getPostThumb($con, $id)
{
	$query = "SELECT * FROM post_images WHERE post_id=$id";
	$qu = mysqli_query($con, $query);
	$data = mysqli_fetch_assoc($qu);
	return $data['image'];
}

function getAllPost($con)
{
	$query = "SELECT * FROM post ORDER BY id DESC";
	$qu = mysqli_query($con, $query);
	$data = array();

	while ($d  = mysqli_fetch_assoc($qu)) {
		$data[] = $d;
	}
	return $data;
}

function getPostBySlug($con, $slug_url)
{
// Create a prepared statement
$query = "SELECT * FROM post WHERE slug_url = ?";
$stmtPostBySlug = mysqli_prepare($con, $query);

if ($stmtPostBySlug === false) {
// Handle error - in a real-world application, you might log this and return an appropriate response
die('Prepare failed: ' . htmlspecialchars(mysqli_error($con)));
}
// Bind parameters to the prepared statement
mysqli_stmt_bind_param($stmtPostBySlug, "s", $slug_url);

// Execute the statement
if (!mysqli_stmt_execute($stmtPostBySlug)) {
// Handle error - in a real-world application, you might log this and return an appropriate response
die('Execute failed: ' . htmlspecialchars(mysqli_stmt_error($stmtPostBySlug)));
}
// Get the result set from the prepared statement
$resultPostBySlug = mysqli_stmt_get_result($stmtPostBySlug);

if ($resultPostBySlug === false) {
// Handle error - in a real-world application, you might log this and return an appropriate response
die('Get result failed: ' . htmlspecialchars(mysqli_stmt_error($stmtPostBySlug)));
}
// Fetch the row as an associative array
$post = mysqli_fetch_assoc($resultPostBySlug);
// Free the result set
mysqli_free_result($resultPostBySlug);

// Close the statement
mysqli_stmt_close($stmtPostBySlug);
return $post;
}
// FETCH SINGLE DATA
function rvFetchSingleData($con, $id, $column, $table)
{
// Create a prepared statement
$stmt = mysqli_prepare($con, "SELECT * FROM $table WHERE $column = ? ORDER BY id DESC LIMIT 1");
if ($stmt === false) {
// Log the error and handle it gracefully
error_log('Prepare failed: ' . mysqli_error($con));
return false; // Return false or handle the error accordingly
}
// Bind the id parameter to the prepared statement
mysqli_stmt_bind_param($stmt, 'i', $id);

// Execute the query
if (!mysqli_stmt_execute($stmt)) {
// Log the error and handle it gracefully
error_log('Execute failed: ' . mysqli_stmt_error($stmt));
return false; // Return false or handle the error accordingly
}
// Get the result set from the prepared statement
$result = mysqli_stmt_get_result($stmt);
if ($result === false) {
// Log the error and handle it gracefully
error_log('Get result failed: ' . mysqli_stmt_error($stmt));
return false; // Return false or handle the error accordingly
}
// Fetch the row as an associative array
$row = mysqli_fetch_assoc($result);
// Free the result set
mysqli_free_result($result);
// Close the statement
mysqli_stmt_close($stmt);

return $row;
}