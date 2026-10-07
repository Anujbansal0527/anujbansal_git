<?php

// // Database credentials
// $db_host = 'localhost'; // Your database host
// $db_user = 'redtechnologies_user'; // Your database username
// $db_pass = 'REPLACE_WITH_PRIVATE_VALUE'; // Your database password
// $db_name = 'redtechnologies_data'; // Your database name

// // Establish a database connection
// $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// // Check the connection
// if (!$conn) {
//     die(json_encode(['error' => 'Failed to connect to the database.']));
// }

// // URL of the RSS feed
// $rv_news_url = "https://economictimes.indiatimes.com/rssfeeds/359241701.cms";

// // Fetch the RSS feed
// $rv_news_feed = @simplexml_load_file($rv_news_url);

// if ($rv_news_feed === false) {
//     echo json_encode(['error' => 'Failed to load RSS feed.']);
//     exit;
// }

// // Prepare a SQL statement to insert the feed data
// $insert_query = "INSERT INTO news_feed (title, link, description, image, date) VALUES (?, ?, ?, ?, ?)";
// $stmt = mysqli_prepare($conn, $insert_query);

// // Loop through each item in the RSS feed and insert it into the database
// foreach ($rv_news_feed->channel->item as $item) {
//     $title = (string)$item->title;
//     $link = (string)$item->link;
//     $description = (string)$item->description;
//     $date = (string)$item->pubDate;
//     $image = isset($item->enclosure['url']) ? (string)$item->enclosure['url'] : '';

//     // Bind parameters and execute the query
//     mysqli_stmt_bind_param($stmt, 'sssss', $title, $link, $description, $image, $date);
//     mysqli_stmt_execute($stmt);
// }

// // Close the database connection
// mysqli_stmt_close($stmt);
// mysqli_close($conn);

// echo json_encode(['success' => 'RSS feed data has been saved to the database.']);







// Database credentials
$db_host = 'localhost'; // Your database host
$db_user = 'redtechnologies_user'; // Your database username
$db_pass = 'REPLACE_WITH_PRIVATE_VALUE'; // Your database password
$db_name = 'redtechnologies_data'; // Your database name

// Establish a database connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check the connection
if (!$conn) {
    die(json_encode(['error' => 'Failed to connect to the database.']));
}

// URL of the RSS feed
$rv_news_url = "https://economictimes.indiatimes.com/rssfeeds/359241701.cms";

// Fetch the RSS feed
$rv_news_feed = @simplexml_load_file($rv_news_url);

if ($rv_news_feed === false) {
    echo json_encode(['error' => 'Failed to load RSS feed.']);
    exit;
}

// Prepare a SQL statement to insert the feed data, if it doesn't already exist
$insert_query = "INSERT INTO popular_news (title, link, description, image, date) VALUES (?, ?, ?, ?, ?)";
$check_query = "SELECT id FROM popular_news WHERE link = ?"; // Use link to check for existing entries

$stmt_insert = mysqli_prepare($conn, $insert_query);
$stmt_check = mysqli_prepare($conn, $check_query);

// Loop through each item in the RSS feed and insert it into the database if it doesn't already exist
foreach ($rv_news_feed->channel->item as $item) {
    $title = (string)$item->title;
    $link = (string)$item->link;
    $description = (string)$item->description;
    $image = isset($item->enclosure['url']) ? (string)$item->enclosure['url'] : '';
    $date = (string)$item->pubDate;



    // Check if the entry already exists
    mysqli_stmt_bind_param($stmt_check, 's', $link);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) == 0) { // If no rows are found, insert new entry
        // Bind parameters and execute the insert query
        mysqli_stmt_bind_param($stmt, 'sssss', $title, $link, $description, $image, $date);
        mysqli_stmt_execute($stmt_insert);
    }
}

// Close the prepared statements and the database connection
mysqli_stmt_close($stmt_insert);
mysqli_stmt_close($stmt_check);
mysqli_close($conn);

echo json_encode(['success' => 'RSS feed data has been updated in the database.']);
