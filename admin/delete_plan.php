<?php
include("config.php");
$p_id = $_GET['p_id'];
$sql = "DELETE FROM tblplan WHERE p_id = $p_id";
$result = mysqli_query($con, $sql);
if($result == true)
{
	
	$msg='<div class="alert alert-success alert-dismissible fade show" role="alert">Plan Delete Successfully<button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>';
	header("Location:view_plan.php?msg=$msg");
}
else{
	$msg='<div class="alert alert-success alert-dismissible fade show" role="alert">Plan Delete Failed <button type="button"<span aria-hidden="true">&times;</span>';
	header("Location:view_plan.php?msg=$msg");
}
mysqli_close($con);
?>