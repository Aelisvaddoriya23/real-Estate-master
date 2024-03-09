<?php
include("config.php");
$cid = $_GET['id'];
$sql = "DELETE FROM tblcontact WHERE id = {$cid}";
$result = mysqli_query($con, $sql);
if($result == true)
{
	
	$msg='<div class="alert alert-success alert-dismissible fade show" role="alert">Contact Delete Successfully<button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>';
	header("Location:contactview.php?msg=$msg");
}
else{
	$msg='<div class="alert alert-success alert-dismissible fade show" role="alert">Contact Delete Failed <button type="button"<span aria-hidden="true">&times;</span>';
	header("Location:contactview.php?msg=$msg");
}
mysqli_close($con);
?>