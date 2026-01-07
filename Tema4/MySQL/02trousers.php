<html>
<head>
    <title>Ejemplo bases de datos</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION)) {
    $_SESSION['tshirt'] = [];
    $_SESSION['trousers'] = [];
    $_SESSION['shoes'] = [];
}

/* Conectar a la BD y luego ya actuo siempre sobre la variable conexion*/
$conexion = mysqli_connect("localhost", "fluza", "9481", "ropa");

/* Lazo la consulta sobre la BD*/
$resultado = mysqli_query($conexion, "SELECT * FROM pantalon")
or die("Error en la consulta: " . mysqli_error($conexion));

$marcas = mysqli_query($conexion, "SELECT * FROM marca")
or die("Error en la consulta: " . mysqli_error($conexion));

/* para detectar errores*/
if (mysqli_connect_errno()) {
    printf("<p>Conexión fallida: %s</p>", mysqli_connect_error());
    exit();
}

/* Devuelve el número de filas del resultado */
$numr = mysqli_num_rows($resultado);

?>
<form action="02trousers.php" method="post">
    <h1>El corte Inglés - Trousers</h1>
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
        $productIDArr = [];
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
                echo '<td><input type="checkbox" name="selectedTrousers[]" value="' . $fila["id"] . ' "/></td>';
                echo "</tr>";
            }
        }
        ?>

    </table>
    <br>
    <button name="siguiente">Siguiente</button>
</form>
</body>
</html>
<?php
// Store in the session checked products
if (isset($_POST['selectedTrousers'])) {
    $_SESSION['trousers'] = $_POST['selectedTrousers'];
    header("Location: 03shoes.php");
}
?>

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

?>