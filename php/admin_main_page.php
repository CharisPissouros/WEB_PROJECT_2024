<?php
    session_start();
    include("get_from_database.php");
    include("functions.php");
    include("json_to_sql.php");
    $user = login_sessions($connection);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(isset($_POST["username"]) && isset($_POST["password"])){
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
        } elseif (isset($_POST['load_json_from_url'])){
            url(); 
        } elseif (isset($_FILES['json_file'])){
            $file = $_FILES['json_file'];
            upload($file);
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
        h2 {
            text-align: center;
        }
    </style>
    
</head>
<body>
    <h1>Welcome to the main admin page.</h1>
    <br><br>
    Hello, <?php echo $user['username'];?>
    <br><br>
    <div id="signup">
    <!-- Sign Up Diasosti Form -->
    <h2>Eggrafi neou diasosti</h2>   
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
    </div>
    <br><br>

    <div id="load_json">
    <!-- Load JSON From Url -->
    <h2>Load Json File From Url</h2>
    <form method="POST">
        <input type="submit" name="load_json_from_url" value="Load JSON From URL">
    </form>
    </div>

    <br><br>
    <div id="upload_json">
    <!-- Upload JSON form -->
    <h2>Upload a JSON File</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="json_file">JSON File</label>
        <input type="file" id="json_file" name="json_file" required>
        <br><br>
        <input type="submit" value="Upload JSON">
    </form>
    </div>
    <a href="logout.php">Logout</a>
</body>
</html>