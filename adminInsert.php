<?php
require_once "core/database/connection.php";
include "core/users.php";
$error = array();

if (admin_page( getNameById($_SESSION["logat"])) == false)
    header("Location: user.php");
else {
    if (isset($_POST['upload'])) {
        $isImage = true;
        $imageFileType = pathinfo("image/" . basename($_FILES['image']['name']), PATHINFO_EXTENSION);
        $image = $_FILES['image']['name'];
        $allowed = array('gif', 'png', 'jpg', 'jpeg');
        $actorName = $_POST['actorName'];
        $description = $_POST['description'];
        if (!in_array($imageFileType, $allowed)) {
            $isImage = false;
        }
        if (($description == true) && ($isImage == true)) {
            move_uploaded_file($_FILES['image']['tmp_name'], "image/" . $_FILES["image"]["name"]);
            $query = $conn->query("INSERT INTO `twimage` (actorName, description, image) VALUE ('$actorName', '$description','$image' )");
            header('Location: adminInsert.php?Succesfull insert!');
        } else {
            array_push($error, " You need to insert a <b>image</b>");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Insert photo
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<header class="header">
    <a href="logout.php" class="button"> Logout </a>
    <a href="adminRegister.php" class="button"> Register </a>
    <a href="user.php" class="leftButton"> Home </a>
</header>


<div>
    <center>
        <form method="POST" class="page" enctype="multipart/form-data">
            <div>
                <input type="file" name="image" class="input">
            </div>
            <div>
                <input type="text" name="actorName" placeholder="Name of the person" class="input">
            </div>
            <div>
                <textarea name="description" placeholder="Description of the actor (hint)" cols="1000" rows="4" class="input"></textarea>
            </div>

            <p class="error"> <?php
                foreach ($error as $err)
                    echo $err . "<br>";
                ?>
            </p>
            <button type="submit" name="upload" value="Save" class="login">Post</button>
        </form>
    </center>
</div>

</body>
</html>