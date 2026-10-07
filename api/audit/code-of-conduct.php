 <?php

header('Content-Type: application/json');
 $html .= '';
$html .= "https://www.redvisiontechnologies.com/api/audit/code-of-conduct1.php";

$response = [
    "codeofconduct" => $html
];
echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
exit;
?>