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
$html .= '<div class="rvfund-selection-policy">';

$html .= "<p class='rspp1'><b class='rspb1'>" . htmlspecialchars($websitename) . "</b> follows a structured and documented approach for mutual fund scheme selection and investor profiling in accordance with applicable SEBI and AMFI guidelines.</p><p class='rspp2'>This policy outlines the framework adopted to align product distribution with investor profiles while maintaining transparency and regulatory compliance.</p><h6 class='rsph61'>Risk Profiling</h6><p class='rspp3'>Investors are required to complete a Risk Profiling Assessment prior to undertaking investments.</p><p class='rspp4'>The risk profile is determined based on multiple factors including investment horizon, financial goals, income stability, investment experience, and risk tolerance.</p><p class='rspp5'>Risk profiles may be reviewed periodically or upon any material change in the investor's financial or personal circumstances.</p><h6 class='rsph62'>Scheme Selection Framework</h6><p class='rspp6'>Scheme selection is based on a structured evaluation process, which may include:</p><ul class='rspul1'><li class='rspli1'>Alignment with investor risk profile and investment horizon</li><li class='rspli2'>Scheme category and asset class</li><li class='rspli3'>Historical performance across different market cycles</li><li class='rspli4'>Fund management experience and track record</li><li class='rspli5'>Portfolio characteristics and risk parameters</li><li class='rspli6'>Other relevant qualitative and quantitative factors</li></ul><h6 class='rsph63'>Suitability Alignment</h6><p class='rspp7'>Financial products are mapped to the investor's assessed risk profile and investment horizon.</p><p class='rspp8'>Investors are expected to review product-related information and make informed decisions before proceeding with any transaction.</p><h6 class='rsph64'>Non-Advisory Nature</h6><p class='rspp9'><b class='rspb2'>" . htmlspecialchars($websitename) . "</b> is an AMFI Registered Mutual Fund Distributor and provides distribution services only.</p><p class='rspp10'>We do not provide investment advisory services or portfolio management services. Investment decisions are undertaken at the discretion of the investor.</p><h6 class='rsph65'>Conflict of Interest</h6><p class='rspp11'><b class='rspb3'>" . htmlspecialchars($websitename) . "</b> does not have any ownership or affiliation with any Asset Management Company.</p><p class='rspp12'>Scheme selection is based on defined parameters and is not influenced by commissions or incentives.</p><p class='rspp13'>Commission earned from product providers is disclosed on the Commission Disclosure page.</p><h6 class='rsph66'>Documentation & Record Keeping</h6><p class='rspp14'>Relevant records relating to investor profiling, transactions, and communications are maintained in accordance with applicable regulatory requirements.</p><h6 class='rsph67'>Policy Review</h6><p class='rspp15'>This policy is reviewed periodically or upon any changes in applicable regulatory guidelines.</p>";
$html .= '</div>';
$response = [
    "fund_selection_policy" => $html
];

echo json_encode($response);
exit;
?>