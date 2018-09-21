<?php
    include 'db.php';

    $status = $_POST['s'];

    if(!$status)
    {
        echo "No status entered";
    }
    else 
    {
       mysqli_query($conn," INSERT INTO posts (post) VALUES('$status')");
    }

    
    
?>