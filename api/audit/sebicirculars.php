 <?php

header('Content-Type: application/json');
 $html .= '';
$html .= "https://www.sebi.gov.in/sebiweb/home/HomeAction.do?doListingAll=yes&search=Mutual+Funds";

$response = [
    "sebicirculars" => $html
];
echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
exit;
?>