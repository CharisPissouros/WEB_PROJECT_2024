<?php
    session_start();
    include("get_from_database.php");
    include("functions.php");
    $user = login_sessions($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indexnig</title>
    <style>
        @import "../css/general_css.css";
    </style>
</head>
<body>
    <h1>Welcome to the main admin page.</h1>
    <br><br>
    Hello, <?php echo $user['username'];?>
    <br><br>
    <a href="logout.php">Logout</a>
</body>
</html>