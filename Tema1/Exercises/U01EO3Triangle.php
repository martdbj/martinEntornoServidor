<?php
    $figure = 'square';


    switch ($figure) {
        case 'square':
            echo "To find the perimeter of a square you must know the length of one of its sides and multiply it by 4";
            break;

        case 'triange':
            echo "To find the perimeter of a triangle you must know the the length of it's three sides, and then add them";
            break;

        case 'rectangue':
            echo "To find the permiter of a rectangle you must to know the length and it's width, then you have to add them and mulply per two";
            break;

        default:
            echo "Enter a valid figure";
            break;
    }
?>