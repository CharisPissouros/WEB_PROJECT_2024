<?php
include("get_from_database.php");
//check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {








}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Announcement</title>
</head>
<body>
    <h2>Create a New Announcement</h2>
    <form method="POST" action="announmcement.php">

    <label for="title">Number of announcment:</label>
    <input type="text" name="Number of announcment" id="Number of announcment" required><br><br>

    
    <label for="title">Title:</label>
    <input type="text" name="Title" id="Title" required><br><br>

    <label for="description">Description:</label>
    <textarea id="Description" name="Description" required></textarea><br><br>
    
    <label for="products_select">Select Products <br></label>
        <select id="products" name="products[]" multiple required>
            <!-- Products showing here using AJAX (JQUERY) -->
        </select><br><br>

        <input type="submit" value="Create Announcement">
        
    </form>
</body>
</html>


