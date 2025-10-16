<?php
$text = "This is a text";

// Text to array
$arrayText = explode(" ", $text);

// We divide the array into two parts
$arrayText = array_chunk($arrayText, 2);

print_r($arrayText);