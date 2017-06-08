<?php
require_once "../database/connection.php";
include "../users.php";

if ( isset($_POST['id']) )
    useHint($_POST['id']);
?>