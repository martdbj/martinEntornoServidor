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

if (isset($_POST['books'])) {
    $booksArr = $_POST['books'];

    foreach ($booksArr as $isbn) {
        returnBook($isbn, $libros, $dom);
    }
    $dom->save('test.xml');
    header("Location: MainMenu.php");
}
?>
    <form action="Return.php" method="post">
        <table style="border: 1px solid black">
            <tr>
                <th> Titulo</th>
                <th> ISBN</th>
                <th> Autor</th>
                <th> Editorial</th>
                <th> Año edición</th>
                <th> Estado</th>
                <th>Fecha devolución</th>
            </tr>

            <?php
            foreach ($libros as $libro) {
                echo "<tr>";
                if ($libro->getElementsByTagName('estado')->item(0)->nodeValue == "prestado") {
                    echo "<td>{$libro->getElementsByTagName('titulo')->item(0)->nodeValue}</td>";
                    echo "<td>{$libro->getElementsByTagName('isbn')->item(0)->nodeValue}</td>";
                    echo "<td>{$libro->getElementsByTagName('autor')->item(0)->nodeValue}</td>";
                    echo "<td>{$libro->getElementsByTagName('editorial')->item(0)->nodeValue}</td>";
                    echo "<td>{$libro->getElementsByTagName('anio_edicion')->item(0)->nodeValue}</td>";
                    echo "<td>{$libro->getElementsByTagName('estado')->item(0)->nodeValue}</td>";
                    echo "<td>{$libro->getElementsByTagName('fecha_devolucion')->item(0)->nodeValue}</td>";
                    echo "<td><input type='checkbox' name='books[]' value='{$libro->getElementsByTagName('isbn')->item(0)->nodeValue}'></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <button name="enviar">Confirmar</button>
    </form>

<?php
function returnBook($bookISBN, $librosXML, $dom) {
    foreach ($librosXML as $libro) {

        if ($bookISBN === $libro->getElementsByTagName('isbn')->item(0)->nodeValue) {
            $libro->getElementsByTagName('estado')->item(0)->nodeValue = "libre";

            $fecha_devolucion = $libro->getElementsByTagName('fecha_devolucion')->item(0);

            $fecha_devolucion->parentNode->removeChild($fecha_devolucion);
        }
    }
}
?>