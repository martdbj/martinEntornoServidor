<?php
$var = 5;

echo "<table >";

for ($i = 0; $i < $var; $i++) {
    echo "<tr>";
    echo "<td>";
    for ($j = $var; $j >= $i; $j--) {
        echo "&";
    }
    for ($j = 0; $j <= $i; $j++) {
        echo "*";
    }
    echo "</td>";
    echo "<td>";
    for ($j = 0; $j <= $i; $j++) {
        echo "*";
    }
    echo "</td>";
    echo "</tr>";
    
}

echo "</table>";
?>

