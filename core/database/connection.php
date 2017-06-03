<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "twproject";
$conn = new mysqli($servername, $username, $password, $database);
if (!$conn) {
    die('Connection error: ' . mysqli::error());
}
return $conn;
?>