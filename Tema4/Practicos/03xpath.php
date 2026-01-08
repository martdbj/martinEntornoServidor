<?php
$xml = simplexml_load_file('biblioteca.xml');

$librosDeBolsillo = $xml->xpath("/biblioteca/genero/libro[editorial='Debolsillo' and anio_edicion > 2010]");

echo "Libros editorial DeBolsillo \n";

foreach ($librosDeBolsillo as $libro) {
    echo $libro->titulo . " (" . $libro->anio_edicion . ") \n";
}