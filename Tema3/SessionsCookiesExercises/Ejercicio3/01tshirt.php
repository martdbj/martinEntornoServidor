<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T-Shirt</title>
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
</head>

<body>
    <header>
        <h1>T-Shirt Wardrobe</h1>
    </header>
    <form action="01tshirt.php" method="post">
        <div class="content">
            <p>Blue Tshirt<input type="number" name="products[Blue Tshirt]" id=""></p>
            <p>Red Tshirt <input type="number" name="products[Red Tshirt]" id=""></p>
            <p>Yellow Tshirt <input type="number" name="products[Yellow Tshirt]" id=""></p>
        </div>
        <button type="submit">Add</button>
        <br><br>
        <ul>
            <li><a href="01jumper.php">Jumper</a></li>
            <li><a href="01jeans.php">Jeans</a></li>
            <li><a href="result.php">Result</a></li>
        </ul>
    </form>
    <form action="" method="post">
        <button type="submit" name="delete_session">Delete session variables</button>
    </form>
    <br><br>
    <form action="" method="post">
        <button type="submit" name="next">Next</button>
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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['products'])) {
            $tshirt = $_POST['products'];
            $tshirt_filter = array_filter($tshirt, function ($quantity) {
                return (int)$quantity > 0;
            });
            $_SESSION['tshirt'] = $tshirt_filter;

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
        }
    }

    if (isset($_POST['next'])) {
        header('Location: 01jumper.php');
    }
    ?>
</body>

</html>