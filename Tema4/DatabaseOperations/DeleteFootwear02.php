<?php
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

$conexion = mysqli_connect('localhost', 'fluza', '9481', 'ropa');

if (isset($_POST['enviar'])) {
    $size = $_POST['size'];


    $resultado = mysqli_query($conexion, "DELETE FROM calzado WHERE talla = $size")
    or die("Error en la consulta: " . mysqli_error($conexion));

    if (mysqli_connect_errno()) {
        echo "<p>Conexión fallida: {mysqli_connect_errno()}";
        exit();
    }

    echo "Done" . $size;
}

mysqli_close($conexion);