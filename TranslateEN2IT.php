<?php

require('vendor/autoload.php');

use Stichoza\GoogleTranslate\TranslateClient;

$tr = new TranslateClient('en', 'it');


$in = fopen('data/hollow/en_clean', 'r');
$out = fopen('data/hollow/en_to_it', 'w');

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