<?php
include "core/database/connection.php";
include "core/users.php";
logged_in_redirect();
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
    <a href="register.php" class="button"><b>Register</b></a>
    <a href="login.php" class="button"><b>Login</b></a>
</header>

<div class="color">
    <div class="page">
        <h1> Top 10 player</h1>
        <ol>
        <?php
        $query = "select username, score from `twusers` WHERE usertype != 'admin' order by 2 desc LIMIT 0,10 ";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<li>'.$row["username"] . '  ' . $row["score"].' puncte</li>';
            }
        }
        ?>
        </ol>

    </div>
</div>

</body>
</html>