<?php
    session_start();
    include("get_from_database.php");
    include("functions.php");


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "select * from user where username = '$username'";
        $result = mysqli_query($connection, $query);
        if ($result && mysqli_num_rows($result) > 0)
        {
            $user = mysqli_fetch_assoc($result);
            if ($user['password'] === $password)
            {
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: index.php");
                exit;
            }
        }
        else
        {
            echo "Wrong Information!";
        }
        
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
    <div id="LogIn">
        <h1>Log In Form</h1>   
        <form method="post">
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
        <a href = "signup.php">Create Account</a><br><br>
    </div>
</body>
</html>