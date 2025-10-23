<?php
$tienda1 = ['Laptop', 'Tablet', 'Smartphone', 'Laptop', 'Tablet'];
$tienda2 = ['Smartphone', 'Laptop', 'Tablet', 'Smartwatch', 'Smartphone'];
$tienda3 = ['Laptop', 'Smartwatch', 'Tablet', 'Tablet', 'Smartphone'];

$tiendas = array_merge($tienda1, $tienda2, $tienda3);
print_r($tiendas);

// Junta los elementos con el mismo nombre y crea un value para ellos con el número de veces que aparecen
print_r(array_count_values($tiendas));
$sellNumber = array_count_values($tiendas);


if (in_array("Laptop", array_keys($sellNumber))) {
    echo "Item found";
} else {
    echo "Item not found";
}

$bestSellers = [];
foreach ($sellNumber as $product => $quantity) {
    if ($quantity > 2) {
        array_push($bestSellers, $product);
    }
}
print_r($bestSellers);
