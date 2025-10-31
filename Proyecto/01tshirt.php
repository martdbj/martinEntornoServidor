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
    <input type="number" name="" id="">
    <form action="01tshirt.php" method="post">
        <div class="content">
            <p>Jeans 1 <input type="number" name="tshirt1" id=""></p>
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
            $_SESSION['tshirt'] = $_POST['tshirt'];
            $_SESSION['tshirt'] = $_POST['number'];
        }
    }
    ?>
</body>

</html>