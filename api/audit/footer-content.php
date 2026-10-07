<?php


header('Content-Type: application/json');
    $html .= '';

    $company = isset($_GET['company']) ? $_GET['company'] : 'Company Name';

    $html .= '';
    $html .= "<style>.rvn-footer-list { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; }.rvn-footer-list img { height: 60px; } .rvnfo-content p{color:var(--rvcfo-color);}</style><div class='rvnfo-content'><p><b>$company</b> is an AMFI Registered Mutual Fund Distributor.</p><p>Disclaimer: Mutual fund investments are subject to market risks. Please read the scheme information and other related documents carefully before investing. Past performance is not indicative of future  returns. Please consider your specific investment requirements before choosing a fund, or designing a portfolio that suits your needs. </p><p><b>$company</b> makes no warranties or representations, express or implied, on products offered through the platform of <b>$company</b>. It accepts no liability for any damages or losses, however, caused, in connection with the use of, or on the reliance of its product or related services. Terms and conditions of the website are applicable. Investments in Securities markets are subject to market risks, read all the related documents carefully before investing.</p><div class='rvn-footer-list'><img src='https://www.redvisiontechnologies.com/api/audit/amfi.webp' alt='amfi' /><img src='https://www.redvisiontechnologies.com/api/audit/mutualfund.webp' alt='mutualfund' /></div></div>";
    $response = [
        "footer_content" => $html
    ];
echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
exit;
?>