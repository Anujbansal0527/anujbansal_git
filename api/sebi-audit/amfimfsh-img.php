 
<?php
include 'api_helper.php';

$response = [
    "amfimfsh_img" => "<style>.rvn-footer-list { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; }.rvn-footer-list img { height: 60px; } .rvnfo-content p{color:var(--rvcfo-color);}</style> <div class='rvn-footer-list'><img src='https://www.redvisiontechnologies.com/api/audit/amfi.webp' alt='amfi' /><img src='https://www.redvisiontechnologies.com/api/audit/mutualfund.webp' alt='mutualfund' /></div>" ];

echo json_encode($response);
exit;
?>