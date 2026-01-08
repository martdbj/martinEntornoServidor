<?php
if (file_exists("biblioteca.xml")) {
    $xml = simplexml_load_file("biblioteca.xml");
} else {
    echo "Error. No existe el archivo xml";
}
?>

<table style="border: 1px solid black">
    <tr>
        <th>Título</th>
        <th>ISBN</th>
        <th>Disponibilidad</th>
    </tr>
    <?php
        foreach ($xml->genero->libro as $libro) {
            echo ("
            <tr>
                <td>{$libro->titulo}</td>
                <td>{$libro->isbn}</td>
                <td>{$libro->estado}</td>
            </tr>
            ");
        }
    ?>
</table>
