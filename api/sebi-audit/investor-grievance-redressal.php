<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();

$websitename = $config_datas['websitename'] ?? '';

// arrays bana lo (API se)
$mobiles = array_filter([
    $config_datas['mobile'] ?? '',
    $config_datas['mobile1'] ?? '',
    $config_datas['mobile2'] ?? '',
    $config_datas['mobile3'] ?? '',
    $config_datas['mobile4'] ?? '',
]);

$emails = array_filter([
    $config_datas['email'] ?? '',
    $config_datas['email1'] ?? '',
    $config_datas['email2'] ?? '',
    $config_datas['email3'] ?? '',
]);

$addresses = array_filter([
    $config_datas['address'] ?? '',
    $config_datas['address1'] ?? '',
    $config_datas['address2'] ?? '',
]);

$html = '';
$html .= '';

$html .= "<p class='rigrp1'><b class='rigrb1'>" . htmlspecialchars($websitename) . "</b> is committed to providing transparent and efficient services to investors. We aim to address investor queries and grievances in a fair and timely manner.</p><h6 class='rigrh61'>Contact Details</h6><p class='rigrp2'>For any queries, complaints, or feedback, investors may reach out through:</p>";

if (!empty($mobiles) || !empty($emails) || !empty($addresses)) {

    $html .= '<ul class="rigrul1">';

    // Emails
    if (!empty($emails)) {
        $email_links = [];

        foreach ($emails as $email) {
            $email_links[] = '<a href="tel:' . htmlspecialchars($email) . '" class="rigra1">' . htmlspecialchars($email) . '</a>';
        }
        $html .= '<li class="rigrli1"><b class="rigrb2">Email:</b> ' . implode(', ', $email_links) . '</li>';
    }

    // Mobiles
    if (!empty($mobiles)) {
        $mobile_links = [];

        foreach ($mobiles as $mobile) {
            $mobile_links[] = '<a href="tel:' . htmlspecialchars($mobile) . '" class="rigra2">' . htmlspecialchars($mobile) . '</a>';
        }
        $html .= '<li class="rigrli2"><b class="rigrb3">Mobile:</b> ' . implode(', ', $mobile_links) . '</li>';
    }

    // Address
    if (!empty($addresses)) {
        $address_links = [];

        foreach ($addresses as $address) {
            $address_links[] = htmlspecialchars($address);
        }
        $html .= '<li class="rigrli3"><b class="rigrb4">Address:</b> ' . implode(', ', $address_links) . '</li>';
    }

    $html .= '</ul>';
}

$html .= '<h6 class="rigrh62">Handling of Grievances</h6><p class="rigrp3">All investor communications are reviewed and addressed in a timely manner in accordance with applicable regulatory guidelines.</p><h6 class="rigrh63">Escalation</h6><p class="rigrp4">If a grievance is not resolved satisfactorily, investors may refer to the Grievance Redressal page for detailed escalation mechanisms.</p><p class="rigrp5">Investors may also approach:</p><ul class="rigrul2"><li class="rigrli4">SEBI SCORES: https://scores.sebi.gov.in/</li><li class="rigrli5">SMART ODR: https://smartodr.in</li></ul><h6 class="rigrh64">Note</h6><p class="rigrp6">This page is intended to facilitate easy access to grievance-related contact information. Detailed grievance handling procedures are available on the Grievance Redressal page.</p>';

$response = [
    "investor_grievance_redressal" => $html
];

echo json_encode($response);
exit;
?>