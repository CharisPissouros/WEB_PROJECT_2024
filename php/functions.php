<?php

function login_sessions($connection)
{
    //If already login
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from user where user_id = '$id'";
        $result = mysqli_query($connection, $query);
        if ($result && mysqli_num_rows($result) === 1)
        {
            $user = mysqli_fetch_assoc($result);
            return $user;
        }
    }
    else
    {
        //Not already login -> goto login.php
        header("Location: login.php");
        exit;
    }
    
}
?>