<?php
// $books = new DOMDocument();
//     $books -> loadXML($booksXML);
//     echo "Hla?";
//     echo $books -> saveHTML(); 

$booksXML = fopen("biblioteca.xml", "r");

$bookString;
while (!feof($booksXML)) {
    $bookString = fgetc($booksXML);
    echo $bookString;
}
