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
    <h1>Jeans Wardrobe</h1>
    <form action="01jeans.php" method="post">
        <div class="content">
            <p>Blue Jeans<input type="number" name="products[Blue Jeans]" id=""></p>
            <p>Red Jeans <input type="number" name="products[Red Jeans]" id=""></p>
            <p>Yellow Jeans <input type="number" name="products[Yellow Jeans]" id=""></p>
        </div>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
    <ul>
        <li><a href="01tshirt.php">Tshirt</a></li>
        <li><a href="01jumper.php">Jumper</a></li>
        <li><a href="result.php">Result</a></li>
    </ul>
    <form action="" method="post">
        <button type="submit" name="delete_session">Delete session variables</button>
    </form>
    <br><br>
    <form action="" method="post">
        <button type="submit" name="next">Next</button>
    </form>
    <br><br>
    <form action="" method="post">
        <button type="submit" name="delete_cookies">Delete cookies</button>
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

    if (isset($_POST['delete_cookies'])) {
        setcookie("tshirt", "", time() - 3600, "/");
        setcookie("jumper", "", time() - 3600, "/");
        setcookie("jeans", "", time() - 3600, "/");
    }

    // If a cookie is set, we create a $sesion with the same name.
    if (isset($_COOKIE['tshirt'])) {
        $_SESSION['tshirt'] = json_decode($_COOKIE['tshirt'], true);
    }
    if (isset($_COOKIE['jeans'])) {
        $_SESSION['jeans'] = json_decode($_COOKIE['jeans'], true);
    }
    if (isset($_COOKIE['jumper'])) {
        $_SESSION['jumper'] = json_decode($_COOKIE['jumper'], true);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Delete the cookie for creating a new shopping cart
        if (isset($_COOKIE['jeans'])) {
            setcookie('jeans', "", time() - 3600, "/");
        }
        if (isset($_POST['products'])) {
            $jeans = $_POST['products'];
            $jeans_filter = array_filter($jeans, function ($quantity) {
                return (int)$quantity > 0;
            });
            $_SESSION['jeans'] = $jeans_filter;
        }
    }

    echo "<h3>Saved products:</h3>";
    if (isset($_SESSION['tshirt'])) {
        foreach ($_SESSION['tshirt'] as $nombre => $quantity) {
            echo "<p>$nombre: $quantity</p>";
        }
    }
    if (isset($_SESSION['jeans'])) {
        foreach ($_SESSION['jeans'] as $nombre => $quantity) {
            echo "<p>$nombre: $quantity</p>";
        }
    }
    if (isset($_SESSION['jumper'])) {
        foreach ($_SESSION['jumper'] as $nombre => $quantity) {
            echo "<p>$nombre: $quantity</p>";
        }
    }

    if (isset($_POST['next'])) {
        header('Location: result.php');
    }
    ?>
</body>

</html>