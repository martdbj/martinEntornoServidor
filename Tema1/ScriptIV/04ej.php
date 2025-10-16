<?php
$julesVerne1 = "Jules Verne (born February 8, 1828, Nantes, France—died March 24, 1905, Amiens) was a prolific French author whose writings laid much of the foundation of modern science-fiction.";
$julesVerne2 = "Jules Verne, a 19th-century French author, is famed for such revolutionary science-fiction novels as 'Around the World in Eighty Days' and 'Twenty Thousand Leagues Under the Sea.'";

$similarText = similar_text($julioVerne1, $julioVerne2);

echo "The text has " . $similarText . "characters";