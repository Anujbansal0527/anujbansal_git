<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();

$websitename = $config_datas['websitename'] ?? '';
$rvcdl = explode($config_datas['commission-disclosures-list'] ?? '');

$disclosureslistData = [
    ['id' => '1', 'dlname' => 'Whiteoak Mutual Fund', 'dlequityfunds ' => '1.00% - 1.20%', 'dldebtfunds' => '0.50%', 'dlliquidfunds' => '0.05%', 'dlelssfunds' => '1.20%',],
    ['id' => '2', 'dlname' => 'Union Mutual Fund', 'dlequityfunds ' => '1.25% - 1.75%', 'dldebtfunds' => '0.10% - 0.85%', 'dlliquidfunds' => '0.10%', 'dlelssfunds' => '1.75%',],
    ['id' => '3', 'dlname' => 'Mahindra Mutual Fund', 'dlequityfunds ' => '0.80% - 1.40%', 'dldebtfunds' => '0.05% - 0.90%', 'dlliquidfunds' => '0.05%', 'dlelssfunds' => '1.40%',],
    ['id' => '4', 'dlname' => 'Groww Mutual Fund', 'dlequityfunds ' => '1.10% - 1.50%', 'dldebtfunds' => '0.09% - 0.90%', 'dlliquidfunds' => '0.10%', 'dlelssfunds' => '1.40%',],
    ['id' => '5', 'dlname' => 'Helios mutual fund', 'dlequityfunds ' => '	1.50%', 'dldebtfunds' => '0.05%', 'dlliquidfunds' => '-', 'dlelssfunds' => '-',],
    ['id' => '6', 'dlname' => 'UTI MUTUAL FUND', 'dlequityfunds ' => '0.1% - 1.5%', 'dldebtfunds' => '0.1% - 1.25%', 'dlliquidfunds' => '0.05% - 0.1%', 'dlelssfunds' => '1.15%',],
    ['id' => '7', 'dlname' => 'TRUST MUTUAL FUND', 'dlequityfunds ' => '-', 'dldebtfunds' => '0.15% - 0.5%', 'dlliquidfunds' => '0.05% - 0.5%', 'dlelssfunds' => '-',],
    ['id' => '8', 'dlname' => 'TAURUS MUTUAL FUND', 'dlequityfunds ' => '	0.25% - 1.40%', 'dldebtfunds' => '-', 'dlliquidfunds' => '-', 'dlelssfunds' => '1.40%',],
    ['id' => '9', 'dlname' => 'Tata Mutual Fund', 'dlequityfunds ' => '0.20% - 1.65%', 'dldebtfunds' => '0.20% - 1.45%', 'dlliquidfunds' => '0.05% - 0.08%', 'dlelssfunds' => '1.25%',],
    ['id' => '10', 'dlname' => 'SUNDARAM MUTUAL FUND', 'dlequityfunds ' => '0.55% - 1.60%', 'dldebtfunds' => '0.10% - 1.25%', 'dlliquidfunds' => '0.10% - 0.15%', 'dlelssfunds' => '1.35%',],
    ['id' => '11', 'dlname' => 'SBI Mutual Fund', 'dlequityfunds ' => '	0.20% - 1.55%', 'dldebtfunds' => '0.15% - 1.22%', 'dlliquidfunds' => '0.08% - 0.10%', 'dlelssfunds' => '1.04%',],
    ['id' => '12', 'dlname' => 'SAMCO MUTUAL FUND', 'dlequityfunds ' => '	1.35% - 1.40%', 'dldebtfunds' => '-', 'dlliquidfunds' => '0.20%', 'dlelssfunds' => '1.40%',],
    ['id' => '13', 'dlname' => 'QUANTUM MUTUAL FUND', 'dlequityfunds ' => '0.12% - 1.25%', 'dldebtfunds' => '0.45% - 0.45%', 'dlliquidfunds' => '0.10%', 'dlelssfunds' => '1.10%',],
    ['id' => '14', 'dlname' => 'QUANTUM MUTUAL FUND', 'dlequityfunds ' => '0.12% - 1.25%', 'dldebtfunds' => '0.45% - 0.45%', 'dlliquidfunds' => '0.10%', 'dlelssfunds' => '	1.10%',],
    ['id' => '15', 'dlname' => 'Quant Mutual Fund', 'dlequityfunds ' => '0.9% - 1.75%', 'dldebtfunds' => '0.9% - 1.15%', 'dlliquidfunds' => '0.1% - 0.25%', 'dlelssfunds' => '1%',],
    ['id' => '16', 'dlname' => 'PPFAS Mutual Fund', 'dlequityfunds ' => '0.75%', 'dldebtfunds' => '	0.30%', 'dlliquidfunds' => '0.10%', 'dlelssfunds' => '1.10%',],
    ['id' => '17', 'dlname' => 'PGIM INDIA MUTUAL FUND', 'dlequityfunds ' => '0.60% - 1.65%', 'dldebtfunds' => '0.15% - 1.00%', 'dlliquidfunds' => '0.05% - 0.10%', 'dlelssfunds' => '1.65%',],
    ['id' => '18', 'dlname' => 'NJ MUTUAL FUND', 'dlequityfunds ' => '0.47% - 1.21%', 'dldebtfunds' => '-', 'dlliquidfunds' => '0.055% - 0.055%', 'dlelssfunds' => '1.18%',],
    ['id' => '19', 'dlname' => 'NIPPON INDIA MUTUAL FUND', 'dlequityfunds ' => '	0.17% - 1.5%', 'dldebtfunds' => '0.05% - 1.2%', 'dlliquidfunds' => '0.05% - 0.07%', 'dlelssfunds' => '1.25%',],
    ['id' => '20', 'dlname' => 'NAVI MUTUAL FUND', 'dlequityfunds ' => '0.17% - 1.40%', 'dldebtfunds' => '1.00%', 'dlliquidfunds' => '0.05% - 0.20%', 'dlelssfunds' => '0.85% - 1.40%',],
    ['id' => '21', 'dlname' => 'MOTILAL OSWAL MUTUAL FUND', 'dlequityfunds ' => '0.35% - 1.50%', 'dldebtfunds' => '0.07% - 0.80%', 'dlliquidfunds' => '0.15%', 'dlelssfunds' => '1.15%',],
    ['id' => '22', 'dlname' => 'Mirae Asset Mutual Fund', 'dlequityfunds ' => '	0.05% - 1.40%', 'dldebtfunds' => '0.15% - 0.85%', 'dlliquidfunds' => '0.10%', 'dlelssfunds' => '0.85%',],
    ['id' => '23', 'dlname' => 'LIC MUTUAL FUND', 'dlequityfunds ' => '	0.02% - 1.3%', 'dldebtfunds' => '0.05% - 1.00%', 'dlliquidfunds' => '0.05% - 0.05%', 'dlelssfunds' => '1.30%',],
    ['id' => '24', 'dlname' => 'Kotak Mutual Fund', 'dlequityfunds ' => '0.10% - 1.63%', 'dldebtfunds' => '0.05% - 1.28%', 'dlliquidfunds' => '0.10%', 'dlelssfunds' => '1.32%',],
    ['id' => '25', 'dlname' => 'JM Financial Services Sector Fund', 'dlequityfunds ' => '0.60% - 1.25%', 'dldebtfunds' => '0.45% - 0.60%', 'dlliquidfunds' => '0.05% - 0.06%', 'dlelssfunds' => '1.25%',],
    ['id' => '26', 'dlname' => 'ITI MUTUAL FUND', 'dlequityfunds ' => '0.7% - 1.6%', 'dldebtfunds' => '0.5% - 1%', 'dlliquidfunds' => '0.10% - 0.11%', 'dlelssfunds' => '1.65%',],
    ['id' => '27', 'dlname' => 'INVESCO MUTUAL FUND', 'dlequityfunds ' => '	0.15% - 1.20%', 'dldebtfunds' => '0.10% - 0.75%', 'dlliquidfunds' => '0.04% - 0.05%', 'dlelssfunds' => '1.15%',],
    ['id' => '28', 'dlname' => 'ICICI Prudential Mutual Fund', 'dlequityfunds ' => '0.15% - 1.35%', 'dldebtfunds' => '	0.10% - 1.10%', 'dlliquidfunds' => '0.05% - 0.15%', 'dlelssfunds' => '0.95%',],
    ['id' => '29', 'dlname' => 'HSBC Mutual Fund', 'dlequityfunds ' => '0.20% - 1.50%', 'dldebtfunds' => '0.20% - 1.35%', 'dlliquidfunds' => '0.10%', 'dlelssfunds' => '1.30%',],
    ['id' => '30', 'dlname' => 'HDFC Mutual Fund', 'dlequityfunds ' => '0.20% - 1.35%', 'dldebtfunds' => '0.15% - 1.10%', 'dlliquidfunds' => '0.05% - 0.10%', 'dlelssfunds' => '1.00%',],
    ['id' => '31', 'dlname' => 'Franklin Templeton Mutual Fund', 'dlequityfunds ' => '0.38% - 1.48%', 'dldebtfunds' => '0.15% - 1.39%', 'dlliquidfunds' => '0.04% - 0.07%', 'dlelssfunds' => '1.12%',],
    ['id' => '32', 'dlname' => 'Edelweiss Mutual Fund', 'dlequityfunds ' => '0.30% - 1.75%', 'dldebtfunds' => '0.15% - 0.70%', 'dlliquidfunds' => '0.05% - 0.25%', 'dlelssfunds' => '1.75%',],
    ['id' => '33', 'dlname' => 'DSP Mutual Fund', 'dlequityfunds ' => '0.15% - 1.35%', 'dldebtfunds' => '0.10% - 0.70%', 'dlliquidfunds' => '0.05%', 'dlelssfunds' => '	0.95%',],
    ['id' => '34', 'dlname' => 'Canara Robeco Mutual Fund', 'dlequityfunds ' => '1.05% - 1.55%', 'dldebtfunds' => '0.25% - 1.25%', 'dlliquidfunds' => '0.01% - 0.08%', 'dlelssfunds' => '1.10%',],
    ['id' => '35', 'dlname' => 'Baroda BNP Paribas Mutual Fund', 'dlequityfunds ' => '0.80% - 1.85%', 'dldebtfunds' => '0.15% - 1.45%', 'dlliquidfunds' => '0.05% - 0.12%', 'dlelssfunds' => '1.65%',],
    ['id' => '36', 'dlname' => 'BANK OF INDIA MUTUAL FUND', 'dlequityfunds ' => '0.50% - 1.25%', 'dldebtfunds' => '0.50% - 1.00%', 'dlliquidfunds' => '0.02% - 0.03%', 'dlelssfunds' => '1.20%',],
    ['id' => '37', 'dlname' => 'Bandhan Mutual Fund', 'dlequityfunds ' => '0.5% - 1.65%', 'dldebtfunds' => '0.07% - 1.3%', 'dlliquidfunds' => '0.09% - 0.14%', 'dlelssfunds' => '1.20%',],
    ['id' => '38', 'dlname' => 'Bajaj Mutual fund', 'dlequityfunds ' => '1.60%', 'dldebtfunds' => '0.3% - 0.4%', 'dlliquidfunds' => '0.05% - 0.12%', 'dlelssfunds' => '-',],
    ['id' => '39', 'dlname' => 'Axis Mutual Fund', 'dlequityfunds ' => '0.14% - 1.77%', 'dldebtfunds' => '0.13% - 1.57%', 'dlliquidfunds' => '0.04%', 'dlelssfunds' => '0.90%',],
    ['id' => '40', 'dlname' => 'Aditya Birla Sun Life Mutual Fund', 'dlequityfunds ' => '0.30% - 1.25%', 'dldebtfunds' => '0.10% - 1.25%', 'dlliquidfunds' => '0.10%', 'dlelssfunds' => '0.80%',],
    ['id' => '40', 'dlname' => '360 ONE Mutual Fund', 'dlequityfunds ' => '1.00% - 1.25%', 'dldebtfunds' => '0.25%', 'dlliquidfunds' => '0.05%', 'dlelssfunds' => '	0.25%',],
];
$rccdltebal = array_filter([
    [
        'principal-entity' => '',
        'registration-number' => '',
        'registered-as' => '',
    ],
]);
$html = '';
$html .= '';
$html .= '<div class="rvcommission-disclosures">';



