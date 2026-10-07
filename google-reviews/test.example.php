<?php
/* SECURITY */
//if ($_GET['key'] !== 'YOUR_SECRET') exit('Forbidden');

/* DB */
include("../config.php");

/* API */
$placeId = "ChIJMykM5TX9YjkR3ovp76K78cs";
$apiKey = "REPLACE_WITH_PRIVATE_VALUE";

$url = "https://maps.googleapis.com/maps/api/place/details/json"
    . "?place_id=$placeId"
    . "&fields=reviews"
    . "&key=$apiKey";

$data = json_decode(file_get_contents($url), true);
print_r($data);
die();
if (!isset($data['result']['reviews']))
    exit("No reviews");

$newInserted = 0;

foreach ($data['result']['reviews'] as $r) {

    if ((int) $r['rating'] !== 5) {
        continue; // ❌ skip non-5-star reviews
    }

    echo $name = $con->real_escape_string($r['author_name']);
    echo $text = $con->real_escape_string($r['text']);
    echo $rating = 5;
    echo $time = (int) $r['time'];


}


echo "New reviews added: " . $newInserted;