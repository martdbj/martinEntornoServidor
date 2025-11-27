<?php
$fich = fopen("fichero_ejemplo.txt", "w+");
if ($fich === FALSE) {
    echo "No se encuentra el fichero_ejemplo.txt";
} else {
    echo "fichero_ejemplo.txt se abrió con éxito";
}
