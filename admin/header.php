<?php
session_start();
require("config.php");

if (!isset($_SESSION['auser'])) {
    header("location:index.php");
}
?>

<div class="header">

    
    <!-- Logo -->
    <div class="header-left text-light" >
        <a href="dashboard.php" class="logo text-light ">
            <img class="img-fluid  " src="./Img/logo.png" alt="Icon" >
        </a>
        <a href="dashboard.php" class="logo logo-small text-light">
            <img src="./Img/logos1.png" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->
    <a href="javascript:void(0);" id="toggle_btn" >
        <i class="fe fe-text-align-left"></i>
    </a>



    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">

    <?php
		
        $id=$_SESSION['auser'];
        $sql="select * from admin where name='$id'";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($result))
        {
        ?>
        <!-- User Menu -->
        <h4 style="color:white;margin-top:13px;text-transform:capitalize;"><?php echo $_SESSION['auser']; ?></h4>
        <li class="nav-item dropdown app-dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="img/admin/<?php echo $row['img']; ?>" width="31" height="34px" alt="<?php echo $_SESSION['auser'];  ?>" id="image">
            
            </span>
            </a>

            <div class="dropdown-menu">
                <div class="user-header">
               
                    <div class="avatar avatar-sm">
                    <img src="img/admin/<?php echo $row['img']; ?>" id="image">
                    </div>
                    <div class="user-text">
                        <h6><?php echo $_SESSION['auser']; ?></h6>
                        <p class="text-muted mb-0">Administrator</p>
                    </div>
                </div>
                <a class="dropdown-item" href="profile.php">Profile</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </li>
        <?php } ?>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->

</div>

<!-- header --->



<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a href="dashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>

                <!-- <li class="menu-title">
                    <span>Authentication</span>
                </li> -->

                <!-- <li class="submenu">
                    <a href="#"><i class="fe fe-user"></i> <span> Authentication </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="index.php"> Login </a></li>
                        <li><a href="register.php"> Register </a></li>

                    </ul>
                </li> -->
                <li class="menu-title">
                    <span>Users</span>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-user"></i> <span> Users </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="adminlist.php"> Admin </a></li>
                        <li><a href="userlist.php"> Users </a></li>
                    </ul>
                </li>

                <li class="menu-title">
                    <span>Property</span>
                </li>
                <li class="submenu">
                    <a href="#"> <i data-feather="home"></i>
                        <span> Property</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="#"><span>View Property </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="view_property.php?p_type=all">All Property</a></li>
                                <li><a href="view_property.php?p_type=House">House</a></li>
                                <li><a href="view_property.php?p_type=Pent-House">Pent-House</a></li>
                                <li><a href="view_property.php?p_type=Farm">Farm House</a></li>
                                <li><a href="view_property.php?p_type=Banglow">Banglow</a></li>
                                <li><a href="view_property.php?p_type=Flat">Flat</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><span>Property Requestes</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="property_req.php?type=all">All</a></li>
                                <li><a href="property_req.php?type=Pending">Pending</a></li>
                                <li><a href="property_req.php?type=Success">Success</a></li>
                                <li><a href="property_req.php?type=Reject">Reject</a></li>
                                <!-- <li><a href="property_req.php?type=business">Business Property </a></li>
                                <li><a href="property_req.php?type=occasion">Ocassion Property</a></li> -->

                            </ul>
                        </li>
                        <!-- <li><a href="propertyadd.php"> Add Request </a></li> -->

                    </ul>
                </li>
                <li class="menu-title">
                    <span>Plan</span>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="calendar"></i>
                        <span> Manage Plan</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="view_plan.php"> View Plan </a></li>
                        <li><a href="add_plan.php"> Add Plan </a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Payment</span>
                </li>
                <li class="submenu">
                    <a href="#"> <i data-feather="credit-card"></i>
                        <span> Payment</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="payment_details.php"> View Payment </a></li>
                    </ul>
                </li>

                <li class="menu-title">
                    <span>Query</span>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="mail"></i>
                        <span> Query </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="contactview.php"> Contact </a></li>
                        <li><a href="contactdetails.php">Contact Details</a></li>
                        <li><a href="feedbackview.php"> Feedback </a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>About</span>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="heart"></i>
                        <span> About </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="aboutadd.php"> About </a></li>
                        <li><a href="aboutview.php"> View About </a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Report</span>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="heart"></i>
                        <span> Report Download </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="report.php?r_type=payment_report"> Payment Report </a></li>
                        <li><a href="report.php?r_type=property_report"> Property Report </a></li>
                        <li><a href="report.php?r_type=user_report"> User Report </a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    
</div>



<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>

<!-- /Sidebar -->