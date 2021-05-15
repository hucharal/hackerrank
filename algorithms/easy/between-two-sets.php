<?php

/*
 * Complete the 'getTotalX' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY a
 *  2. INTEGER_ARRAY b
 */

function getTotalX($a, $b) {

    sort($a);
    sort($b);

    $minInA = $a[0];
    $maxInB = $b[count($b) - 1];
    $sizeA = count($a);
    $sizeB = count($b);

    $i = 1;
    $numbersBetween = 0;
    $factor = $minInA * $i;

    while ($factor <= $maxInB) {
        $allFactors = true;
        $divideAll = true;

        for ($j = 1; $j < $sizeA; $j++) {
            if ($factor % $a[$j] != 0) {
                $allFactors = false;
                break;
            }
        }

        for ($j = 0; $j < $sizeB; $j++) {
            if ($b[$j] % $factor != 0) {
                $divideAll = false;
                break;
            }
        }

        $numbersBetween += ($allFactors && $divideAll ? 1 : 0);
        $factor = $minInA * (++$i);
    }

    return $numbersBetween;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$m = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$brr_temp = rtrim(fgets(STDIN));

$brr = array_map('intval', preg_split('/ /', $brr_temp, -1, PREG_SPLIT_NO_EMPTY));

$total = getTotalX($arr, $brr);

fwrite($fptr, $total . "\n");

fclose($fptr);

