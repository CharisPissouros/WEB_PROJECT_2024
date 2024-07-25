<?php
    session_start();
    include("get_from_database.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password']; 
        //Vazoume to sql line pou theloume se metavliti gia na tin kalesoume sto mysqli_query oste na ektelesti
        $query = "select * from user where username = '$username'";
        //mysqli_query vazoume to $connection pou antistixi sto server sql p apefthinomaste, kai me to $query stelnoume tin entoli sql pros ektelesi.
        //Tote to result exi ta apotelesmata tou query mas apo to database pou antistixi sto $connection (vlepe get_from_database gia connection).
        $result = mysqli_query($connection, $query);
        //an exoume 1+ grammes (apandisis) simeni oti iparxi o xristis ara den mporis na xrisimopoiisis ta idia stoixeia
        if (mysqli_num_rows($result) > 0){
            echo "Username: $username already exists! Try a different one.";
        }
        else 
        {
            //Username is acceptable.
            $role = "politis";
            //$query antistoixi se entoli sql pros ektelesi.
            $query = "insert into user (username, password, role) values ('$username', '$password', '$role')";
            //function gia enosi database kai ektelesi query
            mysqli_query($connection, $query);
            //meta tin ektelesi anakatefthinsi se login page.
            header("Location: login.php");
            exit;
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