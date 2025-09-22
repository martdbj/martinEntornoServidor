<?php
    $array;
    $totalValue = 0;
    for ($i = 0; $i < 50; $i++) {
        $array[$i] = rand(1, 100);
    }
    foreach ($array as $key) {
        $totalValue += $key;
    }

    $arithmeticValue = $totalValue / 50;
    echo $arithmeticValue;
?>