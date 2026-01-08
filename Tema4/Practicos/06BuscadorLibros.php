<?php
$autorBuscado = 'George Orwell';

$xml = simplexml_load_file("biblioteca.xml");

$librosAutor = $xml->xpath("/biblioteca/genero/libro[autor = '{$autorBuscado}']");

if (empty($librosAutor)) {
    echo "No se ha encontrado ningún libro de este autor";
} else {
    foreach ($librosAutor as $libro) {
        echo "Título: {$libro->titulo} | Editorial: {$libro->editorial} | Autor: {$libro->autor} \n";
    }
}
