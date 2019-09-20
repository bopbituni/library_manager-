<?php
include_once "../ConnectDatabase/DBConnect.php";
include_once "../readers/Display.php";
include_once "Authors.php";

$id =  $_GET['id'];
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
<form method="post">
    <table border="2">
        <tr>
            <td>New Name:</td>
            <td><input type="text" name="newname"></td>
            <td><button>Save</button></td>
        </tr>

    </table>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['newname'])) {
        $name = $_POST['newname'];

        $display = new Display();
        $author = new Authors();
        $author->setName($name);
        $data = [
            "name ='".$author->getName()."'"
        ];

        $display->update("authors", $data, $id);
        header('Location: http://localhost/TaskEight/Library/Authors/displayAuthor.php');
    }
}

?>
</body>
</html>