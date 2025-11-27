<?php
$fich = fopen("fichero_ejemplo.txt", "r");
if ($fich === FALSE) {
    echo "Esto no va a salir por pantalla porque va a dar un error";
} else {
    // FEOF returns true if the end of the file has been reached.
    while (!feof($fich)) {
        $car = fgetc($fich);
        echo $car;
    }
}
fclose($fich);