<?php
session_start();
include('./config/config.php');

if (isset($_POST['update'])) {
    $prid = $_POST["prid"];
    $ptitle = $_POST["ptitle"];
    $ptype = $_POST["ptype"];
    $bhk = $_POST["bhk"];
    $stype = $_POST["stype"];
    $bedroom = $_POST["bedroom"];
    $balcony = $_POST["balcony"];
    $bathroom = $_POST["bathroom"];
    $kitchen = $_POST["kitchen"];
    $hall = $_POST["hall"];
    $floor = $_POST["floor"];
    $tfloor = $_POST["tfloor"];
    $price = $_POST["price"];
    $sqft = $_POST["sqft"];
    $paddress = $_POST["paddress"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $status = $_POST["status"];
    $featured = $_POST["featured"];
    $description = $_POST["description"];
    $allow_type = array('png', 'jpg', 'jpeg');

    // $destination1 = "../admin/img/property_image/";
    // $image1 = $_FILES['img1']['name'];
    // $tmp_name1 = $_FILES['img1']['tmp_name'];
    // $size = $_FILES['img1']['size'];
    // $path = $destination1 . $image1;
    // $target_file1 = $destination1 . basename($image1);
    // $img_type1 = pathinfo($target_file1, PATHINFO_EXTENSION);

    // $destination2 = "../admin/img/property_image/";
    // $image2 = $_FILES['img2']['name'];
    // $tmp_name2 = $_FILES['img2']['tmp_name'];
    // $size = $_FILES['img2']['size'];
    // $path = $destination2 . $image2;
    // $target_file2 = $destination2 . basename($image2);
    // $img_type2 = pathinfo($target_file2, PATHINFO_EXTENSION);

    // $destination3 = "../admin/img/property_image/";
    // $image3 = $_FILES['img3']['name'];
    // $tmp_name3 = $_FILES['img3']['tmp_name'];
    // $size = $_FILES['img3']['size'];
    // $path = $destination3 . $image3;
    // $target_file3 = $destination3 . basename($image3);
    // $img_type3 = pathinfo($target_file3, PATHINFO_EXTENSION);

    // $destination4 = "../admin/img/property_image/house/";
    // $image4 = $_FILES['img4']['name'];
    // $tmp_name4 = $_FILES['img4']['tmp_name'];
    // $size = $_FILES['img4']['size'];
    // $path = $destination4 . $image4;
    // $target_file4 = $destination4 . basename($image4);
    // $img_type4 = pathinfo($target_file4, PATHINFO_EXTENSION);


    // if (in_array($img_type1 || $img_type2 || $img_type3 || $img_type4 , $allow_type)) {
    //     if ($size <= 2000000) {
            // if ($tmp_name1 != '' || $tmp_name2 != '' || $tmp_name3 != '' || $tmp_name4 != '') {
                // $res = mysqli_query($con, "select * from tblhouse where pid='$prid'");
                // if ($row = mysqli_fetch_array($res)) {
                //     $deleteimage1 = $row['img1'];
                //     $deleteimage2 = $row['img2'];
                //     $deleteimage3 = $row['img3'];
                //     $deleteimage4 = $row['img4'];
                // }
                // unlink($destination1 . $deleteimage1 || $destination2 . $deleteimage2 || $destination3 . $deleteimage3 || $destination4 . $deleteimage4);

                // move_uploaded_file($tmp_name1, $target_file1);
                // move_uploaded_file($tmp_name2, $target_file2);
                // move_uploaded_file($tmp_name3, $target_file3);
                // move_uploaded_file($tmp_name4, $target_file4);

                $query = "update tblhouse set ptitle='$ptitle', ptype='$ptype', bhk='$bhk', stype='$stype', bedroom='$bedroom', balcony='$balcony', bathroom='$bathroom', kitchen='$kitchen', hall='$hall', floor='$floor', tfloor='$tfloor', price='$price', sqft='$sqft', paddress='$paddress', city='$city', state='$state', featured='$featured', description='$description' where pid='$prid' ";
                $result = mysqli_query($con, $query);
                mysqli_query($con , "update tblhouse set qc='Pending' , response='Your Listing Is Live...' where pid='$prid'");
                if ($result) {
                    $_SESSION['alert'] = array();
                    $icon = "success";
                    $title = "Update";
                    $text = "Your property updated successfull...";
                    $footer = "Help And Support";
                    $link = "contact.php";
                    array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
                    header('location:user-property.php?filter=all');
                } else {
                    $_SESSION['alert'] = array();
                $icon = "error";
                $title = "Something Wrong...!";
                $text = "Property update Failed";
                $footer = "Help And Support";
                $link = "contact.php";
                array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
                header("location:update_property.php?pid=$prid");
                }
            // }
    //     } else {
    //         $_SESSION['alert'] = array();
    //             $icon = "warning";
    //             $title = "Image Image Size Related";
    //             $text = "Image size should be less than 20MB";
    //             $footer = "Help And Support";
    //             $link = "contact.php";
    //             array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
    //             header("location:update_property.php?pid=$prid");
    //     }
    // } else {
    //             $_SESSION['alert'] = array();
    //             $icon = "error";
    //             $title = "Image type Related";
    //             $text = "Please insert only .JPG , .JPEG and .PNG";
    //             $footer = "Help And Support";
    //             $link = "contact.php";
    //             array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
    //             header("location:update_property.php?pid=$prid");
    // }
}
