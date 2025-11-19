<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1</title>
</head>

<body>
    <?php
    if (isset($_COOKIE["username"]) && isset($_COOKIE["lastLogin"])) {
        header("Location: 02success.php");
    }
    ?>
    
    <form action="02form.php" method="post">
        <h1>Inicio de sesión</h1>
        <br>
        <label for="username">Nombre usuario: </label>
        <input type="text" name="username" id="" placeholder="Introduzca su nombre de usuario">
        <br><br>
        <label for="password">Contraseña: </label>
        <input type="password" name="password" id="" placeholder="Introduzca su contraseña">
        <br><br>
        <button type="submit">Acceder</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cookie_username_name = "username";
        $cookie_username_value = $_POST['username'];

        setcookie($cookie_username_name, $cookie_username_value, time() + 3600, "/");
        
        if (!isset($_COOKIE["lastLogin"])) {
            setcookie("lastLogin", date("Y-m-d h:i:sa", $d), time() + 3600, "/");
        }

        header("Location: 02success.php");
    }
    ?>
</body>

</html>