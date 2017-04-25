<?php
/**
 * Created by PhpStorm.
 * User: Boca
 * Date: 19.04.2017
 * Time: 13:29
 */
?>
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
    <a href="index.php"><button class="button">Logout</button></a>
</header>
<div class="color">
<div class="page">
	<center><h3>Guess The star</h3><center>
   <form>
	   <img src="index1.jpg"></img>
	   <span class="scor">Your score: 10</span>
	   <br>
	   <span class="hit">Do you need a hit?</span>
	   </br>
	   <label>
	   <span class="corect">You guest corect!Guess this one</span>
	   </br>
	  Insert the actor`s name: <input type="text"name="username"></input>
	   </label>
	   <button>OK</button>
   </form>
</div>
</div>

</body>
</html>
