<?php

include_once "ConnectDatabase/DBConnect.php";
include_once "readers/Display.php";
include_once "readers/Students.php";

$display = new Display();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $display->delete("students", $id);
}
$array = $display->getAll("students");
$arr = [];
foreach ($array as $item) {
    $students = new Students();
    $students->setId($item['id']);
    $students->setName($item['name']);
    $students->setBirthday($item['birthday']);
    $students->setEmail($item['email']);
    $students->setPhone($item['phone']);
    array_push($arr, $students);
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
<h1>Library Manager</h1>
<hr>
<table>
    <tr>
        <td><u><a href="">Home</a></u></td>
        <td><u><a href="displayBooks.php">Books</a></u></td>
        <td><u><a href="displayStudents.php">Reader</a></u></td>
        <td><u><a href="">Borrow books</a></u></td>
        <td><u><a href="Authors/displayAuthor.php"></a></u></td>
        <td><u><a href="Category/display.php">Categories</a></u></td>

    </tr>

</table>
<hr>
<table border="2">
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>BirthDay</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>

    <?php foreach ($arr as $key => $student): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $student->getName() ?></td>
            <td><?php echo $student->getBirthday() ?></td>
            <td><?php echo $student->getPhone() ?></td>
            <td><?php echo $student->getEmail() ?></td>
            <td><span><a id="a" href="displayStudents.php?id=<?php echo $student->getId() ?>">Xóa</a></span>
                <span><a id="b" href="readers/update.php?id=<?php echo $student->getId() ?>">Sửa</a></span>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="addNewStudent.php">+Add new</a>
</body>
</html>
