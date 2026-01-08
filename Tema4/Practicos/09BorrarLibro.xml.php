<?php
$dom = new DOMDocument();

$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->load('biblioteca.xml');

$libros = $dom->getElementsByTagName('libro');

for ($i = $libros->length - 1; $i >= 0; $i--) {
    $editorial = $libros->item($i)->getElementsByTagName('editorial')->item(0)->nodeValue;

    if ($editorial == 'Debolsillo') {
        $libros->item($i)->parentNode->removeChild($libros->item($i));
    }
}
echo "Libros borrados correctamente";
$dom->save('bibliotecaActualizada09.xml');