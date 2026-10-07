<?php 
require __DIR__ . '/../rvm-include/config.php';

 header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Connect
if (!$con) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Query with WHERE clause to filter for status = 1
$sql = "SELECT * FROM rv_web_login WHERE status = '1'";
$result = $con->query($sql);

if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => 'Query failed', 'details' => $con->error]);
    exit;
}

$response = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    echo json_encode($response);
} else {
    echo json_encode(['status' => true, 'message' => 'No active records found']);
}

$con->close();

?>