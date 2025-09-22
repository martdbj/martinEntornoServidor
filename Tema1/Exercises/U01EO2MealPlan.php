<?php
$WeekMealplan = [
            "Monday" => "Soup", 
            "Tuesday" => "Lentils", 
            "Wednesday" => "Pasta", 
            "Thursday" => "Fish and chips", 
            "Friday" => "Pizza", 
            "Saturday" => "Japanese Curry", 
            "Sunday" => "Roast"];
    echo "<table border='1' cellpadding='5'>";
    foreach ($WeekMealplan as $key => $value) {
        echo "<tr>";
            echo "<td>";
                echo $key;
            echo "</td>";
            echo "<td>";
                echo $value;
            echo "</td>";
        echo "</tr>";
    }
?>