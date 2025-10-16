<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();

    if (!isset($_SESSION["numeros"])) {
    $_SESSION["numeros"] = [];
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["numero"]) && is_numeric($_POST["numero"]))  {
        $num = (int)$_POST["numero"];

        if ($num == 0) {
            $totalSum = array_sum($_SESSION["numeros"]);
            echo ("Total: " . $totalSum);
            $_SESSION["numeros"] = [];
        } else {
            $_SESSION["numeros"][] = $num;
        }
        } 
    }
?>


<form method="post">
    <input type="text" name="numero">
    <button type="submit">Enviar</button>
</form>
</body>
</html>