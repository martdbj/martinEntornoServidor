<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
$nombre=$_POST["nombre"];
$pass=$_POST["pass"];

if (($nombre == "martin") && ($pass == "martin")) {
    # code...
    echo "Welcome th our site!";
} else {
    header("Location: index.html", true, 301);
}
?>
</body>
</html>