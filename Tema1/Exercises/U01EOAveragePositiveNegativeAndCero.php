<?php
$numbers = [0, 1, 2, 3, 0, -1, -2, 1, 1];
$positive = 0;
$pc = 0;
$negative = 0;
$nc = 0;
$cero = 0;

foreach ($numbers as $number) {
    if ($number > 0) {
        $positive += $number;
        $pc++;
    } else if ($number < 0) {
        $negative += $number;
        $nc++;
    } else {
        $cero++;
    }
}

echo "Positive average: " . $positive / $pc . "<br>";
echo "Negative average " . $negative / $nc . "<br>";
echo "Number of ceros " . $cero . "<br>";