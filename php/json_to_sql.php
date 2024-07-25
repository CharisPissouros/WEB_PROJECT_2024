<?php
include("get_from_database.php");

function url(){
    // Read the JSON file
    $jsonData = file_get_contents('http://usidas.ceid.upatras.gr/web/2023/export.php');

    // Parse the JSON data
    $data = json_decode($jsonData, true);

    json_to_sql($data);
}

function upload($file){
    // Read the JSON file
    //['tmp_name'] = The temporary filename of the file in which the uploaded file was stored on the server.
    $jsonData = file_get_contents($file['tmp_name']);

    // Parse the JSON data
    $data = json_decode($jsonData, true);

    json_to_sql($data);
}

//JSON File From URL
function json_to_sql($data){
    global $connection;

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
            //echo "Product inserted successfully. <br>";
            $succesfull_status = true;
        } else {
            //echo "Error inserting product: " . $connection->error . "<br>";
            $succesfull_status = false;
        }


        // Iterate through the JSON data and insert into the database
        foreach ($product['details'] as $detail) {
            $detail_name = $detail['detail_name'];
            $detail_value = $detail['detail_value'];
    
            // Prepare the SQL statement
            $sql_details = "INSERT INTO product_details (product_id , detail_name, detail_value) VALUES ('$id', '$detail_name', '$detail_value')";
            
        
            
            // Execute the SQL statement
            if ($connection->query($sql_details) === TRUE) {
                //echo "Detail inserted successfully. <br>";
                $succesfull_status = true;
            } else {
                //echo "Error inserting detail: " . $connection->error . "<br>";
                $succesfull_status = false;
            }
        }
    }
    
    if ($succesfull_status){
        $_SESSION['status'] = "Json was succesfully loaded to SQL table";
        echo "Json was succesfully loaded to SQL table . <br>";
    }
    else{
        $_SESSION['status'] = "Json failed to load to database";
        echo "Json failed to load to database . <br>";
    }
    // Close the database connection
    $connection->close();
}
?>