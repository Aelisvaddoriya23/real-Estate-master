<?php 
session_start();
require("config.php");

if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
    $p_id=$_GET['p_id'];
    $data = mysqli_fetch_array(mysqli_query($con , "select * from tblplan where p_id = $p_id"));
//// add code
$error="";
$msg="";
if(isset($_POST['updateplan']))
{
	$p_name=$_POST['p_name'];
	$p_price=$_POST['p_price'];
	$p_credit=$_POST['p_credit'];
	$p_description=$_POST['p_description'];
	
	$sql="UPDATE `tblplan` SET `p_name`='$p_name',`p_price`='$p_price',`p_credit`='$p_credit',`p_description`='$p_description' WHERE `p_id`='$p_id'";
	$result=mysqli_query($con,$sql);
	if($result)
		{
            header('location:view_plan.php');    
			$msg="<p class='alert alert-success'>Update Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>* Not Update Some Error</p>";
		}
}
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>LOCUS | Manage Plan</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favi.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/css/select2.min.css">
		
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
								<h3 class="page-title">Manage Plan</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Manage Plan</li>
									<li class="breadcrumb-item active">Update Plan</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h2 class="card-title">Update Plan</h2>
								</div>
								<form method="post" enctype="multipart/form-data" action="update_plan.php?p_id=<?php echo $data['p_id']?>">
								<div class="card-body">
										<div class="row">
											<div class="col-xl-12">
												<?php echo $error; ?>
												<?php echo $msg; ?>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Plan Name</label>
													<div class="col-lg-9">
														<input type="text" value="<?php echo $data['p_name']?>" class="form-control" name="p_name" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Plan Price</label>
													<div class="col-lg-9">
														<input type="text" value="<?php echo $data['p_price']?>" class="form-control" name="p_price" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Plan Credit</label>
													<div class="col-lg-9">
														<input type="text" value="<?php echo $data['p_credit']?>" class="form-control" name="p_credit" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Plan Description</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control"name="p_description" rows="10" cols="30">
                                                        <?php echo $data['p_description']?>
                                                        </textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="text-left">
											<input type="submit" class="btn btn-primary"  value="Update Plan" name="updateplan" style="margin-left:200px;">
										</div>
									</form>
								</div>
								
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
			<!-- /Page Wrapper -->
		<!-- /Main Wrapper -->
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/js/select2.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
    </body>

</html>