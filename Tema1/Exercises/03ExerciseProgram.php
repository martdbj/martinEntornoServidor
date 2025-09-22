<?php
    $integer = 3;
    $decimal = 0.9;
    $string = "string";
    echo ("<table border='1' cellpadding='5'>
        <tr>
            <td>". gettype($integer) ."</td>
            <td>". $integer. "</td>
        </tr>
        <tr>
            <td>". gettype($decimal) ."</td>
            <td>". $decimal. "</td>
        </tr>
        <tr>
            <td>". gettype($string). "</td>
            <td>". $string. "</td>
        </tr>
    </table>");
?>