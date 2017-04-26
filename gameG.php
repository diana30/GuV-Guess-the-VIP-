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
    <a href="index.php">
        <button class="button">Logout</button>
        <a href="user.php" class="button"><b>Home</b></a>
    </a>
</header>
<div class="color">
    <div class="page">
        <center>
            <h3>Guess The star</h3>
            <span class="gresit">Attempts left: 2! </span><br>
            <center>
                <form action="game1.php">
                    <img src="images.jpg"/>
                    <br>
                    <a href="hint.php" class="hint"><b> Hint</b></a>
                    </br>
                    <label>
                        <span class="gresit">You have guest wrong!Try again</span><br>
                        <span class="gresit">You have -2 points.</span><br>
                        </br>
                        <input type="text" class="actorName" placeholder="Insert the actor`s name:" name="username"/>
                    </label>
                    <br>
                    <button class="submit">OK</button>
                </form>
    </div>
</div>

</body>
</html>
