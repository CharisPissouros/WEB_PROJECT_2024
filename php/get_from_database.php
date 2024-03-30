<?php 
if ($server["REQUEST METHOD" ] == "GET"||"POST"||"PUT"||"DELETE" ){ // μπορει να μην χρειαζεται το DELETE και το PUT.

    $servername = "localhost"; // πρεπει να γινει update με το Localhost της βασης 
    $username = "root"; //πρεπει να γινει update με το username της βασης 
    $password = "1234";  //πρεπει να γινει Update με τον κωδικο της βασης
    $dbname = "database_for_web";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

?>