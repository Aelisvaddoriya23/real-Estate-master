<?php
session_start();
include('./config/config.php');
$uid = $_SESSION['uid'];
$select_qur = "select * from user where uid='$uid'";
$query = mysqli_query($con, $select_qur);
$data = mysqli_fetch_array($query);
?>
<?php 
if(isset($_FILES["fileImg"]["name"])){
    $uid = $_SESSION["uid"];

    $src = $_FILES["fileImg"]["tmp_name"];
    $imageName = uniqid() . $_FILES["fileImg"]["name"];

    $target = "img/user/" . $imageName;

    move_uploaded_file($src, $target);

    $query = "UPDATE user SET img = '$imageName' WHERE uid = $uid";
    mysqli_query($con, $query);

    header("Location: profile.php");
  }
?>
<!DOCTYPE html>
<html lang="en" style="background: white;">

<head>
    <meta charset="utf-8">
    <title>LOCUS | Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    
    <link rel="shortcut icon" type="image/x-icon" href="../admin/assets/img/favi.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Sweet Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Data Table -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style media="screen">
    .upload{
      width: 150px;
      position: relative;
      margin: auto;
      text-align: center;
    }
    .upload img{
      border-radius: 50%;
      border: 5px solid #DCDCDC;
      width: 125px;
      height: 125px;
    }
    .upload .rightRound{
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
    .upload .leftRound{
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
    .upload .fa{
      color: white;
    }
    .upload input{
      position: absolute;
      transform: scale(2);
      opacity: 0;
    }
    .upload input::-webkit-file-upload-button, .upload input[type=submit]{
      cursor: pointer;
    }
  </style>
</head>

<body>

    <div class=" bg-white p-0">
        <!-- Spinner Start -->
        <?php include('../User/include/spinner.php') ?>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php include('../User/include/header.php') ?>
        <!-- Navbar End -->



        <div class="container mt-5">
            <div class="text-center mx-auto mb-5 text-black wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3 text-black pb-2" style="border-bottom: 2px solid var(--tan);">Profile</h1>
            </div>
        </div>

        <div class="profile">
            <div class="container">
                <div class="main-body">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
                                            <input type="hidden" name="id" value="<?php echo $data['uid']; ?>">
                                            <div class="upload">
                                                <img src="img/user/<?php echo $data['img']; ?>" id="image">

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
                                        <div class="mt-3">
                                            <h4><?php echo $data['uname'] ?></h4>
                                            <p class="text-dark mb-1"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">User Id</h6>
                                        </div>
                                        <div class="col-sm-9 text-dark">
                                            <?php echo $data['uid'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-dark">
                                            <?php echo $data['uname'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-dark">
                                            <?php echo $data['email'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mobile</h6>
                                        </div>
                                        <div class="col-sm-9 text-dark">
                                            <?php echo $data['mno'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address
                                                <?php if ($data['address'] == null) { ?>
                                                    <span class="position-absolute top-80 start-80  p-1 bg-danger  rounded-circle">
                                                        <span class="visually-hidden">New alerts</span>
                                                    <?php } ?>
                                            </h6>
                                        </div>
                                        <div class="col-sm-9 text-dark">
                                            <?php echo $data['address'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a class="btn btn-info " href="edit_profile.php">Edit
                                                <?php if ($data['address'] == null) { ?>
                                                    <span class="position-absolute top-80 start-80  p-1 bg-danger rounded-circle">
                                                        <span class="visually-hidden">New alerts</span>
                                                    <?php } ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container bg-white">
            <div class="container mt-5">
                <div class="text-center mx-auto mb-5 text-black wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3 text-black pb-2" style="border-bottom: 2px solid var(--tan);">Contact</h1>
                </div>
            </div>
            <?php

            $select_contact = "select * from tblcontact where uid='$uid'";
            $query_contact = mysqli_query($con, $select_contact); ?>
            <div class="col-md-12 my-5">
                <table id="myTable" class="table table-stripe text-black" style="width:100%">
                    <thead>
                        <tr>
                            <th>Ticket ID</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Response</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-black">
                        <?php
                        // $row = mysqli_fetch_array($query_contact);
                        while ($row = mysqli_fetch_array($query_contact)) { ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['subject'] ?></td>
                                <td><?php echo $row['msg'] ?></td>
                                <td><?php if ($row['response'] == null) {
                                        echo '<p class="text-danger">Pending</p>';
                                    } else {
                                        echo '<p class="text-success">Success</p>';
                                    } ?>
                                </td>
                                <td><?php if ($row['response'] == null) {
                                        echo '---';
                                    } else {
                                        echo $row['response'];
                                    } ?></td>
                                <td><?php echo $row['date'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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
        </div>
    </div>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script type="text/javascript">
      document.getElementById("fileImg").onchange = function(){
        document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

        document.getElementById("cancel").style.display = "block";
        document.getElementById("confirm").style.display = "block";

        document.getElementById("upload").style.display = "none";
      }

      var userImage = document.getElementById('image').src;
      document.getElementById("cancel").onclick = function(){
        document.getElementById("image").src = userImage; // Back to previous image

        document.getElementById("cancel").style.display = "none";
        document.getElementById("confirm").style.display = "none";

        document.getElementById("upload").style.display = "block";
      }
    </script>
    <!-- Data Table -->
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>


</html>