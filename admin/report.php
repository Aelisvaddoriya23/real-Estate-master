<?php
session_start();
require("config.php");
if (!isset($_SESSION['auser'])) {
    header("location:index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>LOCUS | Report</title>

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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
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
                        <h3 class="page-title">Report</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Report</li>
                            <li class="breadcrumb-item active"><?php echo $_GET['r_type']?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <form action="report_gen.php?r_type=<?php echo $_GET['r_type']?>" method="post">
            <div class="row g-1 mb-5" >
                <div class="col-5">
                    <div class="form-floating">
                        <label for="subject">From</label>
                        <input type="date" class="form-control" id="dateChecker1" required  max="<?php echo date('Y-m-d');?>"  name="from" placeholder="From" >
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-floating">
                        <label for="subject">To</label>
                        <input type="date" class="form-control" required  name="to" max="<?php echo date('Y-m-d');?>">
                    </div>
                </div>
                <div class="col-2">
                <div class="form-floating">
                        <label for="subject">Done</label>
                        <input type="submit" class="form-control btn bg-info text-black" name="date" value="Done">
                    </div>
                </div>
            </div>
        </form>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Report List</h4>
                            <?php
                            if (isset($_GET['msg']))
                                echo $_GET['msg'];

                            ?>
                        </div>
                        <div class="card-body">

                            <table id="basic-datatable" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width:10%">View</th>
                                        <th style="width:10%">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php
                                    $dir_path = './report/'.$_GET['r_type'].'/';

                                    $files = scandir($dir_path);

                                    foreach ($files as $file) {
                                        if ($file == '.' || $file == '..') {
                                            continue;
                                        }
                                        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                                        if ($file_extension != 'pdf') {
                                            continue;
                                        }
                                        echo '<tr class="align-middle">
                                        <td> '. $file .'</td>
                                        <td class="text-center"><a target="_blank" href="' . $dir_path . $file . '"><button class="btn btn-success">View</button></a></td>
                                        <td class="text-center"><a href="./delete_report.php?r_type='.$_GET['r_type'].'&path='.$dir_path.'&name='.$file.'"><button class="btn btn-danger">Delete</button></a></td>
                                    </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Main Wrapper -->
    <script>
        $(document).ready(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();

        if (month < 10) {
            month = '0' + month.toString();
        }
        if (day < 10) {
            day = '0' + day.toString();
        }

        var maxDate = year + '-' + month + '-' + day;
        $('#dateChecker1').attr('min', maxDate);
        $('#dateChecker2').attr('min', maxDate);

    })
    </script>
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