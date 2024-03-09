<?php
require("config.php");


$id=$_GET['fid'];
$status =$_GET['status'];

$sql="update tblfeedback set status = $status where fid=$id";

mysqli_query($con,$sql);
header("Location: feedbackview.php");
?>