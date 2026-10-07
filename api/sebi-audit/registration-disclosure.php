<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();

if (!empty($config_datas['ernwebsitename'])) {
    $websitename = $config_datas['ernwebsitename'] ?? '';

} else {
    $websitename = $config_datas['websitename'] ?? '';

}

$mfarn = $config_datas['mfarn'] ?? '';
$mfapmi = $config_datas['apmi'] ?? '';

$rvrdl = $config_datas['registration-disclosure-list'] ?? '';
$rvrdsell = $config_datas['registration-disclosure-selected-list'] ?? '';

$rvrdllist = explode(',', $rvrdl);
$rvrdlselectedlist = explode(',', $rvrdsell);

$apmi_text = '';
if (!empty($mfapmi)) {
    $apmi_text = "(APRN  : $mfapmi)";
}
$arn_text = '';
if (!empty($mfarn)) {
    $arn_text = "(ARN: $mfarn)";
}
$registrationlistData = [
    ['id' => '1', 'rdlentityurl' => 'https://www.360.one/', 'arnpms' => 'ARN', 'rdlentityname' => '360 One Mutual Fund', 'rdlregistrationnumber' => 'MF/067/11/02',],
    ['id' => '2', 'rdlentityurl' => 'https://empanelment.abakkusmf.com/login', 'arnpms' => 'ARN', 'rdlentityname' => 'Abakkus Mutual Fund', 'rdlregistrationnumber' => 'MF/088/25/14',],
    ['id' => '3', 'rdlentityurl' => 'https://mutualfund.adityabirlacapital.com', 'arnpms' => 'ARN', 'rdlentityname' => 'ADITYA BIRLA SUN LIFE MF', 'rdlregistrationnumber' => 'MF/020/94/8',],
    ['id' => '4', 'rdlentityurl' => 'https://www.alpha-grep.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'AlphaGrep Mutual Fund', 'rdlregistrationnumber' => 'MF/090/26/16',],
    ['id' => '5', 'rdlentityurl' => 'https://www.angelonemf.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'Angel One Mutual Fund', 'rdlregistrationnumber' => 'MF/083/24/09',],
    ['id' => '6', 'rdlentityurl' => 'https://www.askfinancials.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'ASK Mutual Fund', 'rdlregistrationnumber' => 'MF/089/26/15',],
    ['id' => '7', 'rdlentityurl' => 'https://www.axismf.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'AXIS MF', 'rdlregistrationnumber' => 'MF/061/09/02',],
    ['id' => '8', 'rdlentityurl' => 'https://www.bajajamc.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'BAJAJ FINSERV MUTUAL FUND', 'rdlregistrationnumber' => 'MF/078/23/04',],
    ['id' => '9', 'rdlentityurl' => 'https://bandhanmutual.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'Bandhan Mutual Fund', 'rdlregistrationnumber' => 'MF/042/00/3',],
    ['id' => '10', 'rdlentityurl' => 'https://www.boimf.in/', 'arnpms' => 'ARN', 'rdlentityname' => 'Bank of India Mutual Fund', 'rdlregistrationnumber' => 'MF/056/08/01',],
    ['id' => '11', 'rdlentityurl' => 'https://www.barodabnpparibasmf.in', 'arnpms' => 'ARN', 'rdlentityname' => 'Baroda BNP Paribas Mutual Fund', 'rdlregistrationnumber' => 'MF/018/94/2',],
    ['id' => '12', 'rdlentityurl' => 'https://www.canararobeco.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'CANARA ROBECO MF', 'rdlregistrationnumber' => 'MF/004/93/4',],
    ['id' => '13', 'rdlentityurl' => 'https://www.capitalmind.in/', 'arnpms' => 'ARN', 'rdlentityname' => 'Capitalmind Mutual Fund', 'rdlregistrationnumber' => 'MF/084/25/10',],
    ['id' => '14', 'rdlentityurl' => 'https://choiceindia.com', 'arnpms' => 'ARN', 'rdlentityname' => 'Choice Mutual Fund', 'rdlregistrationnumber' => 'MF/087/25/13',],
    ['id' => '15', 'rdlentityurl' => 'http://www.canararobeco.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'CRB MF', 'rdlregistrationnumber' => 'MF/008/93/5',],
    ['id' => '16', 'rdlentityurl' => 'https://www.dspim.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'DSP MF', 'rdlregistrationnumber' => 'MF/036/97/7',],
    ['id' => '17', 'rdlentityurl' => 'https://www.edelweissmf.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'EDELWEISS MF', 'rdlregistrationnumber' => 'MF/057/08/02',],
    ['id' => '18', 'rdlentityurl' => 'http://www.franklintempletonindia.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'FRANKLIN TEMPLETON MF', 'rdlregistrationnumber' => 'MF/026/96/8',],
    ['id' => '19', 'rdlentityurl' => 'https://groww.in/', 'arnpms' => 'ARN', 'rdlentityname' => 'Groww Mutual Fund', 'rdlregistrationnumber' => 'MF/068/11/03',],
    ['id' => '20', 'rdlentityurl' => 'https://www.hdfcfund.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'HDFC MF', 'rdlregistrationnumber' => 'MF/044/00/6',],
    ['id' => '21', 'rdlentityurl' => 'https://www.heliosmf.in/', 'arnpms' => 'ARN', 'rdlentityname' => 'Helios Mutual Fund', 'rdlregistrationnumber' => 'MF/079/23/05',],
    ['id' => '22', 'rdlentityurl' => 'https://www.assetmanagement.hsbc.co.in/en/mutual-funds', 'arnpms' => 'ARN', 'rdlentityname' => 'HSBC MF', 'rdlregistrationnumber' => 'MF/046/02/5',],
    ['id' => '23', 'rdlentityurl' => 'https://www.icicipruamc.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'ICICI PRUDENTIAL MF', 'rdlregistrationnumber' => 'MF/003/93/6',],
    ['id' => '24', 'rdlentityurl' => 'http://www.idbimutual.co.in/', 'arnpms' => 'ARN', 'rdlentityname' => 'IDBI MUTUAL FUND', 'rdlregistrationnumber' => 'MF/064/10/01',],
    ['id' => '25', 'rdlentityurl' => 'https://iifclmf.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'IIFCL MF (IDF)', 'rdlregistrationnumber' => 'MF/071/13/01',],
    ['id' => '26', 'rdlentityurl' => 'https://www.ilfsinfrafund.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'IL&FS IDF MF', 'rdlregistrationnumber' => 'MF/072/13/02',],
    ['id' => '27', 'rdlentityurl' => 'https://invescomutualfund.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'Invesco Mutual Fund', 'rdlregistrationnumber' => 'MF/052/06/01',],
    ['id' => '28', 'rdlentityurl' => 'https://www.itiamc.com', 'arnpms' => 'ARN', 'rdlentityname' => 'ITI Mutual Fund', 'rdlregistrationnumber' => 'MF/073/18/01',],
    ['id' => '29', 'rdlentityurl' => 'https://www.blackrock.com/corporate', 'arnpms' => 'ARN', 'rdlentityname' => 'Jio BlackRock Mutual Fund', 'rdlregistrationnumber' => 'MF/085/25/11',],
    ['id' => '30', 'rdlentityurl' => 'https://www.jmfinancialmf.com', 'arnpms' => 'ARN', 'rdlentityname' => 'JM FINANCIAL MF', 'rdlregistrationnumber' => 'MF/015/94/8',],
    ['id' => '31', 'rdlentityurl' => 'https://www.kotakmf.com', 'arnpms' => 'ARN', 'rdlentityname' => 'Kotak Mutual Fund', 'rdlregistrationnumber' => 'MF/038/98/1',],
    ['id' => '32', 'rdlentityurl' => 'https://www.licmf.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'LIC MF', 'rdlregistrationnumber' => 'MF/012/94/5',],
    ['id' => '33', 'rdlentityurl' => 'https://www.mahindramanulife.com', 'arnpms' => 'ARN', 'rdlentityname' => 'Mahindra Manulife Mutual Fund', 'rdlregistrationnumber' => 'MF/069/16/01',],
    ['id' => '34', 'rdlentityurl' => 'https://www.miraeassetmf.co.in', 'arnpms' => 'ARN', 'rdlentityname' => 'MIRAE ASSET MF', 'rdlregistrationnumber' => 'MF/055/07/03',],
    ['id' => '35', 'rdlentityurl' => 'https://www.mnclgroup.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'Monarch Networth Capital Limited', 'rdlregistrationnumber' => 'MF/092/26/18',],
    ['id' => '36', 'rdlentityurl' => 'https://www.motilaloswalmf.com', 'arnpms' => 'ARN', 'rdlentityname' => 'MOTILAL OSWAL MF', 'rdlregistrationnumber' => 'MF/063/09/04',],
    ['id' => '37', 'rdlentityurl' => 'https://www.njmutualfund.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'N J Mutual Fund', 'rdlregistrationnumber' => 'MF/076/21/02',],
    ['id' => '38', 'rdlentityurl' => 'https://navi.com/mutual-fund', 'arnpms' => 'ARN', 'rdlentityname' => 'NAVI MUTUAL FUND', 'rdlregistrationnumber' => 'MF/062/09/03',],
    ['id' => '39', 'rdlentityurl' => 'https://mf.nipponindiaim.com', 'arnpms' => 'ARN', 'rdlentityname' => 'Nippon India Mutual Fund', 'rdlregistrationnumber' => 'MF/022/95/1',],
    ['id' => '40', 'rdlentityurl' => 'https://www.oldbridgecapital.com/home', 'arnpms' => 'ARN', 'rdlentityname' => 'Old Bridge Mutual Fund', 'rdlregistrationnumber' => 'MF/081/23/07',],
    ['id' => '41', 'rdlentityurl' => 'https://www.pgimindia.com/mutual-funds/', 'arnpms' => 'ARN', 'rdlentityname' => 'PGIM INDIA MUTUAL FUND', 'rdlregistrationnumber' => 'MF/065/10/02',],
    ['id' => '42', 'rdlentityurl' => 'https://amc.ppfas.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'PPFAS MF', 'rdlregistrationnumber' => 'MF/069/12/01',],
    ['id' => '43', 'rdlentityurl' => 'https://quantmutual.com', 'arnpms' => 'ARN', 'rdlentityname' => 'Quant Mutual Fund', 'rdlregistrationnumber' => 'MF/028/96/4',],
    ['id' => '44', 'rdlentityurl' => 'https://www.quantumamc.com', 'arnpms' => 'ARN', 'rdlentityname' => 'QUANTUM MF', 'rdlregistrationnumber' => 'MF/051/05/02',],
    ['id' => '45', 'rdlentityurl' => 'https://www.samcomf.com', 'arnpms' => 'ARN', 'rdlentityname' => 'SAMCO MUTUAL FUND', 'rdlregistrationnumber' => 'MF/077/21/03',],
    ['id' => '46', 'rdlentityurl' => 'https://www.sbimf.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'SBI MF', 'rdlregistrationnumber' => 'MF/009/93/3',],
    ['id' => '47', 'rdlentityurl' => 'https://www.shriramamc.in', 'arnpms' => 'ARN', 'rdlentityname' => 'SHRIRAM MF', 'rdlregistrationnumber' => 'MF/017/94/4',],
    ['id' => '48', 'rdlentityurl' => 'https://www.sundarammutual.com', 'arnpms' => 'ARN', 'rdlentityname' => 'SUNDARAM MF', 'rdlregistrationnumber' => 'MF/034/97/2',],
    ['id' => '49', 'rdlentityurl' => 'https://www.tatamutualfund.com', 'arnpms' => 'ARN', 'rdlentityname' => 'TATA MF', 'rdlregistrationnumber' => 'MF/023/95/9',],
    ['id' => '50', 'rdlentityurl' => 'https://www.taurusmutualfund.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'TAURUS MF', 'rdlregistrationnumber' => 'MF/002/93/',],
    ['id' => '51', 'rdlentityurl' => 'https://www.wealthcompanyamc.in/', 'arnpms' => 'ARN', 'rdlentityname' => 'The Wealth Company Mutual Fund', 'rdlregistrationnumber' => 'MF/086/25/12',],
    ['id' => '52', 'rdlentityurl' => 'http://www.trustmf.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'TRUST MUTUAL FUND', 'rdlregistrationnumber' => 'MF/075/19/01',],
    ['id' => '53', 'rdlentityurl' => 'https://unifimf.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'Unifi Mutual Fund', 'rdlregistrationnumber' => 'MF/082/24/08',],
    ['id' => '54', 'rdlentityurl' => 'https://www.unionmf.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'Union Mutual Fund', 'rdlregistrationnumber' => 'MF/066/11/01',],
    ['id' => '55', 'rdlentityurl' => 'https://www.utimf.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'UTI MF', 'rdlregistrationnumber' => 'MF/048/03/01',],
    ['id' => '56', 'rdlentityurl' => 'https://www.wealth-firstonline.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'WEALTH FIRST PORTFOLIO MANAGERS LIMITED', 'rdlregistrationnumber' => 'MF/091/26/17',],
    ['id' => '57', 'rdlentityurl' => 'https://mf.whiteoakamc.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'WhiteOak Capital Mutual Fund', 'rdlregistrationnumber' => 'MF/074/18/02',],
    ['id' => '58', 'rdlentityurl' => 'https://zerodha.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'Zerodha Mutual Fund', 'rdlregistrationnumber' => 'MF/080/23/06',],
    ['id' => '59', 'rdlentityurl' => 'https://www.altportfunds.com/investments/vivriti-cat-ii-trust/', 'arnpms' => 'ARN', 'rdlentityname' => 'Vivriti Cat II Trust', 'rdlregistrationnumber' => 'IN/AIF2/23-24/1415',],
    ['id' => '60', 'rdlentityurl' => 'https://alt-alpha.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'ALPHA ALTERNATIVES INVESTMENT FUND', 'rdlregistrationnumber' => 'IN/AIF3/18-19/0544',],
    ['id' => '61', 'rdlentityurl' => 'https://alt-alpha.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'Alpha Alternatives MSAR LLP', 'rdlregistrationnumber' => 'IN/AIF3/21-22/0901',],
    ['id' => '62', 'rdlentityurl' => 'https://www.altportfunds.com/investments/northern-arc-money-market-alpha-trust/', 'arnpms' => 'ARN', 'rdlentityname' => 'NORTHERN ARC MONEY MARKET ALPHA TRUST', 'rdlregistrationnumber' => 'IN/AIF3/18-19/0601',],
    ['id' => '63', 'rdlentityurl' => 'https://abansim.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'ABANS INVESTMENT TRUST', 'rdlregistrationnumber' => 'IN/AIF2/21-22/0896',],
    ['id' => '64', 'rdlentityurl' => 'https://www.hdfcfund.com', 'arnpms' => 'ARN', 'rdlentityname' => 'HDFC MF', 'rdlregistrationnumber' => 'HAMCIFSC0413',],
    ['id' => '65', 'rdlentityurl' => 'https://mutualfund.adityabirlacapital.com ', 'arnpms' => 'ARN', 'rdlentityname' => 'ADITYA BIRLA SUN LIFE MF', 'rdlregistrationnumber' => 'ABSLGIFT320',],
    ['id' => '66', 'rdlentityurl' => 'https://www.edelweissmf.com', 'arnpms' => 'ARN', 'rdlentityname' => 'EDELWEISS MF', 'rdlregistrationnumber' => 'EGAIF0100',],
    ['id' => '67', 'rdlentityurl' => 'https://amc.ppfas.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'PPFAS AMC', 'rdlregistrationnumber' => 'PG100343',],
    ['id' => '68', 'rdlentityurl' => 'https://www.wintwealth.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'Wint Securities', 'rdlregistrationnumber' => 'WW1084',],
    ['id' => '69', 'rdlentityurl' => 'https://www.trustmf.com/', 'arnpms' => 'ARN', 'rdlentityname' => 'Trust Capital Services', 'rdlregistrationnumber' => 'DC1318',],
    ['id' => '77', 'rdlentityurl' => 'https://www.nuvamawealth.com/oyo/mutualfund', 'arnpms' => 'ARN', 'rdlentityname' => 'Nuvama Mutual Fund', 'rdlregistrationnumber' => 'MF/093/26/19',],
    ['id' => '70', 'rdlentityurl' => 'http://www.buoyantcap.com/', 'arnpms' => 'APRN', 'rdlentityname' => 'Buoyant Capital Pvt Ltd.', 'rdlregistrationnumber' => 'INP000005000',],
    ['id' => '71', 'rdlentityurl' => 'https://www.askfinancials.com/', 'arnpms' => 'APRN', 'rdlentityname' => 'ASK Investment Managers Limited', 'rdlregistrationnumber' => 'INP000008066',],
    ['id' => '72', 'rdlentityurl' => 'http://www.esteeadvisors.com/', 'arnpms' => 'APRN', 'rdlentityname' => 'Estee Advisors Private Limited', 'rdlregistrationnumber' => 'INP000007720',],
    ['id' => '73', 'rdlentityurl' => 'https://www.ikigaiasset.com/', 'arnpms' => 'APRN', 'rdlentityname' => 'IKIGAI Asset Manager Holdings Private Limited', 'rdlregistrationnumber' => 'INP000009232',],
    ['id' => '74', 'rdlentityurl' => 'https://negencapital.com/', 'arnpms' => 'APRN', 'rdlentityname' => 'NEGEN CAPITAL SERVICES PRIVATE LIMITED', 'rdlregistrationnumber' => 'INP000005414',],
    ['id' => '75', 'rdlentityurl' => 'https://righthorizonspms.com/', 'arnpms' => 'APRN', 'rdlentityname' => 'RIGHT HORIZONS PORTFOLIO MANAGEMENT PRIVATE LIMITED', 'rdlregistrationnumber' => 'INP000004359',],
    ['id' => '76', 'rdlentityurl' => 'https://www.unificap.com/', 'arnpms' => 'APRN', 'rdlentityname' => 'UNIFI CAPITAL PRIVATE LIMITED', 'rdlregistrationnumber' => 'INP000000613',],



];

$html = '';
$html .= '';
$html .= '<div class="rvregistration-disclosure">';
if (!empty($rvrdsell)) {

    $html .= '<div class="table-responsive mt-4 "> <table class="table table-bordered"> <thead class="table-dark"> <tr> <th>Sr. No.</th><th>Principal Entity</th> <th>Registration Number</th> <th>Registered Name</th><th>Registered As</th></tr> </thead> <tbody> ';

    $i = 1;
    usort($registrationlistData, function ($a, $b) {
        return strcasecmp($a['rdlentityname'], $b['rdlentityname']);
    });
    foreach ($registrationlistData as $rdlitems) {

        if (!in_array($rdlitems['id'], $rvrdlselectedlist)) {
            continue;
        }
        if (!empty($mfarn)) {

            if ($rdlitems['arnpms'] == 'ARN') {

                $html .= '<tr id="' . $rdlitems['id'] . '">
                        <td data-idd="' . $rdlitems['id'] . '">' . $i . '</td>
                        <td><a href="' . $rdlitems['rdlentityurl'] . '" target="_" rel="nofollow noopener noreferrer" aria-label="' . $rdlitems['rdlentityname'] . '">' . $rdlitems['rdlentityname'] . '</a></td>
                        <td>' . $rdlitems['rdlregistrationnumber'] . '</td>
                        <td>' . $websitename . '</td>
                        <td>AMFI Registered Mutual Fund Distributor - ' . htmlspecialchars($arn_text) . '</td>
                      </tr>';
            }
        }
        if (!empty($mfapmi)) {

            if ($rdlitems['arnpms'] == 'APRN') {

                $html .= '<tr id="' . $rdlitems['id'] . '">
                        <td data-idd="' . $rdlitems['id'] . '">' . $i . '</td>
                        <td>' . $rdlitems['rdlentityname'] . '</td>
                        <td>' . $rdlitems['rdlregistrationnumber'] . '</td>
                        <td>' . $websitename . '</td>
                        <td>APMI Registered PMS Distributor - ' . htmlspecialchars($apmi_text) . '</td>
                      </tr>';
            }
        }
        $i++;
    }
    $i = 1;



    $html .= '</tbody> </table> </div>';
} elseif (strtolower(trim($rvrdl)) === 'all') {
    // koi filter nahi


} else {

    $html .= '<div class="table-responsive mt-4 "> <table class="table table-bordered"> <thead class="table-dark"> <tr> <th>Sr. No.</th><th>Principal Entity</th> <th>Registration Number</th> <th>Registered Name</th><th>Registered As</th></tr> </thead> <tbody> ';



    $i = 1;
    foreach ($registrationlistData as $rdlitems) {

        if (in_array($rdlitems['id'], $rvrdllist)) {
            continue;
        }
        if (!empty($mfarn)) {

            if ($rdlitems['arnpms'] == 'ARN') {

                $html .= '<tr id="' . $rdlitems['id'] . '">
                        <td data-idd="' . $rdlitems['id'] . '">' . $i . '</td>
                        <td><a href="' . $rdlitems['rdlentityurl'] . '" target="_" rel="nofollow noopener noreferrer" aria-label="' . $rdlitems['rdlentityname'] . '">' . $rdlitems['rdlentityname'] . '</a></td>
                        <td>' . $rdlitems['rdlregistrationnumber'] . '</td>
                        <td>' . $websitename . '</td>
                        <td>AMFI Registered Mutual Fund Distributor - ' . htmlspecialchars($arn_text) . '</td>
                      </tr>';
            }
        }
        if (!empty($mfapmi)) {

            if ($rdlitems['arnpms'] == 'APRN') {

                $html .= '<tr id="' . $rdlitems['id'] . '">
                        <td data-idd="' . $rdlitems['id'] . '">' . $i . '</td>
                        <td>' . $rdlitems['rdlentityname'] . '</td>
                        <td>' . $rdlitems['rdlregistrationnumber'] . '</td>
                        <td>' . $websitename . '</td>
                        <td>APMI Registered PMS Distributor - ' . htmlspecialchars($apmi_text) . '</td>
                      </tr>';
            }
        }
        $i++;
    }
    $i = 1;



    $html .= '</tbody> </table> </div>';
}

$response = [
    "registration_disclosure" => $html
];
echo json_encode($response);
exit;
?>