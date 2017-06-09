<?php
include "core/database/connection.php";
include "core/users.php";

$q_id = getQuestion($_SESSION["logat"]);
$sql = "SELECT * FROM `twimage` WHERE id = " . $q_id;
$result = $conn->query($sql);
$result = $result->fetch_assoc();
$error = array();
if (isset($_POST["actorName"])) {
    $actorName = $_POST["actorName"];
    if (strtolower($actorName) ===  strtolower($result["actorName"])) {
        array_push($error, "<p class='message'>Good job</p><br>");
        $sql = "UPDATE `twusers` SET score = score + 10, question = question + 1 WHERE id = " . $_SESSION["logat"];
        $conn->query($sql);
        $sql = "INSERT INTO `wrong`(`user_id`, `photo_id`) VALUES ( " . $_SESSION["logat"] . "," . $result['actorName'] + 1 . " )";
        $conn->query($sql);
        $q_id = getQuestion($_SESSION["logat"]);
        $sql = "SELECT * FROM `twimage` WHERE id = " . $q_id;
        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
    } else {
        array_push($error ,"<p class='message'>Wrong !</p>");
        $sql = "UPDATE `twusers` SET score = score - 5 WHERE id = " . $_SESSION["logat"];
        $conn->query($sql);
        $sql = "UPDATE `wrong` SET `errors`= `errors`-1 WHERE user_id = " . $_SESSION["logat"] . " AND photo_id =" . $q_id;
        $conn->query($sql);
        $sql = "SELECT * FROM `wrong` WHERE user_id = " . $_SESSION["logat"] . " AND photo_id =" . $q_id;
        $res = $conn->query($sql);
        $res = $res->fetch_assoc();
        if ( $res["errors"] == 0 ){
            $sql = "UPDATE `twusers` SET question = question + 1 WHERE id = " . $_SESSION["logat"];
            $conn->query($sql);
            $sql = "INSERT INTO `wrong`(`user_id`, `photo_id`) VALUES ( " . $_SESSION["logat"] . "," . $result['actorName'] + 1 . " )";
            $conn->query($sql);
            $q_id = getQuestion($_SESSION["logat"]);
            $sql = "SELECT * FROM `twimage` WHERE id = " . $q_id;
            $result = $conn->query($sql);
            $result = $result->fetch_assoc();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Index
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <script src="js/jquery.js"></script>
</head>
<body id="question">

<header class="header">
    <a href="index.php" class="button"><b>Logout</b></a>
    <a href="user.php" class="button"><b>Home</b></a>
</header>
<div class="color">
    <div class="page" >
        <center>
            <h3>Guess The star</h3>
            <form action="game.php" method="POST">
                <?php
                $image = "<img  class=\"image\" src=image/" . $result["image"] . " />";
                echo $image; ?>
                <br>
                <?php $hint = $result["description"] ?>
                <p class="hint" onclick="hint('<?php echo $hint ?>',<?php echo $_SESSION["logat"]?>)"><b>Hint</b></p>
                    <?php
                    if (count($error)!=0)
                        echo $error[0];
                    ?>
                <input type="text" class="actorName" placeholder="Insert the actor`s name:" name="actorName"/>
                <br>
                <button class="submit">OK</button>
            </form>
        </center>
    </div>
</div>
<script type="text/javascript">
        function hint(text, userId ) {
        var result = confirm( "O sa ti se scada 5 puncte.\nEsti sigur?");
        if ( result == true ) {
            alert(text);
            console.log(userId);
            $.ajax({
                url: "core/function/hint.php",
                method: "POST",
                data: {id: userId},
                success: function (data) {}
            });
        }
        }
</script>
</body>
</html>
