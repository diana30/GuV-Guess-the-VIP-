<?php
include "core/database/connection.php"
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
    <a href="index.php" class="button"><b>Logout</b></a>
    <a href="user.php" class="button"><b>Home</b></a>
</header>
<div class="color">
    <div class="page">
        <center>
            <h3>Guess The star</h3>
            <form action="gameH.php">
                <img src="images.jpg"/>
                <br>
                <p> He played in "The Story of God" </p>
                <label>
                    <input type="text" class="actorName" placeholder="Insert the actor`s name:" name="username"/>
                </label>
                <br>
                <button class="submit">OK</button>
                <br>
                <a href="gameG.php">.</a> <a href="gameH.php">.</a> 
            </form>
            <center>
    </div>
</div>

</body>
</html>

