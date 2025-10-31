<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="01jumper.php" method="post">
        <div class="content">
            <select name="jeans" id="">
                <option value="none" selected></option>
                <option value="Blue Jeans">Blue Jeans</option>
                <option value="Red Jeans">Red Jeans</option>
                <option value="Yellow Jeans">Yellow Jeans</option>
            </select>
        </div>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
    <ul>
        <li><a href="01tshirt.php">Tshirts</a></li>
        <li><a href="01jumper.php">Jumper</a></li>
        <li><a href="result.php">Result</a></li>
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
            if (isset($_POST['tshirt'])) {
                $tshirts = $_POST['tshirt'];
                $_SESSION["tshirt"] = $_POST['tshirt'];
            }
        }
        foreach ($_SESSION as $key => $value) {
            print_r($_SESSION);
            foreach ($value as $tshirt) {
                if ($_POST)
                echo "<p>" . $tshirt . "</p>";
            }
        }
    }
    ?>
</body>

</html>