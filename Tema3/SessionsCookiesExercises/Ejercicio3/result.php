<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <li><a href="01tshirt.php">Tshirt</a></li>
        <li><a href="01jeans.php">Jeans</a></li>
        <li><a href="01jumper.php">Jumper</a></li>
    </ul>
    <form action="" method="post">
        <button type="submit" name="delete_session">Delete session variables</button>
    </form>
    <?php
    session_start();
    if (!isset($_SESSION)) {
        $_SESSION['tshirt'] = [];
        $_SESSION['jeans'] = [];
        $_SESSION['jumper'] = [];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_session'])) {
        session_unset();
    }

    echo "<h3>Saved products:</h3>";
    if (isset($_SESSION['tshirt'])) {
        $tshirtCookieContent = [];
        foreach ($_SESSION['tshirt'] as $nombre => $quantity) {
            echo "<p>$nombre: $quantity</p>";
            $tshirtCookieContent[] = $nombre . "=" . $quantity;
        }
        $cookieString = implode(",", $tshirtCookieContent);
        setcookie("tshirt", $cookieString, time() + 3600, "/");
    }
    if (isset($_SESSION['jeans'])) {
        foreach ($_SESSION['jeans'] as $nombre => $quantity) {
            echo "<p>$nombre: $quantity</p>";
        }
        setcookie("jeans", implode(" ", $_SESSION['jeans']));
    }
    if (isset($_SESSION['jumper'])) {
        foreach ($_SESSION['jumper'] as $nombre => $quantity) {
            echo "<p>$nombre: $quantity</p>";
        }
        setcookie("jumper", implode(" ", $_SESSION['jumper']));
    }

    ?>
</body>

</html>