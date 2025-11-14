<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_COOKIE["username"])){
        $user=$_COOKIE["username"];
    }else{
        $user="";
    }
    ?>
    <form action="01userPage.php" method="post">
        <h1>Login</h1>
        <label for="username">Username: </label>
        <input type="text" name="username" id="" value=<?php $user?>>
        <br><br>
        <label for="userPassword">Password: </label>
        <input type="password" name="userPassword" id="">
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>