<?php

require('vendor/autoload.php');

use Stichoza\GoogleTranslate\TranslateClient;

$tr = new TranslateClient('it', 'en');


$in = fopen('data/carnage/it_clean', 'r');
$out = fopen('data/carnage/it_to_en', 'w');

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
        echo "\n";
        echo $str_t;
        fputs($out, $str_t . "\n");

        sleep(1);

    }
}
fclose($in);
fclose($out);