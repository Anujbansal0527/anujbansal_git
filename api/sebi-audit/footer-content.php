<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();

if (!empty($config_datas['websitenamech'])) {
    $websitename = $config_datas['websitenamech'];
} elseif (!empty($config_datas['ernwebsitename'])) {
    $websitename = $config_datas['ernwebsitename'];
} else {
    $websitename = $config_datas['websitename'] ?? '';
}

$rvmfarnDate = $config_datas['mfarnDate'] ?? '';
$rvapmiDate = $config_datas['apmiDate'] ?? '';
$rvmirdaiDate = $config_datas['irdaiDate'] ?? '';
$rvprategs = $config_datas['pteg']['prategs'] ?? '';
$rvpratege = $config_datas['pteg']['pratege'] ?? '';



$html = '';
$html .= '<div>';

$html .= $rvprategs . $websitename . $rvpratege;

if (!empty($rvmfarnDate)) {
    $html .= $rvprategs . $rvmfarnDate . $rvpratege;
}
if (!empty($rvapmiDate)) {
    $html .= $rvprategs . $rvapmiDate . $rvpratege;
}
if (!empty($rvmirdaiDate)) {
    $html .= $rvprategs . $rvmirdaiDate . $rvpratege;
}

$html .= '</div>';

$response = [
    "footer_content" => $html
];

echo json_encode($response);
exit;
?>
?>