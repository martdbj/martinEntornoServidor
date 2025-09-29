<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["number"]) && is_numeric($_POST["number"])) {
            $number = $_POST["number"];
            $mult = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
            foreach ($mult as $multiplicationNumber) {
                echo $number . "*" . $multiplicationNumber ." = " . $number * $multiplicationNumber . "<br>"; 
            }
        }
    }

    ?>

    <form action="" method="post">
        <input type="number" name="number" id="">
        <input type="submit" value="Submit">
    </form>
</body>
</html>