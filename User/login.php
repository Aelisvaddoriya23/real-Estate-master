<?php
    session_start();
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../User/css/login.css">

    <!-- FavIcon -->
    <link rel="shortcut icon" type="image/x-icon" href="../admin/assets/img/favi.png">
    <!-- Fontawesome CDN Link -->

    <!-- Sweet Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>WelCome To LOCUS | Login</title>
</head>

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
                    <div class="title">Login </div><br>
                    <?php if (isset($_SESSION['message'])) 
            { 
              ?>
                    <div class="">
                        <div class="alert alert-warning  alert-dismissible fade show" role="alert">
                            <strong> </strong>
                            <?= $_SESSION['message']; ?>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <?php
               unset($_SESSION['message']);
            }
              ?>
                    <!-- Login Form... -->
                    <form action="function/authcode.php"  method="post">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" id="email" placeholder="Enter your email"  oninvalid="setCustomValidity('Please enter a valid Email ID')" oninput="setCustomValidity('')">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="password" minlength="8" name="password" placeholder="Enter your password"   oninvalid="setCustomValidity('Please enter valid Password','Please Enter mini')" oninput="setCustomValidity('')">
                            </div>
                            <div class="text" style="color: #FFA500 !important"><a style="color: #E0A96D;" href="./resetpass.php">Forgot
                                    password?</a></div>
                            <div class="button input-box">
                                <input type="submit" onclick="myFunction()" name="login_btn" value="Login">
                            </div>
                            <div class="text sign-up-text">Don't have an account? <label for="flip"> <a style="color: #E0A96D;" href="register.php">Sigup now </a> </label>
                            </div>
                        </div>
                    </form>
                </div>
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
    <script>
        function myFunction() {
            document.getElementById("email").required = true;
            document.getElementById("password").required = true;
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