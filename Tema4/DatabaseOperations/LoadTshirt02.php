<?php
$conexion = mysqli_connect('localhost', 'fluza', '9481', 'ropa');

if (isset($_POST['enviar'])) {
    if (isset($_POST['size'])) {
        $size = $_POST['size'];

        $resultado = mysqli_query($conexion, "SELECT * FROM camiseta WHERE talla = $size")
        or die("Error en la consulta: " . mysqli_error($conexion));

        $marcas = mysqli_query($conexion, "SELECT * FROM marca")
        or die("Error en la consulta: " . mysqli_error($conexion));

        if (mysqli_connect_errno()) {
            echo "<p>Conexión fallida: {mysqli_connect_errno()}";
            exit();
        }

        $numr = mysqli_num_rows($resultado);

    }
}

if (isset($_POST['menu'])) {
    header("Location: Menu.php");
}
?>

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

<form action="LoadTshirt02.php" method="post">
    <button name="menu">Manu</button>
</form>
