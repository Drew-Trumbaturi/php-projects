<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCP Scraper</title>
</head>

<body>
    <h1>Scraping please wait...</h1>
</body>

</html>

<?php

// Connect to the MySQL database
$host = 'localhost';
$user = 'scp-admin';
$password = '1234';
$dbname = 'scp_data';
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$last_object_number = 0;
$sql = "SELECT object_number FROM last_processed_object";
$sqlmatch = "SELECT object_number FROM scp_object ORDER BY id DESC 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $last_object_number = $row["object_number"];
} else if ($sql === $sqlmatch) {
    $last_object_number = $sqlmatch;
}
// Loop through all the SCP objects
for ($i = $last_object_number + 1; $i <= 150; $i++) {
    $object_number = sprintf("%03d", $i);
    $url = "https://the-scp.foundation/object/scp-" . $object_number;

    // Initialize cURL session
    $ch = curl_init();

    // Set URL to scrape
    curl_setopt($ch, CURLOPT_URL, $url);

    // Set options for cURL transfer
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute cURL request
    $result = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Process the scraped data
    $doc = new DOMDocument();
    @$doc->loadHTML($result);

    // For some reason the image is not loaded into the DB correctly unless i use these veriables
    $tag = "div";
    $class = "scp-image-block";

    $xpath = new DOMXPath($doc);
    $title_element = $xpath->query("//h1[@class='scp-title']")->item(0);

    foreach ($xpath->query('//' . $tag . '[contains(@class,"' . $class . '")]/img') as $item) {
        if ($item != '') {
            $image_element =  $item->getAttribute('src');
        } else {
            $image_element = "";
        }
    }

    $containment_element = $xpath->query("//div[@class='scp-special-containment-procedures']")->item(0);
    $description_element = $xpath->query("//div[@class='scp-description']")->item(0);

    // Escape the data to be inserted into the database
    if ($title_element) {
        $title = mysqli_real_escape_string($conn, $title_element->nodeValue);
    } else {
        $title = "";
    }

    if ($description_element) {
        $description = mysqli_real_escape_string($conn, $description_element->nodeValue);
    } else {
        $description = "";
    }

    if ($image_element) {
        $image_url = mysqli_real_escape_string($conn, $image_element);
        print $image_url;
    } else {
        $image_url = "";
    }

    if ($containment_element) {
        $containment = mysqli_real_escape_string($conn, $containment_element->nodeValue);
    } else {
        $containment = "";
    }

    // Insert the SCP object into the database
    $sql = "INSERT INTO scp_objects (object_number, title, description, image_url, containment)
    VALUES ('$object_number', '$title', '$description', '$image_url', '$containment')";

    if (mysqli_query($conn, $sql)) {
        echo "SCP Object $object_number added successfully.\n";
    } else {
        echo "Error adding SCP Object $object_number: " . mysqli_error($conn) . "\n";
    }
}

// Insert the last processed object number into the database
$sql = "UPDATE last_processed_object SET object_number = '$i'";
mysqli_query($conn, $sql);


// Close the database connection
mysqli_close($conn);
