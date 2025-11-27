<?php
// FSCANF for reading a line of a file and applying a format to it
// $valores = fscanf($fichero, $formato, $var1);


$fich = fopen("03matriz.txt", "r");
if ($fich == False) {
    echo "No se";
} else {
    while (!feof($fich)) {
        $num = fscanf($fich, "%s %s %s %s");
        echo "$num[0] $num[1] $num[2] $num[3]º\n";
    }
}
rewind($fich);
while(!feof($fich)) {
    $num = fscanf($fich, "%d %d %d %d", $num1, $num2, $num3, $num4);
    echo "$num1 $num2 $num3 $num4\n";
}
