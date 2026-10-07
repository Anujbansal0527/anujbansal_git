<?php
header('Content-Type: application/json');

$cfg = [
  'websitename' => $_GET['websitename'] ?? 'Company',
  'clientname' => $_GET['clientname'] ?? 'Client Name',

  'mobiles' => array_filter([
      $_GET['mobile']  ?? '',
      $_GET['mobile1'] ?? '',
      $_GET['mobile2'] ?? '',
      $_GET['mobile3'] ?? '',
      $_GET['mobile4'] ?? '',
  ]),

  'emails' => array_filter([
      $_GET['email']  ?? '',
      $_GET['email1'] ?? '',
      $_GET['email2'] ?? '',
      $_GET['email3'] ?? '',
  ]),

  'addresses' => array_filter([
      $_GET['address']  ?? '',
      $_GET['address1'] ?? '',
      $_GET['address2'] ?? '',
  ]),

];
$html .= '';

$html .= '<div>';

$html .='<p>At <b>' . htmlspecialchars($cfg['websitename']) . '</b>, we are committed to delivering transparent, prompt, and reliable services to our valued investors. We recognize the importance of addressing investor grievances fairly and efficiently.</p><p>If you have any queries, complaints, or feedback regarding our mutual fund distribution services, please feel free to reach out to us:</p>';

if (!empty($cfg['mobiles']) || !empty($cfg['emails']) || !empty($cfg['addresses'])) {

    $html .= '<ul>';

    //   Multiple mobiles
    $cm = 0;
    foreach ($cfg['mobiles'] as $mobile) {
        if ($cm == 0) {
            // First mobile – no number
            $html .= '<li><b>Mobile:</b> <a href="tel:' . htmlspecialchars($mobile) . '">' . htmlspecialchars($mobile) . '</a></li>';
        } else {
            // From second onward – numbered
            $html .= '<li><b>Mobile ' . htmlspecialchars($cm) . ':</b> <a href="tel:' . htmlspecialchars($mobile) . '">' . htmlspecialchars($mobile) . '</a></li>';
        }
        $cm++;
    }

    //   Multiple Email
    

    $ce = 0;
    foreach ($cfg['emails'] as $email) {
        if ($ce == 0) {
            // First Email – no number
            $html .= '<li><b>Email:</b> <a href="mailto:' . htmlspecialchars($email) . '">' . htmlspecialchars($email) . '</a></li>';
        } else {
            // From second onward – numbered
            $html .= '<li><b>Email ' . htmlspecialchars($ce) . ':</b> <a href="mailto:' . htmlspecialchars($email) . '">' . htmlspecialchars($email) . '</a></li>';
        }
        $ce++;
    }

    //   Multiple addresses
 
    $ca = 0;
    foreach ($cfg['addresses'] as $address) {
        if ($ca == 0) {
            // First mobile – no number
            $html .= '<li><b>Address:</b> <a href="#!">' . htmlspecialchars($address) . '</a></li>';
        } else {
            // From second onward – numbered
            $html .= '<li><b>Address ' . htmlspecialchars($ca) . ':</b> <a href="#!">' . htmlspecialchars($address) . '</a></li>';
        }
        $ca++;
    }



     

    $html .= '</ul>';

    $cm = 0;
    foreach ($cfg['mobiles'] as $mobile) {

        // ❌ clientname nahi hai → poori row skip
        if (empty($cfg['clientname'])) {
            continue;
        }

        // sirf first mobile ke liye
        if ($cm == 0) {
            $html .= '<p><b>' . htmlspecialchars($cfg['clientname']) . '</b> <a href="tel:' . htmlspecialchars($mobile) . '">' . htmlspecialchars($mobile) . '</a></p>';
        }

        $cm++;
    }


}




$html .= '<p>We aim to acknowledge and respond to all investor communications within 24 business hours.</p>
<p>If your concern is not resolved to your satisfaction within the specified timeframe, or if you require further
    escalation, you may directly contact our Founder for resolution:</p>
<p>Your trust matters to us. We are here to make your experience with <b>' . htmlspecialchars($cfg['websitename']) .
        '</b> smooth, secure, and supportive. </p>';
$html .= '</div>';
$response = [
"investor_grievance_redressal" => $html
];
echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
exit;

?>