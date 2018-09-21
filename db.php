<?php
$servername = "localhost";
$dbname = "userdata";
$username = "root";
$password = "";
$conn = mysqli_connect($servername,$username,$password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>