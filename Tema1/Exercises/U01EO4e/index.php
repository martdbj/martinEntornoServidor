
<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  



<h2>SQRT numbers</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <input type="text" name="number" id="">
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $number = $_POST["number"];
  echo "<h2>The SQRT of your number:</h2>";
  if ($number < 0 ) {
    header("Location: blank.html");
  }
  echo pow($number, 2);
}
?>

</body>
</html>