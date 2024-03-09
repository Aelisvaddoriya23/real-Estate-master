<?php
session_start();
require("config.php");
////code

if (!isset($_SESSION['auser'])) {
	header("location:index.php");
}

$get_user = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM user"));
$get_user_admin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM `admin`"));
$get_feedback = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM tblfeedback"));
$get_contact = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM tblcontact"));
$get_property_success = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM tblhouse where qc='success'"));
$get_property_pending = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM tblhouse where qc='pending'"));
$get_property_reject = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM tblhouse where qc='reject'"));
$get_property_sum = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(amt) AS total FROM tblpmt;"));

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>LOCUS | Dashboard</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favi.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/css/feathericon.min.css">

	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">

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
	<!-- /Header -->

	<!-- Page Wrapper -->
	<div class="page-wrapper">

		<div class="content container-fluid">

			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="page-title">Welcome Admin!</h3>
						<p></p>
						<ul class="breadcrumb">
							<li class="breadcrumb-item active">Dashboard</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-xl-3 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							<div class="dash-widget-header">
								<span class="dash-widget-icon bg-primary">
									<i class="fe fe-users"></i>
								</span>

							</div>
							<div class="dash-widget-info">
								<a href="userlist.php">
									<h3 class="text-dark"><?php echo $get_user['total'] ?> </h3>

									<h6 class="text-muted">Users</h6>
									<div class="progress progress-sm">
										<div class="progress-bar bg-primary w-50"></div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							<div class="dash-widget-header">
								<span class="dash-widget-icon bg-primary">
									<i class="fe fe-users"></i>
								</span>

							</div>
							<div class="dash-widget-info">
								<a href="adminlist.php">
									<h3 class="text-dark"><?php echo $get_user_admin['total'] ?></h3>

									<h6 class="text-muted">Admin</h6>
									<div class="progress progress-sm">
										<div class="progress-bar bg-primary w-50"></div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							<div class="dash-widget-header">
								<span class="dash-widget-icon bg-success">
									<i class="icon" data-feather="message-square"></i>
								</span>
							</div>

							<div class="dash-widget-info">
								<a href="feedbackview.php">
									<h3 class="text-dark"><?php echo $get_feedback['total'] ?></h3>

									<h6 class="text-dark">Feedback</h6>
									<div class="progress progress-sm">
										<div class="progress-bar bg-success w-50"></div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							<div class="dash-widget-header">
								<span class="dash-widget-icon bg-success">
									<i class="icon" data-feather="message-square"></i>
								</span>

							</div>
							<div class="dash-widget-info">
								<a href="contactdetails.php">

									<h3 class="text-dark"><?php echo $get_contact['total'] ?></h3>

									<h6 class="text-muted">Contact Message</h6>
									<div class="progress progress-sm">
										<div class="progress-bar bg-success w-50"></div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>


			</div>

			<div class="row">
				<div class="col-xl-3 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							<div class="dash-widget-header">
								<span class="dash-widget-icon bg-success">

									<i class="fe fe-home"></i>
								</span>

							</div>
							<div class="dash-widget-info">
								<a href="property_req.php?type=Success">

									<h3 class="text-dark"><?php echo $get_property_success['total'] ?> </h3>

									<h6 class="text-muted">Listed Property</h6>
									<div class="progress progress-sm">
										<div class="progress-bar bg-success w-50"></div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							<div class="dash-widget-header">
								<span class="dash-widget-icon bg-warning">
									<i class="fe fe-home"></i>
								</span>

							</div>
							<div class="dash-widget-info">
								<a href="propertyview_pending.php">
									<h3 class="text-dark"><?php echo $get_property_pending['total'] ?></h3>

									<h6 class="text-dark">Pending Property</h6>
									<div class="progress progress-sm">
										<div class="progress-bar bg-warning w-50"></div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							<div class="dash-widget-header">
								<span class="dash-widget-icon bg-danger">
									<i class="fe fe-home"></i>
								</span>

							</div>
							<div class="dash-widget-info">
								<a href="propertyview_reject.php">

									<h3 class="text-dark"><?php echo $get_property_reject['total'] ?></h3>

									<h6 class="text-muted">Rejected Property </h6>
									<div class="progress progress-sm">
										<div class="progress-bar bg-danger w-50"></div>
									</div>
							</div>
							</a>

						</div>
					</div>
				</div>

				<div class="col-xl-3 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							<div class="dash-widget-header">
								<span class="dash-widget-icon bg-primary ">
									<i data-feather="home"></i>

								</span>

							</div>
							<div class="dash-widget-info">
								<a href="#">

									<h3 class="text-dark"><?php echo $get_property_sum['total'] / 1000 ?> k </h3>
									<h6 class="text-muted"> Total Revenue </h6>
									<div class="progress progress-sm">
										<div class="progress-bar bg-primary w-50"></div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="w-100 shadow  bg-body-tertiary rounded">
					<div class="bg-white d-flex justify-content-center">
						<?php include("propertychart.php"); ?>
					</div>
					<div class="bg-white d-flex justify-content-center">
						<?php include("planchart.php"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div>
	</div>
	</div>
	<!-- /Page Wrapper -->


	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/plugins/morris/morris.min.js"></script>
	<script src="assets/js/chart.morris.js"></script>
	<script>
		feather.replace();
	</script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>

</body>

</html>