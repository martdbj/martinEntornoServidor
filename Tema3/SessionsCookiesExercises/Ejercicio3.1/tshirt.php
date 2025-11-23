<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>T-Shirt Wardrobe</h1>
    </header>
    <form action="tshirt.php" method="post">
        <div class="content">
            <p>Blue Tshirt<input type="number" name="products[Blue Tshirt]" id=""></p>
            <p>Red Tshirt <input type="number" name="products[Red Tshirt]" id=""></p>
            <p>Yellow Tshirt <input type="number" name="products[Yellow Tshirt]" id=""></p>
        </div>
        <button type="submit" name="ADD">Add</button>
    </form>
    <form action="" method="post">
        <button type="submit" name="next">Next</button>
    </form>
    <?php
    session_start();
    $username = $_COOKIE["username"];

    if (!isset($_SESSION)) {
        $_SESSION['tshirt-' . $username] = [];
        $_SESSION['jeans-' . $username] = [];
        $_SESSION['jumper-' . $username] = [];
    }

    if (isset($_POST["ADD"])) {
        $tshirt = $_POST['products'];
        $tshirt_filter = array_filter($tshirt, function ($quantity) {
            return (int)$quantity > 0;
        });
        $_SESSION['tshirt' . $username] = $tshirt_filter;

        foreach ($tshirt_filter as $name => $quantity) {
            $cookieJuice[] = $name . ":" . $quantity;
        }

        $cookieData = implode(",", $cookieJuice);
        setcookie("tshirt-" . $username, $cookieData, time() + 3600, "/");
    }

    echo "<h3>Saved products:</h3>";
    if (isset($_SESSION['tshirt' . $username])) {
        foreach ($_SESSION['tshirt' . $username] as $nombre => $quantity) {
            echo "<p>$nombre: $quantity</p>";
        }
    }
    ?>
</body>

</html>