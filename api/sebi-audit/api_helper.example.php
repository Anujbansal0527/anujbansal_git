<?php
 




// ==============================
// 1. API KEY
// ==============================
$valid_api_key = "REPLACE_WITH_PRIVATE_VALUE";

$headers = getallheaders();
$api_key = $_GET['api_key'] ?? ($headers['Authorization'] ?? '');

if ($api_key !== $valid_api_key && $api_key !== "Bearer $valid_api_key") {
    http_response_code(401);
    echo json_encode(['error' => 'Invalid API Key']);
    exit;
}

header("Content-Type: application/json");
// ==============================
// 1. GET CONFIG DATA FUNCTION
// ==============================
function rv_getConfigData()
{
    if (!isset($_POST['config_data'])) {
        http_response_code(400);
        echo json_encode(['error' => 'No data received']);
        exit;
    }

    $config_data = json_decode($_POST['config_data'], true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid JSON']);
        exit;
    }

    return $config_data;
}

 
 

?>