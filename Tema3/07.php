<?php
$text = "“I was born in the year 1632, in the city of York, of a good family, though not of that
country, my father being a foreigner of Bremen, who settled first at Hull. He got a good
estate by merchandise, and leaving off his trade, lived afterwards at York, from whence he
had married my mother, whose relations were named Robinson”";

$arrayText = explode(" ", $text);

$uniqueArray = array_unique($arrayText);

$compactedArray = array_values($uniqueArray);

print_r($compactedArray);

// Flip the array
print_r(array_flip($compactedArray));

// Merge the array
print_r(array_merge($compactedArray));

// Intersect key
print_r(array_intersect_key($compactedArray));