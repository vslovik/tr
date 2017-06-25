<?php


$in = fopen('data/hotel/en_cleaned_numbered.txt', 'r');
$out = fopen('data/hotel/en_clean', 'w');
$num = 0;
$strs = [];
while ($line = fgets($in)) {
    if(intval($line)) {
        if($num && $strs) {
            $str = $num . "\n" . implode(' ', $strs);
            fputs($out, $str . "\n");
            $strs = [];
        }
        $num = trim($line);
    } else {
        $strs[] = trim($line);
    }
}
$str = $num . "\n" . implode(' ', $strs);
fputs($out, $str . "\n");
fclose($in);
fclose($out);
