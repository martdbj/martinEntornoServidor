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
    <h4>Lend</h4>
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
    <br>
    <button name="lendBooksButton">Lend</button>
    <br>
    <h4>Return</h4>
    <select name="returnBooks[]" multiple>
        <?php
        $books = $booksLibrary->getElementsByTagName("libro");
        foreach ($books as $book) {
            $status = $book->getElementsByTagName("estado");
            foreach ($status as $stat) {
                if ($stat->nodeValue == "prestado") {
                    $name = $book->getElementsByTagName("titulo");
                    foreach ($name as $nam) {
                        echo '<option value="' . $nam->nodeValue . '">' . $nam->nodeValue . '</option>';
                    }
                }
            }
        }
        ?>
    </select>
    <br>
    <button name="returnBooksButton">Return</button>
    <br>
    <h4>Add Book</h4>
    <label for="name">Name: </label>
    <input type="text" name="name" >
    <br>
    <label for="isbn">ISBN: </label>
    <input type="text" name="isbn" >
    <br>
    <label for="autor">Autor: </label>
    <input type="text" name="autor" >
    <br>
    <label for="editorial">Editorial: </label>
    <input type="text" name="editorial" >
    <br>
    <label for="anio_edicion">Año edición: </label>
    <input type="number" name="anio_edicion" >
    <br>
    <button name="addBookButton">Add</button>
    <br>
    <h4>Delete</h4>
    <label for="isbnD">ISBN</label>
    <input type="number" name="isbnD">
    <br>
    <button name="deleteBookButton">Delete</button>
</form>


<?php
// Main program
if (isset($_POST['lendBooksButton'])) {
    if (isset($_POST['lendBooks'])) {
        $selected = $_POST['lendBooks'];
        lendBook($selected);
        header('Refresh: 0');
    }
}

if (isset($_POST['returnBooksButton'])) {
    if (isset($_POST['returnBooks'])) {
        $selected = $_POST['returnBooks'];
        returnBook($selected);
        header('Refresh: 0');
    }
}

if (isset($_POST['addBookButton'])) {
    $name = $_POST['name'];
    $isbn = $_POST['isbn'];
    $author = $_POST['autor'];
    $edit = $_POST['editorial'];
    $edit_year = $_POST['anio_edicion'];
    addBook($name, $isbn, $author, $edit, $edit_year);
    header('Refresh: 0');
}

if (isset($_POST['deleteBookButton'])) {
    if (isset($_POST['isbnD'])) {
        $isbn = $_POST['isbnD'];
        removeBook($isbn);
    }
}
?>

<?php
// Main Functions (Lend, Return, Add, Remove)
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
        $status = $book->getElementsByTagName("estado");

        foreach ($name as $nam) {
            if (in_array($nam->nodeValue, $selectedBooks)) {
                if (!isset($book->fecha_devolucion)) {
                    $book->appendChild($booksLibrary->createElement("fecha_devolucion", $dateString));

                    foreach ($status as $stat) {
                        $replace = $booksLibrary->createElement('estado', 'prestado');
                        $book->replaceChild($replace, $stat);
                    }
                }
            }
        }
    }
    file_put_contents("biblioteca.xml", $booksLibrary->saveXML());
}

function returnBook($selectedBooks)
{
    $booksLibrary = new DOMDocument();
    $booksLibrary->load("biblioteca.xml");

    $books = $booksLibrary->getElementsByTagName("libro");
    foreach ($books as $book) {
        $name = $book->getElementsByTagName("titulo");
        $status = $book->getElementsByTagName("estado");

        foreach ($name as $nam) {
            if (in_array($nam->nodeValue, $selectedBooks)) {
                // Remove fecha_devolucion from a returned book
                $fecha_devolucion = $book->getElementsByTagName("fecha_devolucion");
                foreach ($fecha_devolucion as $fecha) {
                    $book->removeChild($fecha);
                }

                foreach ($status as $stat) {
                    $replace = $booksLibrary->createElement('estado', 'libre');
                    $book->replaceChild($replace, $stat);
                }
            }
        }
    }
    file_put_contents("biblioteca.xml", $booksLibrary->saveXML());
}

function addBook($name, $isbn, $author, $edit, $edit_year) {
    $booksLibrary = new DOMDocument();
    $booksLibrary->load("biblioteca.xml");

    $generos = $booksLibrary->getElementsByTagName('genero');

    foreach($generos as $gen) {
        $libro = $booksLibrary->createElement('libro');
        $gen->appendChild($libro);

        $bookName = $booksLibrary->createElement('titulo', $name);
        $libro->appendChild($bookName);

        $bookISBN = $booksLibrary->createElement('isbn', $isbn);
        $libro->appendChild($bookISBN);

        $bookAuthor = $booksLibrary->createElement('autor', $author);
        $libro->appendChild($bookAuthor);

        $bookEdit = $booksLibrary->createElement('editorial', $edit);
        $libro->appendChild($bookEdit);

        $bookEditYear = $booksLibrary->createElement('anio_edicion', $edit_year);
        $libro->appendChild($bookEditYear);

        $lend = $booksLibrary->createElement("estado", "libre");
        $libro->appendChild($lend);
    }

    file_put_contents("biblioteca.xml", $booksLibrary->saveXML());
}
// Remove books by ISBN
function removeBook($isbn) {
    $booksLibrary = new DOMDocument();
    $booksLibrary->load("biblioteca.xml");

    $books = $booksLibrary->getElementsByTagName("libro");
    $books = $booksLibrary->getElementsByTagName("libro");
    foreach ($books as $book) {
        $bookISBN = $book->getElementsByTagName("isbn");
        $bookStatus = $book->getElementsByTagName("estado");

        if ($bookISBN->item(0)->nodeValue == $isbn && $bookStatus->item(0)->nodeValue == "libre") {
            $book->parentNode->removeChild($book);
        }
    }
    file_put_contents("biblioteca.xml", $booksLibrary->saveXML());
}
?>
</body>
</html>