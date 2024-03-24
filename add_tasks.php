<?php
session_start();
//include 'database.php'; // we will use this later if database is needed
?>
<!DOCTYPE html>
<html>
    <head>
      //css and js links
    </head>

    <body>
      <form action="process_task.php" method="POST"> // this form will be submitted to process_task.php
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" required><br><br>
        
        <label for="task_description">Task Description:</label>
        <textarea id="task_description" name="task_description" required></textarea><br><br>
        
        <input type="submit" value=s"Create Task">
      </form>

    </body>