<?php
    
    include 'db.php';

    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
        echo  $row['post'];echo "<br><hr>";
        //echo "<p>$status</p><br>";
    }
    
?>