<?php
$products = ['Laptop', 'Tablet', 'Smartphone', 'Monitor'];
$quantities = [10, 20, 15, 5];
// Updates: product => new quantity
$updates = [ 'Tablet' => 18, 'Monitor' => 7, 'Laptop' => 12];

// Combine products and quantities array 
$stock = array_combine($products, $quantities);
print_r($stock);

// We replace the quantities of the updated products
$stock = array_replace($stock, $updates);
print_r($stock);

// Sort the products alphabetically
ksort($stock, SORT_STRING);
print_r($stock);
