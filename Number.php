<?php

$in = fopen('data/coffee/en_clean_', 'r');
$out = fopen('data/coffee/en_clean_numbered', 'w');

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
