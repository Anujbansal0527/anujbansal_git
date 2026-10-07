<?php
include 'api_helper.php';
$config_datas = rv_getConfigData();

$base_url = $config_datas['base_url'] ?? '';

$html = '
<style>
#cookie-banner {
    position: fixed;
    bottom: 0;
    left:0;
    width: 100%;
    background: var(--rv-black);
    color: var(--rv-white);
    padding: 18px 20px;
    z-index: 9999;
    display: none;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.3);
}
.cookie-container {
    max-width: 1200px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}
.cookie-text {
    font-size: 14px;
    line-height: 1.6;
}
.cookie-text a {
    color: var(--rv-primary);
    text-decoration: underline;
    font-weight: 500;
}
.cookie-buttons {
    display: flex;
    gap: 12px;
    flex-shrink: 0;
}
.cookie-buttons button {
    padding: 10px 22px;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    transition: 0.3s;
}
.cookie-buttons .accept {
    background: var(--rv-black);
    color: var(--rv-white);
    border: 2px solid var(--rv-primary);
    
}
.cookie-buttons .reject {
    background: var(--rv-black);
    color: var(--rv-white);
    border: 2px solid var(--rv-secondary);
}
@media (max-width: 768px) {
    .cookie-container {
        flex-direction: column;
        align-items: flex-start;
    }
    .cookie-buttons {
        width: 100%;
        justify-content: center;
    }
    .cookie-buttons button {
        width: 45%;
    }
}
</style>

<div id="cookie-banner" class="rvcookie-banner">
    <div class="cookie-container rccbdiv2">
        <div class="cookie-text rccbdiv3">
            We use only essential cookies required for the functioning of this website. 
            These cookies do not collect any personal or sensitive personal data. 
            By continuing to use the website, you acknowledge our use of such cookies.<br class="rccbbr1">
            For more details, please refer to our 
            <a href="' . $base_url . '/cookie-policy" class="rccba1">Cookie Policy</a>.
        </div>

        <div class="cookie-buttons rccbdiv4">
            <button class="accept rccbbutton1" onclick="setCookieConsent(\'accepted\')">Accept</button>
            <button class="reject rccbbutton2" onclick="setCookieConsent(\'rejected\')">Reject</button>
        </div>
    </div>
</div>

<script>
(function(){
    if (document.cookie.indexOf("cookie_consent=") === -1) {
        setTimeout(function() {
            document.getElementById("cookie-banner").style.display = "block";
        }, 1500);
    }
})();

function setCookieConsent(value) {
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));

    document.cookie = "cookie_consent=" + value +
        "; expires=" + d.toUTCString() +
        "; path=/; SameSite=Lax";

    document.getElementById("cookie-banner").style.display = "none";
}
</script>
';

$response = [
    "cookie_banner" => $html
];

echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
exit;
?>