<html>
    <title>Project</title>
    <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="index.css" rel="stylesheet" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(function() {

$('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
     $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});
$('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
     $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});
});
</script>
</head>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form"  method="post" action="./index.php" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="login" id="login" tabindex="4" class="form-control btn btn-register" value="Login">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a  tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="./index.php" onSubmit="return validate()" method="post" role="form" name ="register" style="display: none;">
									<div class="form-group">
										<input type="text" name="username"pattern:"^[A-Za-z0-9_]{8,15}" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" pattern="[\w.%+-]+@bitsathy\.ac\.in" oninvalid="setCustomValidity('Enter Bitsathy E-mail ID ')"
                                        onchange="try{setCustomValidity('')}catch(e){}" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="cpassword" id="confirm_password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit"  name="register" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
            function validate()
            {
                var pas = document.forms["register"]["password"].value;
                var cpas = document.forms["register"]["cpassword"].value;
                var uname = document.forms["register"]["username"].value;

				if(uname.length < 8 )
				{
					alert('Username must be greater than 8 and lessthan 15 characters');
					
					return false;
				}
				
               
                if(pas.length < 8)
                {
                    alert('Password must be atleat 8 characters long.');
                    document.forms["register"]["password"].focus();
                    return false;   
                }
                if(pas === cpas)
                {
                    return true;
                }
                else
                {
                    alert('Passwords Mismatch');
                    document.forms["register"]["cpassword"].focus();
                    return false;
                }
            }
        </script>
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
            echo "<div class='alert alert-success'><strong>Success!</strong></div><script>window.location='./newsfeed.html';</script>";
		}
		else{
			echo "<div class='alert alert-danger'><strong>Username Password Incorrect</strong></div>";
		}
    }
?>
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

    