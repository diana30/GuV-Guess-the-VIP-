<?php
require_once "core/database/connection.php";
include "core/users.php";
$load = $_POST['load'] * 10;
$qry = "SELECT username, score FROM `twusers` WHERE usertype != 'admin' ORDER BY 2 DESC LIMIT " . $load . ",10";
$result = $conn->query($qry);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (getNameById($_SESSION["logat"]) == $row["username"])
            echo '<li class="rankLi message">'.$row["username"] . '  ' . $row["score"].' puncte</li>';
        else
            echo '<li class="rankLi">'.$row["username"] . '  ' . $row["score"].' puncte</li>';
    }
}
?>