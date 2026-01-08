<?php
$dom = new DOMDocument();

$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->load("biblioteca.xml");

$libros = $dom->getElementsByTagName('libro');

foreach ($libros as $libro) {
    $isbn = $libro->getElementsByTagName('isbn')->item(0)->nodeValue;

    if ($isbn == '8491051325') {
        $estado = $libro->getElementsByTagName('estado')->item(0);
        $estado->nodeValue = 'libre';

        $fechas = $libro->getElementsByTagName('fecha_devolucion');
        if ($fechas->length > 0) {
            $fechasNode = $fechas->item(0);
            $libro->removeChild($fechasNode);
        }
    }
}

$dom->save('bibliotecaActualizada02.xml');
echo "Libro actualizado y guardado";