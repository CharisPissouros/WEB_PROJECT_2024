<?php
//connection with database
include ("get_from_database.php"); //path

// Read the JSON file
$jsonData = file_get_contents('http://usidas.ceid.upatras.gr/web/2023/export.php');

// Parse the JSON data
$data = json_decode($jsonData, true);

// Access the items
$items = $data['items'];

// Iterate through the JSON data and insert into the database
foreach ($items as $product) {
    $id = $product['id'];
    $name = $product['name'];
    $category = $product['category'];

    // Prepare the SQL statement
    $sql_data = "INSERT INTO products (product_id, product_name,product_category) VALUES ('$id','$name','$category')";    

    // Execute the SQL statement
    if ($connection->query($sql_data) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $connection->error;
    }


    // Iterate through the JSON data and insert into the database
    foreach ($product['details'] as $detail) {
        $detail_name = $detail['detail_name'];
        $detail_value = $detail['detail_value'];
   
        // Prepare the SQL statement
        $sql_details = "INSERT INTO product_details (product_id , detail_name, detail_value) VALUES ('$id', '$detail_name', '$detail_value')";
        
    
        
        // Execute the SQL statement
        if ($connection->query($sql_details) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . $connection->error;
        }
    }
}
// Close the database connection
$connection->close();
?>