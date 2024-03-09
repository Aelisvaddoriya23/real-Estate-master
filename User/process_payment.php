<?php
session_start();
include('./config/config.php');

if(isset($_POST['pmtid']) && isset($_POST['amt']) )
{
    $pstatus = "Paid";
    $pmtid = $_POST['pmtid'];
    $amount = $_POST['amt'];
    $uid = $_SESSION['uid'];
    $p_id = $_GET['p_id'];

    $p_data = mysqli_fetch_array(mysqli_query($con , "select * from tblplan where p_id=$p_id"));
    $p_name = $p_data['p_name'];
    $p_credit = $p_data['p_credit'];
    $sql = "INSERT INTO `tblpmt`( `uid`,`p_id`,`pmtid`, `amt`,`p_name`) VALUES ('$uid','$p_id','$pmtid','$amount','$p_name')";
    $res = mysqli_query($con, $sql);

    if ($res) {
     mysqli_query($con , "UPDATE user SET credit = credit + $p_credit WHERE uid = $uid");
        $_SESSION['alert'] = array();
        $icon = "success";
        $title = "Congratulation";
        $text = "Credit added in your account..";
        $footer = "Help And Suppurt...";
        $link = "contact.php";
        array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
    }
}

?>