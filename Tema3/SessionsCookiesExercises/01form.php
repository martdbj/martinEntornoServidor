<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1</title>
</head>

<body>
    <?php
    if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
        header("Location: 01success.php");
    }
    ?>
    
    <form action="01form.php" method="post">
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

        $cookie_password_name = "password";
        $cookie_password_value = $_POST['password'];

        setcookie($cookie_username_name, $cookie_username_value, time() + 3600, "/");
        setcookie($cookie_password_name, $cookie_password_value, time() + 3600, "/");

        header("Location: 01success.php");
    }
    ?>
</body>

</html>