<?php

$in = fopen('data/hotel/it_cleaned.txt', 'r');
$out = fopen('data/hotel/it_cleaned_numbered.txt', 'w');

$counter = 1;
$str = $counter;
fputs($out, $str  . "\n");
while ($line = fgets($in)) {
    if(!trim($line)) {
        $str = ++$counter;
        fputs($out, $str);
    }
    if(!intval($line) && !empty($line)) {
        $str = trim($line);
        fputs($out, $str . "\n");
    }
}
fclose($in);
fclose($out);
