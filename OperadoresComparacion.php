<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores de comparación </title>
</head>
<body>
    <CENTER>
        <?php
            $a = 3;
            $b = 7;
            $c = 9;

            echo "<br>Los tres números a comparar son: ";
            echo "<b>$a, $b, </b> y <b> $c</b><br><br>"

            $elMayor = ($a > $b) ? $a : $b;
            echo " y el mayor es el <B>";

            echo ($elMayor > $c) ? $elMayor : $c;
            echo "<B>";
    </CENTER>

</body>
</html>