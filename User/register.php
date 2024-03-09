<?php
require './function/sendmail.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- FavIcon -->
    <link rel="shortcut icon" type="image/x-icon" href="../admin/assets/img/favi.png">
    <link rel="stylesheet" href="../User/css/login.css">
    <!-- Sweet Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>LOCUS | Connect With Us...</title>
</head>
<style>
input.invalid {
    border: 2px solid red;
}
</style>

<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="../User/img/carousel-2.jpg" alt="">
            </div>
            <div class="back" id="flip">
                <img class="backImg" src="../User/img/carousel-2.jpg" alt="">
            </div>
        </div>
        <div class="forms">
            <div class="form-content" style="margin-left: 18px ;">
                <div class="login-form">
                    <div class="title">Register </div><br>
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

                    <!-- Registration Form..... -->
                    <form action="function/authcode.php" onsubmit="return validateForm()" id="myForm" method="post">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="uname" id="uname" placeholder="Enter your name"
                                    oninvalid="setCustomValidity('Please enter a valid name')"
                                    onblur="setCustomValidity('')" oninput="validateName()">
                            </div>
                            <div class="text-danger" id="error-name"></div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" id="email" placeholder="Enter your email"
                                    oninvalid="setCustomValidity('Please enter a valid Email ID')"
                                    onblur="setCustomValidity('')" oninput="validateEmail()">
                            </div>
                            <!-- <span onclick="call_php_function()">Send Otp</span> -->

                        </div>
                        <div class="text-danger" id="error-email"></div>
                        <div class="input-box">
                            <i class="fa fa-phone"></i>
                            <input type="text" name="mno" id="mno" placeholder="Enter your phone number"
                                oninvalid="setCustomValidity('Please enter a valid 10-digit phone number')"
                                onblur="setCustomValidity('')" oninput="validateMobile()">
                        </div>
                        <div class="text-danger" id="error-mobile"></div>

                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" id="password" minlength="8"
                                placeholder="Enter your password" oninvalid="setCustomValidity('Please enter Password')"
                                onblur="setCustomValidity('')" oninput="validatePassword()">
                        </div>
                        <div class="text-danger" id="password-error"></div>
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="cpassword" minlength="8" id="cpassword"
                                placeholder="Enter your Confrim password"
                                oninvalid="setCustomValidity('Please enter Confirm Password')"
                                onblur="setCustomValidity('')" oninput="confirmPassword()">
                        </div>
                        <div class="text-danger" id="error-cpassword"></div>
                        <br>
                        <input type="checkbox" id="terms-checkbox" oninput="validateTerms()" name="terms-checkbox">
                        <label class="text-dark">I agree to the <a href="term.php"> terms and conditions </a></label>
                        <div id="error-terms" class="text-danger"></div>


                        <div class="button input-box">
                            <input type="submit" onclick="myFunction()" name="reg_btn" value="Registration">
                        </div>
                        <div class="text sign-up-text">Already have an account? <a style="color: #E0A96D;"
                                href="login.php">Login Now</a>
                        </div>
                </div>
                </form>

                <?php if (isset($_SESSION['alert'])){?> 
    <script>
        Swal.fire({
                icon: '<?php echo $_SESSION["alert"]["0"] ?>',
                title: '<?php echo $_SESSION["alert"]["1"] ?>',
                text: '<?php echo $_SESSION["alert"]["2"] ?>',
                footer: '<a href="<?php echo $_SESSION["alert"]['4'] ?>"><?php echo $_SESSION["alert"]["3"] ?></a>'
        })
    </script>
    <?php } 
        unset($_SESSION['alert']);
    ?>
            </div>
        </div>
    </div>
    </div>

    <script>
    

    function myFunction() {
        document.getElementById("uname").required = true;
        document.getElementById("email").required = true;
        document.getElementById("mno").required = true;
        document.getElementById("password").required = true;
        document.getElementById("cpassword").required = true;
        document.getElementById("terms-checkbox").required = true;
    }

    function validatePassword() {
        var password = document.getElementsByName('password')[0].value;
        var errorMessage = document.getElementById('password-error');

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
        var nameInput = document.getElementById("uname");
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
        var errorMessage = document.getElementById("error-mobile");

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

    function confirmPassword() {
        var passwordInput = document.getElementById("password");
        var confirmPasswordInput = document.getElementById("cpassword");
        var password = passwordInput.value.trim();
        var confirmPassword = confirmPasswordInput.value.trim();
        var errorMessage = document.getElementById("error-cpassword");

        if (confirmPassword === "") {
            errorMessage.innerHTML = "Confirm password field cannot be empty";
            // confirmPasswordInput.class.add("invalid");
            return false;
        } else if (password !== confirmPassword) {
            errorMessage.innerHTML = "Passwords do not match";
            // confirmPasswordInput.class.add("invalid");
            return false;
        } else {
            errorMessage.innerHTML = "";
            // confirmPasswordInput.class.remove("invalid");
            return true;
        }
    }

    function validateTerms() {
        var termsCheckbox = document.getElementById("terms-checkbox");
        var errorMessage = document.getElementById("error-terms");

        if (!termsCheckbox.checked) {
            errorMessage.innerHTML = "You must agree to the terms and conditions";
            // termsCheckbox.classList.add("invalid");
            return false;
        } else {
            errorMessage.innerHTML = "";
            // termsCheckbox.classList.remove("invalid");
            return true;
        }
    }

    function validateForm() {
        // Call all validation functions
        var isNameValid = validateName();
        var isEmailValid = validateEmail();
        var isMobileValid = validateMobile();
        var isPasswordValid = validatePassword();
        var isConfirmPasswordValid = confirmPassword();
        var isTermsValid = validateTerms();

        // Check if all validation functions returned true
        if (isNameValid && isEmailValid && isMobileValid && isPasswordValid && isConfirmPasswordValid && isTermsValid) {
            // All validation functions passed, submit the form
            return true;
        } else {
            // At least one validation function failed, prevent form submission
            return false;
        }
    }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>