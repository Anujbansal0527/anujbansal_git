<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();

if (!empty($config_datas['ernwebsitename'])) {
    $websitename = $config_datas['ernwebsitename'] ?? '';

} else {
    $websitename = $config_datas['websitename'] ?? '';

}
$mfarn = $config_datas['mfarn'] ?? '';
$rvcity = $config_datas['city'] ?? '';

$arn_text = '';
if (!empty($mfarn)) {
    $arn_text = "(ARN: $mfarn)";
}

$html = '';
$html .= '';
$html .= '<div class="rvdisclaimer">';
$html .= '<h6 class="rcch61">General Information</h6> <p class="rccp1">The information provided on this website is for general informational purposes only. While efforts are made to keep the information accurate and up to date, <b class="rccb1"><b class="rccb2">' . htmlspecialchars($websitename) . '</b></b> makes no representations or warranties, express or implied, regarding the completeness, accuracy, reliability, or suitability of any information, products, or services available on this website.</p> <p class="rccp2"><b class="rccb3"><b class="rccb4">' . htmlspecialchars($websitename) . '</b></b> is an AMFI Registered Mutual Fund Distributor <b class="rccb5">' . htmlspecialchars($arn_text) . '</b> and is NOT a SEBI Registered Investment Adviser. Nothing contained on this website should be construed as investment advice.</p> <h6 class="rcch62">Nature of Services</h6> <p class="rccp3"><b class="rccb6"><b class="rccb7">' . htmlspecialchars($websitename) . '</b></b> facilitates distribution of financial products offered by SEBI-registered entities and other permitted product providers. All services are provided in a distribution capacity only and do not constitute investment advisory or portfolio management services.</p> <h6 class="rcch63">Risk Disclosure</h6> <p class="rccp4">Investments in securities markets are subject to market risks. Please refer to the Risk Factors page for detailed information.</p> <h6 class="rcch64">Product-Specific Disclosures</h6> <p class="rccp5">Product-specific risk disclosures, including those related to Mutual Funds, PMS, AIF, SIF, Insurance, bonds, or other products (where applicable), are available on the Risk Factors page and relevant sections of this website.</p> <h6 class="rcch65">Commission Disclosure</h6> <p class="rccp6"><b class="rccb8"><b class="rccb9">' . htmlspecialchars($websitename) . '</b></b> receives commission from product providers for the distribution of financial products. Details are available on the Commission Disclosure page.</p> <h6 class="rcch66">Tools & Calculators</h6> <p class="rccp7">All tools, calculators, and projections provided on this website are for illustration purposes only. Actual outcomes may vary based on market conditions and other factors.</p> <h6 class="rcch67">Scheme / Product Documents</h6> <p class="rccp8">Relevant offering documents such as Scheme Information Document (SID), Key Information Memorandum (KIM), Disclosure Documents, or other product-related materials are available with the respective product providers.</p> <h6 class="rcch68">Third-Party Links</h6> <p class="rccp9">This website may contain links to third-party websites. <b class="rccb10"><b class="rccb11">' . htmlspecialchars($websitename) . '</b></b> does not control or take responsibility for the content, accuracy, or security of such websites.</p> <h6 class="rcch69">Limitation of Liability</h6> <p class="rccp10"><b class="rccb12"><b class="rccb13">' . htmlspecialchars($websitename) . '</b></b> shall not be liable for any loss or damage arising from the use of this website or reliance on any information provided.</p> <h6 class="rcch610">Grievance Redressal</h6> <p class="rccp11">For any complaints or grievances, please refer to the Grievance Redressal page. Complaints may also be registered on the SEBI SCORES platform (https://scores.sebi.gov.in/) or through SMART ODR (https://smartodr.in).</p> <h6 class="rcch611">Jurisdiction</h6> <p class="rccp12">These terms are governed by the laws of India. Any disputes shall be subject to the jurisdiction of courts at <b class="rccb14">' . htmlspecialchars($rvcity) . '</b>.</p>';
$html .= '</div>';

$response = [
    "disclaimer" => $html
];

echo json_encode($response);
exit;
?>