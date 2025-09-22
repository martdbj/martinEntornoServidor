<?php
    $totalRows = 5;
    $counter = 1;
    while ($counter <= $totalRows) {
        for ($i = 1; $i <= $counter; $i++) { 
            echo $i;
        }
        $counter++;
        echo "<br>";
    }
?>