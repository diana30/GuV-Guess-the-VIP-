<?php

include "core/database/connection.php";
include "core/users.php";

$err = array();
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["repassword"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    $repassword = $conn->real_escape_string($repassword);

    if (userExist($username) == true)
        array_push($err, "Username arlready exist");
    if ($password == $repassword) {
        if (strlen($password) < 6)
            array_push($err, "Your password is too short");
        else {
            $sql = " INSERT INTO `twusers` (username,password) VALUES ( '$username','$password' )  ";
            $conn->query($sql);
            header("Location: index.php?message=Successfully registered");
        }
    }else array_push($err, "Passwords don't match");


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Register
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<header class="header">
    <a href="login.php" class="button">Login </a>
    <a href="index.php" class="button"> Home </a>
</header>

<form action="register.php" method="POST"  class="page">
    <input class="input" type="text" placeholder="Usernane" name="username"><br>
    <input class="input" type="password" placeholder="Password" name="password"><br>
    <input class="input" type="password" placeholder="Repeat Password" name="repassword"><br>
    <p class="error"> <?php
        foreach ( $err  as $error)
            echo $error . "<br>";
        ?>
    </p>
    <button class="login"> Register</button>
</form>

</body>
</html>