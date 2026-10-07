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

$response = [
        "cookie_policy" => '<div class="rvcookie-policy"> <p class="rccpp1">This Cookie Policy explains how <b class="rccpb1">' . $websitename . '</b>, a Mutual Fund Distributor, uses cookies on its website in accordance with applicable laws and regulatory requirements, including the Digital Personal Data Protection Act, 2023.</p> <h5 class="rccph51">What are Cookies?</h5> <p class="rccpp2">Cookies are small text files that are stored on your device when you visit a website. They help in ensuring the proper functioning of the website and improving user experience.</p> <h5 class="rccph52">Use of Cookies</h5> <p class="rccpp3">Our website uses cookies only for essential purposes. These include:</p> <ul class="mb-3 rccpul1"> <li class="rccpli1">Maintaining secure user sessions</li> <li class="rccpli2">Ensuring proper website functionality</li> <li class="rccpli3">Remembering user preferences, including cookie consent</li> </ul> <h5 class="rccph53">Nature of Cookies Used</h5> <p class="rccpp4">We use only essential cookies that are necessary for the operation of the website. These cookies do not collect, process, or store any personally identifiable or sensitive personal data.</p> <h5 class="rccph54">User Consent</h5> <p class="rccpp5">Since the website uses only essential cookies required for its operation, users are informed about the use of cookies through the cookie notice displayed on the website.</p> <h5 class="rccph55">Third-Party Cookies</h5> <p class="rccpp6">We do not use third-party cookies for analytics, advertising, or tracking purposes.</p> <h5 class="rccph56">Managing Cookies</h5> <p class="rccpp7">Users may manage or disable cookies through their browser settings. However, disabling essential cookies may affect certain functionalities of the website.</p> <h5 class="rccph57">Updates to this Policy</h5> <p class="rccpp8">This Cookie Policy may be updated from time to time to reflect changes in regulatory requirements or website practices.</p> <h5 class="rccph58">Contact Information</h5> <p class="rccpp9">For any queries regarding this Cookie Policy, users may contact us through the contact details provided on the website.</p> </div>'
];

echo json_encode($response);
exit;
?>