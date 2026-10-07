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
$html .= '<div class="rvterms-conditions"">';


$html .= '<h6 class="rtach61">Introduction</h6><p class="rtacp1">These Terms & Conditions govern your use of this website and the services provided by <b class="rtacb1">' . htmlspecialchars($websitename) . '</b>. By accessing or using this website, you agree to be bound by these Terms. If you do not agree, please do not use this website.</p><h6 class="rtach62">Nature of Services</h6><p class="rtacp2"><b class="rtacb2">' . htmlspecialchars($websitename) . '</b> is an AMFI Registered Mutual Fund Distributor <b class="rtacb3">' . htmlspecialchars($arn_text) . '</b>. We facilitate the distribution of financial products offered by SEBI-registered entities, including mutual funds and other permitted products.</p><p class="rtacp3"><b class="rtacb4">' . htmlspecialchars($websitename) . ' is NOT a SEBI Registered Investment Adviser.</b></p><p class="rtacp4">All services are provided in a distribution capacity and should not be construed as investment advisory or portfolio management services.</p><h6 class="rtach63">No Assured Returns</h6><p class="rtacp5">No returns are guaranteed or assured on any financial products. All investments are subject to market risks. Past performance is not indicative of future returns.</p><h6 class="rtach64">Risk Disclosure</h6><p class="rtacp6">Investments in securities markets are subject to market risks. Please read all relevant scheme and product-related documents carefully before investing. The value of investments may fluctuate depending on market conditions and other factors.</p><h6 class="rtach65">Commission & Compensation</h6><p class="rtacp7"><b class="rtacb5">' . htmlspecialchars($websitename) . '</b> receives commission from Asset Management Companies and/or product providers for the distribution of financial products. Details are available on the Commission Disclosure page.</p><p class="rtacp8">No additional fees are charged directly to investors for mutual fund distribution services, except where permitted under applicable regulations.</p><h6 class="rtach66">User Obligations</h6><p class="rtacp9">By using this website, you agree to:</p><ul class="rtacul1"><li class="rtacli1">Provide accurate and complete information where required</li><li class="rtacli2">Keep your personal and contact details updated</li><li class="rtacli3">Use the website only for lawful purposes</li><li class="rtacli4">Review all relevant product documents before investing</li><li class="rtacli5">Not reproduce, distribute, or misuse website content without permission</li></ul><h6 class="rtach67">Data Protection</h6><p class="rtacp10">All personal data is handled in accordance with the Privacy Policy and applicable laws, including the Digital Personal Data Protection Act, 2023. Please refer to the Privacy Policy for details.</p><h6 class="rtach68">Tools & Calculators</h6><p class="rtacp11">Any tools, calculators, or projections provided on this website are for illustration purposes only. Actual outcomes may vary based on market conditions and other factors.</p><h6 class="rtach69">Third-Party Links</h6><p class="rtacp12">This website may contain links to third-party websites. <b class="rtacb6">' . htmlspecialchars($websitename) . '</b> does not control or take responsibility for the content, accuracy, or security of such external websites.</p><h6 class="rtach610">Limitation of Liability</h6><p class="rtacp13"><b class="rtacb7">' . htmlspecialchars($websitename) . '</b> makes no warranties or representations regarding the accuracy or completeness of information on this website.</p><p class="rtacp14">To the extent permitted by law, <b class="rtacb8">' . htmlspecialchars($websitename) . '</b> shall not be liable for any loss or damage arising from the use of this website or reliance on any information provided.</p><h6 class="rtach611">Grievance Redressal</h6><p class="rtacp15">For any complaints or grievances, please refer to our Grievance Redressal page. You may also file a complaint on the SEBI SCORES portal at <a href="https://scores.sebi.gov.in/" target="_blank" class="rtacla1"><b>https://scores.sebi.gov.in/</b></a> or approach SMART ODR at <a href="https://smartodr.in/" target="_blank" class="rtacla2"><b>https://smartodr.in/</b></a>  for online dispute resolution.</p><h6 class="rtach612">Governing Law & Jurisdiction</h6><p class="rtacp16">These Terms shall be governed by the laws of India. Any disputes shall be subject to the jurisdiction of the courts at <b class="rtacb9">' . htmlspecialchars($rvcity) . '</b>.</p><h6 class="rtach613">Amendments</h6><p class="rtacp17">These Terms may be updated from time to time. The latest version will be available on this page. Continued use of the website constitutes acceptance of the updated Terms.</p>';

$html .= '</div>';
$response = [
    "terms_conditions" => $html
];

echo json_encode($response);
exit;
?>