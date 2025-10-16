<?php
$veryLargeRandomNumberArray1 = [];
$veryLargeRandomNumberArray2 = [];

    // Populates the arrays with 5 numbers from 1 to 10
for ($i = 0; $i < 5; $i++) {
    $veryLargeRandomNumberArray1[$i] = rand(1, 10);
    $veryLargeRandomNumberArray2[$i] = rand(1, 10);
}

print_r(array_diff($veryLargeRandomNumberArray1, $veryLargeRandomNumberArray2));