<html>
    <title>Project</title>
    <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="index.css" rel="stylesheet" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
</html>
 <?php
    include 'db.php';

    if(isset($_POST['login']))
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM register WHERE username='$user' AND pass='$pass'";

        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            echo "<div class='alert alert-success'><strong>Success!</strong></div><script>window.location='./newsfeed.php';</script>";
		}
		else{
			echo "<div class='alert alert-danger'><strong>Username Password Incorrect</strong></div>";
		}
    }
?>