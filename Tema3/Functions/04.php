<?php
$veryLargeRandomNumberArray = [];
// Populates the array with 3000 numbers from 1 to 10
for ($i = 0; $i < 3000; $i++) {
    $veryLargeRandomNumberArray[$i] = rand(1, 10);
}

print_r(array_count_values($veryLargeRandomNumberArray));