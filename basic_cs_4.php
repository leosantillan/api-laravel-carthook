<?php

/**
 * Exercise 4.
 *
 */
function binarySearch($a, $item, $low, $high) {
    if ($high <= $low)
        return ($item > $a[$low]) ? ($low + 1) : $low;

    $mid = (int)(($low + $high) / 2);

    if($item == $a[$mid])
        return $mid + 1;

    if($item > $a[$mid])
        return binarySearch($a, $item, $mid + 1, $high);

    return binarySearch($a, $item, $low, $mid - 1);
}

function insertionSort(&$a, $n) {
    $i; $loc; $j; $k; $selected;

    for ($i = 1; $i < $n; ++$i) {
        $j = $i - 1;
        $selected = $a[$i];

        $loc = binarySearch($a, $selected, 0, $j);

        while ($j >= $loc) {
            $a[$j + 1] = $a[$j];
            $j--;
        }

        $a[$j + 1] = $selected;
    }
}

$arr = [];

for ($i = 0; $i < 1000; $i++) {
    $val = pow(random_int(100, 10000), random_int(100, 10000));
    $arr[] = $val;
    if (sizeof($arr) > 1) {
        insertionSort($arr, sizeof($arr));
    }
}

echo microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
