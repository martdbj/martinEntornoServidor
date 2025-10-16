<?php
$julesVerne1 = "Jules Verne was a 19th-century French author renowned as a pioneer of science fiction, born in Nantes in 1828. Initially a lawyer by his father's design, he pursued his passion for writing, becoming a playwright and eventually finding success with his series, which included classics like Journey to the Center of the Earth and Twenty Thousand Leagues Under the Sea. His work combined scientific detail with adventure, accurately predicting future technologies such as submarines and space travel. Verne died in Amiens in 1905. ";

if (str_contains($julesVerne1, "Jules")) {
    $position = strpos($julesVerne1, "science-fiction");
    echo $position . "\n";
}

echo strrchr($julesVerne1,"laid");

echo "\n" . strrev($julesVerne1) . "\n"; // The string gets reversed

echo str_ends_with($julesVerne1, "fiction.") ? "yes" : "no";

echo "\n" . str_ireplace("o", "a", $julesVerne1); // The diference is that irreplace converts the string to lower case

echo "\n" . str_pad($julesVerne1, 1000, "-", STR_PAD_BOTH);

echo "\n" . str_repeat("@#",4);
echo "\n" . str_repeat("/*",4);
echo "\n" . str_repeat("@~",4);

echo "\n". str_shuffle($julesVerne1);

echo "\n" . str_word_count($julesVerne1, 0);

echo "\n" . print_r(str_word_count($julesVerne1, 1));

echo "\n" . print_r(str_word_count($julesVerne1, 2));

echo "\n" . stripos($julesVerne1, "e", 4);

echo "\n" . strlen($julesVerne1);

echo "\nLast 20 characters: " . substr($julesVerne1, 20);
echo "\nFirst 20 characters: " . substr($julesVerne1, 0, 20);

echo "\nFirst 20 characters starting from 10: " . substr($julesVerne1, 10, 20);

echo "\nLast 20 characters starting from 10: " . substr($julesVerne1, -10, 20);

echo "\n" . substr_count($julesVerne1, "is");