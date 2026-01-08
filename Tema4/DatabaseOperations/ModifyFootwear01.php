<?php
$conexion = mysqli_connect('localhost', 'fluza', '9481', 'ropa');

$resultado = mysqli_query($conexion, "SELECT * FROM calzado")
or die("Error en la consulta: " . mysqli_error($conexion));

$marcas = mysqli_query($conexion, "SELECT * FROM marca")
or die("Error en la consulta: " . mysqli_error($conexion));

if (mysqli_connect_errno()) {
    echo "<p>Conexión fallida: {mysqli_connect_errno()}";
    exit();
}

$numr = mysqli_num_rows($resultado);

?>


    <h1>El corte Inglés - Edit Footwear</h1>
    <table style="border:1px solid black">
        <tr style="text-align: center">
            <td>
                ID
            </td>
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
        if ($numr > 0) {
            for ($i = 0; $i < $numr; $i++) {
                echo "<tr>";
                /* El resultado es realmente una matriz y voy cogiendo por filas con esa función*/
                $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

                $nombreMarca = findMarcaWithID($fila['marca'], $marcas);
                /* Para concatenar string utilzo el .*/
                echo "<td>" . $fila["id"] . "</td>";
                echo "<td>" . $fila["talla"] . "</td>";
                echo "<td>" . $fila["precio"] . "</td>";
                echo "<td>" . $nombreMarca . "</td>";
                echo "<td>" . $fila["color"] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <br>

    <form action="ModifyFootwear02.php" method="post">
        <select name="footWear">
            <?php
            if ($numr > 0) {
                mysqli_data_seek($resultado, 0);
                for ($i = 0; $i < $numr; $i++) {

                    $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

                    echo "<option value='{$fila['id']}'>" . $fila['id'] . "</option>";
                }
            }
            ?>
        </select>
        <button name="siguiente">Siguiente</button>
    </form>

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

?>