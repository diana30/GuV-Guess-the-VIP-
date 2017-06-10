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
        header('Location: index.php');
        exit();
    }
}

function logged_in_redirect()
{
    if (checkLogin() === true) {
        header("Location: user.php");
        exit();
    }
}

function admin_page($name)
{
    global $conn;
    $sql = "SELECT COUNT(id) FROM `twusers` WHERE username = '" . $name . "' AND usertype = 'admin'";
    $rezult = $conn->query($sql);
    $rezult = $rezult->fetch_assoc();
    if ($rezult['COUNT(id)'] == 1)
        return true;
    else return false;
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
    return $rezult['question'];
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
        if ($row['id'] != $id)
            $place++;
        else return $place + 1;
    }
    return $place + 1;
}

function useHint($id)
{
    global $conn;
    $sql = "UPDATE `twusers` SET score = score - 5 WHERE id = " . $id;
    $conn->query($sql);
}


?>