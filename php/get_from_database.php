<?php 
    $servername = "localhost"; // πρεπει να γινει update με το Localhost της βασης 
    $dbusername = "root"; //πρεπει να γινει update με το username της βασης 
    $dbpassword = "1234";  //πρεπει να γινει Update με τον κωδικο της βασης
    $dbname = "web_project2024";

    $connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
?>