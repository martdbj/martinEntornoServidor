<?php
$inventory = [
    "apple" => 50,
    "banana" => 20,
    "cherry" => 30,
    "date" => 15,
    "fig" => 10,
    "grape" => 25
];

$sold_today = ["banana", "date", "kiwi", "apple"];
$restock = [
    "apple" => 20,
    "cherry" => 15,
    "fig" => 5,
    "kiwi" => 10,
    "grape" => 5
];

$error = array_diff($sold_today, array_keys($inventory));

foreach ($error as $fruit) {
    echo "Error " . $fruit . " does not exist\n";
}

$notSold = array_diff(array_keys($inventory), $sold_today);

foreach ($notSold as $fruit) {
    echo "Unfortunately " . $fruit . " was not sold today\n";
}

ksort($notSold, SORT_STRING);
array_splice($notSold, 0, 2);
print_r($notSold);

foreach ($notSold as $fruit) {
    $inventory[$fruit] += $restock[$fruit];
}



print_r($inventory);