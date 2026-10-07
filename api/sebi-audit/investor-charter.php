<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();

if (!empty($config_datas['ernwebsitename'])) {
    $websitename = $config_datas['ernwebsitename'] ?? '';

} else {
    $websitename = $config_datas['websitename'] ?? '';

}

$html = '';
$html .= '';
$html .= '<div class="rvinvestor-charter">';

$html .= "<h6 class='rich1'>Vision</h6><p class='ricp1'>To provide transparent, compliant, and efficient financial product distribution services while ensuring fair treatment and access to relevant information for investors.</p><h6 class='rich2'>Mission</h6><p class='ricp2'>To operate in accordance with applicable regulatory guidelines and maintain high standards of integrity, transparency, and professionalism in mutual fund distribution services.</p><h6 class='rich3'>Rights of Investors</h6><p class='ricp3'>As an investor, you have the right to:</p><ul class='ricul1'><li class='ricli1'>Receive accurate and complete information about financial products before investing</li><li class='ricli2'>Know the commission earned by the distributor on your investments</li><li class='ricli3'>Receive transaction confirmations, account statements, and portfolio reports</li><li class='ricli4'>Have access to grievance redressal mechanisms</li><li class='ricli5'>Have your complaints acknowledged and addressed in a timely manner</li><li class='ricli6'>Escalate unresolved complaints through SEBI SCORES (https://scores.sebi.gov.in/) or SMART ODR (https://smartodr.in)</li><li class='ricli7'>Access personal data and exercise applicable rights under relevant data protection laws</li><li class='ricli8'>Be treated in a fair and transparent manner</li></ul><h6 class='rich4'>Obligations of Investors</h6><p class='ricp4'>As an investor, you are expected to:</p><ul class='ricul2'><li class='ricli9'>Provide accurate and complete information during onboarding and KYC</li><li class='ricli10'>Read all relevant product and scheme-related documents carefully before investing</li><li class='ricli11'>Keep personal and contact details updated</li><li class='ricli12'>Complete KYC formalities as required</li><li class='ricli13'>Maintain records of investment documents and communications</li><li class='ricli14'>Understand that investments are subject to market risks</li></ul><h6 class='rich5'>Service Standards</h6><p class='ricp5'><b class='ricb1'>" . htmlspecialchars($websitename) . "</b> endeavours to:</p><ul class='ricul3'><li class='ricli15'>Process transactions as per timelines prescribed by product providers and platforms</li><li class='ricli16'>Acknowledge and address investor queries and complaints in a timely manner</li><li class='ricli17'>Maintain confidentiality of investor data in accordance with applicable laws</li><li class='ricli18'>Disclose commissions earned on investor transactions</li><li class='ricli19'>Ensure that no returns are guaranteed or assured</li></ul><h6 class='rich6'>Do's and Don'ts</h6><p class='ricp6'><b class='ricb2'>Do's:</b></p><ul class='ricul4'><li class='ricli20'>Read scheme and product documents carefully before investing</li><li class='ricli21'>Verify distributor details on the AMFI website (www.amfiindia.com)</li><li class='ricli22'>Complete KYC formalities</li><li class='ricli23'>Review investments periodically</li><li class='ricli24'>Report discrepancies promptly</li></ul><p class='ricp7'><b class='ricb3'>Don'ts:</b></p><ul class='ricul5'><li class='ricli25'>Do not invest based on unverified information or rumours</li><li class='ricli26'>Do not sign blank forms or issue blank cheques</li><li class='ricli27'>Do not invest in products without understanding associated risks</li><li class='ricli28'>Do not ignore risk profiling requirements</li><li class='ricli29'>Do not expect assured returns from market-linked investments</li></ul>";

$html .= "</div>";
$response = [
    "investor_charter" => $html
];

echo json_encode($response);
exit;
?>