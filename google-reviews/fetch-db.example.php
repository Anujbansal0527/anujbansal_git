<?php
/* SECURITY */
//if ($_GET['key'] !== 'YOUR_SECRET') exit('Forbidden');

/* DB */
// include("../config.php");
$con = mysqli_connect("localhost", "redtechn_user", "REPLACE_WITH_PRIVATE_VALUE", "redtechn_databs") or die(mysqli_error());

/* API */
$placeId = "ChIJMykM5TX9YjkR3ovp76K78cs";
$apiKey = "REPLACE_WITH_PRIVATE_VALUE";

$url = "https://maps.googleapis.com/maps/api/place/details/json"
    . "?place_id=$placeId"
    . "&fields=reviews"
    . "&key=$apiKey";

$data = json_decode(file_get_contents($url), true);

if (!isset($data['result']['reviews']))
    exit("No reviews");

$newInserted = 0;

foreach ($data['result']['reviews'] as $r) {

    if ((int) $r['rating'] !== 5) {
        continue; // ❌ skip non-5-star reviews
    }

    $name = $con->real_escape_string($r['author_name']);
    $text = $con->real_escape_string($r['text']);
    $rating = 5;
    $time = (int) $r['time'];

    $sql = "
        INSERT IGNORE INTO google_reviews_history
        (author_name, rating, review_text, review_time, review_date)
        VALUES
        ('$name', $rating, '$text', $time, FROM_UNIXTIME($time))
    ";

    $con->query($sql);
}


echo "New reviews added: " . $newInserted;