<?php
session_start();

$conexion = mysqli_connect("localhost", "fluza", "9481", "ropa");

if (!isset($_SESSION)) {
    $_SESSION['tshirt'] = [];
    $_SESSION['trousers'] = [];
    $_SESSION['shoes'] = [];
}

echo "<h3>Saved products:</h3>";

if (isset($_SESSION['tshirt'])) {
    echo "<h2>Tshirt</h2>";
    echo "<table style='border: 1px solid black'>
            <tr>
                <th>ID</th><th>Talla</th><th>Precio</th><th>Marca</th><th>Color</th>
            </tr>";

    foreach ($_SESSION['tshirt'] as $id => $test) {
        retrieveProductDataWithID($test, "camiseta", $conexion);
    }
    echo "</table>";
}

if (isset($_SESSION['trousers'])) {
    echo "<h2>Trousers</h2>";
    echo "<table style='border: 1px solid black'>
            <tr>
                <th>ID</th><th>Talla</th><th>Precio</th><th>Marca</th><th>Color</th>
            </tr>";

    foreach ($_SESSION['trousers'] as $id) {
        retrieveProductDataWithID($id, "pantalon", $conexion);
    }
    echo "</table>";
}

if (isset($_SESSION['shoes'])) {
    echo "<h2>Shoes</h2>";
    echo "<table style='border: 1px solid black'>
            <tr>
                <th>ID</th><th>Talla</th><th>Precio</th><th>Marca</th><th>Color</th>
            </tr>";

    foreach ($_SESSION['shoes'] as $id) {
        retrieveProductDataWithID($id, "calzado", $conexion);
    }
    echo "</table>";
}

// Función mejorada
function retrieveProductDataWithID($productID, $productTable, $conexion) {
    $resultado = mysqli_query($conexion, "SELECT * FROM $productTable WHERE id = $productID");

    $marcas = mysqli_query($conexion, "SELECT * FROM marca");

    if ($fila = mysqli_fetch_assoc($resultado)) {
        $nombreMarca = findMarcaWithID($fila['marca'], $marcas);

        echo "<tr>";
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . $fila["talla"] . "</td>";
        echo "<td>" . $fila["precio"] . "</td>";
        echo "<td>" . $nombreMarca . "</td>";
        echo "<td>" . $fila["color"] . "</td>";
        echo "</tr>";
    }
}
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
