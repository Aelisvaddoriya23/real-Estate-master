<?php
    session_start();
    include('./config/config.php');
    if(!isset($_SESSION['uid'])){
        header("location:login.php");
    }
    require './Function/sendmail.php';
    $uid = $_SESSION['uid'];
    $select_q="select * from tblpbooking where seller_id=$uid";
    $query=mysqli_query($con,$select_q);

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LOCUS | Property Order</title>
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
    
    <!-- Sweet Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> -->
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/alert.css">
</head>

<body class="bg-white">
    <div class=" bg-white p-0">
        <!-- Spinner Start -->
        <?php include('../User/include/spinner.php')?>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <?php include('../User/include/header.php')?>
        <!-- Navbar End -->


        <div class="container">
            <div class="text-center mt-5 mx-auto mb-5 text-black wow fadeInUp" style="max-width: 600px;">
                <h1 class="mb-3 text-black">Property Booking Order</h1>
            </div>
            <div class="mb-5 text-cneter  align-middle">
                <table id="myTable" class="table  text-black align-middle text-center table-striped table-bordered"
                    style="font-size: 0.8rem;">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">BID</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Buyer Details</th>
                            <th scope="col">Selling Type</th>
                            <th scope="col">Booking Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-black">
                        <?php $cnt = 1; while($data = mysqli_fetch_array($query)) {
                            $pid = $data['pid'];
                            $property = mysqli_fetch_array(mysqli_query($con , "select * from tblhouse where pid=$pid"));
                            $img = $property['img1'];
                            $uid = $property['uid'];
                           ?>
                        <tr>
                            <td><?php echo $data['bid']?></td>
                            <td><img style="height: 100px; width: 100px;"
                                    src="../admin/img/Property_image/house/<?php echo $img ?>" class="img-thumbnail"
                                    alt="..."></td>
                            <td><?php echo $property['ptitle']?></td>
                            <td>₹ <?php echo $property['price']?></td>
                            <td><?php echo $data['name']?><br><?php echo $data['email']?></td>
                            <td><?php echo $property['stype']?></td>
                            <td><?php echo $data['bdate']?></td>

                            <td
                                class="text-<?php if($data['status'] == "Pending"){echo 'warning' ;} if($data['status'] == "Success"){echo 'success';}if($data['status'] == "Reject"){echo 'danger' ;}?> fw-bold">
                                <?php echo $data['status']?></td>
                            <td class="text-black fw-bold " style="cursor: 
                            <?php 
                            if($data['status'] == "Success" || $data['status'] == "Reject")
                            {echo "not-allowed";} 
                            else{ echo "pointer";}
                            ?>;" data-bs-toggle="modal" data-bs-target="<?php if($data['status'] == "Success" ||$data['status'] == "Reject" )
                            {echo "";}
                            else{ $id=$data['bid']; echo "#Modal$id" ;}?>"><button class="btn bg-black text-tan"
                            style="cursor: 
                            <?php 
                            if($data['status'] == "Success" || $data['status'] == "Reject")
                            {echo "not-allowed";} 
                            else{ echo "pointer";}
                            ?>;">Take Action</button>
                            </td>

                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal<?php echo $data['bid']?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Booking Details
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <form
                                                action="function/order.php?bid=<?php echo $data['bid'];?>&pid=<?php echo $data['pid'];?>"
                                                method="post">

                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <select name="status" id="" class="form-select">

                                                            <option value="Success">Success</option>
                                                            <option value="Reject">Reject</option>
                                                        </select>
                                                        <label for="">Action</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <textarea class="form-control"
                                                            placeholder="Leave a message here" name="reason"
                                                            id="message" style="height: 150px"></textarea>
                                                        <label for="message">Message</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn bg-tan text-black w-100 py-3" name="submit"
                                                        type="submit">Send
                                                        Message</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn  bg-tan text-black"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                            <?php 
                    
                    $cnt = $cnt + 1;
                    }
                    ?>

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

            <!-- Back to Top -->
            <?php include('../User/include/top.php')?>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        </script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
</body>

</html>