<?php
//database connection.

// Read the JSON file
$jsonData = file_get_contents('/path/to/your/json/file.json');

// Parse the JSON data
$data = json_decode($jsonData, true);

// Access the JSON data
// Example: Print the value of a specific key
//echo $data['key'];

// Connect to the database
include "get_from_database.php"; //path 

// Iterate through the JSON data and insert into the database
foreach ($data as $item) {
    $id = $item['id'];
    $name = $item['name'];
    $category = $item['category'];

    // Add more keys as needed

    // Prepare the SQL statement
    $sql = "INSERT INTO base (product_id, product_name,product_category) VALUES ('$id','$name','$category)";
    

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }

    foreach ($data as $item) {
        $detail_name = $item['detail_name'];
        $detail_value = $item['detail_value'];
        $category = $item['category'];
    
        
        // Prepare the SQL statement
        $sql = "INSERT INTO details (detail_name , detail_value) VALUES ('$detail_name','$detail_value')";
        
    
        
        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>

<html>
    <!-- Your HTML code here -->
</html>