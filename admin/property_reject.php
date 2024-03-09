<?php

require("config.php");
    $pid = $_GET['pid'];
    if (isset($_POST['res'])) {
            $response = $_POST['response'];
            $sql = "UPDATE `tblhouse` SET `response`='$response' , `qc`='Reject' WHERE `pid`='$pid' ";
            $result = mysqli_query($con, $sql);
            // unset($_SESSION['id']);
            if ($result) {
                $uid = $_GET['uid'];
                $res = mysqli_query($con , "UPDATE user SET credit = credit + 1 WHERE `uid` = $uid");
                if($res){
                    $_SESSION['msg']="Rejected Succesfully";
                    $_SESSION['status']="success";
                    header('location:property_req.php?type=Reject');
                }
            } else {
                $_SESSION['msg']="Some Error In Reject Property";
                $_SESSION['status']="error";
            }
        } else {
            $_SESSION['msg']="Add Some Reponce In Textbox";
                $_SESSION['status']="error";
        }
?>