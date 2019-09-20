<?php
include_once "Books.php";
include_once "../readers/Display.php";
include_once "../ConnectDatabase/DBConnect.php";
include_once "../Category/Categories.php";
include_once "../Authors/Authors.php";

$display = new Display();
$array = $display->getAll("books");
$arr = [];
foreach ($array as $key => $item) {
    $books = new Books();
    $books->setId($item['id']);
    $books->setName($item['name']);
    $books->setCategoryId($item['category_id']);
    $books->setAuthorId($item['author_id']);
    $books->setStatus($item['status']);
    array_push($arr, $books);
}
$category = new Categories();
$author = new Authors();
$category->getName();
$author->getName();

$idCate = $category->getId();
$idAu = $author->getId();


function Category()
{
    $display = new Display();
    $displayCategory = $display->connectTableAuthor("authors", "books", 1);
    foreach ($displayCategory as $item) {
        foreach ($item as $key => $value) {
            return $value;
        }
    }

}


function Author()
{
    $display = new Display();
    $displayAuthor = $display->connectTableCategory("categories", "books", 2);
    foreach ($displayAuthor as $item) {
        foreach ($item as $key => $value) {
            return $value;
        }
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Book Information</h1>
<hr>
<table>
    <tr>
        <td><u><a href="">Home</a></u></td>
        <td><u><a href="">Books</a></u></td>
        <td><u><a href="">Reader</a></u></td>
        <td><u><a href="">Borrow books</a></u></td>
        <td><u><a href="add.php">Add</a></u></td>
        <td><u><a href="">Categories</a></u></td>

    </tr>
</table>
<hr>
<table border="2">
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>AuthorName</th>
        <th>CategoryName</th>
        <th>Status</th>
    </tr>
    <?php foreach ($arr as $key => $book) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $book->getName() ?></td>
            <td><?php echo Category() ?></td>
            <td><?php echo Author() ?></td>

            <td><?php echo $book->status() ?></td>

        </tr>

    <?php endforeach; ?>
</table>
<a href="add.php">Add</a>
</body>
</html>
