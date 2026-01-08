<?php
$xml = simplexml_load_file("biblioteca.xml");

foreach ($xml->xpath("//libro[editorial='Debolsillo']") as $nodo) {
    unset($nodo[0]);
}
$xml->saveXML('test.xml');