<?php
if (file_exists("biblioteca.xml")) {
    $xml = simplexml_load_file("biblioteca.xml");
} else {
    exit("Error. No se ha podido encontrar el fichero");
}

echo "<h2>Libros prestados: </h2>";

foreach ($xml->genero->libro as $libro) {
    if ($libro->estado == "prestado") {
        echo "<p><b>Título: </b> " . $libro->titulo . " <b>Autor:</b> " . $libro->autor . " </p> ";
    }
}