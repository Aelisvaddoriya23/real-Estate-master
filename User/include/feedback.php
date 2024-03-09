<?php
    // session_start();
    include('./config/config.php');
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
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

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
</head>

<body>
<div class="text-center text-black mx-auto mb-3 mt-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3 text-black" style="border-bottom: 2px solid var(--tan);">Our User Said... </h1>
            </div>
<div class="container owl-carousel testimonial-carousel wow  fadeInUp">
    
    <?php
        $query=mysqli_query($con,"SELECT f.*, u.img FROM tblfeedback f JOIN user u ON f.email = u.email WHERE f.status='1'");
        while($row=mysqli_fetch_array($query))
        {
    ?>
    <div class="testimonial-item bg-ligh rounded p-3">
        <div class="bg-black text-white border rounded p-4">
            <p class="fonts font-weight-light"><?php echo $row['message']; ?>
            <div class="d-flex align-items-center">
                <img class="img-fluid flex-shrink-0 rounded" src="img/user/<?php echo $row['img']; ?>"
                    style="width: 45px; height: 45px;">
                <div class="ps-3">
                    <h6 class="fw-bold text-tan mb-1"><?php echo $row['name']; ?></h6>
                    <small><?php echo $row['email']; ?></small>
                </div>
            </div>
        </div>
    </div>
    <?php
        } 
    ?>
</div>

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