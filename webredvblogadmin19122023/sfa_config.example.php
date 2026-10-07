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
    'username' => 'ajaykushwahredvision@gmail.com',
    'password' => 'REPLACE_WITH_PRIVATE_VALUE',
    'port' => 587,
    'from_email' => 'Apurva.Gupta@redvisionglobal.com',
    // 'from_email' => 'ajaykushwahredvision@gmail.com',
    // 'from_email' => 'Apurva.Gupta@redvisionglobal.com',
    'from_name' => 'REDVision Global Technologies Pvt. Ltd.'
  ],

  'otp' => [
    'length' => 6,                  // OTP digits (e.g., 6 = 123456)
    'expiry_seconds' => 300,        // OTP expire time (in seconds) — 300 = 5 minutes
    'max_requests_per_minute' => 3, // Ek user 1 minute me kitni baar OTP maang sakta hai
    'max_attempts' => 3             // OTP verify karne ki max attempts
  ]
];

?>