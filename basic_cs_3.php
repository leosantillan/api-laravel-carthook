<?php

/**
 * Exercise 3.
 *
 */
function partition(&$arr, $lKey, $rKey) {
    $pivot = $arr[($lKey + $rKey) / 2];

    while ($lKey <= $rKey) {
        while ($arr[$lKey] < $pivot)
                $lKey++;
        while ($arr[$rKey] > $pivot)
                $rKey--;
        if ($lKey <= $rKey) {
                $tmp = $arr[$lKey];
                $arr[$lKey] = $arr[$rKey];
                $arr[$rKey] = $tmp;
                $lKey++;
                $rKey--;
        }
    }

    return $lKey;
}

function quickSort(&$arr, $lKey, $rKey) {
    $index = partition($arr, $lKey, $rKey);
    if ($lKey < $index - 1)
        quickSort($arr, $lKey, $index - 1);
    if ($index < $rKey)
        quickSort($arr, $index, $rKey);
}

$arr = [5, 3, 8, 10, 2, 7, 1, 9, 4, 6, 11];
$last = count($arr) - 1;

for ($i=0; $i<1000000000; $i++) {
    quickSort($arr, 0, $last);
}

echo microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
