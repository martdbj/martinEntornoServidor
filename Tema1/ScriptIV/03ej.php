<?php
$text = "Calle uno,Calle dos,Calle leonardo Da Vinci, Calle Camino de Leganes, Calle final.";

ucfirst($text);

$arrayText = (explode(",", $text));

foreach ($arrayText as &$calle) {
    $calle = trim(str_replace("Calle", "", $calle));
    $calle = ucfirst($calle);
}

print_r($arrayText);