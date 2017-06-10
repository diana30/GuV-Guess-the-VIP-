<?php
include "core/database/connection.php";
include "core/users.php";
protect_page();
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
        <ul>
            <li class="user"> username: <?php echo getNameById($_SESSION["logat"]); ?> </li>
            <li class="user"> intrebari raspunse: <?php echo getQuestion($_SESSION["logat"]); ?> </li>
            <li class="user"> scor : <?php echo getScore($_SESSION["logat"]); ?> puncte</li>
            <li class="user"> Te aflii pe locul <?php echo getUserRank($_SESSION["logat"]) ?>.</li>
        </ul>
    </div>
</div>

</body>
</html>