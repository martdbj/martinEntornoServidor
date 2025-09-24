<?php
    $array;
    $totalValue = 0;
    for ($i = 0; $i < 50; $i++) {
        $array[$i] = rand(1, 100);
    }
    $array = [
    75, 23, 10, 89, 45, 62, 38, 91, 5, 50,
    18, 99, 3, 70, 84, 27, 41, 66, 15, 58,
    7, 95, 33, 78, 12, 48, 81, 2, 65, 30,
    55, 88, 20, 72, 9, 35, 60, 4, 93, 25,
    69, 44, 1, 77, 53, 16, 85, 40, 98, 29
    ];
    
    echo "Arithmetic average";
    echo "<br>";
    foreach ($array as $key) {
        $totalValue += $key;
    }

    $arithmeticValue = $totalValue / count($array);
    echo $arithmeticValue;

    echo "<br><br>";
    $totalValue = 0;
    echo "Arithmetic average excluding odd numbers";
    echo "<br>";
    $numberCounter = 0;
    foreach ($array as $key) {
        if ($key % 2 == 0) {
            $totalValue += $key;
            $numberCounter++;
        }
    }
    $arithmeticValue = $totalValue / $numberCounter;
    echo $arithmeticValue;

    echo "<br><br>";
    $totalValue = 0;
    $numberCounter = 0;
    echo "Arithmetic average excluding numbers that are in an odd position";
    echo "<br>";
    $numberCounter = 0;
    foreach ($array as $index => $key) {
        if ($index % 2 == 0) {
            $totalValue += $key;
            $numberCounter++;
        }
    }
    $arithmeticValue = $totalValue / $numberCounter;
    echo $arithmeticValue; 

    echo "<br><br>";

    $randomNumber = rand(1, 10000);
    echo "How many digits this number has: " . $randomNumber;
    echo "<br>";
    $counter = 0;
    while ($randomNumber > 1) {
        $randomNumber /= 10;
        $counter++;
    }
    echo "The number has " . $counter . " digits";

    echo "<br><br>";
    
?>