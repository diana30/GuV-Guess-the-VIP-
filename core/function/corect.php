<?php
require_once "../database/connection.php";

var_dump($_POST['id']);
var_dump($_POST['actorName']);

$q_id = getQuestion($_POST["id"]);
$sql = "SELECT * FROM `twimage` WHERE id = " . $q_id;
var_dump($sql);
$result = $conn->query($sql);
$result = $result->fetch_assoc();
$error = array();
if (isset($_POST["actorName"])) {
    $actorName = $_POST["actorName"];
    if (strtolower($actorName) ===  strtolower($result["actorName"])) {
        $sql = "UPDATE `twusers` SET score = score + 10, question = question + 1 WHERE id = " . $_POST["id"];
        $conn->query($sql);
        $sql = "INSERT INTO `wrong`(`user_id`, `photo_id`) VALUES ( " . $_POST["id"] . "," . $result['id'] + 1 . " )";
        $conn->query($sql);
        array_push($error, "Good job<br>");
    } else {
        $sql = "UPDATE `twusers` SET score = score - 5 WHERE id = " . $_POST["id"];
        $conn->query($sql);
        $sql = "UPDATE `wrong` SET `errors`= `errors`-1 WHERE user_id = " . $_POST["id"] . " AND photo_id =" . $result['id'];
        $conn->query($sql);
        array_push($error ,"Wrong !<br> Try again<br>");
    }
}
?>
