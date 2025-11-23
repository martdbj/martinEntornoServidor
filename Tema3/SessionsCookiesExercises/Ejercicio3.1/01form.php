<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1</title>
</head>

<body>
    <?php
    if (isset($_COOKIE["username"])) {
        header("Location: 01success.php");
    }
    ?>
    
    <form action="01form.php" method="post">
        <h1>Login</h1>
        <br>
        <label for="username">Username: </label>
        <input type="text" name="username" id="" placeholder="Ex. Pepito">
        <br><br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="" placeholder="*************">
        <br><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cookie_username_value = $_POST['username'];

        setcookie("username", $cookie_username_value, time() + 3600, "/");

        header("Location: tshirt.php");
    }
    ?>
</body>

</html>