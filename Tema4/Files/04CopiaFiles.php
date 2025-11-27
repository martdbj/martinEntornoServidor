<?php
$contenido = file_get_contents("03matriz.txt");
echo "Contenido del fichero: \n$contenido\n";
$res = file_put_contents("fichero_salida.txt", $contenido);
if ($res) {
    echo "Fichero creado con éxito";
} else {
    echo "Error al crear el fichero";
}