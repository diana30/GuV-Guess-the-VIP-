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
    <a href="login.php" class="button">Login </a>
    <a href="index.php" class="button"> Home </a>
</header>

<form class="page">
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