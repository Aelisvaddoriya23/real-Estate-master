<?php
session_start();
include('./config/config.php');
$pid = $_GET['pid'];
$data = mysqli_fetch_array(mysqli_query($con, "select * from tblhouse where pid='$pid'"));

$_SESSION['pid'] = $data['pid'];
$_SESSION['sellerid'] = $data['uid'];

$uid = $data['uid'];
$user_data = mysqli_fetch_array(mysqli_query($con, "select * from user where uid='$uid'"));
$oldprice = $data['price'] + $data['price'] / 2;

$pid = $_GET['pid'];
$q =mysqli_query($con, "Select * from tblpbooking where pid=$pid");
$q1 =mysqli_query($con, "Select * from tblpbooking where pid=$pid and status='Success'");
$isRent = mysqli_fetch_array($q);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LOCUS | Property Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/styleimage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
</head>
<style>
.max {
    max-width: 1100px;
}
</style>

<body class="bg-white">
    <div class="bg-white p-0">
        <!-- Spinner Start -->
        <?php include('../User/include/spinner.php') ?>

        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php include('../User/include/header.php') ?>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-5 mt-lg-5">


                </div>
            </div>
            <!-- Header End -->

            <div class=" container-fluid card-wrapper bg-white p-0">
                <div class="card ">
                    <!-- card left -->
                    <div class="product-imgs" style="margin-bottom: 100px;">
                        <div class="img-display">
                            <div class="img-showcase">
                                <img src="../admin/img/Property_image/house/<?php echo $data['img1'] ?>" height="500vh"
                                    alt="shoe image">
                                <img src="../admin/img/Property_image/house/<?php echo $data['img2'] ?>" height="500vh"
                                    alt="shoe image">
                                <img src="../admin/img/Property_image/house/<?php echo $data['img3'] ?>" height="500vh"
                                    alt="shoe image">
                                <img src="../admin/img/Property_image/house/<?php echo $data['img4'] ?>" height="500vh"
                                    alt="shoe image">
                            </div>
                        </div>
                        <div class="img-select">
                            <div class="img-item">
                                <a href="#" data-id="1">
                                    <img src="../admin/img/Property_image/house/<?php echo $data['img1'] ?>"
                                        height="100vh" alt="shoe image">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="2">
                                    <img src="../admin/img/Property_image/house/<?php echo $data['img2'] ?>"
                                        height="100vh" alt="shoe image">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="3">
                                    <img src="../admin/img/Property_image/house/<?php echo $data['img3'] ?>"
                                        height="100vh" alt="shoe image">
                                </a>
                            </div>
                            <div class="img-item">
                                <a href="#" data-id="4">
                                    <img src="../admin/img/Property_image/house/<?php echo $data['img4'] ?>"
                                        height="100vh" alt="shoe image">
                                </a>
                            </div>
                        </div>



                    </div>
                    <!-- card right -->
                    <div class=" container product-content">
                        <h2 class=" container product-title"><?php echo $data['ptitle'] ?></h2>
                        <a href="#" class="product "><i class="fa fa-map-marker-alt text-tan me-2"></i>
                            <?php echo $data['paddress'] ?></a>

                            <div class="  product-price">
                            <h6 class="last-price"> <span>₹ <?php echo $oldprice ?></span></h6>
                            <h5 class="new-price text-black"> Price:  <span style="color: green;">₹ <?php echo $data['price']?>/- 
                                    <small style="color: black;size:10px;"><?php if($data['stype'] == "rent"){echo "Per Month";}elseif($data['ptype'] == "Farm-House" && $data['stype'] == 'rent'){echo 'Per Day(24 hour)';} ?></small></span></h5>
                        </div>

                        <div class="row container-fuid d-flex justify-content-center ">
                            <div class="col-6" style="width: 100%;">
                                <h4 class="animated mt-4 text-black fadeIn mb-3"
                                    style="border-bottom: 2px solid var(--tan);">
                                    About House</h4>
                                <table class="table text-center table-white text-black table-striped">

                                    <tbody class="text-black">
                                        <tr>
                                            <th scope="row" class="text-end">SQFT :</th>
                                            <td><?php echo $data['sqft'] ?></td>
                                            <th class="text-end">BEDROOM :</th>
                                            <td><?php echo $data['bedroom'] ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-end">BATHROOM :</th>
                                            <td><?php echo $data['bathroom'] ?></td>
                                            <th class="text-end">HALL :</th>
                                            <td><?php echo $data['hall'] ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-end">KITCHEN :</th>
                                            <td><?php echo $data['kitchen'] ?></td>
                                            <th class="text-end">BALCONY :</th>
                                            <td><?php echo $data['balcony'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="row container-fuild">
                            <div class="col-12 mt-4" style="width: 100%;">
                                <h4 class="animated text-black fadeIn mb-3"
                                    style="border-bottom: 2px solid var(--tan);">Basic
                                    Information</h4>
                                <table class="table text-center table-white table-striped">

                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-end">BHK:</th>
                                            <td><?php echo $data['bhk'] ?></td>
                                            <th class="text-end">PROPERTY TYPE:</th>
                                            <td><?php echo $data['ptype'] ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-end">FLOOR:</th>
                                            <td><?php echo $data['floor'] ?></td>
                                            <th class="text-end">TOTAL FLOOR:</th>
                                            <td><?php echo $data['tfloor'] ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-end">CITY:</th>
                                            <td><?php echo $data['city'] ?></td>
                                            <th class="text-end">STATE:</th>
                                            <td><?php echo $data['state'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                </div>

            </div>

            <div style="height: 750px;">
                <div class="row  card-wrapper  ">
                    <div class="col-12 " style="width: 100%;">
                        <h4 class="animated text-black fadeIn mb-3" style="border-bottom: 2px solid var(--tan);">
                            Facilities</h4>
                        <p class="row ">
                            <?php echo $data['facilities'] ?>
                        </p>
                        <h4 class="animated text-black fadeIn mb-3" style="border-bottom: 2px solid var(--tan);">
                            Description</h4>
                        <p>
                            <?php echo $data['description'] ?>
                        </p>
                        <?php if ($data['stype'] == 'Rent') {
                            if ($isRent['cindate'] != null){ ?>
                            <h4 class="animated text-black fadeIn mt-4 mb-3" style="border-bottom: 2px solid var(--tan);">
                                Booked Date</h4>
                            <p>
                                This Date is Already Booked , So Can Choose Diffrents Date In Booking Request...
                            </p>
                        <?php while($b_date=mysqli_fetch_array($q1)) {    
                        $cindate = date_format(date_create($b_date['cindate']), "d/m/Y");
                        $coutdate = date_format(date_create($b_date['coutdate']), "d/m/Y");
                            ?>
                            <span class="text-danger pb-5">
                                <b>
                                    <?php echo $cindate ?>
                                </b> <span class="text-black"><b> To</b> </span>
                                 <b>
                                    <?php echo $coutdate ?>
                                </b><br>
                            </span>
                            <?php }?>
                            <?php }?>
                               
                        <?php } ?>
                    </div>
                </div>
            </div>
            
            <?php if (isset($_SESSION['msg'])) { ?>
            <script>
            swal("<?php echo  $_SESSION['status'] ?>", "<?php echo $_SESSION['msg'] ?>",
                "<?php echo $_SESSION['status'] ?>");
            </script>
            <?php
        unset($_SESSION['msg']);
        unset($_SESSION['status']);
      } ?>


        </div>
        <!-- Footer Start -->
        <!-- Footer End -->

        <?php include('../User/include/top.php') ?>
        <script src="./js/scriptimage.js"></script>
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