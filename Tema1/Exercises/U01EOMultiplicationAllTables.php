<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
            $mult = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
            foreach ($mult as $multiplicationNumber) {
                for ($i = 0; $i < count($numbers); $i++) {
                    echo $multiplicationNumber . "*" . $numbers[$i] ." = " . $multiplicationNumber * $numbers[$i] . "<br>"; 
                }
                echo "<br>";
    }

    ?>

    
</body>
</html>