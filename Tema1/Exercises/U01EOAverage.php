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
    // Comprobación de que el número se ha enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["numero"]) && is_numeric($_POST["numero"]))  {
        $num = (int)$_POST["numero"];

        if ($num < 0) {
            $totalSum = array_sum($_SESSION["numeros"]) / count($_SESSION["numeros"]);
            echo ("Total: " . $totalSum);
            $_SESSION["numeros"] = [];
        } else {
            $_SESSION["numeros"][] = $num;
        }
        } 
    }
?>

<!-- Formulario sencillo -->
<form method="post">
    <input type="text" name="numero" autofocus>
    <button type="submit">Enviar</button>
</form>
</body>
</html>