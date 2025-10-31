<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <li><a href="01tshirt.php">Tshirts</a></li>
        <li><a href="01jeans.php">Jeans</a></li>
        <li><a href="01jumper.php">Jumper</a></li>
    </ul>
    <form action="" method="post">
        <button type="submit" name="delete_session">Delete session variables</button>
    </form>
    <?php
    session_start();
    if (!isset($_SESSION)) {
        $_SESSION["tshirt"] = "";
        $_SESSION["jumper"] = "";
        $_SESSION["jean"] = "";
    }

    if (isset($_POST["delete_session"])) {
        session_unset();
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION["jumper"] = $_POST["jumpers"];
        }
        foreach ($_SESSION as $key => $value) {
            echo "<p>" . $value . "</p>";
        }
    }
    ?>
</body>

</html>