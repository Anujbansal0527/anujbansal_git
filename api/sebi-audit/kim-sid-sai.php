<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();

$rvkimsidsai = trim($config_datas['rv-kim-sid-sai-list'] ?? '');
$rvarnnum = $config_datas['registration-disclosure-selected-list'] ?? '';


$rvkimsidsailistData = [
    [
        'arnid' => '3',
        'id' => '1',
        'rvamcname' => 'Aditya Birla Sun Life Mutual Fund',
        'rvsidurl' => 'https://mutualfund.adityabirlacapital.com/forms-and-downloads/forms',
        'rvkimurl' => 'https://mutualfund.adityabirlacapital.com/forms-and-downloads/forms',
        'rvsaiurl' => 'https://mutualfund.adityabirlacapital.com/forms-and-downloads/forms',
        'rvfactsheeturl' => 'https://mutualfund.adityabirlacapital.com/forms-and-downloads/factsheets',
    ],
    [
        'arnid' => '7',
        'id' => '2',
        'rvamcname' => 'Axis Mutual Fund',
        'rvsidurl' => 'https://www.axismf.com/statutory-disclosures',
        'rvkimurl' => 'https://www.axismf.com/statutory-disclosures',
        'rvsaiurl' => 'https://www.axismf.com/statutory-disclosures',
        'rvfactsheeturl' => 'https://www.axismf.com/downloads',
    ],
    [
        'arnid' => '8',
        'id' => '3',
        'rvamcname' => 'Bajaj Finserv Mutual Fund',
        'rvsidurl' => 'https://www.bajajamc.com/downloads?sid-kim-products-forms',
        'rvkimurl' => 'https://www.bajajamc.com/downloads?sid-kim-products-forms',
        'rvsaiurl' => 'https://www.bajajamc.com/downloads',
        'rvfactsheeturl' => 'https://www.bajajamc.com/downloads?factsheet',
    ],
    [
        'arnid' => '9',
        'id' => '4',
        'rvamcname' => 'Bandhan Mutual Fund',
        'rvsidurl' => 'https://bandhanmutual.com/downloads/sid',
        'rvkimurl' => 'https://bandhanmutual.com/downloads/kim',
        'rvsaiurl' => 'https://bandhanmutual.com/downloads/sai',
        'rvfactsheeturl' => 'https://bandhanmutual.com/downloads/factsheets',
    ],
    [
        'arnid' => '11',
        'id' => '5',
        'rvamcname' => 'Baroda Bnp Paribas Mutual Fund',
        'rvsidurl' => 'https://www.barodabnpparibasmf.in/downloads',
        'rvkimurl' => 'https://www.barodabnpparibasmf.in/downloads',
        'rvsaiurl' => 'https://www.barodabnpparibasmf.in/downloads',
        'rvfactsheeturl' => 'https://www.barodabnpparibasmf.in/downloads',
    ],
    [
        'arnid' => '10',
        'id' => '6',
        'rvamcname' => 'Bank of India Mutual Fund',
        'rvsidurl' => 'https://www.boimf.in/investor-corner#t3',
        'rvkimurl' => 'https://www.boimf.in/investor-corner#t3',
        'rvsaiurl' => 'https://www.boimf.in/investor-corner#t3',
        'rvfactsheeturl' => 'https://www.boimf.in/investor-corner#t1',
    ],
    [
        'arnid' => '12',
        'id' => '7',
        'rvamcname' => 'Canara Robeco Mutual Fund',
        'rvsidurl' => 'https://www.canararobeco.com/forms-downloads/forms-and-information-documents/information-document/sid',
        'rvkimurl' => 'https://www.canararobeco.com/forms-downloads/forms-and-information-documents/forms/application-form',
        'rvsaiurl' => 'https://www.canararobeco.com/forms-downloads/forms-and-information-documents/information-document/sai',
        'rvfactsheeturl' => 'https://www.canararobeco.com/forms-downloads/forms-and-information-documents/information-document/factsheets',
    ],
    [
        'arnid' => '16',
        'id' => '8',
        'rvamcname' => 'DSP Mutual Fund',
        'rvsidurl' => 'https://www.dspim.com/downloads?category=Information%20Documents&amp;sub_category=SID/SAI',
        'rvkimurl' => 'https://www.dspim.com/downloads?category=Information%20Documents&amp;sub_category=Key%20Information%20Memorandum%20-%20KIM',
        'rvsaiurl' => 'https://www.dspim.com/downloads?category=Information%20Documents&amp;sub_category=SID/SAI',
        'rvfactsheeturl' => 'https://www.dspim.com/downloads?category=Information%20Documents&amp;sub_category=Factsheets',
    ],
    [
        'arnid' => '17',
        'id' => '9',
        'rvamcname' => 'Edelweiss Mutual Fund',
        'rvsidurl' => 'https://www.edelweissmf.com/downloads/scheme-information-document-funds',
        'rvkimurl' => 'https://www.edelweissmf.com/downloads/forms',
        'rvsaiurl' => 'https://www.edelweissmf.com/downloads/sai-&amp;-amendments',
        'rvfactsheeturl' => 'https://www.edelweissmf.com/downloads/factsheets',
    ],
    [
        'arnid' => '18',
        'id' => '10',
        'rvamcname' => 'Franklin Templeton Mutual Fund',
        'rvsidurl' => 'https://www.franklintempletonindia.com/downloads/fund-documents',
        'rvkimurl' => 'https://www.franklintempletonindia.com/downloads/fund-documents',
        'rvsaiurl' => 'https://www.franklintempletonindia.com/downloads/fund-documents',
        'rvfactsheeturl' => 'https://www.franklintempletonindia.com/downloads/fund-documents',
    ],
    [
        'arnid' => '19',
        'id' => '11',
        'rvamcname' => 'Groww Mutual Fund',
        'rvsidurl' => 'https://growwmf.in/downloads/sid',
        'rvkimurl' => 'https://growwmf.in/downloads/kim',
        'rvsaiurl' => 'https://growwmf.in/downloads/sai',
        'rvfactsheeturl' => 'https://growwmf.in/downloads/fact-sheet',
    ],
    [
        'arnid' => '20',
        'id' => '12',
        'rvamcname' => 'HDFC Mutual Fund',
        'rvsidurl' => 'https://www.hdfcfund.com/investor-services/fund-documents/sid',
        'rvkimurl' => 'https://www.hdfcfund.com/investor-services/fund-documents/kim',
        'rvsaiurl' => 'http://chrome-extension//efaidnbmnnnibpcajpcglclefindmkaj/https://files.hdfcfund.com/s3fs-public/2023-05/SAI%20with%20updated%20Addendum%20dated%20May%2029%2C%202023_1.pdf',
        'rvfactsheeturl' => 'https://www.hdfcfund.com/investor-services/factsheets',
    ],
    [
        'arnid' => '22',
        'id' => '13',
        'rvamcname' => 'HSBC Mutual Fund',
        'rvsidurl' => 'https://www.hdfcfund.com/investor-services/factsheets',
        'rvkimurl' => 'https://www.assetmanagement.hsbc.co.in/en/mutual-funds/investor-resources?Date=&amp;Cap=&amp;Doc=kim,sid',
        'rvsaiurl' => 'https://www.assetmanagement.hsbc.co.in/en/mutual-funds/investor-resources?Date=&amp;Cap=&amp;Doc=kim,sid,sai',
        'rvfactsheeturl' => 'https://www.assetmanagement.hsbc.co.in/en/mutual-funds/search-results?q=factsheet&amp;page=6#openTab=0',
    ],
    [
        'arnid' => '21',
        'id' => '14',
        'rvamcname' => 'Helios Mutual Fund',
        'rvsidurl' => 'https://www.heliosmf.in/downloads/',
        'rvkimurl' => 'https://www.heliosmf.in/downloads/',
        'rvsaiurl' => 'https://www.heliosmf.in/downloads/',
        'rvfactsheeturl' => 'https://www.heliosmf.in/downloads/',
    ],
    [
        'arnid' => '23',
        'id' => '15',
        'rvamcname' => 'ICICI Prudential Mutual Fund',
        'rvsidurl' => 'https://www.archive.icicipruamc.com/downloads/sid',
        'rvkimurl' => 'https://www.archive.icicipruamc.com/downloads/kim',
        'rvsaiurl' => 'https://www.archive.icicipruamc.com/downloads/sai',
        'rvfactsheeturl' => 'https://www.archive.icicipruamc.com/downloads/factsheet-and-portfolio',
    ],
    [
        'arnid' => '27',
        'id' => '16',
        'rvamcname' => 'Invesco Mutual Fund',
        'rvsidurl' => 'https://invescomutualfund.com/literature-and-form?tab=Scheme',
        'rvkimurl' => 'https://invescomutualfund.com/literature-and-form?tab=Documents',
        'rvsaiurl' => 'https://www.invescomutualfund.com/literature-and-form?tab=Documents',
        'rvfactsheeturl' => 'https://invescomutualfund.com/literature-and-form?tab=Factsheets',
    ],
    [
        'arnid' => '28',
        'id' => '17',
        'rvamcname' => 'ITI Mutual Fund',
        'rvsidurl' => 'https://www.itiamc.com/downloads',
        'rvkimurl' => 'https://www.itiamc.com/downloads',
        'rvsaiurl' => 'https://www.itiamc.com/downloads',
        'rvfactsheeturl' => 'https://www.itiamc.com/downloads',
    ],
    [
        'arnid' => '30',
        'id' => '18',
        'rvamcname' => 'JM Financial Mutual Fund',
        'rvsidurl' => 'https://www.jmfinancialmf.com/downloads/Scheme-related-documents',
        'rvkimurl' => 'https://www.jmfinancialmf.com/downloads/Scheme-related-documents/Key-Information-Memorandum-(KIM)',
        'rvsaiurl' => 'https://www.jmfinancialmf.com/downloads/Scheme-related-documents/Statement-of-Additional-Information-(SAI)',
        'rvfactsheeturl' => 'https://www.jmfinancialmf.com/downloads/Factsheet/Factsheet',
    ],
    [
        'arnid' => '31',
        'id' => '19',
        'rvamcname' => 'Kotak Mutual Fund',
        'rvsidurl' => 'https://www.kotakmf.com/Information/forms-and-downloads',
        'rvkimurl' => 'https://www.kotakmf.com/Information/forms-and-downloads',
        'rvsaiurl' => 'https://www.kotakmf.com/Information/forms-and-downloads/Statement_of_Additional_Information/StatementofAdditionalInformationMarch312024.pdf',
        'rvfactsheeturl' => 'https://www.kotakmf.com/Information/forms-and-downloads/Factsheet/Factsheet_for_April_2024/KotakMFFactsheetApril2024.pdf',
    ],
    [
        'arnid' => '32',
        'id' => '20',
        'rvamcname' => 'LIC Mutual Fund',
        'rvsidurl' => 'https://www.licmf.com/sid-kim-sai',
        'rvkimurl' => 'https://www.licmf.com/sid-kim-sai',
        'rvsaiurl' => 'https://www.licmf.com/sid-kim-sai',
        'rvfactsheeturl' => 'https://www.licmf.com/downloads/factsheet',
    ],
    [
        'arnid' => '33',
        'id' => '21',
        'rvamcname' => 'Mahindra Manulife Mutual Fund',
        'rvsidurl' => 'https://www.mahindramanulife.com/downloads#mandatory-disclosures',
        'rvkimurl' => 'https://www.mahindramanulife.com/downloads#mandatory-disclosures',
        'rvsaiurl' => 'https://www.mahindramanulife.com/downloads#mandatory-disclosures',
        'rvfactsheeturl' => 'https://www.mahindramanulife.com/downloads#mandatory-disclosures',
    ],
    [
        'arnid' => '34',
        'id' => '22',
        'rvamcname' => 'Mirae Asset Mutual Fund',
        'rvsidurl' => 'https://www.miraeassetmf.co.in/downloads/forms',
        'rvkimurl' => 'https://www.miraeassetmf.co.in/downloads/forms',
        'rvsaiurl' => 'https://www.miraeassetmf.co.in/downloads/forms',
        'rvfactsheeturl' => 'https://www.miraeassetmf.co.in/downloads/factsheet',
    ],
    [
        'arnid' => '36',
        'id' => '23',
        'rvamcname' => 'Motilal Oswal Mutual Fund',
        'rvsidurl' => 'https://www.motilaloswalmf.com/download/sid',
        'rvkimurl' => 'https://www.motilaloswalmf.com/download/key-information-memorandum',
        'rvsaiurl' => 'https://www.motilaloswalmf.com/download/sai',
        'rvfactsheeturl' => 'https://www.motilaloswalmf.com/download/factsheets',
    ],
    [
        'arnid' => '38',
        'id' => '24',
        'rvamcname' => 'Navi Mutual Fund',
        'rvsidurl' => 'https://navi.com/mutual-fund/downloads/scheme-documents',
        'rvkimurl' => 'https://navi.com/mutual-fund/downloads/scheme-documents',
        'rvsaiurl' => 'https://navi.com/mutual-fund/downloads/scheme-documents',
        'rvfactsheeturl' => 'https://navi.com/mutual-fund/downloads/factsheet',
    ],
    [
        'arnid' => '39',
        'id' => '25',
        'rvamcname' => 'Nippon India Mutual Fund',
        'rvsidurl' => 'https://mf.nipponindiaim.com/investor-service/downloads/scheme-information-document',
        'rvkimurl' => 'https://www.sebi.gov.in/search.html?searchval=sid',
        'rvsaiurl' => 'https://mf.nipponindiaim.com',
        'rvfactsheeturl' => 'https://mf.nipponindiaim.com/investor-service/downloads/factsheet-portfolio-and-other-disclosures',
    ],
    [
        'arnid' => '40',
        'id' => '26',
        'rvamcname' => 'Old Bridge Mutual Fund',
        'rvsidurl' => 'https://www.oldbridgemf.com/statutory-disclosures.html#',
        'rvkimurl' => 'https://www.oldbridgemf.com/statutory-disclosures.html#',
        'rvsaiurl' => 'https://www.oldbridgemf.com/statutory-disclosures.html#',
        'rvfactsheeturl' => 'https://www.oldbridgemf.com/factsheet.html',
    ],
    [
        'arnid' => '37',
        'id' => '27',
        'rvamcname' => 'NJ Mutual Fund',
        'rvsidurl' => 'https://downloads.njmutualfund.com/njmf_download.php?nme=300',
        'rvkimurl' => 'https://downloads.njmutualfund.com/njmf_download.php?nme=978',
        'rvsaiurl' => 'https://downloads.njmutualfund.com/downloads.php',
        'rvfactsheeturl' => 'https://downloads.njmutualfund.com/downloads.php',
    ],
    [
        'arnid' => '41',
        'id' => '28',
        'rvamcname' => 'PGIM India Mutual Fund',
        'rvsidurl' => 'https://www.pgimindiamf.com/forms-and-updates/sid-and-sai',
        'rvkimurl' => 'https://www.pgimindiamf.com/forms-and-updates',
        'rvsaiurl' => 'https://www.pgimindiamf.com/forms-and-updates/sid-and-sai',
        'rvfactsheeturl' => 'https://www.pgimindiamf.com/forms-and-updates/fund-factsheet',
    ],
    [
        'arnid' => '42',
        'id' => '29',
        'rvamcname' => 'PPFAS Mutual Fund',
        'rvsidurl' => 'https://amc.ppfas.com/downloads/kim-sid-and-sai/',
        'rvkimurl' => 'https://amc.ppfas.com/downloads/kim-sid-and-sai/',
        'rvsaiurl' => 'https://amc.ppfas.com/downloads/kim-sid-and-sai/',
        'rvfactsheeturl' => 'https://amc.ppfas.com/downloads/factsheet/',
    ],
    [
        'arnid' => '43',
        'id' => '30',
        'rvamcname' => 'Quant MF',
        'rvsidurl' => 'https://quantmutual.com/downloads/kim',
        'rvkimurl' => 'https://quantmutual.com/downloads/kim',
        'rvsaiurl' => 'https://quantmutual.com/downloads/kim',
        'rvfactsheeturl' => 'https://quantmutual.com/downloads/factsheet',
    ],
    [
        'arnid' => '44',
        'id' => '31',
        'rvamcname' => 'Quantum Mutual Fund',
        'rvsidurl' => 'https://www.quantumamc.com/regulatory-document',
        'rvkimurl' => 'https://www.quantumamc.com/regulatory-document',
        'rvsaiurl' => 'https://www.quantumamc.com/regulatory-document',
        'rvfactsheeturl' => 'https://www.quantumamc.com/factsheets/combined/-1/0/0',
    ],

    [
        'arnid' => '46',
        'id' => '32',
        'rvamcname' => 'SBI Mutual Fund',
        'rvsidurl' => 'https://www.sbimf.com/offer-document-sid-kim',
        'rvkimurl' => 'https://www.sbimf.com/offer-document-sid-kim',
        'rvsaiurl' => 'https://www.sbimf.com/docs/default-source/documents/statement-of-additional-information.pdf',
        'rvfactsheeturl' => 'https://www.sbimf.com/factsheets',
    ],
    [
        'arnid' => '45',
        'id' => '33',
        'rvamcname' => 'Samco Mutual Fund',
        'rvsidurl' => 'https://www.samcomf.com/downloads',
        'rvkimurl' => 'https://www.samcomf.com/downloads',
        'rvsaiurl' => 'https://www.samcomf.com/downloads',
        'rvfactsheeturl' => 'https://www.samcomf.com/downloads',
    ],
    [
        'arnid' => '47',
        'id' => '34',
        'rvamcname' => 'Shriram Mutual Fund',
        'rvsidurl' => 'https://www.shriramamc.in/investor-statutory-disclosures',
        'rvkimurl' => 'https://www.shriramamc.in/investor-statutory-disclosures',
        'rvsaiurl' => 'https://www.shriramamc.in/investor-statutory-disclosures',
        'rvfactsheeturl' => 'https://www.shriramamc.in/factsheet',
    ],
    [
        'arnid' => '48',
        'id' => '35',
        'rvamcname' => 'Sundaram Mutual Fund',
        'rvsidurl' => 'https://www.sundarammutual.com/Downloads',
        'rvkimurl' => 'https://www.sundarammutual.com/Downloads',
        'rvsaiurl' => 'https://www.sundarammutual.com/Downloads',
        'rvfactsheeturl' => 'https://www.sundarammutual.com/Downloads',
    ],
    [
        'arnid' => '49',
        'id' => '36',
        'rvamcname' => 'Tata Mutual Fund',
        'rvsidurl' => 'https://www.tatamutualfund.com/schemes-related/scheme-summary',
        'rvkimurl' => 'https://www.tatamutualfund.com/forms/transaction-forms',
        'rvsaiurl' => 'https://www.tatamutualfund.com/forms',
        'rvfactsheeturl' => 'https://www.tatamutualfund.com/information-documents/factsheets',
    ],
    [
        'arnid' => '52',
        'id' => '37',
        'rvamcname' => 'Trust Mutual Fund',
        'rvsidurl' => 'https://www.trustmf.com/downloads?activeTab=sai-sid',
        'rvkimurl' => 'https://www.trustmf.com/downloads?activeTab=forms',
        'rvsaiurl' => 'https://www.trustmf.com/downloads?activeTab=sai-sid',
        'rvfactsheeturl' => 'https://www.trustmf.com/downloads?activeTab=factsheets',
    ],
    [
        'arnid' => '50',
        'id' => '38',
        'rvamcname' => 'Taurus Mutual Fund',
        'rvsidurl' => 'https://www.taurusmutualfund.com/sid',
        'rvkimurl' => 'https://www.taurusmutualfund.com/kim',
        'rvsaiurl' => 'https://www.taurusmutualfund.com/',
        'rvfactsheeturl' => 'https://www.taurusmutualfund.com/factsheet',
    ],
    [
        'arnid' => '54',
        'id' => '39',
        'rvamcname' => 'Union Mutual Fund',
        'rvsidurl' => 'https://www.unionmf.com/about-us/downloads#!%23sidsainotice',
        'rvkimurl' => 'https://www.unionmf.com/about-us/downloads#!%23sidsainotice',
        'rvsaiurl' => 'https://www.unionmf.com/about-us/downloads#!%23sidsainotice',
        'rvfactsheeturl' => 'https://www.unionmf.com/about-us/downloads#!%23sidsainotice',
    ],
    [
        'arnid' => '55',
        'id' => '40',
        'rvamcname' => 'UTI Mutual Fund',
        'rvsidurl' => 'https://www.utimf.com/downloads/sid',
        'rvkimurl' => 'https://www.utimf.com/downloads/kyc',
        'rvsaiurl' => 'https://www.utimf.com/downloads/kyc',
        'rvfactsheeturl' => 'https://www.utimf.com/downloads/fact-sheet',
    ],
    [
        'arnid' => '57',
        'id' => '41',
        'rvamcname' => 'WhiteOak Mutual Fund',
        'rvsidurl' => 'https://mf.whiteoakamc.com/download',
        'rvkimurl' => 'https://mf.whiteoakamc.com/download',
        'rvsaiurl' => 'https://mf.whiteoakamc.com/download',
        'rvfactsheeturl' => 'https://mf.whiteoakamc.com/download',
    ],
    [
        'arnid' => '58',
        'id' => '42',
        'rvamcname' => 'Zerodha Mutual Fund',
        'rvsidurl' => 'https://www.zerodhafundhouse.com/resources/fund-documents',
        'rvkimurl' => 'https://www.zerodhafundhouse.com/resources/fund-documents',
        'rvsaiurl' => 'https://www.zerodhafundhouse.com/resources/fund-documents',
        'rvfactsheeturl' => 'https://www.zerodhafundhouse.com/resources/fund-documents',
    ],
    [
        'arnid' => '1',
        'id' => '43',
        'rvamcname' => '360 ONE Mutual Fund',
        'rvsidurl' => 'https://archive.iiflmf.com/downloads/information-documents#collapse0',
        'rvkimurl' => 'https://archive.iiflmf.com/downloads/information-documents#collapse0',
        'rvsaiurl' => 'https://archive.iiflmf.com/downloads/information-documents#collapse0',
        'rvfactsheeturl' => 'https://archive.iiflmf.com/downloads/factsheets',
    ],
];
$html = '';
$html .= '<div class="rvkim-sid-sai">';