$html .= "<p class='rcdp1'><b class='rcdb1'>" . htmlspecialchars($websitename) . "</b> is an AMFI Registered Mutual Fund Distributor and receives commission from Asset Management Companies (AMCs) for the distribution of mutual fund products.</p> <h6 class='rcdh61'>Nature of Commission</h6> <p class='rcdp2'>Commission is typically received in the form of trail commission, which is embedded within the scheme's Total Expense Ratio (TER).</p> <p class='rcdp3'>This commission is paid by the AMC and does not involve any separate charge to the investor by <b class='rcdb2'>" . htmlspecialchars($websitename) . "</b>.</p> <h6 class='rcdh62'>Mutual Fund Distribution</h6> <p class='rcdp4'>We distribute Regular Plan mutual fund schemes.</p> <p class='rcdp5'>Direct Plans, which have a lower expense ratio, are available directly with the respective AMCs.</p> <h6 class='rcdh63'>Other Products (If Applicable)</h6> <p class='rcdp6'>In case of other financial products such as PMS, AIF, insurance, or other permitted products, distribution-related compensation (if any) is governed by the respective product provider and disclosed in the relevant offering documents.</p> <h6 class='rcdh64'>Transparency</h6> <p class='rcdp7'>Commission structures are determined by the respective product providers and may vary across schemes and categories.</p> <p class='rcdp8'>Investors are encouraged to refer to the respective scheme documents or product disclosures for details.</p> <h6 class='rcdh65'>Important Notes</h6> <ul class='rcdul1'> <li class='rcdli1'>No additional fees are charged separately to investors for mutual fund distribution services.</li> <li class='rcdli2'><b class='rcdb3'>" . htmlspecialchars($websitename) . "</b> does not provide any guaranteed returns or assurance of performance.</li> <li class='rcdli3'>Commission earned does not alter the fundamental characteristics or risk profile of any investment product.</li> </ul>";


if (!empty($rvcdl)) {

    $html .= '<div class="commission-disclosures-list">';
    $html .= '<div class="table-responsive mt-4 "> <table class="table table-bordered"> <thead class="table-dark"> <tr class=""> <th class="">AMC NAME</th> <th class="">EQUITY FUNDS</th> <th class="">DEBT FUNDS</th><th class="">LIQUID FUNDS</th><th class="">ELSS FUNDS</th> </tr> </thead> <tbody class=""> ';
    foreach ($disclosureslistData as $dlitems) {
        if (in_array($dlitems['id'], $rvcdl)) {
            continue;
        }
        $html .= '<tr class=""> <td>' . $dlitems['dlname'] . '</td> <td>' . $dlitems['dlequityfunds'] . '</td> <td>' . $dlitems['dldebtfunds'] . '</td><td>' . $dlitems['dlliquidfunds'] . '</td><td>' . $dlitems['dlelssfunds'] . '</td> </tr> ';
    }
    $html .= '</tbody> </table> </div>';
    $html .= '</div>';
}

$html .= '</div>';

$response = [
    "investor_grievance_redressal1" => $html
];

echo json_encode($response);
exit;
?>