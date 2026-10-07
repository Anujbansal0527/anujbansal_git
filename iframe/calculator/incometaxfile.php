<?php

$parseData = array();
$selectYear = $_POST['selectYear'];
$ageGroupValue = $_POST['ageGroupValue'];

$checkDeduction = isset($_POST['checkDeduction']) ? $_POST['checkDeduction'] : 'TRUE';

$divHraMedicalTax = TRUE;
$div80c = TRUE;
$div80ccg = TRUE;
$div80ccd = TRUE;
$div80d = TRUE;
$newamount80tta = TRUE;
$div80tta = TRUE;
$div80g = TRUE;
$div80e = TRUE;
$divTaxBenifits = TRUE;
$deductions80DDB = TRUE;
$StandardDeductions = TRUE;
switch ($selectYear) {
    case "14":
        $div80ccd = FALSE;
        $newamount80tta = FALSE;
        break;
    case "13":
        $div80ccd = FALSE;
        $div80tta = FALSE;
        $div80g = FALSE;
        $div80e = FALSE;
        $newamount80tta = FALSE;
        break;
    case "12":
        $divHraMedicalTax = FALSE;
        $div80ccd = FALSE;
        $div80tta = FALSE;
        $div80g = FALSE;
        $div80e = FALSE;
        $newamount80tta = FALSE;
        break;
    case "11":
        $div80ccg = FALSE;
        $div80ccd = FALSE;
        $div80tta = FALSE;
        $div80g = FALSE;
        $div80e = FALSE;
        $divTaxBenifits = FALSE;
        $newamount80tta = FALSE;
        break;
    case "17":
        $deductions80DDB = FALSE;
        $StandardDeductions = FALSE;
        $newamount80tta = FALSE;
        break;
    default:
        break;
}

$parseData = array(
    "divHraMedicalTax" => $divHraMedicalTax,
    "div80c" => $div80c,
    "div80ccg" => $div80ccg,
    "div80ccd" => $div80ccd,
    "div80d" => $div80d,
    "div80tta" => $div80tta,
    "div80g" => $div80g,
    "div80e" => $div80e,
    "divTaxBenifits" => $divTaxBenifits,
    "deductions80DDB" => $deductions80DDB,
    "newamount80tta" => $newamount80tta,
    "StandardDeductions" => $StandardDeductions,
    "selectYear" => $selectYear,
    "ageGroupValue" => ''
);

$endOfUrl = 'income-tax-calculator';

if ($checkDeduction == 'TRUE' || $ageGroupValue != '1') {
    include('./incometaxform.php');
} else {
    include('./incometaxwithout.php');
}
