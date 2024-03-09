<?php
    session_start();
    include('../config/config.php');
    require 'sendmail.php';

    if(isset($_POST['btn_otp'])){
        $email = $_POST['email'];
        $_SESSION['email'] = $email;
        $mno = $_POST['mno'];

        $query="select uid from user where email='$email' and mno='$mno'";
        $result= mysqli_num_rows(mysqli_query($con , $query));
        if($result > 0){
            $otp = rand(99999,999999);
            $_SESSION['otp'] = $otp;
            $sub = "Reset Password";
            $msg = "<div style='font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2'>
            <div style='margin:50px auto;width:70%;padding:20px 0'>
                <div style='border-bottom:1px solid #eee'>
                    <a href='' style=font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600'>Locus
                        Real-State</a>
                </div>
                <p style='font-size:1.1em'>Hi,</p>
                <p>Use the following OTP to complete your Sign Up procedures. OTP is
                    valid for 5 minutes</p>
                <h2
                    style='background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;'>
                    $otp</h2>
                <p style='font-size:0.9em;'>Regards,<br />Locus Real-State</p>
                <hr style='border:none;border-top:1px solid #eee' />
                <div style='float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300'>
                    <p>Locus Real-State Inc</p>
                    <p>Surat,Gujrat</p>
                </div>
            </div>
        </div>";
            $sendmail = SendMail($email , $sub , $msg);
            // $_SESSION['message']= "Email Send SuccessFull...";
            $_SESSION['alert'] = array();
            $icon = "success";
            $title = "OTP Send Success";
            $text = "Check Your Mail And Enter OTP...";
            $footer = "Help And Support";
            $link = "contact.php";
            array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);            
            header("location: ../verify.php");
        }
        else{
            // $_SESSION['message']= "User Not Found...!";
            $_SESSION['alert'] = array();
            $icon = "error";
            $title = "Something Wenr Wrong...!";
            $text = "User Not Find...!";
            $footer = "Help And Support";
            $link = "contact.php";
            array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
            header("location: ../resetpass.php");
        }

    }
    if(isset($_POST['btn_res'])){
        $otp = $_SESSION['otp'];
        $r_otp = $_POST['otp'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $email = $_SESSION['email'];
        
        if($otp == $r_otp){
            if($pass == $cpass){
                $get_uid="select * from user where email ='$email'";
                $uid1 =mysqli_fetch_array( mysqli_query($con , $get_uid));
                $_SESSION['uid'] = $uid1['uid'];
                $uid =$_SESSION['uid'];
                $pass = password_hash($pass , PASSWORD_BCRYPT);
                $query="update user set password='$pass' where uid='$uid'";
                $result=mysqli_query($con , $query);
                if($result){
                    unset($SESSION['uid']);
                    unset($SESSION['email']);
                    // $_SESSION['message']= "Password Reset SuccessFull";
                    $_SESSION['alert'] = array();
                    $icon = "success";
                    $title = "Success";
                    $text = "Password Reset Success...";
                    $footer = "Help And Support";
                    $link = "contact.php";
                    array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);    
                    header("location: ../login.php");
                }else{
                    // $_SESSION['message']= "password is not reset";
                    $_SESSION['alert'] = array();
                    $icon = "error";
                    $title = "Error...!";
                    $text = "Something Went Wrong...!";
                    $footer = "Help And Support";
                    $link = "contact.php";
                    array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
                    header("location: ../resetpass.php");
                }
            }else{
                $_SESSION['message']= "Confirm Password is not match...!!";
                header("location: ../resetpass.php");
            }
        }
        else{
            // $_SESSION['message']= "OTP is not match...!";
            $_SESSION['alert'] = array();
            $icon = "error";
            $title = "Error...!";
            $text = "OTP Is Not Match...!";
            $footer = "Help And Support";
            $link = "contact.php";
            array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
            header("location: ../resetpass.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOCUS | Reset Password</title>
</head>

<body>
    
</body>

</html>