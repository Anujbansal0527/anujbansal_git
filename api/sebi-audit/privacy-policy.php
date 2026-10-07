<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();
if (!empty($config_datas['privacypolicyname'])) {
    $privacypolicyname = $config_datas['privacypolicyname'] ?? '';

} else {
    $privacypolicyname = $config_datas['websitename'] ?? '';

}


$config_datas = rv_getConfigData();
if (!empty($config_datas['ernwebsitename'])) {
    $ernwebsitename = $config_datas['ernwebsitename'] ?? '';

} else {
    $ernwebsitename = $config_datas['websitename'] ?? '';

}


$websitename = $config_datas['websitename'] ?? '';
$rvclientname = $config_datas['clientname'] ?? '';
$rvdesignation = $config_datas['designation'] ?? '';
$rvmobile = $config_datas['mobile'] ?? '';
$rvemail = $config_datas['email'] ?? '';
$rvaddress = $config_datas['address'] ?? '';
$rvworkinghours = $config_datas['workinghours'] ?? '';
$rvrvcprivacypolicy = $config_datas['rvcprivacypolicy'] ?? '';
$mfarn = $config_datas['mfarn'] ?? '';

$arn_text = '';
if (!empty($mfarn)) {
    $arn_text = "(ARN: $mfarn)";
}

$html = '';
$html .= '';
$html .= '<div class="rvprivacy-policy">';



$html .= "<p class='rppp1'>This Privacy Policy sets out how <b class='rppb1'>" . htmlspecialchars($privacypolicyname) . "</b> uses and protects any information that you share when you use this website. <b class='rppb2'>" . htmlspecialchars($privacypolicyname) . "</b> is committed to ensuring that your privacy is protected at all times. Should we ask you to provide certain information by which you can be identified when using this website, you can be assured that it will only be used in accordance with this Privacy Statement.</p> <p class='rppp2'><b class='rppb3'>" . htmlspecialchars($privacypolicyname) . "</b> understands that our relationship is strongly built on trust and faith. In the course of using information on this website or availing of the services, <b class='rppb4'>" . htmlspecialchars($privacypolicyname) . "</b> may become privy to the personal information of its customers, including information that is of a confidential nature. <b class='rppb5'>" . htmlspecialchars($privacypolicyname) . "</b> is strictly committed to protecting the privacy of its customers and has taken reasonable measures to protect the confidentiality of customer information and its transmission through the World Wide Web. However, it shall not be liable in any manner for the disclosure of confidential information in accordance with this Privacy Commitment, in terms of the agreement, if any, with the customer, or for reasons beyond its control. We may, however, be required to disclose your personal information to Government bodies, Judicial bodies, our Regulators, or any person to whom the Firm is under an obligation to make disclosure under the requirements of any law binding on the Firm or any of its branches, if required. </p> <h5 class='rpph51'>Hyperlink Policy for User </h5> <p class='rppp3'>Any hyperlink to other Internet sites is at the customer's own risk. The contents of such websites and the accuracy of opinions expressed are not verified, monitored, or endorsed by <b class='rppb6'>" . htmlspecialchars($privacypolicyname) . "</b> in any way or manner. <b class='rppb7'>" . htmlspecialchars($privacypolicyname) . "</b> is not responsible for the setup of any hyperlink from a third-party website to <b class='rppb8'>" . htmlspecialchars($websitename) . "</b> </p> <h5 class='rpph52'>What We Collect </h5> <p class='rppp4'><b class='rppb9'>We may collect the following information:</b><br class='rvpbr1'> Name and contact details<br class='rvpbr2'> Personal information directly from you, such as name, email address, contact details, or other identifiers when you register, transact, or interact with the application.<br class='rvpbr3'> Your personal information is used to provide access to features, personalize your experience, and communicate with you regarding your account or transactions.<br class='rvpbr4'> We implement industry-standard security measures to protect your personal information from unauthorized access, alteration, disclosure, or destruction.<br class='rvpbr5'> You have the right to control and manage your personal information. You can update details, manage communication preferences, or exercise your rights under applicable data protection laws.<br class='rvpbr6'> You may also request the deletion of your account or personal information through the application or by contacting us. </p> <h5 class='rpph53'>Collection/Use of Image Data</h5> <p class='rppp5'>When you grant permission, our application may access your device's camera or photo gallery to enable features involving capturing or uploading images.</p> <p class='rppp6'>Images may be used for document verification in Video KYC.</p> <p class='rppp7'>We do not share image data with third parties unless required by law or necessary to provide services requested by you.</p> <h5 class='rpph54'>Use of Location Data</h5> <p class='rppp8'>Location access may be used for identity verification and enabling application functionalities.</p> <h5 class='rpph55'>Security</h5> <p class='rppp9'>We are committed to ensuring that your information is secure. Suitable physical, electronic, and managerial procedures are in place to safeguard the information collected.</p> <h5 class='rpph56'>Links to Other Websites</h5> <p class='rppp10'>Our website may contain links to other websites. Once you leave our site, we do not have control over those websites and are not responsible for the protection and privacy of any information you provide there.</p> <h5 class='rpph57'>Controlling Your Personal Information</h5> <p class='rppp10'>If you believe that any of your information is incorrect or incomplete, please email us at <a href=mailto:" . htmlspecialchars($rvemail) . " class='rppa1'><b class='rppb10'><u class='rppu1'>" . htmlspecialchars($rvemail) . "</u></b></a>. We will promptly correct any information found to be incorrect.</p> <h5 class='rpph58'>Security Certificates</h5> <p class='rppp11'>We recognize the security implications of handling financial data. Safeguards include:</p> <ul class='rppul1'> <li class='rppli11'>Secure storage of data</li> <li class='rppli12'>One-way encrypted passwords</li> <li class='rppli13'>Encrypted communication with service providers</li> <li class='rppli14'>No data sharing without your explicit consent for transactions</li> </ul> <p class='rppp11'>All communications are encrypted using industry standards, and data is hosted with secure service providers with regular backups. </p>";

