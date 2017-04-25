<?php
session_start();
function checkLogin(){
    if (isset($_SESSION["logat"])) {
        return true;   
    }
    return false;
}

function protect_page() {
    if (checkLogin() == false) {
        header('Location: login.php');
        exit();
    }
}

function logout(){
    if( checkLogin()==true ) {
        session_destroy();
        header("Location: index.php?message=Successfully logouted");
    }
}

function userExist( $name ){
    global $conn;
    $sql = "SELECT count(id) FROM `twusers` WHERE username='".$name."'";
    $rezult = $conn->query($sql);
    $rezult = $rezult->fetch_assoc();
    if( $rezult['count(id)'] == 1 )
        return true;
    else return false;
}

function getIdByUsername($name){
    global $conn;
    if(userExist($name)) {
        $sql = "SELECT id FROM `twusers` WHERE username='" . $name . "'";
        $rezult = $conn->query($sql);
        $rezult = $rezult->fetch_assoc();
        return $rezult["id"];
    }
    else return false;
}
?>