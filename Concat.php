<?php


$in = fopen('data/zelig/it_clean', 'r');
$out = fopen('data/zelig/it_clean_', 'w');
$strs = [];
while ($line = fgets($in)) {
    if(empty(trim($line))) {
            $str = implode(' ', $strs);
            if($strs)
                fputs($out, $str . "\n\n");
            $strs = [];
    } else {
        if($line)
            $strs[] = trim($line);
    }
}
$str = implode(' ', $strs);
fputs($out, $str . "\n\n");
fclose($in);
fclose($out);
