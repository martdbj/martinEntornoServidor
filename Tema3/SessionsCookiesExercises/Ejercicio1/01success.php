<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserPage</title>
</head>
<body>
    <h1>UserPage</h1>
    <form action="01success.php" method="post">
        <button type="submit">No eres tú?</button>
    </form>
    <?php 
    if (isset($_COOKIE["username"])) {
        $username = $_COOKIE["username"];
<<<<<<< HEAD:Tema3/SessionsCookiesExercises/01success.php
        echo '<p>Hello ' . $username . '!';
=======
        echo '<p>Hello ' . $username . " nice to see you again </p>";
>>>>>>> a75427ef174345455a21cae204c307ca748e9d43:Tema3/SessionsCookiesExercises/Ejercicio1/01success.php
    } else {
        echo '<p>Something bad happened</p>';
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
<<<<<<< HEAD:Tema3/SessionsCookiesExercises/01success.php
        setcookie("username", $username, time() - 3600, "/");
=======
        setcookie("username", "", time() - 3600, "/");
>>>>>>> a75427ef174345455a21cae204c307ca748e9d43:Tema3/SessionsCookiesExercises/Ejercicio1/01success.php

        header("Location: 01form.php");
    }
    ?>
</body>
</html>