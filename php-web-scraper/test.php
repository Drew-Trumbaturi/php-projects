<?php
for ($i = 1; $i <= 10; $i++) {
    $object_number = sprintf("%03d", $i);
    $url = "https://the-scp.foundation/object/scp-" . $object_number;
    $the_tag = "div";
    $the_class = "scp-image-block";

    $html = file_get_contents($url);
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    $image = $xpath->query('//' . $the_tag . '[contains(@class,"' . $the_class . '")]/img')->item(0);
    $img_src =  $image->getAttribute('src');
    print $img_src . "\n";

    // foreach ($xpath->query('//' . $the_tag . '[contains(@class,"' . $the_class . '")]/img') as $item) {

    //     $img_src =  $item->getAttribute('src');
    //     print $img_src . "\n";
    // }
}
