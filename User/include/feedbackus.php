<?php
include('./config/config.php');
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['feedback_submit'])) {
    if (isset($_SESSION['uid'])) {
        header("location:login.php");
    }
    $uid = $_SESSION['uid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $insert_query = "INSERT INTO `tblfeedback`(`uid`, `name`, `email`, `message`) VALUES ('$uid','$name','$email','$message')";
    $run_q = mysqli_query($con, $insert_query);
    if ($run_q) {
        $_SESSION['alert'] = array();
        $icon = "success";
        $title = "Thank You For Feedback...";
        $text = "Your Feedback Is Too Valuble...";
        $footer = "Help And Support";
        $link = "contact.php";
        array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
        echo "1";
    } else {
        // echo "Send Failed";
        echo "2";
    }
}


?>
<?php
if(isset($_SESSION['uid'])) {
  // User is logged in, show feedback form
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Makaan - Real Estate php</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    
    <link rel="shortcut icon" type="image/x-icon" href="../admin/assets/img/favi.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <title>feedback</title>
</head>

<body>


    <div class=" py-5">
        <div class="container">
            <div class="text-center text-black mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3 text-black" style="border-bottom: 2px solid var(--tan);">Feedback </h1>
                <p>We value your feedback and are committed to providing the best possible service. If you have any comments, questions, or concerns, please don't hesitate to contact us. We are always looking for ways to improve our service and would love to hear from you.</p>
            </div>
            <!-- <div class="row g-4"> -->
            <?php
            session_start();
            $uid = $_SESSION['uid'];
            $select_qur = "select * from user where uid='$uid'";
            $query = mysqli_query($con, $select_qur);
            $data = mysqli_fetch_array($query);

            ?>
            <div class="col-md-12">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <form method="POST" onsubmit="return validateForm()">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" value="<?php if (isset($_SESSION['uid'])) {
                                                                                                    echo $data['uname'];
                                                                                                } else {
                                                                                                    echo "";
                                                                                                }  ?>" name="name" placeholder="Your Name"
                                     oninvalid="setCustomValidity('Please enter a valid name')" onblur="setCustomValidity('')" oninput="validateName()">
                                    <label for="name">Your Name</label>
                                    <div class="mt-1 text-danger" id="error-name"></div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" value="<?php if (isset($_SESSION['uid'])) {
                                                                                                    echo $data['email'];
                                                                                                } else {
                                                                                                    echo "";
                                                                                                }  ?>" name="email" id="email" placeholder="Your Email"
                                      oninvalid="setCustomValidity('Please enter a valid Email ID')" onblur="setCustomValidity('')" oninput="validateEmail()">
                                    <label for="email">Your Email</label>
                                    <div class="mt-1 text-danger" id="error-email"></div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" name="message" id="message" style="height: 150px" oninvalid="setCustomValidity('Please enter Message for Contact Us')" onblur="setCustomValidity('')" oninput="validateMessage()"></textarea>
                                    <label for="message">Message</label>
                                    <div class="mt-1 text-danger" id="error-message"></div>

                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn bg-tan text-black w-100 py-3" onclick="myFunction()" name="feedback_submit" type="submit">Send
                                    Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <!-- JavaScript Libraries -->
    <script>
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

        function validateMessage() {
            var input = document.getElementById("message");
        var message = input.value.trim();
        var errorMessage = document.getElementById("error-message");

        if (message === "") {
            errorMessage.innerHTML = "Message field cannot be empty";
            return false;
        } else if (!/^[a-zA-Z0-9\s,'-]*$/.test(message)) {
            errorMessage.innerHTML = "Message contains invalid characters";
            return false;
        } else {
            errorMessage.innerHTML = "";
            return true;
        }
        }

        function validateForm() {
            // Call all validation functions
            var isNameValid = validateName();
            var isEmailValid = validateEmail();
            var isMessageValid = validateMessage();
            // Check if all validation functions returned true
            if (isNameValid && isEmailValid  && isMessageValid ) {
                // All validation functions passed, submit the form
                return true;
            } else {
                // At least one validation function failed, prevent form submission
                return false;
            }
        }
        function myFunction() {
            document.getElementById("name").required = true;
            document.getElementById("email").required = true;
            document.getElementById("message").required = true;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    <?php
} else {
  // User is not logged in, show message
//   echo "Please login to submit feedback.";
}
?>
</body>

</html>