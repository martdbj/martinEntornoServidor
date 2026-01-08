<?php
$dom = new DOMDocument();

$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;

if (file_exists("test.xml")) {
    $dom->load('test.xml');
} else {
    $dom->load("library.php");
}

$libros = $dom->getElementsByTagName('libro');

if (isset($_POST['send'])) {
    $isbn = $_POST['isbn'];
    foreach ($libros as $libro) {
        if ($libro->getElementsByTagName('isbn')->item(0)->nodeValue == $isbn) {
            $libro->parentNode->removeChild($libro);
        }
    }
    $dom->save("test.xml");
    header("Location: MainMenu.php");
}
?>

<h2>Introduzca el isbn del libro que quieras eliminar</h2>
<form action="Delete.php" method="post">
    <label for="isbn">ISBN: </label>
    <input type="text" name="isbn">

    <br><br>
    <button name="send">Enviar</button>
</form>
