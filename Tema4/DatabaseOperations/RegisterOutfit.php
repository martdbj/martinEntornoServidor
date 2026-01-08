<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

$conexion = mysqli_connect('localhost', 'fluza', '9481', 'ropa');

$queryCalzado = mysqli_query($conexion, "SELECT id FROM calzado")
or die("Error en la consulta: " . mysqli_error($conexion));

$queryPantalon = mysqli_query($conexion, "SELECT id FROM pantalon")
or die("Error en la consulta: " . mysqli_error($conexion));

$queryCamiseta = mysqli_query($conexion, "SELECT id FROM camiseta")
or die("Error en la consulta: " . mysqli_error($conexion));

$queryPersona = mysqli_query($conexion, "SELECT * FROM persona")
or die("Error en la consulta: " . mysqli_error($conexion));

$marcas = mysqli_query($conexion, "SELECT * FROM marca")
or die("Error en la consulta: " . mysqli_error($conexion));

if (mysqli_connect_errno()) {
    echo "<p>Conexión fallida: {mysqli_connect_errno()}";
    exit();
}

$numrCamiseta = mysqli_num_rows($queryCamiseta);
$numrCalzado = mysqli_num_rows($queryCalzado);
$numrPantalon = mysqli_num_rows($queryPantalon);
$numrPersona = mysqli_num_rows($queryPersona);

if (isset($_POST['enviar'])) {
    $fechaHoy = date("Y-d-m");

    $camisetaID = $_POST['camiseta'];
    $calzadoID = $_POST['calzado'];
    $pantalonID = $_POST['pantalon'];
    $personaID = $_POST['persona'];

    $sql = "INSERT INTO llevar (fecha, pers, pantalon, camiseta, calzado)
        VALUES ('$fechaHoy', $personaID, $pantalonID, $camisetaID, $calzadoID)";

    mysqli_query($conexion, $sql);
    header("Location: Menu.php");
}
?>
    <h1>Edit - Footwear</h1>
    <form action="RegisterOutfit.php" method="post">
    <table style="border:1px solid black">
    <tr style="text-align: center">
        <td>
            CAMISETA
        </td>
        <td>
            CALZADO
        </td>
        <td>
            PANTALON
        </td>
        <td>
            PERSONA
        </td>
    </tr>
    <?php
echo "<tr>";

echo "<td><select name='camiseta'>";
if ($numrCamiseta > 0) {
    for ($i = 0; $i < $numrCamiseta; $i++) {
        $marcaFetch = mysqli_fetch_array($queryCamiseta, MYSQLI_ASSOC);
        echo "<option value='{$marcaFetch['id']}'>{$marcaFetch['id']}</option>";
    }
}
echo "</select></td>";

echo "<td><select name='calzado'>";
if ($numrCalzado > 0) {
    for ($i = 0; $i < $numrCalzado; $i++) {
        $marcaFetch = mysqli_fetch_array($queryCalzado, MYSQLI_ASSOC);
        echo "<option value='{$marcaFetch['id']}'>{$marcaFetch['id']}</option>";
    }
}
echo "</select></td>";

echo "<td><select name='pantalon'>";
if ($numrPantalon > 0) {
    for ($i = 0; $i < $numrPantalon; $i++) {
        $marcaFetch = mysqli_fetch_array($queryPantalon, MYSQLI_ASSOC);
        echo "<option value='{$marcaFetch['id']}'>{$marcaFetch['id']}</option>";
    }
}
echo "</select></td>";

echo "<td><select name='persona'>";
if ($numrPersona > 0) {
    for ($i = 0; $i < $numrPersona; $i++) {
        $marcaFetch = mysqli_fetch_array($queryPersona, MYSQLI_ASSOC);
        echo "<option value='{$marcaFetch['id']}'>{$marcaFetch['nombre']}</option>";
    }
}
echo "</select></td>";
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