<?php
$textString = readline("Introduce un string de texto: ");
$array = ["Jose", "Pepe"];

$totalWordsFound = 0;
$allFound = true;
$occurences = [];
foreach ($array as $string) {
    if (str_contains($textString, $string)) {
        $occurences[$string] = substr_count($textString, $string);
        $totalWordsFound++;
    } else {
        $allFound = false;
    }
}

echo "Words found: " . i)