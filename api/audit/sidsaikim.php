 <?php

header('Content-Type: application/json');
 $html .= '';
$html .= "https://www.sebi.gov.in/filings/mutual-funds.html";

$response = [
    "sidsaikim" => $html
];
echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
exit;
?>