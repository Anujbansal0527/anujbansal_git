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
$html .= '<div class="rvclient-onboarding-policy">';

$html .= " <p class='copp1'><b class='copb1'>" . htmlspecialchars($websitename) . "</b> follows a structured and compliant client onboarding process in accordance with applicable SEBI, AMFI, Prevention of Money Laundering Act (PMLA), and data protection regulations.</p> <p class='copp2'>This policy outlines the framework followed for onboarding investors and completing KYC requirements.</p> <h6 class='coph61'>Onboarding Process</h6> <p class='copp3'>Clients may be onboarded through digital or physical channels as permitted under applicable regulations.</p> <p class='copp4'>All onboarding is subject to completion of KYC and submission of required documentation.</p> <h6 class='coph62'>Eligibility</h6> <p class='copp5'>Investors must meet applicable regulatory requirements, including:</p> <ul class='copul1'> <li class='copli1'>Valid identity and address proof</li> <li class='copli2'>Compliance with applicable residency regulations</li> <li class='copli3'>Completion of KYC formalities</li> </ul> <p class='copp6'>Additional due diligence may be carried out as required under applicable laws.</p> <h6 class='coph63'>KYC Requirements</h6> <p class='copp7'>KYC (Know Your Customer) verification is mandatory prior to any transaction.</p> <p class='copp8'>KYC may be completed through authorised KYC Registration Agencies (KRAs) or other permitted mechanisms, and may include:</p> <ul class='copul2'> <li class='copli4'>Identity and address verification</li> <li class='copli5'>In-person verification or video-based verification, where applicable</li> <li class='copli6'>FATCA/CRS declarations</li> <li class='copli7'>Additional documentation for non-individual investors</li> </ul> <h6 class='coph64'>Investor Profiling</h6> <p class='copp9'>Investors may be required to provide relevant information including:</p> <ul class='copul3'> <li class='copli8'>Financial details</li> <li class='copli9'>Investment objectives</li> <li class='copli10'>Investment horizon</li> <li class='copli11'>Risk tolerance</li> </ul> <p class='copp10'>This information is used to facilitate alignment of transactions with investor profiles.</p> <h6 class='coph65'>Documentation</h6> <p class='copp11'>Investors are required to submit applicable documents, which may include:</p> <ul class='copul4'> <li class='copli12'>PAN</li> <li class='copli13'>Identity and address proof</li> <li class='copli14'>Bank account details</li> <li class='copli15'>FATCA/CRS declaration</li> <li class='copli16'>Nomination details (as applicable)</li> </ul> <p class='copp12'>Additional documentation may be required based on investor type and regulatory requirements.</p> <h6 class='coph66'>Account Setup</h6> <p class='copp13'>Upon successful completion of KYC and documentation, investor accounts are created with relevant product providers and authorised platforms.</p> <p class='copp14'>Transaction confirmations and related communications are shared through registered contact details.</p> <h6 class='coph67'>Transactions</h6> <p class='copp15'>Transactions are processed based on investor instructions through permitted channels.</p> <p class='copp16'>Investors are expected to read and understand relevant product documents before proceeding with any investment.</p> <h6 class='coph68'>Data Privacy & Security</h6> <p class='copp17'>Personal data collected during onboarding is processed in accordance with applicable data protection laws.</p> <ul class='copul5'> <li class='copli17'>Data is collected for purposes such as KYC, transaction processing, and regulatory compliance</li> <li class='copli18'>Data may be shared with authorised entities such as AMCs, RTAs, KRAs, and regulatory authorities</li> <li class='copli19'>Appropriate safeguards are implemented to protect investor data</li> </ul> <h6 class='coph69'>Record Retention</h6> <p class='copp18'>Records related to onboarding, KYC, and transactions are maintained in accordance with applicable regulatory requirements.</p> <h6 class='coph610'>Periodic Updates</h6> <p class='copp19'>KYC and related information may be updated periodically or upon any material change in investor details.</p> <h6 class='coph611'>Refusal of Onboarding</h6> <p class='copp20'><b class='copb2'>" . htmlspecialchars($websitename) . "</b> reserves the right to decline onboarding where:</p> <ul class='copul6'> <li class='copli20'>Required documentation is incomplete or unverifiable</li> <li class='copli21'>Regulatory requirements are not met</li> <li class='copli22'>Any concerns that arise under applicable compliance frameworks</li> </ul> <h6 class='coph612'>Policy Review</h6> <p class='copp21'>This policy is reviewed periodically and updated in line with applicable regulatory changes.</p>";
$html .= '</div>';

$response = [
    "client_onboarding_policy" => $html
];

echo json_encode($response);
exit;
?>