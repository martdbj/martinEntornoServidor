<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        button {
            background-color: red;
            border: none;
            color: white;
            border-radius: 10%;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer
        }
    </style>

<body>
    <ul>
        <li><a href="01tshirt.php">Tshirt</a></li>
        <li><a href="01jeans.php">Jeans</a></li>
        <li><a href="01jumper.php">Jumper</a></li>
    </ul>
    <br><br>
    <form action="" method="post">
        <button type="submit" name="delete_session">Delete session variables</button>
    </form>
    <br><br>
    <form action="" method="post">
        <button type="submit" name="delete_cookies">Delete cookies</button>
    </form>
    <?php
    session_start();
    $username = $_COOKIE["username"];
    if (!isset($_SESSION)) {
        $_SESSION['tshirt'] = [];
        $_SESSION['jeans'] = [];
        $_SESSION['jumper'] = [];
    };

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_session'])) {
        session_unset();
    }

    if (isset($_POST['delete_cookies'])) {
        setcookie("tshirt-" . $username, "", time() - 3600, "/");
        setcookie("jumper-" . $username, "", time() - 3600, "/");
        setcookie("jeans-" . $username, "", time() - 3600, "/");
    }

    echo "<h3>Saved products:</h3>";
    if (isset($_SESSION['tshirt'])) {
        foreach ($_SESSION['tshirt'] as $nombre => $quantity) {
            echo "<p>$nombre: $quantity</p>";
        }
        $cookieData = json_encode($_SESSION['tshirt']);
        setcookie("tshirt-" . $username, $cookieData, time() + 3600, "/");
    }
    if (isset($_SESSION['jeans'])) {
        foreach ($_SESSION['jeans'] as $nombre => $quantity) {
            echo "<p>$nombre: $quantity</p>";
        }
        
        $cookieData = json_encode($_SESSION['jeans']);
        setcookie("jeans-" . $username, $cookieData, time() + 3600, "/");
    }
    if (isset($_SESSION['jumper'])) {
        foreach ($_SESSION['jumper'] as $nombre => $quantity) {
            echo "<p>$nombre: $quantity</p>";
        }
        
        $cookieData = json_encode($_SESSION['jumper']);
        setcookie("jumper-" . $username, $cookieData, time() + 3600, "/");
    }

    ?>
</body>

</html>