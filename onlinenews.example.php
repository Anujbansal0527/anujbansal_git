<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

//$rss_link_db = mysqli_connect("localhost", "paresh_newsuser", "REPLACE_WITH_PRIVATE_VALUE", "paresh_onlinenews") or die(mysqli_error("Connecting Problem"));

$rss_link_db = mysqli_connect("localhost", "redtechnologies_user", "REPLACE_WITH_PRIVATE_VALUE", "redtechnologies_data") or die(mysqli_error("Connecting Problem"));

//Most Popular 
$file = "https://www.moneycontrol.com/rss/mostpopular.xml";
// $file = $link_value;
$ch = curl_init($file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml_raw = curl_exec($ch);
curl_close($ch);
$books_new = simplexml_load_string($xml_raw);
//if($books_new !== FALSE){                                       
//========================================
$doc = new DOMDocument();
$doc->loadXML($books_new->asXML());
$books = $doc->getElementsByTagName("item");



$final = "";
$i = 1;
foreach ($books as $book) {
    $authors = $book->getElementsByTagName("title");
    $author = $authors->item(0)->nodeValue;
    $publishers = $book->getElementsByTagName("description");
    $publisher = $publishers->item(0)->nodeValue;
    $test = substr($publisher, 10);
    $check = explode('/>', $test);
    $img_ary = explode('"', $check[0]);
    $image_path = $img_ary[0];
    $publisher = $check[1];
    $content = file_get_contents("$image_path");
    //Store in the filesystem.
    $img_name = 'mostpopular_img' . $i . 'jpg';
    //$fp = fopen("news_img/$img_name", "w");
    //fwrite($fp, $content);
    //fclose($fp);
    $img_src = '<img src="https://www.redvisiontech.com/news_img/' . $img_name . '"/>';
    $titles = $book->getElementsByTagName("pubDate");
    $title = $titles->item(0)->nodeValue;
    $links = $book->getElementsByTagName("link");
    $link = $links->item(0)->nodeValue;
    $final .= "<div class=rsshead><a href=$link> $author</a></div><br /><div class=rss>$img_src</div><div class=rss>$publisher</div><div class=rssdate>$title</div><br /> ";
    $i++;
}


//echo "select type from  online_news where type = 'mostpopular'"; exit;
$check = mysqli_query($rss_link_db, "select type from  online_news where type = 'mostpopular'");

if (mysqli_num_rows($check) > 0) {
     $final = addslashes($final);
     //echo 'Yes 1'; 
     $final = str_replace("\'",'',$final);
       // echo '$final='.$final; 
    // exit;
     // $res = mysqli_query($rss_link_db,"update online_news set content= '".$final."' where type = 'mostpopular'") or die(mysqli_error($rss_link_db)); 
      
      
   // $res = mysqli_query($rss_link_db, "update online_news set content= '$final' where  type = 'mostpopular'");
} else {
    
    $final = addslashes($final);
  //  echo 'Yes 2'; exit;
   // $res = mysqli_query($rss_link_db, "insert into online_news(content,type)values('$final','mostpopular')");
}

//echo 'Yes'; exit;



//MF News
// $file = "https://www.moneycontrol.com/rss/mfnews.xml";
// // $file = $link_value;
// $ch = curl_init($file);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $xml_raw = curl_exec($ch);
// curl_close($ch);
// $books_new = simplexml_load_string($xml_raw);
// $doc = new DOMDocument();
// $doc->loadXML($books_new->asXML());
// $books = $doc->getElementsByTagName("item");



// $final = "";
// $i = 1;
// foreach ($books as $book) {
//     $authors = $book->getElementsByTagName("title");
//     $author = $authors->item(0)->nodeValue;
//     $publishers = $book->getElementsByTagName("description");
//     $publisher = $publishers->item(0)->nodeValue;
//     $test = substr($publisher, 10);
//     $check = explode('/>', $test);
//     $img_ary = explode('"', $check[0]);
//     $image_path = $img_ary[0];
//     $publisher = $check[1];
//     $content = file_get_contents("$image_path");
  
//     $img_name = 'mf_image' . $i . 'jpg';
//     $fp = fopen("news_img/$img_name", "w");
//     fwrite($fp, $content);
//     fclose($fp);
//     $img_src = '<img src="https://www.redvisiontech.com/news_img/' . $img_name . '"/>';
//     $titles = $book->getElementsByTagName("pubDate");
//     $title = $titles->item(0)->nodeValue;
//     $links = $book->getElementsByTagName("link");
//     $link = $links->item(0)->nodeValue;
//     $final .= "<div class=rsshead><a href=$link> $author</a></div><br /><div class=rss>$img_src</div><div class=rss>$publisher</div><div class=rssdate>$title</div><br /> ";
//     $i++;
// }

// $check = mysqli_query($rss_link_db, "select type from  online_news where type = 'mf news'");
// if (mysqli_num_rows($check) > 0) {
    
    
//      $final = addslashes($final);
     
//       $res = mysqli_query($rss_link_db,"update online_news set content= '".$final."' where type = 'mf news'") or die(mysqli_error($rss_link_db)); 
      
      
    
// } else {
//     $final = addslashes($final);
//     $res = mysqli_query($rss_link_db, "insert into online_news(content,type)values('$final','mf news')");
// }


//new improved code starts

$file = "https://economictimes.indiatimes.com/mf/rssfeeds/359241701.cms";

// Fetch RSS feed using cURL
$ch = curl_init($file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml_raw = curl_exec($ch);
curl_close($ch);

// Check for cURL errors
if ($xml_raw === false) {
    die('Curl error: ' . curl_error($ch));
}

// Parse XML
$books_new = simplexml_load_string($xml_raw);

if ($books_new === false) {
    die('Error parsing XML');
}

// Initialize a DOMDocument to work with the XML
$doc = new DOMDocument();
$doc->loadXML($books_new->asXML());

// Get all <item> elements from the XML
$items = $doc->getElementsByTagName("item");

$final = "";
$i = 1;

// Loop through each <item> element
foreach ($items as $item) {
    // Extract data from each <item>
    $title = $item->getElementsByTagName("title")->item(0)->nodeValue;

    // Extract image URL from the enclosure element
    $image_url = $item->getElementsByTagName("enclosure")->item(0)->getAttribute("url");

    // Fetch and store image
    $img_name = 'mf_image' . $i . '.jpg';
    $img_path = "news_img/$img_name";

    if (!empty($image_url)) {
        $content = file_get_contents($image_url);
        if ($content !== false) {
            file_put_contents($img_path, $content);
        } else {
            echo "Failed to fetch image: $image_url<br>";
            continue; // Skip to the next item if image fetch fails
        }
    } else {
        echo "No image found for: $title<br>";
        continue; // Skip to the next item if no image found
    }

    // Image HTML
    $img_src = '<img src="https://www.redvisiontech.com/news_img/' . $img_name . '"/>';

    // Additional data
    $pubDate = $item->getElementsByTagName("pubDate")->item(0)->nodeValue;
    $link = $item->getElementsByTagName("link")->item(0)->nodeValue;

    // Construct final HTML content
    $final .= "<div class=rsshead><a href=$link>$title</a></div><br />";
    $final .= "<div class=rss>$img_src</div>";
    $final .= "<div class=rssdate>$pubDate</div><br />";

    $i++;
}

// Convert final content to UTF-8
$final = mb_convert_encoding($final, 'UTF-8', 'UTF-8');

// Convert UTF-8 content to Latin1

$final = mb_convert_encoding($final, 'ISO-8859-1', 'UTF-8');


// Database operations
// Assuming $rss_link_db is your database connection

// Sanitize and escape the final content
$final = mysqli_real_escape_string($rss_link_db, $final);

// Check if 'mf news' type already exists in database
$check_query = "SELECT type FROM online_news WHERE type = 'mf news'";
$check_result = mysqli_query($rss_link_db, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // Update existing record
    $update_query = "UPDATE online_news SET content = ? WHERE type = 'mf news'";
    $update_stmt = mysqli_prepare($rss_link_db, $update_query);
    mysqli_stmt_bind_param($update_stmt, "s", $final);
    $update_result = mysqli_stmt_execute($update_stmt);

    if (!$update_result) {
        die('Database update error: ' . mysqli_error($rss_link_db));
    }
    mysqli_stmt_close($update_stmt);
} else {
    // Insert new record
    $insert_query = "INSERT INTO online_news (content, type) VALUES (?, 'mf news')";
    $insert_stmt = mysqli_prepare($rss_link_db, $insert_query);
    mysqli_stmt_bind_param($insert_stmt, "s", $final);
    $insert_result = mysqli_stmt_execute($insert_stmt);

    if (!$insert_result) {
        die('Database insert error: ' . mysqli_error($rss_link_db));
    }
    mysqli_stmt_close($insert_stmt);
}

//echo '-------------------v--------------';

//new improved code ends


// $file = "https://www.moneycontrol.com/rss/iponews.xml";
$file = "https://economictimes.indiatimes.com/markets/ipos/fpos/rssfeeds/14655708.cms";
// $file = $link_value;
$ch = curl_init($file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml_raw = curl_exec($ch);
curl_close($ch);
$books_new = simplexml_load_string($xml_raw);
//========================================
$doc = new DOMDocument();
$doc->loadXML($books_new->asXML());
$books = $doc->getElementsByTagName("item");

//print_r($books);

$final = "";
$i = 1;
foreach ($books as $book) {
    $authors = $book->getElementsByTagName("title");
    $author = $authors->item(0)->nodeValue;
    $publishers = $book->getElementsByTagName("description");
    $publisher = $publishers->item(0)->nodeValue;
    $test = substr($publisher, 10);
    $check = explode('/>', $test);
    $img_ary = explode('"', $check[0]);
    $image_path = $img_ary[0];
    $publisher = $check[1];
    $content = file_get_contents("$image_path");
    //Store in the filesystem.
    $img_name = 'ipo_image' . $i . 'jpg';
    $fp = fopen("news_img/$img_name", "w");
    fwrite($fp, $content);
    fclose($fp);
    $img_src = '<img src="https://www.redvisiontech.com/news_img/' . $img_name . '"/>';
    $titles = $book->getElementsByTagName("pubDate");
    $title = $titles->item(0)->nodeValue;
    $links = $book->getElementsByTagName("link");
    $link = $links->item(0)->nodeValue;
    $final .= "<div class=rsshead><a href=$link> $author</a></div><br /><div class=rss>$img_src</div><div class=rss>$publisher</div><div class=rssdate>$title</div><br /> ";
    $i++;
}

$check = mysqli_query($rss_link_db, "select type from  online_news where type = 'ipo news'");

//echo mysqli_num_rows($check);

if (mysqli_num_rows($check) > 0) {
    
     $final = addslashes($final);
     
  //   echo "update online_news set content= '".$final."' where type = 'ipo news'";
      $res = mysqli_query($rss_link_db,"update online_news set content= '".$final."' where type = 'ipo news'") or die(mysqli_error($rss_link_db)); 
      
      
    //$res = mysqli_query($rss_link_db, "update online_news set content= '$final' where  type = 'ipo news'");
} else {
    
     $final = addslashes($final);
     
    $res = mysqli_query($rss_link_db, "insert into online_news(content,type)values('$final','ipo news')");
}




// $file = "https://www.moneycontrol.com/rss/marketreports.xml";
$file = "https://economictimes.indiatimes.com/markets/rssfeeds/1977021501.cms";
// $file = $link_value;
$ch = curl_init($file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml_raw = curl_exec($ch);
curl_close($ch);
$books_new = simplexml_load_string($xml_raw);
//========================================
$doc = new DOMDocument();
$doc->loadXML($books_new->asXML());
$books = $doc->getElementsByTagName("item");

$final = "";
$i = 1;
foreach ($books as $book) {
    $authors = $book->getElementsByTagName("title");
    $author = $authors->item(0)->nodeValue;
    $publishers = $book->getElementsByTagName("description");
    $publisher = $publishers->item(0)->nodeValue;
    $test = substr($publisher, 10);
    $check = explode('/>', $test);
    $img_ary = explode('"', $check[0]);
    $image_path = $img_ary[0];
    $publisher = $check[1];
    $content = file_get_contents("$image_path");
    //Store in the filesystem.
    $img_name = 'market_news' . $i . 'jpg';
    $fp = fopen("news_img/$img_name", "w");
    fwrite($fp, $content);
    fclose($fp);
    $img_src = '<img src="https://www.redvisiontech.com/news_img/' . $img_name . '"/>';
    $titles = $book->getElementsByTagName("pubDate");
    $title = $titles->item(0)->nodeValue;
    $links = $book->getElementsByTagName("link");
    $link = $links->item(0)->nodeValue;
    $final .= "<div class=rsshead><a href=$link> $author</a></div><br /><div class=rss>$img_src</div><div class=rss>$publisher</div><div class=rssdate>$title</div><br /> ";
    $i++;
}
$check = mysqli_query($rss_link_db, "select type from  online_news where type = 'market news'");
if (mysqli_num_rows($check) > 0) {
    
     $final = addslashes($final);
     
      $res = mysqli_query($rss_link_db,"update online_news set content= '".$final."' where type = 'market news'") or die(mysqli_error($rss_link_db)); 
      
      
    //$res = mysqli_query($rss_link_db, "update online_news set content= '$final' where  type = 'market news'");
} else {
    
      $final = addslashes($final);
    $res = mysqli_query($rss_link_db, "insert into online_news(content,type)values('$final','market news')");
}


$file = "https://www.moneycontrol.com/rss/insurancenews.xml";
// $file = $link_value;
$ch = curl_init($file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml_raw = curl_exec($ch);
curl_close($ch);
$books_new = simplexml_load_string($xml_raw);
//========================================
$doc = new DOMDocument();
$doc->loadXML($books_new->asXML());
$books = $doc->getElementsByTagName("item");



$final = "";
$i = 1;
foreach ($books as $book) {
    $authors = $book->getElementsByTagName("title");
    $author = $authors->item(0)->nodeValue;
    $publishers = $book->getElementsByTagName("description");
    $publisher = $publishers->item(0)->nodeValue;
    $test = substr($publisher, 10);
    $check = explode('/>', $test);
    $img_ary = explode('"', $check[0]);
    $image_path = $img_ary[0];
    $publisher = $check[1];
    $content = file_get_contents("$image_path");
    //Store in the filesystem.
    $img_name = 'insurancenews_img' . $i . 'jpg';
    $fp = fopen("news_img/$img_name", "w");
    fwrite($fp, $content);
    fclose($fp);
    $img_src = '<img src="https://www.redvisiontech.com/news_img/' . $img_name . '"/>';
    $titles = $book->getElementsByTagName("pubDate");
    $title = $titles->item(0)->nodeValue;
    $links = $book->getElementsByTagName("link");
    $link = $links->item(0)->nodeValue;
    $final .= "<div class=rsshead><a href=$link> $author</a></div><br /><div class=rss>$img_src</div><div class=rss>$publisher</div><div class=rssdate>$title</div><br /> ";
    $i++;
}

$check = mysqli_query($rss_link_db, "select type from  online_news where type = 'insurancenews'");
if (mysqli_num_rows($check) > 0) {
    
       $final = addslashes($final);
     
      $res = mysqli_query($rss_link_db,"update online_news set content= '".$final."' where type = 'insurancenews'") or die(mysqli_error($rss_link_db)); 
      
      
    //$res = mysqli_query($rss_link_db, "update online_news set content= '$final' where  type = 'insurancenews'");
} else {
      $final = addslashes($final);
    $res = mysqli_query($rss_link_db, "insert into online_news(content,type)values('$final','insurancenews')");
}



$file = "https://www.moneycontrol.com/rss/latestnews.xml";
// $file = $link_value;
$ch = curl_init($file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml_raw = curl_exec($ch);
curl_close($ch);
$books_new = simplexml_load_string($xml_raw);
//if($books_new !== FALSE){                                       
//========================================
$doc = new DOMDocument();
$doc->loadXML($books_new->asXML());
$books = $doc->getElementsByTagName("item");



$final = "";
$i = 1;
foreach ($books as $book) {
    $authors = $book->getElementsByTagName("title");
    $author = $authors->item(0)->nodeValue;
    $publishers = $book->getElementsByTagName("description");
    $publisher = $publishers->item(0)->nodeValue;
    $test = substr($publisher, 10);
    $check = explode('/>', $test);
    $img_ary = explode('"', $check[0]);
    $image_path = $img_ary[0];
    $publisher = $check[1];
    $content = file_get_contents("$image_path");
    //Store in the filesystem.
    $img_name = 'latestnews_img' . $i . 'jpg';
    $fp = fopen("news_img/$img_name", "w");
    fwrite($fp, $content);
    fclose($fp);
    $img_src = '<img src="https://www.redvisiontech.com/news_img/' . $img_name . '"/>';
    $titles = $book->getElementsByTagName("pubDate");
    $title = $titles->item(0)->nodeValue;
    $links = $book->getElementsByTagName("link");
    $link = $links->item(0)->nodeValue;
    $final .= "<div class=rsshead><a href=$link> $author</a></div><br /><div class=rss>$img_src</div><div class=rss>$publisher</div><div class=rssdate>$title</div><br /> ";
    $i++;
}

$check = mysqli_query($rss_link_db, "select type from  online_news where type = 'latestnews'");
if (mysqli_num_rows($check) > 0) {
    
      //$final = addslashes($final);
     
      //$res = mysqli_query($rss_link_db,"update online_news set content= '".$final."' where type = 'latestnews'") or die(mysqli_error($rss_link_db)); 
      
      
      
    //$res = mysqli_query($rss_link_db, "update online_news set content= '$final' where  type = 'latestnews'");
} else {
     //$final = addslashes($final);
    //$res = mysqli_query($rss_link_db, "insert into online_news(content,type)values('$final','latestnews')");
}



//Shoaib Quraishi
//Top News 
$file = "https://www.moneycontrol.com/rss/MCtopnews.xml";
// $file = $link_value;
$ch = curl_init($file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml_raw = curl_exec($ch);
curl_close($ch);
$books_new = simplexml_load_string($xml_raw);
//if($books_new !== FALSE){                                       
//========================================
$doc = new DOMDocument();
$doc->loadXML($books_new->asXML());
$books = $doc->getElementsByTagName("item");



$final = "";
$i = 1;
foreach ($books as $book) {
    $authors = $book->getElementsByTagName("title");
    $author = $authors->item(0)->nodeValue;
    $publishers = $book->getElementsByTagName("description");
    $publisher = $publishers->item(0)->nodeValue;
    $test = substr($publisher, 10);
    $check = explode('/>', $test);
    $img_ary = explode('"', $check[0]);
    $image_path = $img_ary[0];
    $publisher = $check[1];
    $content = file_get_contents("$image_path");
    //Store in the filesystem.
    $img_name = 'topnews_img' . $i . 'jpg';
    $fp = fopen("news_img/$img_name", "w");
    fwrite($fp, $content);
    fclose($fp);
    $img_src = '<img src="https://www.redvisiontech.com/news_img/' . $img_name . '"/>';
    $titles = $book->getElementsByTagName("pubDate");
    $title = $titles->item(0)->nodeValue;
    $links = $book->getElementsByTagName("link");
    $link = $links->item(0)->nodeValue;
    $final .= "<div class=rsshead><a href=$link> $author</a></div><br /><div class=rss>$img_src</div><div class=rss>$publisher</div><div class=rssdate>$title</div><br /> ";
    $i++;
}

$check = mysqli_query($rss_link_db, "select type from  online_news where type = 'topnews'");
if (mysqli_num_rows($check) > 0) {
    
    
     //$final = addslashes($final);
     
      //$res = mysqli_query($rss_link_db,"update online_news set content= '".$final."' where type = 'topnews'") or die(mysqli_error($rss_link_db)); 
      
      
      
    //$res = mysqli_query($rss_link_db, "update online_news set content= '$final' where  type = 'topnews'");
} else {
    
     //$final = addslashes($final);
     
    //$res = mysqli_query($rss_link_db, "insert into online_news(content,type)values('$final','topnews')");
}



//Mf Column
$file = "https://www.moneycontrol.com/rss/mfcolumns.xml";
// $file = $link_value;
$ch = curl_init($file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml_raw = curl_exec($ch);
curl_close($ch);
$books_new = simplexml_load_string($xml_raw);
//if($books_new !== FALSE){                                       
//========================================
$doc = new DOMDocument();
$doc->loadXML($books_new->asXML());
$books = $doc->getElementsByTagName("item");



$final = "";
$i = 1;
foreach ($books as $book) {
    $authors = $book->getElementsByTagName("title");
    $author = $authors->item(0)->nodeValue;
    $publishers = $book->getElementsByTagName("description");
    $publisher = $publishers->item(0)->nodeValue;
    $test = substr($publisher, 10);
    $check = explode('/>', $test);
    $img_ary = explode('"', $check[0]);
    $image_path = $img_ary[0];
    $publisher = $check[1];
    $content = file_get_contents("$image_path");
    //Store in the filesystem.
    $img_name = 'mfcolumns_img' . $i . 'jpg';
    $fp = fopen("news_img/$img_name", "w");
    fwrite($fp, $content);
    fclose($fp);
    $img_src = '<img src="https://www.redvisiontech.com/news_img/' . $img_name . '"/>';
    $titles = $book->getElementsByTagName("pubDate");
    $title = $titles->item(0)->nodeValue;
    $links = $book->getElementsByTagName("link");
    $link = $links->item(0)->nodeValue;
    $final .= "<div class=rsshead><a href=$link> $author</a></div><br /><div class=rss>$img_src</div><div class=rss>$publisher</div><div class=rssdate>$title</div><br /> ";
    $i++;
}

$check = mysqli_query($rss_link_db, "select type from  online_news where type = 'mfcolumn'");
if (mysqli_num_rows($check) > 0) {
    
    
     $final = addslashes($final);
     
      $res = mysqli_query($rss_link_db,"update online_news set content= '".$final."' where type = 'mfcolumn'") or die(mysqli_error($rss_link_db)); 
      
      
   // $res = mysqli_query($rss_link_db, "update online_news set content= '$final' where  type = 'mfcolumn'");
} else {
    
     $final = addslashes($final);
     
    $res = mysqli_query($rss_link_db, "insert into online_news(content,type)values('$final','mfcolumn')");
}



//Market Outlook
$file = "https://www.moneycontrol.com/rss/marketoutlook.xml";
// $file = $link_value;
$ch = curl_init($file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml_raw = curl_exec($ch);
curl_close($ch);
$books_new = simplexml_load_string($xml_raw);
//if($books_new !== FALSE){                                       
//========================================
$doc = new DOMDocument();
$doc->loadXML($books_new->asXML());
$books = $doc->getElementsByTagName("item");



$final = "";
$i = 1;
foreach ($books as $book) {
    $authors = $book->getElementsByTagName("title");
    $author = $authors->item(0)->nodeValue;
    $publishers = $book->getElementsByTagName("description");
    $publisher = $publishers->item(0)->nodeValue;
    $test = substr($publisher, 10);
    $check = explode('/>', $test);
    $img_ary = explode('"', $check[0]);
    $image_path = $img_ary[0];
    $publisher = $check[1];
    $content = file_get_contents("$image_path");
    //Store in the filesystem.
    $img_name = 'marketoutlook_img' . $i . 'jpg';
    $fp = fopen("news_img/$img_name", "w");
    fwrite($fp, $content);
    fclose($fp);
    $img_src = '<img src="https://www.redvisiontech.com/news_img/' . $img_name . '"/>';
    $titles = $book->getElementsByTagName("pubDate");
    $title = $titles->item(0)->nodeValue;
    $links = $book->getElementsByTagName("link");
    $link = $links->item(0)->nodeValue;
    $final .= "<div class=rsshead><a href=$link> $author</a></div><br /><div class=rss>$img_src</div><div class=rss>$publisher</div><div class=rssdate>$title</div><br /> ";
    $i++;
}

$check = mysqli_query($rss_link_db, "select type from  online_news where type = 'marketoutlook'");
if (mysqli_num_rows($check) > 0) {
    
    //$final = addslashes($final);
     
      //$res = mysqli_query($rss_link_db,"update online_news set content= '".$final."' where type = 'marketoutlook'") or die(mysqli_error($rss_link_db)); 
      
      
   // $res = mysqli_query($rss_link_db, "update online_news set content= '$final' where  type = 'marketoutlook'");
} else {
    
    // $final = addslashes($final);
  //  $res = mysqli_query($rss_link_db, "insert into online_news(content,type)values('$final','marketoutlook')");
}

//echo 'Yes4'; exit;

//Currecny News
$file = "https://www.moneycontrol.com/rss/currency.xml";
// $file = $link_value;
$ch = curl_init($file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$xml_raw = curl_exec($ch);
curl_close($ch);
$books_new = simplexml_load_string($xml_raw);
//if($books_new !== FALSE){                                       
//========================================
$doc = new DOMDocument();
$doc->loadXML($books_new->asXML());
$books = $doc->getElementsByTagName("item");



$final = "";
$i = 1;
foreach ($books as $book) {
    $authors = $book->getElementsByTagName("title");
    $author = $authors->item(0)->nodeValue;
    $publishers = $book->getElementsByTagName("description");
    $publisher = $publishers->item(0)->nodeValue;
    $test = substr($publisher, 10);
    $check = explode('/>', $test);
    $img_ary = explode('"', $check[0]);
    $image_path = $img_ary[0];
    $publisher = $check[1];
    $content = file_get_contents("$image_path");
    //Store in the filesystem.
    $img_name = 'currency_img' . $i . 'jpg';
    $fp = fopen("news_img/$img_name", "w");
    fwrite($fp, $content);
    fclose($fp);
    $img_src = '<img src="https://www.redvisiontech.com/news_img/' . $img_name . '"/>';
    $titles = $book->getElementsByTagName("pubDate");
    $title = $titles->item(0)->nodeValue;
    $links = $book->getElementsByTagName("link");
    $link = $links->item(0)->nodeValue;
    $final .= "<div class=rsshead><a href=$link> $author</a></div><br /><div class=rss>$img_src</div><div class=rss>$publisher</div><div class=rssdate>$title</div><br /> ";
    $i++;
}

$check = mysqli_query($rss_link_db, "select type from  online_news where type = 'currency'");
if (mysqli_num_rows($check) > 0) {
    
    
    // $final = addslashes($final);
     
      //$res = mysqli_query($rss_link_db,"update online_news set content= '".$final."' where type = 'currency'") or die(mysqli_error($rss_link_db)); 
      
      
    //$res = mysqli_query($rss_link_db, "update online_news set content= '$final' where  type = 'currency'");
} else {
    
     //$final = addslashes($final);
   // $res = mysqli_query($rss_link_db, "insert into online_news(content,type)values('$final','currency')");
}

//echo 'Yes4'; 

// }
?>
                                        
