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
    <a href="index.php" class="button">Logout
    </a>
    <a href="user.php" class="button"><b>Home</b></a>
</header>
<div class="color">
    <div class="page">
        <center>
            <h3>Guess The star</h3>
            <form>
                <img src="index1.jpg"/>
                <br>
                <a href="hint.php" class="hint"><b> Hint</b></a>
                <br>
                <label>
                    <span class="corect">You guest corect!Guess this one</span>
                    <br>
                    <input type="text" class="actorName" placeholder="Insert the actor`s name:" name="username"/>
                </label>
                <br>
                <button class="submit">OK</button>
            </form>
        </center>
    </div>
</div>

</body>
</html>
