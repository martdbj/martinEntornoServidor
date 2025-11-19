<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserPage</title>
</head>
<body>
    <h1>UserPage</h1>
    <form action="02success.php" method="post">
        <button type="submit">No eres tú?</button>
    </form>
    <?php 
    if (isset($_COOKIE["username"])) {
        $username = $_COOKIE["username"];
        echo '<p>Hello ' . $username . '!';
        echo '<p>Last login ' . $_COOKIE['lastLogin'];
    } else {
        echo '<p>Something bad happened</p>';
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        setcookie("username", $username, time() - 3600, "/");
        setcookie("lastLogin", "", time() - 3600, "/");
        header("Location: 02form.php");
    }
    ?>
</body>
</html>