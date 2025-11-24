<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserPage</title>
</head>

<body>
    <h1>UserPage</h1>
    <?php
    if (isset($_COOKIE["username"])) {
        $username = $_COOKIE["username"];

        if (isset($_COOKIE['favourite-' . $username])) {
            $favouriteCookie = $_COOKIE['favourite-' . $username];
            $favouriteUserElements = explode(",", $favouriteCookie);
            
            foreach ($favouriteUserElements as $userElement) {
                echo '<p value="' . $userElement . '">' . $userElement . '</p>';
            }
        }
    } else {
        echo '<p>Something bad happened</p>';
    }
    ?>

    <form action="" method="post">
        <select name="colores[]" id="" multiple>
            <option value="RTX-2080">RTX2080</option>
            <option value="Ryzen-7-9950x3D">Ryzen 7 9950x3D</option>
        </select>
        <br><br>
        <button name="sendFavourites">Send favourites</button>
        <br>
        <button name="deleteFavourites">Delete favourites</button>
    </form>
    <br>
    <form action="01success.php" method="post">
        <button type="submit" name="deleteCookie">No eres tú?</button>
    </form>

    <?php
    if (isset($_POST['deleteCookie'])) {
        setcookie("username", $username, time() - 3600, "/");
        header("Location: 01form.php");
    }

    if (isset($_POST['sendFavourites'])) {
        if (isset($_POST['colores'])) {
            $username = $_COOKIE["username"];
            $selected = implode(",", $_POST['colores']);

            if (isset($_COOKIE['favourite-' . $username])) {
                $favouriteCookie = $_COOKIE['favourite-' . $username];
                $favouriteUserElements = explode(",", $favouriteCookie);
                
                foreach ($favouriteUserElements as $userElement) {
                    if (!(in_array($userElement, $_POST['colores']))) { 
                        $selected .= "," . $userElement;
                    }
                }
            }

            setcookie("favourite-" . $username, $selected, time() + 3600, "/");
            header("Refresh:0");
        }
    }

    if (isset($_POST['deleteFavourites'])) {
        if (isset($_POST['colores'])) {
            $username = $_COOKIE["username"];
            
            if (isset($_COOKIE['favourite-' . $username])) {
                $favouriteCookie = $_COOKIE['favourite-' . $username];
                $favouriteUserElements = explode(",", $favouriteCookie);
                $favouriteUserCount = count($favouriteUserElements);

                for ($i = 0; $i < $favouriteUserCount; $i++) {
                    if (in_array($favouriteUserElements[$i], $_POST['colores'])) {
                        unset($favouriteUserElements[$i]);
                    }
                }
            }
            $selected = implode(",", $favouriteUserElements);

            setcookie("favourite-" . $username, $selected, time() + 3600, "/");

            header("Refresh:0");
        }
    }
    ?>
</body>
</html>