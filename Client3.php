<?php

require('vendor/autoload.php');

use Stichoza\GoogleTranslate\TranslateClient;

$tr = new TranslateClient('it', 'en');


$in = fopen('data/hotel/en_cleaned_numbered.txt', 'r');
$out = fopen('data/hotel/e_to_en.sgm', 'w');

$i = 0;
while ($line = fgets($in)) {
    $i++;
    $str = trim($line);
    if(intval($line))
        echo "\n" . $str ."\n";
    else
        echo $str;
}
fclose($in);
fclose($out);