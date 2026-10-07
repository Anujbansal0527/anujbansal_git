<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();



$html = '';
$html .= '<div class="rvinvestor-dos-donts">';

$html .= "<p class='ricp1'><b class='ricb1'>✔ DO's</b></p> <ul class='ricul1'> <li class='ricli1'>Read SID / SAI / KIM of the scheme before investing.</li> <li class='ricli2'>Complete KYC (CKYC / KRA) and risk profiling before your first transaction.</li> <li class='ricli3'>Invest based on your goals, risk appetite, and time horizon — not on tips or short-term noise.</li> <li class='ricli4'>Review your portfolio at least annually with the distributor.</li> <li class='ricli5'>Check your Consolidated Account Statement (CAS) regularly for all folios.</li> <li class='ricli6'>Keep your bank details, PAN, address, and nominee updated.</li> <li class='ricli7'>Use SCORES (<b class='ricb2'><u class='ricu1'><a href='https://scores.sebi.gov.in/' class='rica1'>https://scores.sebi.gov.in/</a></u></b>) and SMART ODR (<b class='ricb3'><u class='ricu2'><a href='https://smartodr.in/' class='rica2'>https://smartodr.in/</a></u></b>) for unresolved complaints.</li> <li class='ricli8'>Ask questions about scheme risk, exit load, expense ratio, and commission before investing.</li> </ul> <p class='ricp2'><b class='ricb4'>✘ DON'Ts</b></p> <ul class='ricul2'> <li class='ricli9'>Do NOT invest without understanding your own risk profile.</li> <li class='ricli10'>Do NOT share OTP, password, UPI PIN, or login credentials with anyone — including our staff or purported AMC staff.</li> <li class='ricli11'>Do NOT expect guaranteed returns from any mutual fund scheme.</li> <li class='ricli12'>Do NOT invest above your risk ceiling; if you choose to, the transaction will be execution-only with a written unsuitability acknowledgement.</li> <li class='ricli13'>Do NOT ignore unsuitability communications — read and sign them carefully.</li> <li class='ricli14'>Do NOT decide based on past returns alone — past performance is not indicative of future returns.</li> <li class='ricli15'>Do NOT fall for schemes or impostors promising unrealistic returns or quick profits.</li> <li class='ricli16'>Do NOT transfer money to personal accounts; only use AMC-specified bank accounts or the BSE STAR MF platform.</li> </ul> <p class='ricp3'><b class='ricb5'>Investor Charter — Our Commitment</b></p> <ul class='ricul3'> <li class='ricli17'>Act in your best interest per the AMFI Code of Conduct.</li> <li class='ricli18'>Conduct risk profiling before any scheme recommendation.</li> <li class='ricli19'>Disclose all commissions transparently.</li> <li class='ricli20'>Not guarantee any specific returns.</li> <li class='ricli21'>Resolve grievances within 15 working days</li> </ul>";





$html .= '</div>';

$response = [
    "investor_dos_donts" => $html
];

echo json_encode($response);
exit;
?>