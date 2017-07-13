<?php


$in = fopen('data/venus/en.txt', 'r');
while ($line = fgets($in)) {
    if (!empty(trim($line)) && $line && (0 !== substr_compare($line, '01', 0, 2) && substr_compare("00", $line, 0, 2) !== 0)) {
        echo trim($line) . "\n";
    }
}
fclose($in);

