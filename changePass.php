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
    <a href="changePass.php" class="button"> Change Password </a>
</header>

<form action="register.php" method="POST"  class="page">
    <input class="input" type="password" placeholder="Curent Password" name="curPass"><br>
    <input class="input" type="password" placeholder="New Password" name="password"><br>
    <input class="input" type="password" placeholder="Repeat Password" name="repassword"><br>
    
    <button class="login"> Register</button>
</form>

</body>
</html>