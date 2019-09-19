<?php
include_once "ConnectDatabase/DBConnect.php";
include_once "readers/Students.php";
include_once "readers/Display.php";
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
            <td><input type="text" placeholder="add name..." name="name"></td>
        </tr>
        <tr>
            <td>Id :</td>
            <td><input type="number" placeholder="add id..." name="id_student"></td>
        </tr>
        <tr>
            <td>BirdthDay :</td>
            <td><input type="text" placeholder="add birthday..." name="birthday"></td>
        </tr>
        <tr>
            <td>Email :</td>
            <td><input type="text" placeholder="email ..." name="email"></td>
        </tr>
        <tr>
            <td>Phone :</td>
            <td><input type="text" placeholder="Your phone..." name="phone"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button>Save</button>
            </td>
        </tr>
    </table>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["name"]) && !empty($_POST['id_student']) && !empty($_POST['birthday']) && !empty($_POST['email'])) {
        $name = $_POST["name"];
        $id = $_POST['id_student'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $display = new Display();
        $student = new Students();

        $student->setName($name);
        $student->setBirthday($birthday);
        $student->setPhone($phone);
        $student->setId($id);
        $student->setEmail($email);


        $data = [
            "id" => $student->getId(),
            "name" => $student->getName(),
            "birthday" => $student->getBirthday(),
            "email" => $student->getEmail(),
            "phone" => $student->getPhone()
        ];
        $display->insert("students", $data);
        header("Location: http://localhost/TaskEight/Library/displayStudents.php");

    }
}
?>
</body>
</html>