<?php
include_once "../ConnectDatabase/DBConnect.php";
include_once "../readers/Display.php";
include_once "Authors.php";

$display = new Display();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $display->delete("authors", $id);
}
$array = $display->getAll("authors");

$arr = [];
foreach ($array as $key => $item) {
    $authors = new Authors();
    $authors->setId($item['id']);

    $authors->setName($item['name']);
    array_push($arr, $authors);
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
<h1>Author Information</h1>
<hr>
<table>
    <tr>
        <td><u><a href="">Home</a></u></td>
        <td><u><a href="../displayBooks.php">Books</a></u></td>
        <td><u><a href="../displayStudents.php">Reader</a></u></td>
        <td><u><a href="">Borrow books</a></u></td>
        <td><u><a href="displayAuthor.php">Author</a></u></td>
        <td><u><a href="../Category/display.php">Categories</a></u></td>

    </tr>

</table>
<hr>

<table border="2">
    <tr>
        <th>STT</th>
        <th>Name</th>
        <!--            <th>Image</th>-->
    </tr>
    <?php foreach ($arr as $key => $author) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $author->getName() ?></td>
            <td><a href="displayAuthor.php?id=<?php echo $author->getId() ?>">Xóa</a></td>
            <td><a href="update.php?id=<?php echo $author->getId() ?>">Sửa</a></td>
            <!--                <td>--><?php //echo $author->getImage() ?><!--</td>-->
        </tr>

    <?php endforeach; ?>
</table>
<a href="addAuthor.php">+Add</a>
</body>
</html>
