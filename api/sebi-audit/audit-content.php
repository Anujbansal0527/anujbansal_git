<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();


if (!empty($config_datas['websitenamech'])) {
    $websitename = $config_datas['websitenamech'] ?? '';

}
if (!empty($config_datas['ernwebsitename'])) {
    $websitename = $config_datas['ernwebsitename'] ?? '';

} else {
    $websitename = $config_datas['websitename'] ?? '';

}
$mfarn = $config_datas['mfarn'] ?? '';
$rvapmi = $config_datas['apmi'] ?? '';
$rvirdai = $config_datas['irdai'] ?? '';
$rvaif = $config_datas['aif'] ?? '';
$rvsif = $config_datas['sif'] ?? '';
$rvgiftcity = $config_datas['giftcity'] ?? '';
$rvgbonds = $config_datas['bonds'] ?? '';
$rvgstin = $config_datas['gstin'] ?? '';
$rvpanno = $config_datas['panno'] ?? '';
$rvaddress = $config_datas['address'] ?? '';
$rvclientname = $config_datas['clientname'] ?? '';
$rvemail = $config_datas['email'] ?? '';
$rvmobile = $config_datas['mobile'] ?? '';
$rvfootercontentmid = $config_datas['footercontentmid'] ?? '';
$rvgrievancegedressal = $config_datas['rievancegedressal'] ?? '';

$groname = $config_datas['footergro']['groname'] ?? '';
$groemail = $config_datas['footergro']['groemail'] ?? '';
$gromobile = $config_datas['footergro']['gromobile'] ?? '';

$arn_text = '';
if (!empty($mfarn)) {
    $arn_text = "(ARN: $mfarn)";
}

$html = '';
$html .= '<span class="rv-audit-content">';
if (!empty($rvfootercontentmid)) {
    $html .= $rvfootercontentmid;
} else {
    $html .= '<span class="span1">Mutual Fund investments are subject to market risks. Please read all scheme-related documents carefully before investing. Past performance is not indicative of future returns.</span><br class="brbefore"><span class="span2"> <b class="b1">' . htmlspecialchars($websitename) . '</b> is an AMFI Registered Mutual Fund Distributor <b class="b2">' . htmlspecialchars($arn_text) . '</b>. We receive commission from Asset Management Companies for the distribution of mutual fund products. Details are available on our Commission Disclosure page.</span><br class="brmidle"><span class="span3"><b class="b3">Risk factors and disclosures for other financial products (if offered) are included in the relevant sections of this website.</b></span>';
}





if (!empty($rvapmi)) {
    $html .= '<br class="brcontent">';
}
if (!empty($rvapmi)) {
    $html .= '<span class="pmsline">Portfolio Management Services are subject to market risks. Please read the Disclosure Document of the PMS provider carefully before investing. Past performance is not indicative of future returns.</span>';
}

if (!empty($rvirdai)) {
    $html .= '<span class="rdailine"> Insurance products are subject to the terms and conditions of the respective insurer. Please read all policy-related documents carefully before purchasing. </span>';
}
if (!empty($rvaif)) {
    $html .= '<span  class="aifline"> Alternative Investment Funds are subject to market risks. Please read all scheme-related documents carefully before investing. Past performance is not indicative of future returns.         </span>';
}
if (!empty($rvsif)) {
    $html .= '<span class="sifline"> Specialised Investment Funds are subject to market risks. Please read all related documents carefully before investing. Past performance is not indicative of future returns.  </span>';
}
if (!empty($rvgiftcity)) {
    $html .= '<span  class="giftcityline"> Investments through GIFT City or offshore platforms are subject to applicable regulations, currency risks, and tax implications. Please read all related documents carefully before investing.   </span>';
}

if (!empty($rvgbonds)) {
    $html .= '<span  class="gbondsline"> Investments in bonds and fixed income instruments are subject to risks including interest rate risk, credit risk, and liquidity risk. Investors are advised to read all relevant documents carefully before investing.   </span></br>';
}

$html .= '<br class="bradviser"><b class="b4">' . htmlspecialchars($websitename) . ' is NOT a SEBI Registered Investment Adviser. </b></br>';


if (!empty($rvgstin)) {
    $html .= '<b class="b4">GSTIN:</b> ' . $rvgstin . ' | ';
}

if (!empty($rvpanno)) {
    $html .= $rvpanno;
}


if (!empty($rvaddress)) {
    $html .= '<b class="b5"> Office:</b> ' . $rvaddress . '<br class="broffice">';
}
if (!empty($rvgrievancegedressal)) {
    $html .= $rvgrievancegedressal;
} else {
    $html .= '<b class="b6">Grievance Redressal Officer: </b>';

    if (!empty($groname)) {
        $html .= $groname;
    } else {
        if (!empty($rvclientname)) {
            $html .= $rvclientname;
        }
    }


    if (!empty($groemail)) {
        $html .= ' | <a href="mailto:' . $groemail . '">' . $groemail . '</a>';

    } else {
        if (!empty($rvemail)) {
            $html .= ' | <a href="mailto:' . $rvemail . '">' . $rvemail . '</a>';
        }
    }

    if (!empty($gromobile)) {
        $html .= ' | <a href="tel:+91' . $gromobile . '">' . $gromobile . '</a>';

    } else {
        if (!empty($rvmobile)) {
            $html .= ' | <a href="tel:+91' . $rvmobile . '">' . $rvmobile . '</a>';
        }
    }
}
$html .= '</span>';

$html .= '';

$response = [
    "audit_content" => $html
];

echo json_encode($response);
exit;
?>