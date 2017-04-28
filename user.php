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
    <a href="game.php" class="leftButton"><b>Let's play!</b></a>
    <a href="rank.php" class="leftButton"><b>Rank</b></a>
    <a href="logout.php" class="button"><b>Logout</b></a>
    <a href="changePass.php" class="button"><b>Change Password</b></a>
</header>
<div class="color">
    <div class="page">
		<p class="message"> <b><?php if (isset($_GET['message'])) echo $_GET['message']; ?> </b></p>
        <ul>
        <li class="user"> username: test </li>
        <li class="user"> intrebari raspunse: 4 </li>
        <li class="user"> scor :  12 puncte</li>
        <li class="user"> Te afli pe locul 10.</li>
        </ul>
    </div>
</div>

</body>
</html>