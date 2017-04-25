<?php
/**
 * Created by PhpStorm.
 * User: Boca
 * Date: 21.04.2017
 * Time: 10:26
 */
$error = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Insert questions
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<header class="header">
    <a href="index.php" class="button"> Home </a>
</header>


<div>
    <center>
        <form method="post" class="page">
            <div>
                <input type="file" name="image" class="input">
            </div>
            <div>
                <input type="text" name="actorName" placeholder="Name of the person" class="input">
            </div>
            <div>
                <textarea name="description" placeholder="Description of the actor (hint)" cols="40" rows="4" class="input"></textarea>
            </div>

            <p class="error"> <?php
                foreach ($error as $err)
                    echo $err . "<br>";
                ?>
            </p>
            <button type="submit" name="upload" value="Save" class="login">Post</button>
        </form>
    </center>
</div>

</body>
</html>