/*
|--------------------------------------------------------------------------
| CONDITION
|--------------------------------------------------------------------------
| not  = kuch bhi show nahi hoga
| all  = saara data show hoga
| 1    = sirf ID 1
| 1,2,3,5 = sirf selected IDs
|--------------------------------------------------------------------------
*/
usort($rvkimsidsailistData, function ($a, $b) {
    return strcasecmp($a['rvamcname'], $b['rvamcname']);
});


// "1,2,3,5" ko array mein convert karega
$selectedIds = array_filter(
    array_map('trim', explode(',', $rvarnnum)),
    'is_numeric'
);

$html .= '<div class="table-responsive mt-4">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Sr. No.</th>
                            <th>AMC Name</th>
                            <th>Scheme Information Document</th>
                            <th>Key Information Memorandum</th>
                            <th>Statement of Additional Information</th>
                            <th>Factsheet</th>
                        </tr>
                    </thead>
                    <tbody>';

$i = 1;

foreach ($rvkimsidsailistData as $rdlitems) {

    // Agar "all" nahi hai to sirf selected IDs show hongi
    if (
        !empty($selectedIds) &&
        !in_array((string) $rdlitems['arnid'], $selectedIds, true)
    ) {
        continue;
    }

    $html .= '<tr id="' . htmlspecialchars($rdlitems['arnid']) . '">
                    <td data-idd="' . htmlspecialchars($rdlitems['id']) . '">' . $i . '</td>

                    <td>' . htmlspecialchars($rdlitems['rvamcname']) . '</td>

                    <td>
                        <a href="' . htmlspecialchars($rdlitems['rvsidurl']) . '"
                           target="_blank"
                           rel="nofollow noopener noreferrer"
                           aria-label="' . htmlspecialchars($rdlitems['rvamcname']) . '">
                            <u>Click Here</u>
                        </a>
                    </td>

                    <td>
                        <a href="' . htmlspecialchars($rdlitems['rvkimurl']) . '"
                           target="_blank"
                           rel="nofollow noopener noreferrer"
                           aria-label="' . htmlspecialchars($rdlitems['rvamcname']) . '">
                            <u>Click Here</u>
                        </a>
                    </td>

                    <td>
                        <a href="' . htmlspecialchars($rdlitems['rvsaiurl']) . '"
                           target="_blank"
                           rel="nofollow noopener noreferrer"
                           aria-label="' . htmlspecialchars($rdlitems['rvamcname']) . '">
                            <u>Click Here</u>
                        </a>
                    </td>

                    <td>
                        <a href="' . htmlspecialchars($rdlitems['rvfactsheeturl']) . '"
                           target="_blank"
                           rel="nofollow noopener noreferrer"
                           aria-label="' . htmlspecialchars($rdlitems['rvamcname']) . '">
                            <u>Click Here</u>
                        </a>
                    </td>
                </tr>';

    $i++;
}

$html .= '</tbody>
            </table>
        </div>';


$html .= '</div>';

$response = [
    "kim_sid_sai" => $html
];

echo json_encode($response);
exit;
?>