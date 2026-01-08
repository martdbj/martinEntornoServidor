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
?>

<?php
if (isset($_POST['send'])) {
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $anio_edicion = $_POST['anio_edicion'];

    $existe = false;
    foreach ($libros as $libro) {
        if ($libro->getElementsByTagName('isbn')->item(0)->nodeValue == $isbn) {
            echo "<p>Este libro ya existe</p>";
            $existe = true;
            break;
        }
    }
    if (!$existe) {
        $genero = $dom->getElementsByTagName('genero')->item(0);
        $nuevoLibro = $dom->createElement('libro');

        $titulo = $dom->createElement('titulo', $titulo);
        $nuevoLibro->appendChild($titulo);

        $isbn = $dom->createElement('isbn', $isbn);
        $nuevoLibro->appendChild($isbn);

        $autor = $dom->createElement('autor', $autor);
        $nuevoLibro->appendChild($autor);

        $editorial = $dom->createElement('editorial', $editorial);
        $nuevoLibro->appendChild($editorial);

        $anio_edicion = $dom->createElement('anio_edicion', $anio_edicion);
        $nuevoLibro->appendChild($anio_edicion);

        $estado = $dom->createElement('estado', 'libre');
        $nuevoLibro->appendChild($estado);

        $genero->appendChild($nuevoLibro);
    }
    header('Location: MainMenu.php');
}
$dom->save('test.xml');
?>
    <form action="Add.php" method="post">
        <label for="titulo">Título: </label>
        <input type="text" name="titulo">
        <br>
        <label for="isbn">ISBN: </label>
        <input type="number" name="isbn">
        <br>
        <label for="autor">Autor: </label>
        <input type="text" name="autor">
        <br>
        <label for="editorial">Editorial: </label>
        <input type="text" name="editorial">
        <br>
        <label for="anio_edicion">Año edición: </label>
        <input type="text" name="anio_edicion">
        <br><br>
        <button name="send">Enviar</button>
    </form>

