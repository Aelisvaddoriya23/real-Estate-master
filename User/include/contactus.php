<?php
ini_set('display_errors', 0);
session_start();
$uid = $_SESSION['uid'];
$select_qur = "select * from user where uid='$uid'";
$query = mysqli_query($con, $select_qur);
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LOCUS | Contact Support</title>
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

    
    <!-- Sweet Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>

    <div class=" py-5">
        <div class="container">
            <div class="text-center text-black mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3 text-black" style="border-bottom: 2px solid var(--tan);">How Can I Help You ??</h1>
                <p>We are here to help you with all of your real estate needs. Contact us today to schedule a consultation, request more information, or to ask any questions you may have. Our team is available by phone, email, or in person, and we are always happy to hear from you.</p>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="bgcolor rounded p-3">
                                <div class="d-flex align-items-center bg-white text-black rounded p-3" style="border: 1px dashed var(--tan)">
                                    <div class="icon icon1 me-3" style="width: 45px; height: 45px;">
                                        <i class="fa text-tan btn-social fa-map-marker-alt"></i>
                                    </div>
                                    <span>4007 Silver Bussiness Hub, Surat</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="bgcolor rounded p-3">
                                <div class="d-flex text-black align-items-center bg-white rounded p-3" style="border: 1px dashed var(--tan)">
                                    <div class="icon  me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-envelope-open text-tan"></i>
                                    </div>
                                    <span>locus466@gmail.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="bgcolor rounded p-3">
                                <div class="d-flex text-black align-items-center bg-white rounded p-3" style="border: 1px dashed var(--tan)">
                                    <div class="icon me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-phone-alt text-tan"></i>
                                    </div>
                                    <span>+91 11111 00000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7438.6242865312515!2d72.89836772411462!3d21.21946734358138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be045882435e545%3A0xd6f93d3d2fa5d1b5!2sSimada%20Gam%2C%20Nana%20Varachha%2C%20Surat%2C%20Gujarat%20395006!5e0!3m2!1sen!2sin!4v1677499400853!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <form action="contact.php" method="post">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" value="<?php if (isset($_SESSION['uid'])) {
                                                                                            echo $data['uname'];
                                                                                        }else{
                                                                                             echo "";
                                                                                        }  ?>" id="name" name="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" value="<?php if (isset($_SESSION['uid'])) {
                                                                                            echo $data['email'];
                                                                                        }else{
                                                                                             echo "";
                                                                                        }  ?>" id="email" name="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" oninvalid="setCustomValidity('Please enter Your Subjecy')" onblur="setCustomValidity('')" oninput="validateSubject()">
                                        <label >Subject</label>
                    <div class="text-danger mt-1" id="error-subject"></div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" name="message" id="message" style="height: 150px" oninvalid="setCustomValidity('Please enter Message')" onblur="setCustomValidity('')" oninput="validateMessage()"></textarea>
                                        <label for="message">Message</label>
                    <div class="text-danger mt-1" id="error-message"></div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn bg-tan text-black w-100 py-3" name="submit" id="submit" type="submit">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($_SESSION['alert'])){?> 
    <script>
        Swal.fire({
                icon: '<?php echo $_SESSION["alert"]["0"] ?>',
                title: '<?php echo $_SESSION["alert"]["1"] ?>',
                text: '<?php echo $_SESSION["alert"]["2"] ?>',
                footer: '<a href="<?php echo $_SESSION["alert"]['4'] ?>"><b><?php echo $_SESSION["alert"]["3"] ?></b></a>'
        })
    </script>
    <?php } 
        unset($_SESSION['alert']);
    ?>
    </div>
    <script>
        function validateSubject() {
        var input = document.getElementById("subject");
        var paddress = input.value.trim();
        var errorMessage = document.getElementById("error-subject");

        if (paddress === "") {
            errorMessage.innerHTML = "Address field cannot be empty";
            return false;
        } else if (!/^[a-zA-Z0-9\s,'-]*$/.test(paddress)) {
            errorMessage.innerHTML = "Address contains invalid characters";
            return false;
        } else {
            errorMessage.innerHTML = "";
            return true;
        }
    }
        function validateMessage() {
        var input = document.getElementById("message");
        var paddress = input.value.trim();
        var errorMessage = document.getElementById("error-message");

        if (paddress === "") {
            errorMessage.innerHTML = "Address field cannot be empty";
            return false;
        } else if (!/^[a-zA-Z0-9\s,'-]*$/.test(paddress)) {
            errorMessage.innerHTML = "Address contains invalid characters";
            return false;
        } else {
            errorMessage.innerHTML = "";
            return true;
        }
    }
    function validateForm() {
    if (validateMessage() && validateSubject()) {
        return true;
    } else {
        return false;
    }
    }
    document.getElementById("submit").addEventListener("click", function(event) {
    if (!validateForm()) {
        event.preventDefault();
    }
});

    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>