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

if (isset($_POST['lend'])) {
    header("Location: Lend.php");
}

if (isset($_POST['add'])) {
    header("Location: Add.php");
}

if (isset($_POST['return'])) {
    header("Location: Return.php");
}

if (isset($_POST['delete'])) {
    header("Location: Delete.php");
}
?>
    <h2>Librería</h2>


    <table style="border: 1px solid black">
        <tr>
            <th> Titulo</th>
            <th> ISBN</th>
            <th> Autor</th>
            <th> Editorial</th>
            <th> Año edición</th>
            <th> Estado</th>
        </tr>

        <?php
        foreach ($libros as $libro) {
            echo "<tr>";
            echo "<td>{$libro->getElementsByTagName('titulo')->item(0)->nodeValue}</td>";
            echo "<td>{$libro->getElementsByTagName('isbn')->item(0)->nodeValue}</td>";
            echo "<td>{$libro->getElementsByTagName('autor')->item(0)->nodeValue}</td>";
            echo "<td>{$libro->getElementsByTagName('editorial')->item(0)->nodeValue}</td>";
            echo "<td>{$libro->getElementsByTagName('anio_edicion')->item(0)->nodeValue}</td>";
            echo "<td>{$libro->getElementsByTagName('estado')->item(0)->nodeValue}</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <form action="MainMenu.php" method="post">
        <button name="lend">Lend</button>
        <button name="add">Add</button>
        <button name="return">Return</button>
        <button name="delete">Delete</button>
    </form>
