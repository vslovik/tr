<?php

$in = fopen('data/hotel/en_cleaned.txt', 'r');
$out = fopen('data/hotel/en_cleaned_numbered.txt', 'w');

$counter = 0;
while ($line = fgets($in)) {
    if(empty($line)) {
        echo ++$counter;
    }
    if(!intval($line) && !empty($line)) {
        echo $line;
    }

}

fclose($in);
fclose($out);