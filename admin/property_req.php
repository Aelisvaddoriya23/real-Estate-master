<?php
session_start();
require("config.php");
$show = true;
$type = $_GET['type'];
error_reporting(E_ERROR | E_PARSE);
// Turn off all error reporting
error_reporting(0);
if (!isset($_SESSION['auser'])) {
    header("location:index.php");
}
switch ($type) {
    case 'all':
        $get_data = (mysqli_query($con, "select * from tblhouse"));
        break;
    case 'Success':
        $get_data = (mysqli_query($con, "select * from tblhouse where qc='Success'"));
        break;
    case 'Pending':
        $get_data = (mysqli_query($con, "select * from tblhouse where qc='Pending'"));
        break;
    case 'Reject':
        $get_data = (mysqli_query($con, "select * from tblhouse where qc='Reject'"));
        break;
    
    default:
        # code...
        break;
}



// $response=$_POST['response'];


// if(isset($_POST['res']))
// {
// 	$pid = $_SESSION['pid']; 
// 	if($response)
// 	{
// 		$sql="UPDATE `tblhouse` SET `response`='$response WHERE `pid`='$id'";
// 		$result=mysqli_query($con,$sql);
// 		unset($_SESSION['id']);
// 		if($result)
// 			{
// 				$msg='Response Added Successsfully';		
// 			}
// 			else
// 			{
// 				$error='Not Response Added Successsfully';
// 			}
// 	}
// 	else{
// 		$error="* Please Fill all the Fields!";
// 	}

// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>LOCUS | Request</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favi.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/select.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/buttons.bootstrap4.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

    <!-- Main Wrapper -->


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
                        <h3 class="page-title">Admin</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Property Requestes</li>
                            <li class="breadcrumb-item active"><?php echo $type; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Request List</h4>
                            <?php
                            if (isset($_GET['msg']))
                                echo $_GET['msg'];

                            ?>
                        </div>
                        <div class="card-body">

                            <table id="basic-datatable " class="table">
                                <thead>
                                    <tr>
                                        <th>PID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>View</th>
                                        <?php if($type == 'Pending') {?>
                                        <th colspan="2" class="text-center">Action</th>
                                        <?php }?>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php

                                    while ($data = mysqli_fetch_array($get_data)) {
                                        $show = false; ?>
                                        <tr>
                                            <td class="align-middle"><?php echo $data['pid']; ?></td>
                                            <td class="align-middle"><img src='./Img/Property_image/house/<?php echo $data['img1']; ?>' style="height: 100px; width: 100px;" alt=""></td>
                                            <td class="align-middle"><?php echo $data['ptitle']; ?></td>
                                            <td class="align-middle"><?php echo $data['price']; ?></td>
                                            <td class="align-middle"><?php echo $data['ptype']; ?></td>
                                            <td class="align-middle"><a href="property_details.php?pid=<?php echo $data['pid']; ?>&type=<?php echo $type; ?>"><button class="btn btn-success">See Details</button></a></td>
                                            <?php if($type == 'Pending') {?>
                                            <td class="align-middle"><a href="req_accept.php?pid=<?php echo $data['pid']; ?>&type=<?php echo $type; ?>"><button class="btn btn-success">Accept</button></a>
                                            </td>
                                            
                                            <td class="align-middle"><a data-bs-toggle="modal" name="res" data-bs-target="#exampleModal1" href=""><button class="btn btn-danger">Reject</button></a></td>
                                            <?php }?>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Reject Reason</h5>
                                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="property_reject.php?pid=<?php echo $data['pid']; ?>&uid=<?php echo $data['uid']; ?>">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlTextarea1" class="form-label">Write Response</label>
                                                                <textarea class="form-control" name="response" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                            </div>

                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="res" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if ($show) {
                                        echo '<tr class="odd"><td valign="top" colspan="7" class="dataTables_empty text-center">No data available in table</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->

        </div>
    </div>
    </div>
    <!-- /Main Wrapper -->


    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Datatables JS -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <script src="assets/plugins/datatables/dataTables.select.min.js"></script>

    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.flash.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>