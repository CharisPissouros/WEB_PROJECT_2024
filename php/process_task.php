<?php
include 'database.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $taskName = $_POST['task_name'];
    $taskDescription = $_POST['task_description'];

    // TODO: Process the task data and perform any necessary actions

    // Example: Save the task to a database
    // $dbHost = 'localhost';
    // $dbUser = 'username';
    // $dbPass = 'password';
    // $dbName = 'database_name';
    // $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    // if ($conn->connect_error) {
    //     die('Connection failed: ' . $conn->connect_error);
    // }
    // $sql = "INSERT INTO tasks (name, description) VALUES ('$taskName', '$taskDescription')";
    // if ($conn->query($sql) === TRUE) {
    //     echo 'Task saved successfully';
    // } else {
    //     echo 'Error: ' . $sql . '<br>' . $conn->error;
    // }
    // $conn->close();

    // TODO: Redirect the user to a success page or display a success message
    // header('Location: success.php');
    // exit;
  

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Process Task</title>
</head>
<body>
    <h1>Process Task</h1>
    <form method="POST" action="process_task.php">
        <label for="task_name">Task Name:</label>
        <input type="text" name="task_name" id="task_name" required><br><br>
        <label for="task_description">Task Description:</label>
        <textarea name="task_description" id="task_description" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>