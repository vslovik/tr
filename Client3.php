<?php

require('vendor/autoload.php');

use Stichoza\GoogleTranslate\TranslateClient;

$tr = new TranslateClient('it', 'en');


$in = fopen('data/hotel/it_clean', 'r');
$out = fopen('data/hotel/it_to_en.sgm', 'w');

$i = 0;
while ($line = fgets($in)) {
    $i++;
    $str = trim($line);
    if(intval($line)) {
        echo "\n" . $str . "\n";
        fputs($out, "\n" . $str . "\n");
    }
    else {
        echo $str;

        $str_t = $tr->translate($str);
        fputs($out, $str_t . "\n");

        sleep(1);

    }
    if($i > 5)
        break;

}
fclose($in);
fclose($out);