if (!empty($rvrvcprivacypolicy)) {
    $html .= $rvrvcprivacypolicy;
} else {
    $html .= "<hr> <h5 class='rpph59'>AMFI  Privacy Commitment</h5> <p class='rppp12'><b class='rppb11'>" . htmlspecialchars($ernwebsitename) . "</b>, ARN-<b class='rppb12'>" . htmlspecialchars($arn_text) . "</b>, AMFI Registered Mutual Fund Distributor, is committed to maintaining the privacy, confidentiality, and security of personal information collected from investors, employees, and website visitors.</p> <p class='rppp13'>This policy is aligned with the Digital Personal Data Protection Act, 2023 (DPDPA), Information Technology Act, 2000, SEBI Master Circulars for Mutual Funds, and AMFI guidelines.</p> <h5 class='rpph510'>Scope & Applicability</h5> <p class='rppp14'>This policy applies to all individuals interacting with <b class='rppb13'>" . htmlspecialchars($ernwebsitename) . "</b>. through the website, mobile applications, onboarding, KYC, and transaction processes.</p> <h5 class='rpph511'>Information We Collect</h5> <ul class='rppul2'> <li><b class='rppb21'>Personal Details:</b> Name, address, DOB, PAN, Aadhaar, contact details, bank details, nomination</li> <li><b class='rppb22'>Financial Details:</b> Income, net worth, investments, risk profile, goals</li> <li><b class='rppb23'>KYC Documents:</b> PAN, Aadhaar, address proof, bank proof, FATCA/CRS</li> <li><b class='rppb24'>Technical Data:</b> IP, device, cookies</li> </ul> <p class='rppp15'>We do not collect unnecessary personal data.</p> <h5 class='rpph512'>Purpose of Data Collection</h5> <p class='rppp16'>Used for:</p> <ul class='rppul3'> <li class='rppli31'>Transactions</li> <li class='rppli32'>KYC & regulatory compliance</li> <li class='rppli33'>Risk profiling</li> <li class='rppli34'>Communication</li> <li class='rppli35'>Complaint handling</li> <li class='rppli36'>Regulatory reporting</li> <li class='rppli37'>Website improvement</li> </ul> <h5 class='rpph513'>Data Sharing Rules</h5> <p class='rppp17'>Data may be shared with:</p> <ul class='rppul4'> <li class='rppli41'>AMCs & RTAs</li> <li class='rppli42'>SEBI / AMFI</li> <li class='rppli43'>Auditors</li> <li class='rppli44'>KRAs (CAMS, CVL, NDML, CKYC)</li> <li class='rppli45'>Transaction platforms</li> <li class='rppli46'>Back-office providers</li> <li class='rppli47'>PMS providers (if applicable)</li> <li class='rppli48'>Other parties only with consent</li> </ul> <p class='rppp18'>We do not sell or share data for marketing.</p> <h5 class='rpph514'>Data Storage & Security</h5> <ul class='rppul5'> <li class='rppli51'>Encrypted digital storage</li> <li class='rppli52'>Restricted Access</li> <li class='rppli53'>Secure physical storage</li> <li class='rppli54'>Security controls and audits</li> </ul> <h5 class='rpph515'>Data Retention & Disposal</h5> <p class='rppp19'>Data is retained as per regulatory requirements and securely destroyed after the retention period.</p> <h5 class='rpph516'>Your Rights (DPDPA 2023)</h5> <p class='rppp20'>You may:</p> <ul class='rppul6'> <li class='rppli61'>Access data</li> <li class='rppli62'>Correct data</li> <li class='rppli63'>Request deletion (subject to law)</li> <li class='rppli64'>Withdraw consent</li> <li class='rppli65'>File a complaint with the Data Protection Board</li> </ul> <h5 class='rpph517'>Cookies</h5> <p class='rppp21'>Used for improving experience and analytics. They can be controlled via the browser.</p> <h5 class='rpph518'>Third-Party Links</h5> <p class='rppp22'>We are not responsible for external website privacy practices.</p> <h5 class='rpph519'>Changes to Policy</h5> <p class='rppp23'>This policy may be updated from time to time.</p> <h5 class='rpph520'>Contact for Privacy Concerns</h5> <p class='rppp24'> ";

    if (!empty($rvclientname)) {
        $html .= " <b class='rppb8'>Grievance Officer:</b> " . htmlspecialchars($rvclientname) . ".<br class='rvpbr6'> ";
    }
    if (!empty($rvdesignation)) {
        $html .= " <b class='rppb8'>Designation:</b> " . htmlspecialchars($rvdesignation) . ".<br class='rvpbr6'> ";
    }
    if (!empty($rvmobile)) {
        $html .= " <b class='rppb8'>Email:</b> " . htmlspecialchars($rvmobile) . ".<br class='rvpbr6'> ";
    }
    if (!empty($rvemail)) {
        $html .= " <b class='rppb8'>Phone:</b> " . htmlspecialchars($rvemail) . ".<br class='rvpbr6'> ";
    }
    if (!empty($rvaddress)) {
        $html .= " <b class='rppb8'>Address:</b> " . htmlspecialchars($rvaddress) . ".<br class='rvpbr6'> ";
    }
    if (!empty($rvworkinghours)) {
        $html .= " <b class='rppb8'>Business Hours:</b> " . htmlspecialchars($rvworkinghours) . ".<br class='rvpbr6'> ";
    }

    $html .= "</p>";
}
$html .= "</div>";
$response = [
    "privacy_policy" => $html
];

echo json_encode($response);
exit;
?>