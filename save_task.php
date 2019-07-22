<?php

include("db.php");

    if(isset($_POST['save_task'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        $query = "INSERT INTO task(title, description)
            values ('$title', '$description')";

        $result = mysqli_query($conn, $query);
        if (!$result){
            die("Query fail");
        }
        
        $_SESSION['message'] = 'Task Saved Succesfully fully';
        $_SESSION['color-message'] = 'success';

        header("Location: index.php");
    }
?>