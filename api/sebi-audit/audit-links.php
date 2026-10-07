<?php

include 'api_helper.php';

$config_datas = rv_getConfigData();
$webbase_url = $config_datas['base_url'] ?? '';
$mfarn = $config_datas['mfarn'] ?? '';
$rvkimsidsai = trim($config_datas['rv-kim-sid-sai-list'] ?? '');
$rvasallaudit = [
    [
        'id' => '1',
        'title' => 'Risk Factors',
        'rvasurl' => $webbase_url . '/risk-factors',
        'rvasfile' => 'risk-factors',
        'target' => '_self',
        'functionname' => "rv_fetchRiskFactors",
    ],
    [
        'id' => '2',
        'title' => 'Terms & Conditions',
        'rvasurl' => $webbase_url . '/terms-conditions',
        'rvasfile' => 'terms-conditions',
        'target' => '_self',
        'functionname' => "rv_fetchTermsConditions",
    ],
    [
        'id' => '3',
        'title' => 'Disclaimer',
        'rvasurl' => $webbase_url . '/disclaimer',
        'rvasfile' => 'disclaimer',
        'target' => '_self',
        'functionname' => "rv_fetchDisclaimer",
    ],
    [
        'id' => '4',
        'title' => 'Grievance Redressal',
        'rvasurl' => $webbase_url . '/grievance-redressal',
        'rvasfile' => 'grievance-redressal',
        'target' => '_self',
        'functionname' => "rv_fetchGrievanceRedressal",
    ],
    [
        'id' => '5',
        'title' => 'Investor Charter',
        'rvasurl' => $webbase_url . '/investor-charter',
        'rvasfile' => 'investor-charter',
        'target' => '_self',
        'functionname' => "rv_fetchInvestorCharter",
    ],
    [
        'id' => '6',
        'title' => 'Fund Selection & Suitability Policy',
        'rvasurl' => $webbase_url . '/fund-selection-policy',
        'rvasfile' => 'fund-selection-policy',
        'target' => '_self',
        'functionname' => "rv_fetchFundSelectionSuitabilityPolicy",
    ],
    [
        'id' => '7',
        'title' => 'Client Onboarding & KYC Policy',
        'rvasurl' => $webbase_url . '/client-onboarding-policy',
        'rvasfile' => 'client-onboarding-policy',
        'target' => '_self',
        'functionname' => "rv_fetchClientOnboardingkycPolicy",
    ],
    [
        'id' => '16',
        'title' => 'Rights & Obligations Of Investors',
        'rvasurl' => $webbase_url . '/rights-obligations',
        'rvasfile' => 'rights-obligations',
        'target' => '_self',
        'functionname' => "rv_fetchRightsObligations",
    ],
    [
        'id' => '17',
        'title' => "Investor Do's And Don'ts",
        'rvasurl' => $webbase_url . '/investor-dos-donts',
        'rvasfile' => 'investor-dos-donts',
        'target' => '_self',
        'functionname' => "rv_fetchInvestorDosDonts",
    ],
    // [ 
    //     'id' => '8',
    //     'title' => 'SID/SAI/KIM',
    //     'rvasurl' => 'https://www.sebi.gov.in/filings/mutual-funds.html',
    //     'target' => '_blank',
    // ],
    // [
    //     'id' => '9',
    //     'title' => 'Code of Conduct',
    //     'rvasurl' => 'https://www.redvisiontechnologies.com/api/sebi-audit/code-of-conduct.php',
    //     'download' => 'AMFI_Code-of-Conduct.pdf',
    // ],
    [
        'id' => '15',
        'title' => 'Investor Grievance Redressal',
        'rvasurl' => $webbase_url . '/investor-grievance-redressal',
        'rvasfile' => 'investor-grievance-redressal',
        'target' => '_self',
        'functionname' => "rv_fetchInvestorGrievanceRedressal",
    ],
    [
        'id' => '11',
        'title' => 'Important Links',
        'rvasurl' => $webbase_url . '/important-links',
        'rvasfile' => 'important-links',
        'target' => '_self',
        'functionname' => "rv_fetchImportantLinks",
    ],
    // [
    //     'id' => '12',
    //     'title' => 'SEBI Circulars',
    //     'rvasurl' => 'https://www.sebi.gov.in/sebiweb/home/HomeAction.do?doListingAll=yes&search=Mutual+Funds',
    //     'target' => '_blank',
    // ],
    [
        'id' => '13',
        'title' => 'Privacy Policy',
        'rvasurl' => $webbase_url . '/privacy-policy',
        'rvasfile' => 'privacy-policy',
        'target' => '_self',
        'functionname' => "rv_fetchPrivacyPolicy",
    ],
    [
        'id' => '14',
        'title' => 'Commission Disclosures',
        'rvasurl' => $webbase_url . '/commission-disclosures',
        'rvasfile' => 'commission-disclosures',
        'target' => '_self',
        'functionname' => "rv_fetchCommissionDisclosures",
    ],


    [
        'id' => '15',
        'title' => 'Content',
        'rvasurl' => $webbase_url . '/audit-content',
        'rvasfile' => 'audit-content',
        'target' => '_self',
        'functionname' => "rv_fetchauditContent",
    ],
    [
        'id' => '15',
        'title' => 'Cookie Policy',
        'rvasurl' => $webbase_url . '/cookie-policy',
        'rvasfile' => 'cookie-policy',
        'target' => '_self',
        'functionname' => "rv_fetchauditCookiePolicy",
    ],

    [
        'id' => '19',
        'title' => 'KIM/SID/SAI',
        'rvasurl' => $webbase_url . '/kim-sid-sai',
        'rvasfile' => 'kim-sid-sai',
        'target' => '_self',
        'functionname' => "rv_fetchKimSidSai",
    ],


];

if (!empty($mfarn)) {
    $rvasallaudit[] = [
        'id' => '18',
        'title' => 'Registration Disclosure',
        'rvasurl' => $webbase_url . '/registration-disclosure',
        'rvasfile' => 'registration-disclosure',
        'target' => '_self',
        'functionname' => "rv_fetchRegistrationDisclosure",
    ];
}

$response = [
    "audit_links" => $rvasallaudit
];

echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
exit;
?>