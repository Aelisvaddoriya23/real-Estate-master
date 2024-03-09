<?php
    include('../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LOCUS | Your Search Result</title>
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
    <div class="container-fluid bg-black mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-12">
                    <form action="search.php" method="get">

                        <div class="row g-2">
                            <div class="col-md-3">
                                <input type="text" name="query" class="form-control border-0 py-3"
                                    placeholder="Search Keyword">
                            </div>
                            <div class="col-md-3">
                                <select name="ptype" class="form-select border-0 py-3">
                                <option selected value="">All</option>
                                <option value="House">House</option>
                                <option value="Flat">Flat</option>
                                <option value="Banglow">Banglow</option>
                                <option value="Farm-House">Farm House</option>
                                <option value="Pent-House">Pent House</option>  
                                </select>
                            </div>
                            <div class="col-md-3">
                            <input type="text" name="location" class="form-control border-0 py-3"
                                    placeholder="eg: surat , gujrat..">
                            </div>
                            <div class="col-md-3">
                            <button class="btn bg-tan text-black border-0  w-100 ">
                            <input type="submit" name="btn_search" class="btn bg-tan mb-2 text-black border-0  w-100 " value="Search"/>
                            </button>
                        </div>
                        </div>
                       
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../lib/wow/wow.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/waypoints/waypoints.min.js"></script>
<script src="../lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="../js/main.js"></script>

</html>