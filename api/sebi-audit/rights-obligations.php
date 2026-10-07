<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();

$mfeuin = $config_datas['mfeuin'] ?? '';

$html = '';
$html .= '<div class="rvrights-obligations rrodiv1">';

$html .= "<p class='rrop1'><b class='rrob1'>Investor Rights</b></p> <ul class='rroul1'> <li class='rroli1'>Right to receive complete and accurate information about any Mutual Fund scheme before investing.</li> <li class='rroli2'>Right to know all costs, commissions, and fees (including trail commission received from AMCs).</li> <li class='rroli3'>Right to a documented risk profile assessment before any scheme recommendation.</li> <li class='rroli4'>Right to receive written unsuitability communication if a product is outside your risk ceiling.</li> <li class='rroli5'>Right to transparent, timely grievance redressal within 15 working days.</li> <li class='rroli6'>Right to access, correct, and request deletion of personal data under DPDPA 2023.</li> <li class='rroli7'>Right to invest in Direct Plans directly with AMCs at a lower expense ratio.</li> <li class='rroli8'>Right to switch between Regular and Direct Plans subject to AMC rules.</li> <li class='rroli9'>Right to escalate unresolved complaints to SEBI SCORES and SMART ODR.</li> <li class='rroli10'>Right to receive periodic portfolio statements and Consolidated Account Statement (CAS).</li> </ul> <p class='rrop2'><b class='rrob2'>Investor Obligations</b></p> <ul class='rroul2'> <li class='rroli11'>Provide accurate and complete KYC and personal information.</li> <li class='rroli12'>Complete risk profiling before investing and update it on life events or at least annually.</li> <li class='rroli13'>Read Scheme Information Document (SID), Statement of Additional Information (SAI), and Key Information Memorandum (KIM) before investing.</li> <li class='rroli14'>Inform us of any changes in personal details, bank accounts, or nominees.</li> <li class='rroli15'>Review portfolio statements and CAS regularly.</li> <li class='rroli16'>Do not share login credentials, OTPs, or passwords with anyone — including our staff.</li> <li class='rroli17'>Comply with FATCA / CRS self-certification requirements.</li> <li class='rroli18'>Report suspicious communications (phishing, impersonation) immediately.</li> </ul> <p class='rrop3'><b class='rrob3'>Distributor Obligations</b></p> <ul class='rroul3'> <li class='rroli19'>Act in the investor's best interest per AMFI Code of Conduct.</li> <li class='rroli20'>Conduct proper risk profiling before any scheme recommendation.</li> <li class='rroli21'>Disclose all commissions transparently.</li> <li class='rroli22'>Not guarantee or promise any specific returns.</li>";

if (!empty($mfeuin)) {
    $html .= " <li class='rroli23'>Tag every transaction with the valid EUIN " . htmlspecialchars($mfeuin) . ".</li> ";
}

$html .= "<li class='rroli24'>Resolve grievances within 15 working days and maintain the complaints register.</li> <li class='rroli25'>Maintain investor records as per regulatory requirments.</li> <li class='rroli26'>Comply with all SEBI and AMFI guidelines including the Master Circular for MFDs.</li> </ul>";

$html .= '</div>';

$response = [
    "rights_obligations" => $html
];

echo json_encode($response);
exit;
?>