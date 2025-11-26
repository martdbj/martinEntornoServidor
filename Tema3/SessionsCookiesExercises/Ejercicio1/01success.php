<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserPage</title>
</head>
<body>
    <h1>UserPage</h1>
    <form action="01success.php" method="post">
        <button type="submit" name="Logout">No eres tú?</button>
    </form>
    <?php 
    if (isset($_COOKIE["username"])) {
        $username = $_COOKIE["username"];
        echo '<p>Hello ' . $username . " nice to see you again </p>";
    } else {
        echo '<p>Something bad happened</p>';
    }

    if (isset($_POST['Logout'])) {
        setcookie("username", "", time() - 3600, "/");
        header("Location: 01form.php");
    }
    ?>
</body>
</html>  