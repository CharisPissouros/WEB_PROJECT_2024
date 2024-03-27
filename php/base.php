<?php
//database connection.

// Read the JSON file
$jsonData = file_get_contents('/path/to/your/json/file.json');

// Parse the JSON data
$data = json_decode($jsonData, true);

// Access the JSON data
// Example: Print the value of a specific key
echo $data['key'];

// Rest of your HTML code goes here

?>

<html>



</html>
