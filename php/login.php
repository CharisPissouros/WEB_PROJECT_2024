<?php
    session_start();
    //Ginete to connection me database kai meso tou functions gnorizi pios user ine sindedemenos.
    include("get_from_database.php");
    include("functions.php");

    //Me Post pernis ta stoixeia tis formas. Pio asfales apo get afou me get fenontai ta stoixia sto URL.
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {   //Dimiourgia php metavliton 
        $username = $_POST['username'];
        $password = $_POST['password'];
        //epeksigisi sto signup
        $query = "select * from user where username = '$username'";
        $result = mysqli_query($connection, $query);
        //if result was executed successfull and rows > 1 (i kalo tha itan = 1 efoson den iparxi user me idia stixia)kane login
        if ($result && mysqli_num_rows($result) > 0)
        {   //fetch entoli sql i opia metaferi stin metavliti $user ola ta apotelesmata tou query mas. Giafto meta mporoume na xrisimopiisoume px $user['password']
            $user = mysqli_fetch_assoc($result);
            //elexos an dothike sosto password
            if ($user['password'] === $password)
            {   //Thetoume ta stixia sta session
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role'] = $user['role'];
                //Elegxoume to role gia na kseroume se pio main page na katefthinthoume.
                if ($_SESSION['role'] === "admin")
                {
                    header("Location: admin_main_page.php");
                    exit;
                }
                elseif ($_SESSION['role'] === "user")
                {
                    header("Location: index.php");
                    exit;
                }
                elseif ($_SESSION['role'] === "diasostis")
                {
                    header("Location: diasostis_main_page.php");
                    exit;
                }
            }
        }
        else
        {
            echo "Wrong Information! Try again.";
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