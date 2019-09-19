<?php
include "../ConnectDatabase/DBConnect.php";
include "Display.php";
include "Students.php";
$id = $_GET['id'];

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
<h1>Edit Customer!</h1>
<hr>
<form method="post">
    <table border="2">
        <tr>
            <td>NewName :</td>
            <td><input type="text" placeholder="new fucking name..." name="newname"></td>
        </tr>
        <tr>
            <td>NewPhone :</td>
            <td><input type="number" placeholder="new fucking phone..." name="newphone"></td>
        </tr>
        <tr>
            <td>NewEmail :</td>
            <td><input type="text" placeholder="new fucking email..." name="newemail"></td>
        </tr>
    </table>
    <button>Xác Nhận</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['newname']) && !empty($_POST['newphone']) && !empty($_POST['newemail'])) {
        $nName = $_POST['newname'];
        $nPhone = $_POST['newphone'];
        $nEmail = $_POST['newemail'];

        $display = new Display();
        $student = new Students();


        $student->setName($nName);

        $student->setPhone($nPhone);

        $student->setEmail($nEmail);

        $data = [
            'name = "'. $student->getName().'"',
            'phone = "'.$student->getPhone().'"',
            'email= "'.$student->getName().'"'
        ];
        $display->update("students", $data, $id);

        header("Location: http://localhost/TaskEight/Library/displayStudents.php");


    }
}
?>
</body>
</html>