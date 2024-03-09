<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "locus";

$con = mysqli_connect($host,$username,$password,$database);

if(!$con) {
    die("Connetion Fail".mysqli_connect_error());
}
?>
