<?php
    $operand1 = 2;
    $operand2 = 5;
    $operationType = '-';

    switch ($operationType) {
        case '+':
            echo $operand1 + $operand2;
            break;
        
        case '-':
            echo $operand1 - $operand2;
            break;

        case '*':
            echo $operand1 * $operand2;
            break;

        case '/':
            echo $operand1 / $operand2;
            break;

        default:
            
            break;
    }
?>