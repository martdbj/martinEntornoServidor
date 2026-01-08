<?php
$dom = new DOMDocument();

$dom->preserveWhiteSpace = true;
$dom->formatOutput = true;
$dom->load('biblioteca.xml');

$genero = $dom->getElementsByTagName('genero')->item(0);

$nuevoLibro = $dom->createElement('libro');

$titulo = $dom->createElement('titulo', 'El Quijote');
$nuevoLibro->appendChild($titulo);

$isbn = $dom->createElement('isbn', "123");
$nuevoLibro->appendChild($isbn);

$autor = $dom->createElement('autor', 'Cervantes');
$nuevoLibro->appendChild($autor);

$editorial = $dom->createElement('editorial', 'Aflaguara');
$nuevoLibro->appendChild($editorial);

$anio_edicion = $dom->createElement('anio_edicion', '1987');
$nuevoLibro->appendChild($anio_edicion);

$genero->appendChild($nuevoLibro);

$estado = $dom->createElement('estado', 'libre');
$nuevoLibro->appendChild($estado);

$dom->save('bibliotecaActualizada05.xml');
echo "Libro añadido correctamente";