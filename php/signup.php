<?php
    session_start();
    include("get_from_database.php");
    include("functions.php");


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = "politis";
        $query = "insert into user (username, password, role) values ('$username', '$password', '$role')";
        mysqli_query($connection, $query);
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import "../css/general_css.css";
    </style>
</head>
<body>
    <div id="signup">
    <h1>Sign Up Form</h1>   
    <form method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <br>
        <br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <br>
        <br>
        <input type="submit" id="login" name="Log In">
    </form>
    <br><br>
    <a href = "login.php">Log In</a><br><br>
    </div>
</body>
</html>
