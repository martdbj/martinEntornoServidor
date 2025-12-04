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
    $lendBooks = fopen("lendBooks", "w+");
    $finalLend = new DOMDocument();

    $books = $booksLibrary->getElementsByTagName("libro");
    foreach ($books as $book) {
        $status = $book->getElementsByTagName("estado");
        foreach ($status as $stat) {
            if ($stat->nodeValue == "libre") {
                $finalLend->appendChild($book);
            }
        }
    }

    file_put_contents("lendBooks.xml", $finalLend->saveHTML());
    ?>

    <form action="library.php" method="post">
        <select name="lendBooks[]" multiple>
        <?php
        foreach ($books as $book) {
            $status = $book->getElementsByTagName("estado");
            foreach ($book as $tag) {
                if ($stat->nodeValue == "libre") {
                    $name = $book -> getElementsByTagName("name");
                    foreach ($name as $nam) {
                        echo '<option value="${$nam->nodeValue}">${nam->nodeValue}</option>';
                    }
                    
                }
            }
        }
        ?>
        </select>
        <button name="lendBooks">Lend</button>
    </form>


    <?php
    ?>

</body>

</html>