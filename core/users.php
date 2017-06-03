<?php
session_start();
function checkLogin()
{
    if (isset($_SESSION["logat"])) {
        return true;
    }
    return false;
}

function protect_page()
{
    if (checkLogin() == false) {
        header('Location: login.php');
        exit();
    }
}

function logout()
{
    if (checkLogin() == true) {
        session_destroy();
        header("Location: index.php?message=Successfully logouted");
    }
}

function userExist($name)
{
    global $conn;
    $sql = "SELECT count(id) FROM `twusers` WHERE username='" . $name . "'";
    $rezult = $conn->query($sql);
    $rezult = $rezult->fetch_assoc();
    if ($rezult['count(id)'] == 1)
        return true;
    else return false;
}

function getIdByUsername($name)
{
    global $conn;
    if (userExist($name)) {
        $sql = "SELECT id FROM `twusers` WHERE username='" . $name . "'";
        $rezult = $conn->query($sql);
        $rezult = $rezult->fetch_assoc();
        return $rezult["id"];
    } else return false;
}

function getNameById($id)
{
    global $conn;
    $sql = "SELECT username FROM `twusers` WHERE id='" . $id . "'";
    $rezult = $conn->query($sql);
    $rezult = $rezult->fetch_assoc();
    return $rezult['username'];
}

function getQuestion($id)
{
    global $conn;
    $sql = "SELECT question FROM `twusers` WHERE id='" . $id . "'";
    $rezult = $conn->query($sql);
    $rezult = $rezult->fetch_assoc();
    return $rezult['question']-1;
}

function getScore($id)
{
    global $conn;
    $sql = "SELECT score FROM `twusers` WHERE id='" . $id . "'";
    $rezult = $conn->query($sql);
    $rezult = $rezult->fetch_assoc();
    return $rezult['score'];
}

function getUserRank($id)
{
    global $conn;
    $sql = "SELECT id,score FROM `twusers` ORDER by 2 desc";
    $rezult = $conn->query($sql);
    $place = 0;
    while ($row = $rezult->fetch_assoc()) {
        if($row['id']!= $id)
            $place ++;
        else return $place+1;
    }
    return $place+1;
}

?>