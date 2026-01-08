<form action="Menu.php" method="post">
    <button name="deleteFootwear">Delete FootWear</button>
    <button name="insert">Insert Trousers</button>
    <button name="load">Load Tshirt</button>
    <button name="modify">Modify Footwear</button>
    <button name="register">Register Outfit</button>
</form>

<?php
if (isset($_POST['deleteFootwear'])) {
    header('Location: DeleteFootwear01.php');
}

if (isset($_POST['insert'])) {
    header('Location: InsertTrousers.php');
}

if (isset($_POST['load'])) {
    header('Location: LoadTshirt01.php');
}

if (isset($_POST['modify'])) {
    header('Location: ModifyFootwear01.php');
}

if (isset($_POST['register'])) {
    header('Location: RegisterOutfit.php');
}
?>