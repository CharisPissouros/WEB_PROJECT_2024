<?php

session_start();

include("get_from_database.php");

//Find all products for the form
$query = "SELECT * FROM products";
$result = mysqli_query($connection, $query);
$products=[];

if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}

echo json_encode($products);
?>