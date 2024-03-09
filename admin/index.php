<?php 
	include("config.php");
	session_start();
	 
	if (isset($_POST['login'])) {
		$user = $_POST['user'];
		$inputPassword = $_POST['password'];
		
		$query = "SELECT password FROM `admin` WHERE name = '$user'";
		$result = mysqli_query($con, $query);
	
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			$storedHashedPassword = $row["password"];
	
			if (password_verify($inputPassword, $storedHashedPassword)) {
				$uname_query = "select * from admin where name ='$user'";
				$uname = mysqli_query($con, $uname_query);
				$_SESSION['auser']=$user;
				header("Location: dashboard.php");
				// header('location: register.php');


			} else {
				// $error='* Invalid User Name and Password';
			$_SESSION['message'] = "* Invalid User Name and Password";
				header('location: ./index.php');
			}
		} else {
			// $error="* Please Fill all the Fileds!";
			$_SESSION['message'] = "* Please Fill all the Fileds!";
			header('location: index.php');
		}
	}
	
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>LOCUS | Admin Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favi.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="page-wrappers login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								<?php if (isset($_SESSION['message'])) {
							?>
								<div class="">
									<div class="alert alert-warning  alert-dismissible fade show" role="alert">
										<!-- <strong>Oops! </strong> -->
										<?= $_SESSION['message']; ?>.
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
								</div>
							<?php
								unset($_SESSION['message']);
							}
							?>
								<!-- Form -->
								<form method="post">
									<div class="form-group">
										<input class="form-control" name="user" type="text" placeholder="User Name" id="user"   oninvalid="setCustomValidity('Please enter a valid Email ID')" oninput="setCustomValidity('')">
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="password" placeholder="Password" id="password" oninvalid="setCustomValidity('Please enter valid Password')" oninput="setCustomValidity('')">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block"  onclick="myFunction()" name="login" type="submit">Login</button>
									</div>
								</form>
								
							
								<!-- <div class="text-center dont-have">Don't have an account? <a href="register.php">Register</a></div> -->
								
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		<script>
        function myFunction() {
            document.getElementById("user").required = true;
            document.getElementById("password").required = true;
        }
    </script>
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

</html>