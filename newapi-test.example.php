<?php

// Validate the API Key (Simple Authentication)
$valid_api_key = 'REPLACE_WITH_PRIVATE_VALUE'; // Replace with a secure key

if (!isset($_GET['api_key']) || $_GET['api_key'] !== $valid_api_key) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized Access']);
    exit;
}

// URL of the RSS feed
$rv_news_url = "https://economictimes.indiatimes.com/rssfeeds/359241701.cms";

// Fetch the RSS feed with error handling
$rv_news_feed = @simplexml_load_file($rv_news_url);

if ($rv_news_feed === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to load RSS feed.']);
    exit;
}

// Initialize an array to store the parsed data
$feed_data = [];

// Loop through each item in the RSS feed
foreach ($rv_news_feed->channel->item as $item) {
    // Sanitize each data field
    $title = htmlspecialchars((string)$item->title, ENT_QUOTES, 'UTF-8');
    $link = filter_var((string)$item->link, FILTER_SANITIZE_URL);
    $description = htmlspecialchars((string)$item->description, ENT_QUOTES, 'UTF-8');
    $date = htmlspecialchars((string)$item->pubDate, ENT_QUOTES, 'UTF-8');
    $image = isset($item->enclosure['url']) ? filter_var((string)$item->enclosure['url'], FILTER_SANITIZE_URL) : '';

    $feed_data[] = [
        'title' => $title,
        'link' => $link,
        'description' => $description,
        'date' => $date,
        'image' => $image
    ];
}

// Set the content type to JSON
header('Content-Type: application/json');

// Securely output the data as JSON
echo json_encode($feed_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
