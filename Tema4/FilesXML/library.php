<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The library</title>
</head>

<body>
<h1>Library</h1>

<?php
$booksLibrary = new DOMDocument();
$booksLibrary->load("biblioteca.xml");

// Lend boook
// Identify what books are not borrwoed to allow them to be selected

$finalLend = new DOMDocument();

$root = $finalLend->createElement('availableBooks');
$finalLend->appendChild($root);

$books = $booksLibrary->getElementsByTagName("libro");
foreach ($books as $book) {
    $status = $book->getElementsByTagName("estado");
    foreach ($status as $stat) {
        if ($stat->nodeValue == "libre") {
            $availableBook = $finalLend->importNode($book, true);
            $root->appendChild($availableBook);
        }
    }
}

file_put_contents("lendBooks.xml", $finalLend->saveHTML());
?>

<form action="library.php" method="post">
    <select name="lendBooks[]" multiple>
        <?php
        $books = $booksLibrary->getElementsByTagName("libro");
        foreach ($books as $book) {
            $status = $book->getElementsByTagName("estado");
            foreach ($status as $stat) {
                if ($stat->nodeValue == "libre") {
                    $name = $book->getElementsByTagName("titulo");
                    foreach ($name as $nam) {
                        echo '<option value="' . $nam->nodeValue . '">' . $nam->nodeValue . '</option>';
                    }
                }
            }
        }
        ?>
    </select>
    <button name="lendBooksButton">Lend</button>
</form>


<?php
if (isset($_POST['lendBooksButton'])) {
    if (isset($_POST['lendBooks'])) {
        $selected = $_POST['lendBooks'];
        lendBook($selected);
    }
}

?>

<?php
function lendBook($selectedBooks)
{
    $booksLibrary = new DOMDocument();
    $booksLibrary->load("biblioteca.xml");

    $date = new DateTime();
    $date->modify('+2weeks');
    $dateString = $date->format('d-m-Y');

    $books = $booksLibrary->getElementsByTagName("libro");
    foreach ($books as $book) {
        $name = $book->getElementsByTagName("titulo");
        foreach ($name as $nam) {
            if (in_array($nam->nodeValue, $selectedBooks)) {
                $book->appendChild($booksLibrary->createElement("fecha_devolucion", $dateString));
            }
        }
    }
    file_put_contents("biblioteca.xml", $booksLibrary->saveXML());
}
?>
</body>

</html>