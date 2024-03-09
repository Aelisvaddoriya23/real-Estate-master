<?php
include('./config/config.php');
$show = true;

    switch ($_GET['filter']) {
        case 'new':
                $select_q = "select * from tblhouse where qc='success' and status='Active' order by date desc";
                $query = mysqli_query($con, $select_q);
                $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where  qc='success' and status='Active'"));
            break;
            case 'old':
                $select_q = "select * from tblhouse where qc='success' and status='Active' order by date asc";
                $query = mysqli_query($con, $select_q);
                $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where  qc='success' and status='Active'order by date desc"));

            break;
            case 'sell':
                $select_q = "select * from tblhouse where qc='success' and status='Active' AND stype='sell'";
                $query = mysqli_query($con, $select_q);
                $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where  qc='success' and status='Active'  AND stype='sell'"));
            break;
            case 'rent':
                $select_q = "select * from tblhouse where qc='success' and status='Active'  AND stype='rent'";
                $query = mysqli_query($con, $select_q);
                $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where  qc='success' and status='Active'  AND stype='rent'"));
            break;
            case 'featured':
                $select_q = "select * from tblhouse where qc='success' and status='Active'  AND featured='Yes'";
                $query = mysqli_query($con, $select_q);
                $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where  qc='success' and status='Active'  AND featured='Yes' "));
            break;
            case 'price':
                $tprice = $_GET['tprice'];
                $fprice = $_GET['fprice'];
                $select_q = "select * from tblhouse where qc='success' AND status='Active'  AND price Between '$tprice' and '$fprice'";
                $query = mysqli_query($con, $select_q);
                $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where qc='success' AND status='Active'  AND price Between '$tprice' and '$fprice' "));
            break;
            default:
                $select_q = "select * from tblhouse where qc='success' and status='Active'";
                $query = mysqli_query($con, $select_q);
                $total = mysqli_fetch_array(mysqli_query($con , "select count(*) as total from tblhouse where  qc='success' and status='Active'"));
                        }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LOCUS | Property List</title>
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

    <div class="container-xxl py-1">
        <div class="container">
            <div class="container">
                <div class="text-center mx-auto mb-5 text-black" data-wow-delay="0.1s"
                    style="max-width: 600px;">
                    <h1 class="mb-3 text-black pb-2 mt-5
                    " style="border-bottom: 2px solid var(--tan);">Property Listing</h1>
                    <p>Browse our extensive property listings to find your dream home, investment property, or vacation rental. Our listings include detailed descriptions, high-quality photos, and virtual tours to help you get a sense of each property before you schedule a viewing. Contact us to schedule a showing or to learn more about any of the properties in our listings.</p>
                </div>
            </div>

            <div class="container my-4">
                <ul class="navbar-nav d-flex flex-wrap flex-row justify-content-around">
                    <div class="d-flex flex-row m-1 justify-content-around border border-2 rounded-pill p-2 border-dark">
                        <li class="">
                            <a class="btn border border-2 rounded-pill border-dark text-black  <?php if ($_GET['filter'] == 'all') {
                                                                                                    echo "bg-tan";
                                                                                                } ?> "
                                style="width: 8rem;" aria-current="page" href="property-list.php?filter=all">All</a>
                        </li>
                    </div>
                    <div class="d-flex flex-row m-1 justify-content-around border border-2 rounded-pill p-2 border-dark">

                        <li class=" ">
                            <a class="btn border border-2 mx-1 rounded-pill border-dark  text-black <?php if ($_GET['filter'] == 'new') {
                                                                                                        echo "bg-tan";
                                                                                                    } ?> "
                                style="width: 8rem;" href="property-list.php?filter=new">New </a>
                        </li>
                        <li class=" ">
                            <a class="btn border  border-2 mx-1 rounded-pill border-dark  text-black <?php if ($_GET['filter'] == 'old') {
                                                                                                        echo "bg-tan";
                                                                                                    } ?> "
                                style="width: 8rem;" href="property-list.php?filter=old">Old </a>
                        </li>
                    </div>
                    <div class="d-flex flex-row m-1 justify-content-around border border-2 rounded-pill p-2 border-dark">
                        <li class=" ">
                            <a class="btn border border-2 mx-1 rounded-pill border-dark  text-black  <?php if ($_GET['filter'] == 'sell') {
                                                                                                            echo "bg-tan";
                                                                                                        } ?>"
                                style="width: 8rem;" href="property-list.php?filter=sell">Sell</a>
                        </li>
                        <li class="">
                            <a class="btn border border-2 rounded-pill mx-1 border-dark  text-black <?php if ($_GET['filter'] == 'rent') {
                                                                                                        echo "bg-tan";
                                                                                                    } ?> "
                                style="width: 8rem;" href="property-list.php?filter=rent">Rent</a>
                        </li>
                    </div>
                    <div class="d-flex flex-row m-1 justify-content-around border border-2 rounded-pill p-2 border-dark">
                        <li class=" ">
                            <a class="btn border border-2 rounded-pill border-dark  text-black <?php if ($_GET['filter'] == 'featured') {
                                                                                                    echo "bg-tan";
                                                                                                } ?> "
                                style="width: 8rem;" href="property-list.php?filter=featured">featured</a>
                        </li>
                    </div>
                </ul>

            </div>
            <div class="container-fluid mb-4 bg-black wow fadeIn rounded-3" data-wow-delay="0.1s"
                style="padding: 20px; ">
                <div class="container ">
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 ">
                            <form action="property-list.php" method="get">
                                <div class="row g-4">
                                    <div class="col-md-4">
                                        <input type="text" name="tprice"
                                            class=" text-center form-control border-0 rounded-3 py-3"
                                            placeholder="From Price">

                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="fprice"
                                            class=" text-center form-control border-0 rounded-3 py-3"
                                            placeholder="To Price">
                                    </div>
                                    <input type="text" name="filter" value="price"
                                        class=" text-center form-control border-0 rounded-3 py-3"
                                        placeholder="To Price" hidden>
                                    <div class="col-md-4">
                                        <button class="btn bg-tan text-black rounded-3 border-0  w-100 ">
                                            <input type="submit" name="btn_filter"
                                                class="btn bg-tan mb-2 text-black border-0  w-100"
                                                value="Filter Price" />
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mb-4">
                <p class="text-muted">Total <b class="text-black"><?php echo $total['total']?></b> property show here...</p>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php while ($data = mysqli_fetch_array($query)) {
                            $show = false; ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="./property_details.php?pid=<?php echo $data['pid'] ?>"><img
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
                                        href="./property_details.php?pid=<?php echo $data['pid'] ?>"><?php echo substr($data['ptitle'], 0, 35); ?>...</a>
                                    <p><i
                                            class="fa fa-map-marker-alt text-tan me-2"></i><?php echo $data['paddress'] ?>,<?php echo $data['city'] ?>,<?php echo $data['state'] ?>
                                    </p>
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
                            <div class="text-center text-black  bg-white mt-1 shadow p-1 bg-body-tertiary rounded">
                                Listed Date :
                                <span class="text-muted">
                                    <?php echo $data['date'] ?>
                                </span>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if ($show) { ?>
                        <div class="container mt-5">
                            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                                <h3 class="mb-3  text-muted pb-2">No Property Listed Here...</h3>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
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