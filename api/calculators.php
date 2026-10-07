 
<?php 
// db.php - Database connection
require __DIR__ . '/../rvm-include/config.php';

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

 
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if (!$con) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed', 'details' => mysqli_connect_error()]);
    exit;
}

mysqli_set_charset($con, "utf8mb4");

$sql = "SELECT * FROM rv_web_calculators";
$result = $con->query($sql);

if (!$result) {
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
    echo json_encode(['status' => true, 'message' => 'No records found']);
}

$con->close();
?>