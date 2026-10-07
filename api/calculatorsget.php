<?php 

require __DIR__ . '/../rvm-include/config.php';

header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Headers: Content-Type");

// Database config (make sure these are set above)

if (!$con) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

$urlName = isset($_GET["urlName"]) ? trim($_GET["urlName"]) : "";

if (empty($urlName)) {
    echo json_encode(["error" => "No URL Name provided"]);
    exit;
}

$safeUrlName = mysqli_real_escape_string($con, $urlName);

$sql = "SELECT * FROM rv_web_calculators WHERE urlName = '$safeUrlName'";
$result = $con->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(['status' => false, 'error' => 'No record found']);
}

$con->close();
?>