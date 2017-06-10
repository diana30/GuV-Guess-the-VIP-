<?php
require_once "core/database/connection.php";
include "core/users.php";
protect_page();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Rank
    </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<nav class="header">
    <a href="game.php" class="leftButton"><b> Let's play </b></a>
    <a href="rank.php" class="leftButton"><b> Rank </b></a>

    <a href="logout.php" class="button"><b>Logout</b></a>
    <a href="user.php" class="button"><b>Home</b></a>
</nav>
<div class="color">
    <ol class="page">
        <?php
        $count = $conn->query("SELECT count(*) as nr from `twusers`");
        $count = $count->fetch_assoc();
        $number = $count['nr'];
        $query = "select username, score from `twusers` WHERE usertype != 'admin' order by score desc LIMIT 0,12";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (getNameById($_SESSION["logat"]) == $row["username"])
                    echo '<li class="message">' . $row["username"] . '  ' . $row["score"] . ' puncte</li>';
                else
                    echo '<li class="rankLi">' . $row["username"] . '  ' . $row["score"] . ' puncte</li>';
            }
        }
        ?>
    </ol>
</div>
<script src="js/jquery.js"></script>
<script type="text/javascript">
    $('.page').ready(function () {
        var load = 0;
        $(window).scroll(function () {
            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                load++;
                $.post("ajax.php", {load: load}, function (data) {
                    $('.page').append(data);
                });
            }
        });
    });
</script>
</body>
</html>
