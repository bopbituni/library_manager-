<?php
include_once "../ConnectDatabase/DBConnect.php";
include_once "Categories.php";
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
            <td><input type="text" placeholder="New Name ..." name="categoryName"></td>
        </tr>
        <tr>
            <td>Id :</td>
            <td>
                <input type="number" placeholder="input id..." name="categoryId">
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
    if (isset($_POST['categoryName'])) {
        $cate = $_POST['categoryName'];
        $id = $_POST['categoryId'];
        $display = new Display();
        $category = new Categories();

        $category->setName($cate);
        $category->setId($id);
        $data = [
            "id" => $category->getId(),
            "name" => $category->getName()
        ];

        $display->insert("categories", $data);
    } else {
        echo "Không được để trống";
    }


    header("Location: http://localhost/TaskEight/Library/Category/display.php");

}

?>
</body>
</html>
