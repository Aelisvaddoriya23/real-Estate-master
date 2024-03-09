<?php
    session_start();
    include('./config/config.php');
    $select_q="select * from tblhouse where qc='Success' and status='Active' limit 3 ";
    $query=mysqli_query($con,$select_q);
    $show = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LOCUS | Find Your Dream</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link rel="stylesheet" href="css/alert.css">
</head>

<body>
    <div class=" bg-white p-0">
        <!-- Spinner Start -->
        <?php include('../User/include/spinner.php')?>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php include('../User/include/header.php')?>
        <!-- Navbar End -->

        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn text-black mb-4">Find A <span class="text-tan">Perfect
                            Home</span> To
                        Live With Your Family</h1>
                    <p class="animated fadeIn mb-4 text-black pb-2">List your property and get best deal for your property  and You can find your dream Property in your budget using our portal The Locus Real-Estate...</p>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Search Start -->
        <?php include('../User/include/search.php')?>
        <!-- Search End -->


        <!-- Category Start -->
        <?php include('../User/include/category.php')?>
        <!-- Category End -->

        <!-- About Start -->
        <?php include('../User/include/about.php')?>
        <!-- About End -->

        
        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-12">
                        <div class="text-center text-black mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3 text-black">Property Listing</h1>
                            <p>Browse our extensive property listings to find your dream home, investment property, or vacation rental. Our listings include detailed descriptions, high-quality photos, and virtual tours to help you get a sense of each property before you schedule a viewing. Contact us to schedule a showing or to learn more about any of the properties in our listings.</p>
                        </div>
                    </div>
                </div>


                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <?php while ($data=mysqli_fetch_array($query)) { $show = false;?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="./property_details.php?pid='<?php echo $data['pid'] ?>'"><img
                                                style="height: 307px; width: 100%;" class="img-fluid"
                                                src="../admin/Img/Property_image/house/<?php echo $data['img1']; ?>"
                                                alt=""></a>
                                        <div
                                            class="bg-black rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            <?php echo $data['stype']; ?></div>
                                        <div
                                            class="bg-white rounded-top text-black position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            <?php echo $data['ptype']; ?></div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-tan mb-3">₹ <?php echo $data['price']; ?></h5>
                                        <a class="d-block h5 mb-2 text-black"
                                            href="./property_details.php?pid=<?php echo $data['pid']?>"><?php echo substr($data['ptitle'] ,0 , 35) ; ?>...</a>
                                        <p><i
                                                class="fa fa-map-marker-alt text-tan me-2"></i><?php echo $data['paddress'] ?>,<?php echo $data['city'] ?>,<?php echo $data['state'] ?>
                                        </p>
                                    </div>
                                    <div>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center text-black border-end py-2"><i
                                                class="fa fa-ruler-combined text-tan me-2"></i><?php echo $data['sqft']; ?>
                                            SQFT</small>
                                        <small class="flex-fill text-center text-black border-end py-2"><i
                                                class="fa fa-bed text-tan me-2"></i><?php echo $data['bedroom']; ?>
                                            Bedroom</small>
                                        <small class="flex-fill text-center text-black border-end py-2"><i
                                                class="fa fa-bed text-tan me-2"></i><?php echo $data['hall']; ?>
                                            Hall</small>
                                        <small class="flex-fill text-center text-black py-2"><i
                                                class="fa fa-bath text-tan me-2"></i><?php echo $data['bathroom']; ?>
                                            Bathroom</small>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <?php if ($show) { ?>
                            <div class="container mt-2">
                                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                                    <h3 class="mb-3  text-muted pb-2">No Property Listed Here...</h3>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn bg-black text-tan py-3 px-5" href="property-list.php">Browse More
                                    Property</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Property List End -->

        <!-- Pricing Templates Start -->
        <?php include('../User/include/pricing_t.php')?>
        <!-- Pricing Templates End -->

        <!-- Testimonial Start -->
        <?php include('../User/include/feedback.php')?>
        <!-- Testimonial End -->
        <!-- Testimonial Start -->
        <?php include('../User/include/feedbackus.php')?>
        <!-- Testimonial End -->
        
        <!-- Footer Start -->
        <?php include('../User/include/footer.php')?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <?php include('../User/include/top.php')?>
    </div>

     <!-- Alert Start -->
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
        <!-- Alert End -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>