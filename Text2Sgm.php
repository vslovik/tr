<?php

if(empty($argv[1])) {
    echo 'filename missing';
    return;
}

$in = fopen($argv[1], 'r');
$out = fopen($argv[1]. '.sgm', 'w');
$str = ''; $num = 0;
while ($line = fgets($in)) {

    $line = trim($line);
    if (intval($line)) {
        $num = intval($line);
    } else {
        $str = $line;
        fputs($out, '<seg id="' . $num . '"> ' . $str . " </seg>" . "\n");
    }
}
fclose($in);
fclose($out);