<?php
    session_start();
    include('./config/config.php');
    $pid=$_GET['pid'];
    
    $delete_q = mysqli_query($con ,"DELETE FROM `tblhouse` WHERE pid='$pid'");
    if($delete_q){
        $_SESSION['alert'] = array();
                $icon = "success";
                $title = "Delete";
                $text = "Your property Deleted successfull...";
                $footer = "Help And Support";
                $link = "contact.php";
                array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
                mysqli_query($con , "delete from tblpbooking where pid= $pid");
                header('location:user-property.php?filter="all"');
    }
    else{
        $_SESSION['alert'] = array();
                $icon = "error";
                $title = "Delete";
                $text = "Something wrong...!";
                $footer = "Help And Support";
                $link = "contact.php";
                array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
    }
    
    
?>