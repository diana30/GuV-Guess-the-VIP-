<?php
include "core/database/connection.php";
include "core/users.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        User
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<header class="header">
    <a href="logout.php" class="button"><b>Logout</b></a>
    <a href="changePass.php" class="button"><b>Change Password</b></a>
    <a href="game.php" class="button"><b>Start game</b></a>
</header>
<div class="color">
    <div class="page">
		<p class="message"> <b><?php if (isset($_GET['message'])) echo $_GET['message']; ?> </b></p>
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