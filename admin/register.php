<?php
session_start();
include("config.php");

if (isset($_POST['insert'])) {
	$uname = $_POST['name'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$mno = $_POST['mno'];
	$password = $_POST['password'];
    $pattern = '/^[6-9]\d{9}$/';

	if (empty($email)) {
		$_SESSION['message'] = 'Email is required.';
		// $error = "Email is required.";
		header('Location: register.php');
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['message'] = 'Invalid email format';
		// $error = "Invalid email format";
		header('Location: register.php');
		exit();
	}
	if (empty($uname)) {
		$_SESSION['message'] = 'Name is required.';
		// $error = "Name is required.";
		header('Location: register.php');
		exit();
	}
	if (empty($mno)) {
		$_SESSION['message'] = 'Mobile is required.';
		// $error = "Mobile is required.";
		header('Location: register.php');
		exit();
	} else if (!preg_match($pattern, $mno)) {
		$_SESSION['message'] = 'Invalid Mobile number format [ 10 digit number valid ]';
		// $error = "Invalid Mobile number format [ 10 digit number valid ]";
		header('Location: register.php');
		exit();
	}
	if (empty($password)) {
		$_SESSION['message'] = 'Password is required.';
		// $error = "Password is required.";
		header('Location: register.php');
		exit();
	}


	$check_email = "select aid from admin where email='$email'";
	$check_email_run = mysqli_num_rows(mysqli_query($con, $check_email));
	if ($check_email_run > 0) {
		$_SESSION['message'] = "Email Already Exist";
		header('location: register.php');
	} else {
		$password = password_hash($password, PASSWORD_BCRYPT);
		$insert_user = "INSERT INTO `admin`(`name`, `password`, `email`, `mno`,`dob`) VALUES ('$uname','$password','$email','$mno','$dob')";
		$check = mysqli_query($con, $insert_user);
		if ($check) {
			$_SESSION['message'] = "Admin Register Successfully";
			header('location: index.php');
		} else {
			$_SESSION['message'] = " Please Fill all the Fields!";
			header('location: register.php');
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>LOCUS | Admin Register</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favi.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

	<!-- Main Wrapper -->
	<div class="page-wrappers login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">

					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Register</h1>
							<p class="account-subtitle">Access to our dashboard</p>
							<?php if (isset($_SESSION['message'])) {
							?>
								<div class="">
									<div class="alert alert-warning  alert-dismissible fade show" role="alert">
										<!-- <strong>Oops! </strong> -->
										<?= $_SESSION['message']; ?>.
									</div>
								</div>
							<?php
								unset($_SESSION['message']);
							}
							?>
							<!-- Form -->
							<form method="post" id="myForm" onsubmit="return validateForm()">
								<div class="form-group">
									<input class="form-control" type="text" name="name" id="name" placeholder="Enter your name" oninvalid="setCustomValidity('Please enter a valid name')" onblur="setCustomValidity('')" oninput="validateName()">
									<div class="text-danger" id="error-name"></div>
								</div>
								<div class="form-group">
									<input class="form-control" type="email" name="email" id="email" placeholder="Enter your email" oninvalid="setCustomValidity('Please enter a valid Email ID')" onblur="setCustomValidity('')" oninput="validateEmail()">
									<div class="text-danger" id="error-email"></div>
								</div>
								<div class="form-group">
									<input class="form-control" type="password" name="password" id="password" minlength="8" placeholder="Enter your password" oninvalid="setCustomValidity('Please enter Password')" onblur="setCustomValidity('')" oninput="validatePassword()">
									<div class="text-danger" id="error-password"></div>
								</div>
								<div class="form-group">
									<input class="form-control" type="date" placeholder="Date of Birth" name="dob" id="dob" minlength="8" oninvalid="setCustomValidity('Please enter Date of Birth')" onblur="setCustomValidity('')" oninput="validateDob()">
									<div class="text-danger" id="error-dob"></div>
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="mno" maxlength="10" id="mno" placeholder="Enter your phone number" oninvalid="setCustomValidity('Please enter a valid 10-digit phone number')" onblur="setCustomValidity('')" oninput="validateMobile()">
									<div class="text-danger" id="error-mno"></div>
								</div>
								<div class="form-group mb-0">
									<input class="btn btn-primary btn-block" type="submit" onclick="myFunction()" name="insert" Value="Register">
								</div>
							</form>
							<!-- /Form -->

							

							<div class="text-center dont-have">Already have an account? <a href="index.php">Login</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->
	<script>
		function myFunction() {
			document.getElementById("name").required = true;
			document.getElementById("email").required = true;
			document.getElementById("mno").required = true;
			document.getElementById("password").required = true;
			document.getElementById("dob").required = true;
		}

		function validatePassword() {
			var password = document.getElementsByName('password')[0].value;
			var errorMessage = document.getElementById('error-password');

			if (password.length < 8) {
				errorMessage.textContent = 'Password must be at least 8 characters  .';
			} else if (!/\d/.test(password)) {
				errorMessage.textContent = 'Password must contain at least one number.';
			} else if (!/[a-zA-Z]/.test(password)) {
				errorMessage.textContent = 'Password must contain at least one letter.';
			} else {
				errorMessage.textContent = '';
				return true;
			}
		}

		function validateName() {
			var nameInput = document.getElementById("name");
			var name = nameInput.value.trim();
			var errorMessage = document.getElementById("error-name");

			if (name == "") {
				errorMessage.innerHTML = "Name field cannot be empty";
				// nameInput.classList.add("invalid");
				nameInput.setAttribute("required", true); // Add required attribute
				return false;
			} else if (!/^[a-zA-Z ]+$/.test(name)) {
				errorMessage.innerHTML = "Name can only contain letters and spaces";
				// nameInput.classList.add("invalid");
				nameInput.removeAttribute("required"); // Remove required attribute
				return false;
			} else {
				errorMessage.innerHTML = "";
				// nameInput.classList.remove("invalid");
				nameInput.setAttribute("required", true); // Add required attribute
				return true;
			}
		}


		function validateEmail() {
			var emailInput = document.getElementById("email");
			var email = emailInput.value.trim();
			var errorMessage = document.getElementById("error-email");

			if (email == "") {
				errorMessage.innerHTML = "Email field cannot be empty";
				// emailInput.classList.add("invalid");
				return false;
			} else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
				errorMessage.innerHTML = "Please enter a valid email address";
				// emailInput.classList.add("invalid");
				return false;
			} else {
				errorMessage.innerHTML = "";
				// emailInput.classList.remove("invalid");
				return true;
			}
		}

		function validateMobile() {
			var mobileInput = document.getElementById("mno");
			var mobile = mobileInput.value.trim();
			var errorMessage = document.getElementById("error-mno");

			if (mobile == "") {
				errorMessage.innerHTML = "Mobile field cannot be empty";
				// mobileInput.classList.add("invalid");
				return false;
			} else if (!/^\d{10}$/.test(mobile)) {
				errorMessage.innerHTML = "Mobile number is invalid";
				// mobileInput.classList.add("invalid");
				return false;
			} else {
				errorMessage.innerHTML = "";
				// mobileInput.classList.remove("invalid");
				return true;
			}
		}

		function validateDob() {
			var dob = document.getElementById("dob").value;
			var currentDate = new Date();
			var dobDate = new Date(dob);
			var diffInMs = currentDate - dobDate;
			var diffInYears = diffInMs / (1000 * 3600 * 24 * 365.25);

			if (dob === "") {
				document.getElementById("error-dob").innerHTML = "Please enter a date of birth.";

				return false;
			}

			if (diffInYears < 18) {
				document.getElementById("error-dob").innerHTML = "You must be at least 18 years old.";

				return false;
			}
			document.getElementById("error-dob").innerHTML = "";

			return true;
		}

		function validateForm() {
			// Call all validation functions
			var isNameValid = validateName();
			var isEmailValid = validateEmail();
			var isMobileValid = validateMobile();
			var isPasswordValid = validatePassword();
			var isDobValid = validateDob();

			// Check if all validation functions returned true
			if (isNameValid && isEmailValid && isMobileValid && isPasswordValid && isDobValid) {
				// All validation functions passed, submit the form
				return true;
			} else {
				// At least one validation function failed, prevent form submission
				return false;
			}
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