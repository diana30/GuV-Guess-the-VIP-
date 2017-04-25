<?php
include "core/database/connection.php";
include "core/users.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Index
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<header class="header">
    <a href="register.php" class="button"><b>Register</b></a>
    <a href="login.php" class="button"><b>Login</b></a>
</header>

<div class="color">
    <div class="page">
		<p class="message"> <?php if (isset($_GET['message'])) echo $_GET['message']; ?> </p>
        <h1> Top 10 player</h1>
        <ol>
            <li>a</li>
            <li>b</li>
            <li>c</li>
            <li>d</li>
            <li>e</li>
            <li>f</li>
            <li>g</li>
            <li>g</li>
            <li>h</li>
            <li>i</li>
        </ol>
    </div>
</div>

</body>
</html>