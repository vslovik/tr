<?php


$in = fopen('data/venus/it_cleaned_numbered', 'r');
$out = fopen('data/venus/it_clean', 'w');
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
