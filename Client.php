<?php

require('vendor/autoload.php');

use Stichoza\GoogleTranslate\TranslateClient;

$tr = new TranslateClient('it', 'en');
//echo $tr->translate('I can dance');

$fh = fopen('data/hotel/en_original.srt', 'r');

$ow = fopen('data/hotel/en.sgm', 'w');
$it = fopen('data/hotel/en_cleaned.txt', 'w');

//$tw = fopen('data/hotel/it_to_en.sgm', 'w');

$i = 1;
$parts = [];

$out = '';
while ($line = fgets($fh)) {
    if ('ISO-8859-1' == mb_detect_encoding($line, 'UTF-8, ISO-8859-1'))
        $line = iconv('ISO-8859-1', 'UTF-8', strip_tags($line));
    if ($line && (0 !== substr_compare($line, '01', 0, 2) && substr_compare("00", $line, 0, 2) !== 0)) {

        $line =  preg_replace("/\r|\n/", "", $line);

        if(substr_count($line, $i) == 1){

//        if(intval($line) == $i) {

            if($parts) {

                $str = trim(preg_replace("/\r|\n/", "", implode(" ", $parts)));

                if($str)
                    fputs($it, $str . "\n");

//                $str_t = $tr->translate($str);
//
//                sleep(1);

//                echo  $str_t . "\n";

                if($str)
                    fputs($ow, '<seg id="' . ($i - 1) . '"> ' . $str . " </seg>" . "\n");

//                if($str)
//                    fputs($tw, '<seg id="' . ($i - 1) . '"> ' . $str_t . " </seg>" ."\n");
            }
            $i++;
            $parts = [];
        } else {
            $parts[] = $line;
        }
    }

}