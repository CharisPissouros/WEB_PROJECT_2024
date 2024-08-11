<?php
include("get_from_database.php");

if($_SERVER['REQUEST_METHOD'] == "GET")
{
        $name = $_GET['product_name'];
        $category = $_GET['product_category'];
        //Check if product exists
        $query = "select * from products where product_name = '$name'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0)
        {
            echo "Product: $name already exists! Try a different one.";
        }
        else 
        {
            //Product acceptable.
            $query = "select product_category_id from products where product_category_name = '$category'";
            $result = mysqli_query($connection, $query);
            if ($row = mysqli_fetch_assoc($result)) {
                $id = $row['product_category_id'];
            }
            else {
                $id='';
            }
            $query = "insert into products (product_name, product_category_name, product_category_id) values ('$name', '$category', '$id')";
            if (mysqli_query($connection, $query)) {
                echo "Prostethike Neo Proion stin Vasi!";
            } else {
                die("Apotixia Prosthikis Proiontos: " . mysqli_error($connection));
            }
        }
        header("refresh:3; url=./admin_main_page.php");
}
?>