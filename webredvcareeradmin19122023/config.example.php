<?php
$config = require __DIR__ . '/sfa_config.php';

// PDO connection
$pdo = new PDO(
    $config['db']['dsn'],
    $config['db']['user'],
    $config['db']['pass'],
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

// MySQLi connection
$con = mysqli_connect("localhost", $config['db']['user'], $config['db']['pass'], $config['db']['rdata']);

if (!$con) {
    die("MySQLi Connection failed: " . mysqli_connect_error());
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
$userinfo = rvFetchSingleData($con, 1, 'id', 'admin');


?>