<?php


ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);


$conexion = mysqli_connect('localhost', 'fluza', '9481', 'ropa');

$idFootWear = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['siguiente'])) {

    if (!isset($_POST['footWear'])) {
        echo "No se recibió el ID del calzado";
        exit;
    }

    $idFootWear = (int)$_POST['footWear'];
}

$resultado = mysqli_query($conexion, "SELECT * FROM calzado WHERE id = $idFootWear") or die("Error en la consulta: " . mysqli_error($conexion));

$marcas = mysqli_query($conexion, "SELECT * FROM marca") or die("Error en la consulta: " . mysqli_error($conexion));

$numr = mysqli_num_rows($marcas);

if (mysqli_connect_errno()) {
    echo "<p>Conexión fallida: {mysqli_connect_errno()}";
    exit();
}

if (isset($_POST['enviar'])) {
    $id = mysqli_real_escape_string($conexion, $_POST['id']);
    $talla = mysqli_real_escape_string($conexion, $_POST['talla']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
    $marca = mysqli_real_escape_string($conexion, $_POST['brandName']); // El select tiene name='brandName'
    $color = mysqli_real_escape_string($conexion, $_POST['color']);

    $idMarca = findIdWithMarca($marca, $marcas);

    $sql = "UPDATE calzado SET 
                talla = '$talla', 
                precio = '$precio', 
                marca = '$idMarca', 
                color = '$color' 
            WHERE id = '$id'";

    mysqli_query($conexion, $sql);

    header('Location: ModifyFootwear01.php');
}
?>
    <h1>Edit - Footwear</h1>
    <form action="ModifyFootwear02.php" method="post">
        <table style="border:1px solid black">
            <tr style="text-align: center">
                <td>
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
            $productIDArr = [];

            echo "<tr>";
            $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

            echo "<td><input hidden='hidden' type='text' name='id' placeholder=" . $fila["id"] . " value=" . $idFootWear . "></td>";
            echo "<td><input type='text' name='talla' placeholder=" . $fila["talla"] . " value=" . $fila["talla"] . "></td>";
            echo "<td><input type='text' name='precio' placeholder=" . $fila["precio"] . " value=" . $fila["precio"] . "></td>";

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

?>