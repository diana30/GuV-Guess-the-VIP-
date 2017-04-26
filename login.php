<?php
include "core/database/connection.php";
include "core/users.php";
if (checkLogin() == true)
    header("Location: user.php");
else {
    $err = array();

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);

        $sql = " SELECT count(id), usertype FROM `twusers` WHERE username='" . $username . "' and password = '" . $password . "'";
        $rezult = $conn->query($sql);
        $rezult = $rezult->fetch_array();
        if ($rezult['count(id)'] == 1) {
            if( $rezult['usertype'] == "admin" ){
                $id = getIdByUsername($username);
                $_SESSION["logat"] = $id ;
                header("Location: adminInsert.php ");
            }
            else {
                $id = getIdByUsername($username);
                $_SESSION["logat"] = $id ;
                header("Location: user.php ");
            }
        } else array_push($err, "Username or password incorect");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Login
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<header class="header">
    <a href="register.php" class="button">Register</a>
    <a href="index.php" class="button"> Home </a>
</header>


<div>
    <form action="" method="post" class="page">

        <input class="input" type="text" placeholder="Usernane" name="username"><br>
        <input class="input" type="password" placeholder="Password" name="password"><br>
        <p class="error"> <?php
            foreach ($err as $error)
                echo $error . "<br>";
            ?>
        </p>
        <button class="login"> Login</button>
    </form>
</div>

</body>
</html>