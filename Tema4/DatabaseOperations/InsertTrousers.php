<?php
$conexion = mysqli_connect('localhost', 'fluza', '9481', 'ropa');

$resultado = mysqli_query($conexion, "SELECT * FROM pantalon")
or die("Error en la consulta: " . mysqli_error($conexion));

$marcas = mysqli_query($conexion, "SELECT * FROM marca")
or die("Error en la consulta: " . mysqli_error($conexion));

$numr = mysqli_num_rows($marcas);

if (isset($_POST['enviar'])) {
    $talla = mysqli_real_escape_string($conexion, $_POST['talla']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
    $marca = mysqli_real_escape_string($conexion, $_POST['brandName']); // El select tiene name='brandName'
    $color = mysqli_real_escape_string($conexion, $_POST['color']);

    $idMarca = findIdWithMarca($marca, $marcas);

    // Fíjate en '$marca' y '$color'
    $sql = "INSERT INTO pantalon (talla, precio, marca, color)
        VALUES ($talla, $precio, '$idMarca', '$color')";

    mysqli_query($conexion, $sql);

    header("Location: Menu.php");
}
?>

<h1>Add - Trousers</h1>
    <form action="InsertTrousers.php" method="post">
        <table style="border:1px solid black">
            <tr style="text-align: center">
                <td>
                    TALLA
                </td>
                <td>
                    PRECIO
                </td>
                <td>
                    MARCA
                </td>
                <td>
                    COLOR
                </td>
            </tr>
            <?php
            $productIDArr = [];

            echo "<tr>";
            $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

            echo "<td><input type='text' name='talla' placeholder='talla' value=" . $fila["talla"] . "></td>";
            echo "<td><input type='text' name='precio' placeholder='precio' value=" . $fila["precio"] . "></td>";

            echo "<td><select name='brandName'>";
            if ($numr > 0) {
                mysqli_data_seek($marcas, 0);
                for ($i = 0; $i < $numr; $i++) {
                    $marcaFetch = mysqli_fetch_array($marcas, MYSQLI_ASSOC);
                    echo "<option value='{$marcaFetch['nombre']}'>{$marcaFetch['nombre']}</option>";
                }
            }
            echo "</select></td>";

            echo "<td><input type='text' name='color' placeholder=" . $fila["color"] . " value=" . $fila["color"] . "></td>";
            echo "</tr>";
            ?>
        </table>
        <br>
        <button name="enviar">Enviar</button>
    </form>
    <br>

<?php
function findMarcaWithID($id, $marcas)
{
    // Reset internal pointer
    mysqli_data_seek($marcas, 0);

    $nombre = "error";
    while ($fila = mysqli_fetch_assoc($marcas)) {
        if ($fila['id'] == $id) {
            return $fila['nombre'];
        }
    }
    return $nombre;
}

function findIdWithMarca($marca, $marcas)
{
    // Reset internal pointer
    mysqli_data_seek($marcas, 0);

    $id = -1;
    while ($fila = mysqli_fetch_assoc($marcas)) {
        if ($fila['nombre'] == $marca) {
            return $fila['id'];
        }
    }
    return $id;
}

mysqli_close($conexion);
?>