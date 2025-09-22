<?php
    $secretNumber = rand(0, 100);
    $guess = -1;
    while ($guess != $secretNumber) {
        $guess = (int) readline('Enter your guess: ');
    }
    echo "<p>Youe guessed it </p>";
?>