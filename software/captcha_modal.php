<?php
session_start();

// Generate a random CAPTCHA text
$captcha_text = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ23456789"), 0, 6);
$_SESSION["captcha_modal"] = $captcha_text;

// Create image
$width = 150;
$height = 50;
$image = imagecreate($width, $height);

// Define colors
$background_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);
$line_color = imagecolorallocate($image, 200, 200, 200);

// Fill background
imagefilledrectangle($image, 0, 0, $width, $height, $background_color);

// Add noise lines
for ($i = 0; $i < 5; $i++) {
    imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $line_color);
}

// Set font path (Make sure the font file exists)
$font_path = 'assets/fonts/poppins/Poppins-Medium.ttf';
if (!file_exists($font_path)) {
    die("Error: Font file not found at $font_path");
}

// Add text to image
imagettftext($image, 18, 0, 20, 35, $text_color, $font_path, $captcha_text);

// Output the image
header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);
