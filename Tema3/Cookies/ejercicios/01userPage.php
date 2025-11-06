<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome</h1>
    <?php
    $validUsers = ["Pepe", "Carla", "Samuel"];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userName = $_POST['username'];
        if (in_array($userName, $validUsers)) {
            echo "Welcome " . $userName;
            setcookie("username", $userName, time() + 5000);
        } else {
            header("Location: 01userLog.php");
        }
    }
    ?>
</body>
</html>