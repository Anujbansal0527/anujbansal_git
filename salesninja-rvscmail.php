<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Content-Security-Policy: script-src 'self' 'unsafe-inline' https://www.google.com https://www.gstatic.com;");

session_start();

include("./rvm-include/config.php");

require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';
require './PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

function getClientIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        return trim($ipList[0]);
    }

    return $_SERVER['REMOTE_ADDR'];
}

$ip = getClientIP();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $formVal = $_POST['form_val'] ?? '';

    $formKeyName = $formVal . 'form_key';
    $formKey = $_POST[$formKeyName] ?? '';

    $captchaField = $formKey . '_' . $formVal . '_captcha';
    $captchacode = $formKey . '_' . $formVal . '_ans';

    $rvrrf = $formVal . 'rvrrf';

    $honeypot = $formVal . '_hp_' . $formKey;

    // CAPTCHA CHECK
    if (
        !isset($_POST[$captchaField]) ||
        $_POST[$captchaField] != ($_SESSION[$captchacode] ?? '')
    ) {

        header("Location: " . $_SERVER['HTTP_REFERER'] . "?err=captcha_err");
        exit;
    }

    // SCRIPT BLOCK
    foreach ($_POST as $value) {

        if (is_array($value)) {
            continue;
        }

        if (stripos($value, "<script") !== false) {
            die("Script injection blocked!");
        }
    }

    // CSRF CHECK
    if (
        empty($_SESSION[$rvrrf][$formKey]) ||
        !isset($_POST[$rvrrf]) ||
        $_POST[$rvrrf] !== $_SESSION[$rvrrf][$formKey]
    ) {
        die("Invalid request - RSCSRF failed");
    }

    // HONEYPOT
    if (!empty($_POST[$honeypot])) {
        die("Bot detected");
    }

    // FIELD NAMES
    $rvusersfName = $formVal . '_rvusersfName';
    $rvuserslName = $formVal . '_rvuserslName';
    $rvrmobile = $formVal . '_rvrmobile';
    $rvruserEmail = $formVal . '_rvruserEmail';
    $rvusersfArn = $formVal . '_rvusersfArn';
    $rvusersfCity = $formVal . '_rvusersfCity';
    $cfservicesKey = $formVal . '_cfservices';
    $rvrformtype = $formVal . '_rvrformtype';
    $rvrformname = $formVal . '_rvrformname';

    // VALUES
    $cfusersfName = trim($_POST[$rvusersfName] ?? '');
    $cfuserslName = trim($_POST[$rvuserslName] ?? '');
    $cfmobile = trim($_POST[$rvrmobile] ?? '');
    $cfuserEmail = trim($_POST[$rvruserEmail] ?? '');
    $cfusersfArn = trim($_POST[$rvusersfArn] ?? '');
    $cfusersfCity = trim($_POST[$rvusersfCity] ?? '');
    $cfservices = trim($_POST[$cfservicesKey] ?? '');

    $cfformtype = trim($_POST[$rvrformtype] ?? '');
    $cfformtypename = trim($_POST[$rvrformname] ?? '');
    $cfsource = 'SalesNinja Website';
    $cforganizationId = 'RED-3942-5175';

    // EMAIL VALIDATION
    if (!filter_var($cfuserEmail, FILTER_VALIDATE_EMAIL)) {
        die("Invalid Email");
    }

    // MOBILE VALIDATION
    if (!preg_match("/^[6-9]\d{9}$/", $cfmobile)) {
        die("Invalid Mobile");
    }

    // INSERT DATA
    $stmt = $con->prepare("
        INSERT INTO salesninjainsertLeads 
        (
            fName,
            lName,
            mobile,
            Email,
            fArn,
            fCity,
            services
        ) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    // IMPORTANT FIX
    $stmt->bind_param(
        "sssssss",
        $cfusersfName,
        $cfuserslName,
        $cfmobile,
        $cfuserEmail,
        $cfusersfArn,
        $cfusersfCity,
        $cfservices
    );

    // API

    $api_url = "https://api.salesninjacrm.com/migration/lead/assign";

    $api_data = [
        "firstName" => $cfusersfName,
        "lastName" => $cfuserslName,
        "mobile" => $cfmobile,
        "email" => $cfuserEmail,
        "arn_no" => $cfusersfArn,
        "city" => $cfusersfCity,
        "product" => $cfservices,
        "source" => $cfsource,
        "organizationId" => $cforganizationId,
    ];

    $ch = curl_init($api_url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($api_data));

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $api_response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "API Error: " . curl_error($ch);
    }

    curl_close($ch);

    if ($stmt->execute()) {

        // REMOVE SESSION DATA
        unset($_SESSION[$rvrrf][$formKey]);
        unset($_SESSION[$captchacode]);

        $_SESSION['rvrhName'] = $cfformtype;
        $_SESSION['rvrhprofilemsg'] = "Thank you for contacting us. We will get back to you shortly.";

        header("Location: rvrhc-thankyou.php");
        exit;

    } else {

        echo "Database Error: " . $stmt->error;
    }

    $stmt->close();
}
?>