<?php
session_start();
require("config.php");

$type = $_GET['type'];
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
$error="";
$msg="";
	$pid=$_GET['pid'];
	$query="select * from tblhouse where pid=$pid";
	$data=mysqli_fetch_array(mysqli_query($con , $query));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>LOCUS | Property</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favi.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>


    <!-- Header -->
    <?php include("header.php"); ?>
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Property</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Property</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Property Details</h4>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <h5 class="card-title">Property Detail</h5>
                                <?php echo $error; ?>
                                <?php echo $msg; ?>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label class="col-lg-1 col-form-label">Title</label>
                                            <div class="col-lg-11">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['ptitle']?>" disabled>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Property Type</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['ptype']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Selling Type</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['stype']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Bathroom</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['bathroom']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Kitchen</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['kitchen']?>" disabled>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-3 col-form-label">BHK</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['bhk']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Bedroom</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['bedroom']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Balcony</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['balcony']?>" disabled>
                                            </div>                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Hall</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['hall']?>" disabled>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <h4 class="card-title">Price & Location</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Floor</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['floor']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Price</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['price']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">City</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['city']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">State</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['state']?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Total Floor</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['tfloor']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Area Size</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['sqft']?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Address</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $data['paddress']?>" disabled>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Description</label>
                                            <div class="col-lg-9">
                                                <textarea class="tinymce form-control" name="content" rows="10"
                                                    cols="30" disabled><?php echo $data['description']?></textarea>
                                            </div>
                                </div>

                                <h4 class="card-title">Image & Status</h4>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Image 1</label>
                                            <div class="col-lg-9">
                                                <img src="./Img/Property_Image/house/<?php echo $data['img1'];?>" style="height: 300px; width: 400px;"
                                                    class="img-thumbnail" alt="...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Image 3</label>
                                            <div class="col-lg-9">
                                                <img src="./Img/Property_Image/house/<?php echo $data['img2'];?>" style="height: 300px; width: 400px;"
                                                    class="img-thumbnail" alt="...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Status</label>
                                            <div class="col-lg-9">
											<input type="text" class="form-control"  value="<?php echo $data['status']?>" disabled>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Image 2</label>
                                            <div class="col-lg-9">
                                                <img src="./Img/Property_Image/house/<?php echo $data['img3'];?>" style="height: 300px; width: 400px;"
                                                    class="img-thumbnail" alt="...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Image 4</label>
                                            <div class="col-lg-9">
                                                <img src="./Img/Property_Image/house/<?php echo $data['img4'];?>" style="height: 300px; width: 400px;">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Electricity Bill</label>
                                            <div class="col-lg-9">
                                                <img src="./Img/Property_Image/house/<?php echo $data['ebill'];?>" style="height: 300px; width: 400px;"
                                                    class="img-thumbnail" alt="...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Taxs Bill</label>
                                            <div class="col-lg-9">
                                                <img src="./Img/Property_Image/house/<?php echo $data['tbill'];?>" style="height: 300px; width: 400px;">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            <?php if($_GET['type'] == 'Pending'){?>
								<div style="display: flex; justify-content: end;">
                                <a class="btn btn-primary" href="req_accept.php?pid=<?php echo $data['pid'];?>&type=<?php echo $type;?>">Accept</a>  
								</div>
                            <?php }?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->


    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/plugins/tinymce/tinymce.min.js"></script>
    <script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

</html>