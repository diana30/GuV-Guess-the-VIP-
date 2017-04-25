<?php

include "core/database/connection.php";
include "core/users.php";
$err = array();
if (isset($_POST["curPass"]) && isset($_POST["password"]) && isset($_POST["repassword"])) {
    $curPass = $_POST["curPass"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];
    $id = $_SESSION["logat"];
	echo $id;
    $curPass = $conn->real_escape_string($curPass);
    $password = $conn->real_escape_string($password);
    $repassword = $conn->real_escape_string($repassword);

    $sql = "SELECT password FROM `twusers` WHERE id = $id";
    $oldPass = $conn->query($sql);
    while ($row = $oldPass->fetch_assoc()) {
        $pass = $row["password"];
    }
    if( $pass != $curPass ){
        array_push($err, "Current password wrong");
    }else if ($password == $repassword) {
        if (strlen($password) < 6)
            array_push($err, "Your password is too short");
        else {
            $sql = " UPDATE `twusers` SET password = '$password' WHERE id = $id ";
            $conn->query($sql);
            header("Location: user.php?message=Password changed");
        }
    } else array_push($err, "Passwords don't match");
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
    <a href="user.php" class="button"> Home </a>
</header>

<form action="changePass.php" method="POST" class="page">
    <input class="input" type="password" placeholder="Current password" name="curPass"><br>
    <input class="input" type="password" placeholder="New Password" name="password"><br>
    <input class="input" type="password" placeholder="Repeat Password" name="repassword"><br>
    <p class="error"> <?php
        foreach ($err as $error)
            echo $error . "<br>";
        ?>
    </p>
    <button class="login"> Change</button>
</form>

</body>
</html>
