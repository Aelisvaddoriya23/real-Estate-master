<?php
    session_start();
    require("config.php");
    $pid = $_GET['pid'];
    $type = $_GET['type'];

    // if($type == "home"){
        $query="UPDATE tblhouse SET qc= 'Success' WHERE pid=$pid ";
        $result=mysqli_query($con , $query);
        if($result){
            $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">Contact Delete Successfully<button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>';
            header("Location:proerty_req.php?msg=$msg&type=$type");
        }
        else{
            $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">Contact Delete Successfully<button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>';
            header("Location:proerty_req.php?msg=$msg&type=$type");
        }
        header("location:property_req.php?type=$type");
    // }
    // if($type == "business"){
    //     $query="UPDATE tblbusiness SET qc= 1 WHERE pid=$pid ";
    //     $result=mysqli_query($con , $query);
    //     if($result){
    //         $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">Contact Delete Successfully<button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>';
    //         header("Location:proerty_req.php?msg=$msg&type=$type");
    //     }
    //     else{
    //         $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">Contact Delete Successfully<button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>';
    //         header("Location:proerty_req.php?msg=$msg&type=$type");
    //     }
    //     header("location:property_req.php?type=$type");
    // }
    // if($type == "occasion"){
    //     $query="UPDATE tbloccasion SET qc= 1 WHERE pid=$pid ";
    //     $result=mysqli_query($con , $query);
    //     if($result){
    //         $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">Contact Delete Successfully<button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>';
    //         header("Location:proerty_req.php?msg=$msg&type=$type");
    //     }
    //     else{
    //         $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">Contact Delete Successfully<button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>';
    //         header("Location:proerty_req.php?msg=$msg&type=$type");
    //     }
    //     header("location:property_req.php?type=$type");
    // }
?>