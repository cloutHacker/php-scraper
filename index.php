<?php
include 'Resources/autoload.php';
use Resources\Scraper;

//$source  = 'https://www.jumia.co.ke/';
//$imgs = (new Scraper($source))->scrape()->filterTags('img')->filterAttr('data-src')->exec();


foreach ($imgs as $img) {
    echo '<img src='.$img.' height="150" width="160">';
}