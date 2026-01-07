<html>
<head>
    <title>Ejemplo bases de datos</title>
</head>
<body>
<?php
/* Conectar a la BD y luego ya actuo siempre sobre la variable conexion*/
$conexion = mysqli_connect("localhost","fluza","9481","ropa");

/* Lazo la consulta sobre la BD*/
$resultado = mysqli_query($conexion, "SELECT * FROM camiseta")
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
<h1>El corte Inglés - Tshirts</h1>
<table style="border:1px solid black">
    <tr>
        <td>
            id
        </td>
        <td>
            talla
        </td>
        <td>
            precio
        </td>
        <td>
            marca
        </td>
        <td>
            color
        </td>
    </tr>
    <?php
    if($numr > 0){
        for ($i = 0; $i < $numr; $i++){
            echo "<tr>";
            /* El resultado es realmente una matriz y voy cogiendo por filas con esa función*/
            $fila = mysqli_fetch_array($resultado,MYSQLI_ASSOC);

            $nombreMarca = findMarcaWithID($fila['marca'], $marcas);
            /* Para concatenar string utilzo el .*/
            echo "<td>".$fila["id"]."</td>";
            echo "<td>".$fila["talla"]."</td>";
            echo "<td>".$fila["precio"]."</td>";
            echo "<td>".$nombreMarca."</td>";
            echo "<td>".$fila["color"]."</td>";
            echo "</tr>";
        }
    }
    ?>

</table>
<p><a href="ejercicio11.php">Siguiente</a></p>
</body>
</html>
<?php
function findMarcaWithID($id, $marcas) {
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