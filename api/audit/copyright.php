 <?php

header('Content-Type: application/json');
 $html .= '';
$html .= "Designed &amp; Developed by : <b><a href='https://www.redvisiontechnologies.com/' rel='nofollow noopener noreferrer'  target='_' style='color: var(--rvc-color);'>REDVision Global Technologies</a></b>";

$response = [
    "copyright" => $html
];
echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
exit;
?>