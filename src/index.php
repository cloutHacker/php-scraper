<?php
include '../Resources/autoload.php';
use Resources\Scraper;

$source  = 'file:///D:/reactjs%20-%20How%20to%20show%20validation%20errors%20on%20form%20using%20React%20-%20Stack%20Overflow.html';
$site = (new Scraper($source))->scrape()->filterTags('div')->exec();
echo '<pre>';
print_r($site);
echo '</pre>';

// $dom = new DOMDocument();
// @$dom->loadHTML($site);
// $h2s = $dom->getElementsByTagName('p');
// foreach($h2s as $h2) {
//     $text = $h2->textContent;
//     echo $text.'<br>';
// }