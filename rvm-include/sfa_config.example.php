<?php
return [
  'db' => [
    'dsn' => 'mysql:host=localhost;dbname=redtechn_databs;charset=utf8mb4',
    'user' => 'redtechn_user',
    'pass' => 'REPLACE_WITH_PRIVATE_VALUE',
    'rdata' => 'redtechn_databs',
  ],

  'smtp' => [
    'host' => 'smtp.gmail.com',
    'username' => '',
    'password' => '',
    'port' => 587,
    'from_email' => '',
    'CC_email' => '',
    'BCC_email' => '',
  ],

  'otp' => [
    'length' => 6,                  // OTP digits (e.g., 6 = 123456)
    'expiry_seconds' => 300,        // OTP expire time (in seconds) — 300 = 5 minutes
    'max_requests_per_minute' => 3, // Ek user 1 minute me kitni baar OTP maang sakta hai
    'max_attempts' => 3             // OTP verify karne ki max attempts
  ],
  'rvrhcinfo' => [
    'rvrhc_logo' => '/images/logo.png',
    'rvrhc_favicon' => '/images/favicon.ico',
    'rvrhc_contact' => '/contact-us.php',
    'rvrhc_rvrh_css' => '/rvm-include/rvrh.css',
    'rvrhc_rvrh_js' => '/rvm-include/rvrh.js',
    'rvrhc_jquery360' => '/rvm-include/jquery-3.6.0.min.js',
    'rvrhc_bootstrap_icons' => 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css',
  ],
  'rvuserinfo' => [
    'base_url' => 'https://www.redvisiontechnologies.com/',
    'clientname' => 'REDVision Global Technologies',
    'websitename' => 'REDVision Global Technologies',
    'email' => 'info@redvisionglobal.com',
    'email1' => 'hr@redvisionglobal.com',
    'mobile' => '+919039822000',
    'mobile1' => '+919300910910',
    'mobile2' => '',
    'arn' => '',
    'euin' => '',
    'arn_start_date' => '',
    'arn_end_date' => '',
    'euin_start_date' => '',
    'euin_end_date' => '',
    'domain' => '',
    'address' => '101, 45 Hare Krishna Vihar, Behind Advanced Academy, Nipania, Indore, 452010 (MP)',
    'mapsrc' => '',
    'mapurl' => '',
  ],
  'rvlogin' => [
    'callbackUrl' => '',
    'siteUrl' => 'https://wealthelite.in',
    'wheatlebalsiteUrl' => ''
  ]
];
?>