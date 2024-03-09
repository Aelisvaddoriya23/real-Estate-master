<?php
session_start();
require("config.php");
////code

if (!isset($_SESSION['auser'])) {
	header("location:index.php");
}
?>
<?php
 $id=$_SESSION['auser'];
 $sql="select * from admin where name='$id'";
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($result);
if (isset($_FILES["fileImg"]["name"])) {
				
	$id = $row['aid'];
	$src = $_FILES["fileImg"]["tmp_name"];
	$imageName = uniqid() . $_FILES["fileImg"]["name"];

	$target = "img/admin/" . $imageName;

	move_uploaded_file($src, $target);

	$query = "UPDATE `admin` SET `img` = '$imageName' WHERE `aid` = $id";
	mysqli_query($con, $query);

	header("Location: profile.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>LOCUS | Profile</title>

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
	<style media="screen">
		.upload {
			width: 150px;
			position: relative;
			margin: auto;
			text-align: center;
		}

		.upload img {
			border-radius: 50%;
			border: 5px solid #DCDCDC;
			width: 125px;
			height: 125px;
		}

		.upload .rightRound {
			position: absolute;
			bottom: 0;
			right: 0;
			background: #00B4FF;
			width: 32px;
			height: 32px;
			line-height: 33px;
			text-align: center;
			border-radius: 50%;
			overflow: hidden;
			cursor: pointer;
		}

		.upload .leftRound {
			position: absolute;
			bottom: 0;
			left: 0;
			background: red;
			width: 32px;
			height: 32px;
			line-height: 33px;
			text-align: center;
			border-radius: 50%;
			overflow: hidden;
			cursor: pointer;
		}

		.upload .fa {
			color: white;
		}

		.upload input {
			position: absolute;
			transform: scale(2);
			opacity: 0;
		}

		.upload input::-webkit-file-upload-button,
		.upload input[type=submit] {
			cursor: pointer;
		}
	</style>
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
					<div class="col">
						<h3 class="page-title">Profile</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Profile</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<?php

				$id = $_SESSION['auser'];
				$sql = "select * from admin where name='$id'";
				$result = mysqli_query($con, $sql);
				while($row=mysqli_fetch_array($result))
				{
				?>
					<div class="col-md-12">
						<div class="profile-header">
							<div class="row align-items-center">
								<div class="col-auto profile-image">
									<form class="form" id="form" action="" enctype="multipart/form-data" method="post">
										<input type="hidden" name="id" value="<?php echo $row["aid"]; ?>">
										<div class="upload">
											<img src="img/admin/<?php echo $row['img']; ?>" id="image">

											<div class="rightRound" id="upload">
												<input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png">
												<i class="fa fa-camera"></i>
											</div>
										
												<div class="leftRound" id="cancel" style="display: none;">

													<i class="fa fa-times"></i>

												</div>
												<div class="rightRound" id="confirm" style="display: none;">
													<input type="submit">
													<i class="fa fa-check"></i>
												</div>
										</div>
									</form>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-2 text-uppercase"><?php echo $row['1']; ?></h4>
										<div class="user-Location"><i class="fa fa-id-badge" aria-hidden="true"></i>
											<?php echo $row['4']; ?></div>
										<div class="about-text"></div>
									</div>

								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<!--	<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>  -->
								</ul>
							</div>
							<div class="container-fluid tab-content profile-tab-cont">

								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">

									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-9"><?php echo $row['1']; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-9"><?php echo $row['5']; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-9"><a href="#"><?php echo $row['3']; ?></a></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-9"><?php echo $row['4']; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0">Address</p>
														<p class="col-sm-9 mb-0">Mota Varachha<br>
															Surat,<br>
															Gujarat - 33165,<br>
															India.</p>
													</div>
												</div>
											</div>
										</div>


									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->

								<!-- Change Password Tab -->
								<!--<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form method="post">
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" class="form-control">
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" class="form-control">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" class="form-control">
														</div>
														<button class="btn btn-primary" type="submit">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>  -->
								<!-- /Change Password Tab -->

							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<!-- /Page Wrapper -->

		<!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="assets/js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
			document.getElementById("fileImg").onchange = function() {
				document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

				document.getElementById("cancel").style.display = "block";
				document.getElementById("confirm").style.display = "block";

				document.getElementById("upload").style.display = "none";
			}

			var userImage = document.getElementById('image').src;
			document.getElementById("cancel").onclick = function() {
				document.getElementById("image").src = userImage; // Back to previous image

				document.getElementById("cancel").style.display = "none";
				document.getElementById("confirm").style.display = "none";

				document.getElementById("upload").style.display = "block";
			}
		</script>
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

</body>

</html>