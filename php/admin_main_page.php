<?php
    session_start();
    include("get_from_database.php");
    include("functions.php");
    $user = login_sessions($connection);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        //Check if username exists
        $query = "select * from user where username = '$username'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0)
        {
             echo "Username: $username already exists! Try a different one.";
        }
        else 
        {
            //Username acceptable.
            $role = 'diasostis';
            $query = "insert into user (username, password, role) values ('$username', '$password', '$role')";
            mysqli_query($connection, $query);
            echo "Neo melos diasosti!";
        }
        
    }

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
    <div id="signup">
    <h2>Eggrafi neou diasosti</h1>   
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
    <a href="logout.php">Logout</a>
</body>
</html>