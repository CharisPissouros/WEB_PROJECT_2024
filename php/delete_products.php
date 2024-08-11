<?php
include("get_from_database.php");

if($_SERVER['REQUEST_METHOD'] == "GET")
{
        $name = $_GET['product_name'];
        $query = "SELECT * FROM products WHERE product_name = '$name'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0)
        {
            $query = "DELETE FROM products WHERE product_name = '$name'";
            mysqli_query($connection, $query);
            echo "Product Deleted.";
        }
        else {
            echo "Product Not Found!";
        }
        //An den iparxi sto products table psaxnoume sto product_details gt mpori na theloume mono diagrafi product_detail kai oxi olokliro proion
       /* if (mysqli_num_rows($result) == 0)
        {
            $query = "SELECT * FROM product_details WHERE detail_name = '$name'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
            $query = "DELETE FROM product_details WHERE detail_name = '$name'";
            mysqli_query($connection, $query);
            }
        }
        else 
        {
            $query = "SELECT product_category_id FROM products WHERE product_name = '$name'";
            $result = mysqli_query($connection, $query);
            if ($row = mysqli_fetch_assoc($result)) {
                $id = $row['product_category_id'];
                $query = "SELECT * FROM product_detail WHERE detail_id = '$id'";
                $result = mysqli_query($connection, $query);
                //An den iparxi sto products_detial table diagrafoume mono to product apo to table products alios diagrafoume kai ta details pou to aforoun
                if ($row = mysqli_fetch_assoc($result))
                {
                    $query = "DELETE FROM product_details WHERE product_id = '$id'";
                    mysqli_query($connection, $query);
                    echo "Details of the product deleted.";
                    $query = "DELETE FROM products WHERE product_name = '$name'";
                    mysqli_query($connection, $query);
                    echo "Product deleted.";
                }
                else {
                    $query = "DELETE FROM products WHERE product_name = '$name'";
                    mysqli_query($connection, $query);
                    echo "Product deleted.";
                }
            }
            else {
                die("Product not found!: " . mysqli_error($connection));
            }
        } */
        header("refresh:3; url=./admin_main_page.php");
}
?>