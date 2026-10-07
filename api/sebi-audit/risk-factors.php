<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();

if (!empty($config_datas['ernwebsitename'])) {
    $websitename = $config_datas['ernwebsitename'] ?? '';

} else {
    $websitename = $config_datas['websitename'] ?? '';

}
$rvapmi = $config_datas['apmi'] ?? '';
$rvirdai = $config_datas['irdai'] ?? '';
$rvaif = $config_datas['aif'] ?? '';
$rvsif = $config_datas['sif'] ?? '';
$rvgiftcity = $config_datas['giftcity'] ?? '';
$rvgbonds = $config_datas['bonds'] ?? '';


$html = '';
$html .= '<div class="rvrisk-factors rrfdiv1">';

$html .= '<p class="rrfp1">Investments in securities markets are subject to market risks. Mutual Fund investments are subject to market risks. Please read all scheme-related documents carefully before investing. Past performance is not indicative of future returns.</p><p class="rrfp2">The value of investments may fluctuate due to various factors including market conditions, interest rate movements, credit quality of underlying securities, and liquidity in the market.</p><p class="rrfp3">Different types of financial products carry different levels of risk. Investors should evaluate their risk appetite and investment objectives before making any investment decision.</p><p class="rrfp4">Please refer to the respective offering documents such as Scheme Information Document (SID), Statement of Additional Information (SAI), Key Information Memorandum (KIM), Disclosure Documents, or other product-specific materials for detailed risk factors.</p><p class="rrfp5"><b class="rrfb1">' . htmlspecialchars($websitename) . '</b> is an AMFI Registered Mutual Fund Distributor and provides distribution services only. </p><p class="rrfp12"><b class="rrfb2">' . htmlspecialchars($websitename) . '</b> is NOT a SEBI Registered Investment Adviser.</p>';

if (!empty($rvapmi)) {
    $html .= '<p class="rrfp6">Portfolio Management Services are subject to market risks. Please read the Disclosure Document of the PMS provider carefully before investing. Past performance is not indicative of future returns.</p>';
}

if (!empty($rvirdai)) {
    $html .= '<p class="rrfp7">Insurance products are subject to the terms and conditions of the respective insurer. Please read all policy-related documents carefully before purchasing.</p>';
}

if (!empty($rvaif)) {
    $html .= '<p class="rrfp8">Alternative Investment Funds are subject to market risks. Please read all scheme-related documents carefully before investing. Past performance is not indicative of future returns.</p>';
}

if (!empty($rvsif)) {
    $html .= '<p class="rrfp9">Specialised Investment Funds are subject to market risks. Please read all related documents carefully before investing. Past performance is not indicative of future returns.</p>';
}

if (!empty($rvgiftcity)) {
    $html .= '<p class="rrfp10">Investments through GIFT City or offshore platforms are subject to applicable regulations, currency risks, and tax implications. Please read all related documents carefully before investing.</p>';
}

if (!empty($rvgbonds)) {
    $html .= '<p class="rrfp11">Investments in bonds and fixed income instruments are subject to risks including interest rate risk, credit risk, and liquidity risk. Investors are advised to read all relevant documents carefully before investing.</p>';
}

$html .= '</div>';

$response = [
    "risk_factors" => $html
];

echo json_encode($response);
exit;
?>