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

//Vriskoume to product_category_id gia autofill ton paromion products
function find_product_category_id($connection, $product_name){
    $query = "SELECT product_category_id FROM products WHERE product_name = '$product_name'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result)) {
            $product_category_id = $row['product_category_id'];
        }
    }
    return $product_category_id;
}
?>