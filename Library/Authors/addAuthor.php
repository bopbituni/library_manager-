<?php
include_once "../ConnectDatabase/DBConnect.php";
include_once "Authors.php";
include_once "../readers/Display.php";

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
    <table>
        <tr>
            <td>Name :</td>
            <td><input type="text" placeholder="New Name ..." name="authorName"></td>
        </tr>
        <tr>
            <td>Id :</td>
            <td>
                <input type="number" placeholder="input id..." name="authorId">
            </td>
        </tr>
        <tr>
            <td>
                <button>Save</button>
            </td>
        </tr>
    </table>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['authorName'])) {
        $author = $_POST['authorName'];
        $id = $_POST['authorId'];
        $display = new Display();
        $authors = new Authors();

        $authors->setName($author);
        $authors->setId($id);
        $data = [
            "id" => $authors->getId(),
            "name" => $authors->getName()
        ];

        $display->insert("authors", $data);
    } else {
        echo "Không được để trống";
    }


    header("Location: http://localhost/TaskEight/Library/Authors/displayAuthor.php");

}

?>
</body>
</html>
