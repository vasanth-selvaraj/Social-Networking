<?php
    include 'db.php';

    if(isset($_POST['register']))
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
		$sql1 = "SELECT * FROM register WHERE username='$user' AND email='$email'";
		$result1 = mysqli_query($conn, $sql1);
		if (mysqli_num_rows($result1) === 0) {
			$sql = "INSERT INTO register(username,email,pass) VALUES('$user','$email','$pass')";
		
		$result = mysqli_query($conn, $sql);
		
        
        if ($result === TRUE) {
            echo "<script>window.location='./index.php';</script>"; 
		}
            
		}
		else{
			echo "<div class='alert alert-danger'><strong>Username or email already taken</strong></div>";
			

		}
		
    }
?>