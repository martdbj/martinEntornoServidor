<?php
$dom = new DOMDocument();

$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->load("biblioteca.xml");

$libros = $dom->getElementsByTagName('libro');

foreach ($libros as $libro) {
    $precio = $dom->createElement('precio');

    $anio_edicion = $libro->getElementsByTagName('anio_edicion')->item(0);

    if ($anio_edicion->nodeValue > 2015) {
        $precio->nodeValue = 10.0;
    } else {
        $precio->nodeValue = 5.0;
    }

    $libro->appendChild($precio);
}
echo "Precio añadido con éxito";
$dom->save('bibliotecaActualizada08.xml');