<?php
    $file_path = ''.$_GET['path'].''.$_GET['name'].'';
    echo $file_path;
    if (file_exists($file_path)) {
        if (unlink($file_path)) {
            $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">File Delete Successfully<button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>';
	        header("Location:report.php?msg=$msg&r_type=".$_GET['r_type']."");
        } else {
            $msg='<div class="alert alert-danger alert-dismissible fade show" role="alert">Error In File Delete <button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>';
	        header("Location:report.php?msg=$msg&r_type=".$_GET['r_type']."");
        }
    } else {
        $msg='<div class="alert alert-danger alert-dismissible fade show" role="alert">This File Does Not Exist.. <button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>';
	        header("Location:report.php?msg=$msg&r_type=".$_GET['r_type']."");
    }
?>