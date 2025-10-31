<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form action="result.php" method="post">
            <div class="content">
                <select name="jumpers" id="">
                    <option value="none" selected></option>
                    <option value="Blue Jumper">Blue Jumper</option>
                    <option value="Red Jumper">Red Jumper</option>
                    <option value="Yellow Jumper">Yellow Jumper</option>
                </select>
            </div>
            <br><br>
            <button type="submit">Enviar</button>
        </form>
        <ul>
            <li><a href="01tshirt.php">Tshirts</a></li>
            <li><a href="01jeans.php">Jeans</a></li>
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
                $_SESSION["jean"] = $_POST["jeans"];
            }
            foreach ($_SESSION as $key => $value) {
                echo "<p>" . $value . "</p>";
            }
        }
        ?>
    </body>

    </html>
</body>

</html>