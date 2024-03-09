<?php
session_start();
include('./config/config.php');
$uid = $_SESSION['uid'];
$show = true;

switch ($_GET['filter']) {
    case 'pending':
        $select_q = "select * from tblhouse where uid='$uid' AND qc='pending' ORDER BY date desc";
        $query = mysqli_query($con, $select_q);
        $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where uid='$uid' AND qc='pending'"));
        break;
    case 'success':
        $select_q = "select * from tblhouse where uid='$uid' AND qc='success' ORDER BY date desc";
        $query = mysqli_query($con, $select_q);
        $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where uid='$uid' AND qc='success'"));
        break;
    case 'reject':
        $select_q = "select * from tblhouse where uid='$uid' AND qc='reject' ORDER BY date desc";
        $query = mysqli_query($con, $select_q);
        $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where uid='$uid' AND qc='reject'"));
        break;
    case 'sell':
        $select_q = "select * from tblhouse where uid='$uid' AND stype='sell' ORDER BY date desc";
        $query = mysqli_query($con, $select_q);
        $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where uid='$uid' AND stype='sell'"));
        break;
    case 'rent':
        $select_q = "select * from tblhouse where uid='$uid' AND stype='rent' ORDER BY date desc";
        $query = mysqli_query($con, $select_q);
        $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where uid='$uid' AND stype='rent'"));
        break;
    case 'booked':
        $select_q = "SELECT DISTINCT tblhouse.*  FROM tblhouse INNER JOIN tblpbooking ON tblhouse.pid = tblpbooking.pid AND tblpbooking.status='success' AND tblpbooking.seller_id = $uid";
        $query = mysqli_query($con, $select_q);
        $total = mysqli_fetch_array(mysqli_query($con , "SELECT DISTINCT count(*) as total  FROM tblhouse INNER JOIN tblpbooking ON tblhouse.pid = tblpbooking.pid AND tblpbooking.status='success' AND tblpbooking.seller_id = $uid"));
        break;
    default:
        $select_q = "select * from tblhouse where uid='$uid' ORDER BY date desc";
        $query = mysqli_query($con, $select_q);
        $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where uid='$uid'"));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOCUS | Your Property</title>
</head>
<!-- Favicon -->

    <link rel="shortcut icon" type="image/x-icon" href="../admin/assets/img/favi.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Sweet Alert  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Libraries Stylesheet -->
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css.css">

<!-- Customized Bootstrap Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="css/alert.css">
<style>
    @media (max-width: 767.98px) {
        .border-sm-start-none {
            border-left: none !important;
        }
    }
</style>

<body class="bg-white">
    <div class=" bg-white p-0">


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

            <div class="container mt-5">
                <div class="text-center mx-auto mb-5 text-black " data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3 text-black pb-2" style="border-bottom: 2px solid var(--tan);">Listed Property</h1>
                </div>
            </div>
            <div class="container my-4">
                <ul class="navbar-nav d-flex flex-row flex-wrap justify-content-around">
                    <div class="d-flex flex-row mb-2 justify-content-around ">
                        <li class="">
                            <a class="btn border border-2 rounded-pill border-dark text-black  <?php if ($_GET['filter'] == 'all') {
                                                                                                    echo "bg-tan";
                                                                                                } ?> " style="width: 8rem;" aria-current="page" href="user-property.php?filter=all">All</a>
                        </li>
                    </div>
                    <div class="d-flex flex-row  mb-2  justify-content-around ">

                        <li class=" ">
                            <a class="btn border border-2 mx-1 rounded-pill border-dark  text-black <?php if ($_GET['filter'] == 'success') {
                                                                                                        echo "bg-tan";
                                                                                                    } ?> " style="width: 8rem;" href="user-property.php?filter=success">Success</a>
                        </li>
                        <li class=" ">
                            <a class="btn border border-2 mx-1 rounded-pill border-dark  text-black <?php if ($_GET['filter'] == 'pending') {
                                                                                                        echo "bg-tan";
                                                                                                    } ?> " style="width: 8rem;" href="user-property.php?filter=pending">Pending</a>
                        </li>
                        <li class="  ">
                            <a class="btn border border-2 rounded-pill mx-1 border-dark  text-black <?php if ($_GET['filter'] == 'reject') {
                                                                                                        echo "bg-tan";
                                                                                                    } ?> " style="width: 8rem;" href="user-property.php?filter=reject">Rejected</a>
                        </li>
                    </div>
                    <div class="d-flex flex-row  mb-2 justify-content-around ">
                        <li class=" ">
                            <a class="btn border border-2 mx-1 rounded-pill border-dark  text-black  <?php if ($_GET['filter'] == 'sell') {
                                                                                                            echo "bg-tan";
                                                                                                        } ?>" style="width: 8rem;" href="user-property.php?filter=sell">Sell</a>
                        </li>
                        <li class="">
                            <a class="btn border border-2 rounded-pill mx-1 border-dark  text-black <?php if ($_GET['filter'] == 'rent') {
                                                                                                        echo "bg-tan";
                                                                                                    } ?> " style="width: 8rem;" href="user-property.php?filter=rent">Rent</a>
                        </li>
                    </div>
                    <div class="d-flex flex-row mb-2 justify-content-around ">
                        <li class=" ">
                            <a class="btn border border-2 rounded-pill border-dark  text-black <?php if ($_GET['filter'] == 'booked') {
                                                                                                    echo "bg-tan";
                                                                                                } ?> " style="width: 8rem;" href="user-property.php?filter=booked">Booked</a>
                        </li>
                    </div>
                </ul>
            </div>
            
            <div class="container me-5 mb-4">
                <p class="text-muted">Total <b class="text-black"><?php echo $total['total']?></b> property show here...</p>
            </div>
            <section style="background-color: white;" class="mb-3">
                <?php

                while ($data = mysqli_fetch_array($query)) {
                    $show = false;
                    $oldprice = $data['price'] + $data['price'] / 2;   ?>
                    <div class="container py-4">
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-12 col-xl-10">
                                <div class="card shadow-0 border rounded-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                <div class="mask">
                                                    <div class="position-absolute top-2 start-2 translate-middle badge rounded-pill " id="bedge">
                                                        <h5>
                                                            <span class="badge bg-tan pt-2 ms-3 mt-5 ml-4 text-black">
                                                                <?php echo $data['stype']; ?></span>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="bg-image hover-zoom ripple rounded ripple-surface">

                                                    <a href="property_view.php?pid=<?php echo $data['pid'] ?>">
                                                        <img src="../admin/img/Property_image/house/<?php echo $data['img1']; ?> " style="height: 152px;" class="w-100" />
                                                        <div class="hover-overlay">
                                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                                        </div>
                                                    </a>
                                                    <!-- <div class="mask">
                              <div class="d-flex justify-content-end align-items-end h-100">
                                <h5>
                                  <span class="badge bg-tan pt-2 ms-3 mt-3 text-light">
                                  <?php echo $data['stype']; ?></span>
                                </h5>
                              </div>
                          </div> -->
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <h5 id="title"><?php echo substr($data['ptitle'], 0, 35); ?></h5>

                                                <div class="mt-1 mb-0 text-muted small">
                                                    <strong class="d-inline-block mb-2 text-success"><?php echo $data['ptype']; ?></strong>
                                                </div>
                                                <div class="mb-2 text-muted small">
                                                    <span><?php echo $data['bhk']; ?> bhk</span>
                                                    <span class="text-primary"> • </span>
                                                    <span><?php echo $data['sqft']; ?> sqft</span>
                                                    <span class="text-primary"> • </span>
                                                    <span><?php echo $data['date']; ?> <br /></span>
                                                </div>
                                                <p class="text-truncate mb-4 mb-md-0"><i class="fa fa-map-marker-alt text-tan me-2"></i>
                                                    <?php echo $data['paddress']; ?>
                                                </p>
                                                <?php if ($data['featured'] == 'Yes') { ?>
                                                    <div class="bg-success d-inline-block py-1 px-2 text-white rounded mt-2">
                                                        Featured Property
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                                <div class="d-flex flex-row align-items-center mb-1">
                                                    <h4 class="mb-1 me-1">₹<?php echo $data['price']; ?></h4>
                                                    <span class="text-danger"><s>₹<?php echo $oldprice; ?></s></span>

                                                </div>
                                                <h6 class=""> <?php if ($data['qc'] == 'Success') {
                                                                    echo '<b>Listing : </b> <span class="mb-1 text-success bold fw-bold">Success <i class="bi bi-check-circle-fill"></i></span> ';
                                                                } elseif ($data['qc'] == 'Reject') {
                                                                    echo '<b>Listing : </b> <span class="mb-1 text-danger bold fw-bold">Reject <i class="fas fa-times"></i></span> ';
                                                                } else {
                                                                    echo '<b>Listing : </b> <span class="mb-1 text-warning bold fw-bold">Pending <i class="fas fa-hourglass-half"></i></span> ';
                                                                }
                                                                ?></h6>
                                                <h6 class="">
                                                    <?php if ($data['qc'] == 'Success') {
                                                        $pid = $data['pid'];
                                                        $book_data = mysqli_fetch_array(mysqli_query($con, "select * from tblpbooking where pid=$pid"));
                                                        if ($data['status'] == "Active") {
                                                            if($book_data['status'] == "Success"){
                                                                echo '<b>Order : </b> <span class="mb-1 text-danger bold fw-bold">Booked</span> ';
                                                            }else{
                                                                echo '<b>Order : </b> <span class="mb-1 text-success bold fw-bold">Open</span> ';
                                                            }
                                
                                                        } else {
                                                            echo '<b>Order : </b> <span class="mb-1 text-danger bold fw-bold">Booked</span> ';
                                                        }
                                                    }
                                                    ?>
                                                </h6>
                                                <div class="d-flex flex-column mt-4">

                                                    <button type="button" class="btn  bg-tan btn-sm"><a class="text-black" href="./update_property.php?pid=<?php echo $data['pid'] ?>">Update</a></button>
                                                    <button type="button" class="btn  bg-black btn-sm mt-2"><a class=" text-light " href="./delete_property.php?pid=<?php echo $data['pid'] ?>">Delete</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($data['qc'] == "Reject") { ?>
                                    <div class="text-danger text-center my-2 bg-white border shadow p-3 bg-body-tertiary rounded py-2 ">
                                        <span>
                                            <b>
                                                <span class="mb-4 text-center"> Reject Reason :
                                                    <?php echo $data['response']; ?></span>
                                            </b>
                                        </span>
                                    </div>
                                <?php  } elseif ($data['qc'] == "Success") {
                                        if($data['status'] == "Active"){ 
                                            if($book_data['status'] == "Success"){
                                    ?>
                                            <div class="text-danger text-center my-2 bg-white border shadow p-3 bg-body-tertiary rounded py-2 ">
                                        <span>
                                            <b>
                                                <span class="mb-4 text-center"> Status : This Property is Booked..</span>
                                            </b>
                                        </span>
                                    </div>
                                            <?php } else{?>
                                                <div class="text-success text-center my-2 bg-white border shadow p-3 bg-body-tertiary rounded py-2 ">
                                        <span>
                                            <b>
                                                <span class="mb-4 text-center"> Status :  <?php echo $data['response']; ?></span>
                                            </b>
                                        </span>
                                    </div>
                                            <?php } ?>
                                    <?php } else{?>
                                        <div class="text-danger text-center my-2 bg-white border shadow p-3 bg-body-tertiary rounded py-2 ">
                                        <span>
                                            <b>
                                                <span class="mb-4 text-center"> Status : This Property Currntly Not Available</span>
                                            </b>
                                        </span>
                                    </div>
                                    <?php } ?>
                                    <!-- <div class="text-success text-center my-2 bg-white border shadow p-3 bg-body-tertiary rounded py-2 ">
                                        <span>
                                            <b>
                                                <span class="mb-4 text-center"> Status :
                                                    <?php echo $data['response']; ?></span>
                                            </b>
                                        </span>
                                    </div> -->
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                <?php } ?>
                <?php if ($show) { ?>
                    <div class="container mt-2">
                        <div class="text-center mx-auto mb-5" data-wow-delay="0.1s">
                            <h3 class="mb-3  text-muted pb-2 mt-5">No Property Listed Here...</h3>
                        </div>
                    </div>
                <?php } ?>
            </section>

            <?php if (isset($_SESSION['alert'])) { ?>
                <script>
                    Swal.fire({
                        icon: '<?php echo $_SESSION["alert"]["0"] ?>',
                        title: '<?php echo $_SESSION["alert"]["1"] ?>',
                        text: '<?php echo $_SESSION["alert"]["2"] ?>',
                        footer: '<a href="<?php echo $_SESSION["alert"]["4"] ?>"><?php echo $_SESSION["alert"]["3"] ?></a>'
                    })
                </script>
            <?php }
            unset($_SESSION['alert']);
            ?>
        </div>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script>
            var Title = document.getElementById('title').value;
        </script>
</body>

</html>