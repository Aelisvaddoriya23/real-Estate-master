<?php
session_start();
include('./config/config.php');
if(!isset($_SESSION['uid'])){
    header("location:login.php");
}
$uid = $_SESSION['uid'];
$user = mysqli_fetch_array(mysqli_query($con , "select credit from user where uid=$uid"));
if($user['credit'] == 0){
    $_SESSION['alert'] = array();
    $icon = "warning";
    $title = "Insufficient Credit";
    $text = "You Have Not Enough Credit Please Click Below Link And Subscribe Plan";
    $footer = "Click To Start";
    $link = "pricing.php";
    array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
    header("location:./pricing.php");
} else{
if (isset($_POST['QC'])) {
    $uid = $_SESSION["uid"];
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
    $featured = $_POST["featured"];
    $description = $_POST["description"];
    $facilities = $_POST["facilities"];
    $allow_type = array('png', 'jpg', 'jpeg');

    $image1 = $_FILES['img1']['name'];
    $tmp_name1 = $_FILES['img1']['tmp_name'];
    $img_type1 = strtolower(pathinfo($image1, PATHINFO_EXTENSION));
    $size = $_FILES['img1']['size'];
    $tmp_name = $_FILES['img1']['tmp_name'];
    $destination1 = "../admin/img/property_image/house/" . $image1;


    $image2 = $_FILES['img2']['name'];
    $tmp_name2 = $_FILES['img2']['tmp_name'];
    $img_type2 = strtolower(pathinfo($image2, PATHINFO_EXTENSION));
    $size = $_FILES['img2']['size'];
    $tmp_name = $_FILES['img2']['tmp_name'];
    $destination2 = "../admin/img/property_image/house/" . $image2;


    $image3 = $_FILES['img3']['name'];
    $tmp_name3 = $_FILES['img3']['tmp_name'];
    $img_type3 = strtolower(pathinfo($image3, PATHINFO_EXTENSION));
    $size = $_FILES['img3']['size'];
    $destination3 = "../admin/img/property_image/house/" . $image3;


    $image4 = $_FILES['img4']['name'];
    $tmp_name4 = $_FILES['img4']['tmp_name'];
    $img_type4 = strtolower(pathinfo($image4, PATHINFO_EXTENSION));
    $size = $_FILES['img4']['size'];
    $destination4 = "../admin/img/property_image/house/" . $image4;
    
    $ebill = $_FILES['ebill']['name'];
    $tmp_name5 = $_FILES['ebill']['tmp_name'];
    $img_type5 = strtolower(pathinfo($ebill, PATHINFO_EXTENSION));
    $size = $_FILES['ebill']['size'];
    $destination5 = "../admin/img/property_image/house/" . $ebill;

    $tbill = $_FILES['tbill']['name'];
    $tmp_name6 = $_FILES['tbill']['tmp_name'];
    $img_type6 = strtolower(pathinfo($tbill, PATHINFO_EXTENSION));
    $size = $_FILES['tbill']['size'];
    $destination6 = "../admin/img/property_image/house/" . $tbill;


    if (in_array($img_type1 || $img_type2 || $img_type3 || $img_type4, $allow_type)) {
        if ($size <= 20000000) {
            move_uploaded_file($tmp_name1, $destination1);
            move_uploaded_file($tmp_name2, $destination2);
            move_uploaded_file($tmp_name3, $destination3);
            move_uploaded_file($tmp_name4, $destination4);
            move_uploaded_file($tmp_name5, $destination5);
            move_uploaded_file($tmp_name6, $destination6);
            $insert_qry = "INSERT INTO `tblhouse`( `uid`, `ptitle`, `ptype`, `bhk`, `stype`, `bedroom`, `balcony`, `bathroom`, `kitchen`, `hall`, `floor`, `tfloor`, `price`, `sqft`, `paddress`, `city`, `state`, `img1`, `img2`, `img3`, `img4`,`featured`, `description`, `facilities`) VALUES ('$uid','$ptitle','$ptype','$bhk','$stype','$bedroom','$balcony','$bathroom','$kitchen','$hall','$floor','$tfloor','$price','$sqft','$paddress','$city','$state','$image1','$image2','$image3','$image4','$featured','$description','$facilities')";
            $result = mysqli_query($con, $insert_qry);
            if ($result) {
                $res = mysqli_query($con , "UPDATE user SET credit = credit - 1 WHERE `uid` = $uid");
                $_SESSION['alert'] = array();
                $icon = "success";
                $title = "Your property inserted succesfull..";
                $text = "Wait 24 hours for QC Check";
                $footer = "Help And Support";
                $link = "index.php";
                array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
                header('location:./user-property.php?filter=all');
            } else {
                $_SESSION['alert'] = array();
                $icon = "error";
                $title = "Failed";
                $text = "Something Wrong ...";
                $footer = "Help And Support";
                $link = "contact.php";
                array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
            }
        } else {
                 $_SESSION['alert'] = array();
                $icon = "warning";
                $title = "Image Image Size Related";
                $text = "Image size should be less than 20MB";
                $footer = "Help And Support";
                $link = "contact.php";
                array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
        }
    } else {
                $_SESSION['alert'] = array();
                $icon = "error";
                $title = "Image type Related";
                $text = "Please insert only .JPG , .JPEG and .PNG";
                $footer = "Help And Support";
                $link = "contact.php";
                array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
    }
} else {
    // echo "Plese Enter Value";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="descriptionv">

    <!-- Favicon -->
    
    <link rel="shortcut icon" type="image/x-icon" href="../admin/assets/img/favi.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Sweet Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
    <title>LOCUS | Add Property</title>
   
</head>

<body>
    <div class=" bg-white p-0">
        <!-- Spinner Start -->
        <?php include('../User/include/spinner.php') ?>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php include('../User/include/header.php') ?>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated text-black fadeIn mb-4">Add Home</h1>
                    <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a class="text-tan" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-tan" href="#">Select Type</a></li>
                            <li class="breadcrumb-item text-body text-black active" aria-current="page">Add Home
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="img/header.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->

        <!-- Add Form Start -->
        <div class="container mt-3 px-5">
            <form class="row g-3 container" method="POST" action="addhouse.php" enctype="multipart/form-data">
                <!-- Basic Information -->
                <h2 class="animated text-black fadeIn mb-3" style="border-bottom: 2px solid var(--tan);">Basic
                    Information</h2>
                <div class="col-md-12 input-group-lg">
                    <label for="inputEmail4" class="form-label  text-black">Title</label>
                    <input type="text" name="ptitle" id="ptitle" oninput="validatePtitle()" class="form-control" id="inputEmail4">
                </div>
                <div class="text-danger mt-1" id="error-ptitle"></div>

                <div class="col-md-6 input-group-lg">
                    <label for="inputState" class="form-label  text-black">Property Type</label>
                    
                    <select id="inputState" name="ptype" class="form-select">
                        <option value="House">House</option>
                        <option value="Flat">Flat</option>
                        <option value="Banglow">Banglow</option>
                        <option value="Pent-House">Pent-House</option>
                        <option value="Farm-House">Farm-House</option>
                    </select>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputState" class="form-label  text-black">BHK</label>
                    <select id="bhk" name="bhk" class="form-select">
                        <option value="1">1 BHK</option>
                        <option value="2">2 BHK</option>
                        <option value="3">3 BHK</option>
                        <option value="4">4 BHK</option>
                        <option value="5">5 BHK</option>
                    </select>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputState" class="form-label  text-black">Selling Type</label>
                    <select id="inputState" name="stype" class="form-select">
                        <option value="Rent">Rent</option>
                        <option value="Sell">Sell</option>
                    </select>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Bedroom</label>
                    <input type="text" name="bedroom" oninput="validateBedroom()" value="" class="form-control" id="bedroom" placeholder="Enter Bedroom (Only 1 to 5)">
                    <div class="text-danger  mt-1" id="error-bedroom"></div>
                </div>

                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Balcony</label>
                    <input type="text" name="balcony" oninput="validateBalcony()" value="" class="form-control" id="balcony" placeholder="Enter Balcony (Only 1 to 5)">
                    <div class="text-danger mt-1" id="error-balcony"></div>
                </div>

                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Bathroom</label>
                    <input type="text" name="bathroom" oninput="validateBathroom()" value="" class="form-control" id="bathroom" placeholder="Enter Bathroom (Only 1 to 5)">
                    <div class="text-danger mt-1" id="error-bathroom"></div>
                </div>

                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Kitchen</label>
                    <input type="text" name="kitchen" oninput="validateKitchen()" value="" class="form-control" id="kitchen" placeholder="Enter Kitchen (Only 1 to 5)">
                    <div class="text-danger mt-1" id="error-kitchen"></div>
                </div>

                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Hall</label>
                    <input type="text" name="hall" oninput="validateHall()" value="" class="form-control" id="hall" placeholder="Enter Hall (Only 1 to 5)">
                    <div class="text-danger mt-1" id="error-hall"></div>
                </div>

                <!-- Price & Location  -->
                <h2 class="animated text-black fadeIn mt-5 add-header" style="border-bottom: 2px solid var(--tan);">
                    Price & Location</h2>
                <div class="col-md-6 input-group-lg">
                    <label for="inputState" class="form-label  text-black">Floor</label>
                    <input type="text" name="floor" class="form-control" oninput="validateFloor()" id="floor">
                    <div class="text-danger mt-1" id="error-floor"></div>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputState" class="form-label  text-black">Total Floor</label>
                    <input type="text" name="tfloor" class="form-control" oninput="validateTfloor()" id="tfloor">
                    <div class="text-danger mt-1" id="error-tfloor"></div>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Price</label>
                    <input type="text" class="form-control" name="price" oninput="validatePrice()" id="price">
                    <div class="text-danger mt-1" id="error-price"></div>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Area Size (sqft)</label>
                    <input type="text" class="form-control" name="sqft" oninput="validateSqft()" id="sqft">
                    <div class="text-danger mt-1" id="error-sqft"></div>
                </div>
                <div class="col-md-12 input-group-lg">
                    <label for="inputEmail4" class="form-label  text-black">Address</label>
                    <input type="text" name="paddress" class="form-control" oninput="validatePaddress()" id="paddress">
                    <div class="text-danger mt-1" id="error-paddress"></div>
                </div>
                
                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">State</label>
                    <select id="state" name="state" class="form-select" id="">
                        <option value="">Select State</option>
                    </select>
                    <div class="text-danger mt-1" id="error-state"></div>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">City</label>
                    <select id="city" name="city" class="form-select" id="" >
                        <option value="">Select City</option>
                    </select>
                    <div class="text-danger mt-1" id="error-city"></div>
                </div>
                <!-- <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">City</label>
                    <input type="text" class="form-control" name="city" oninput="validateCity()" id="city">
                    <div class="text-danger mt-1" id="error-city"></div>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">State</label>
                    <input type="text" class="form-control" name="state" oninput="validateState()" id="state">
                    <div class="text-danger mt-1" id="error-state"></div>
                </div> -->
                <!-- Image & Status -->
                <h2 class="animated text-black fadeIn mt-5 add-header" style="border-bottom: 2px solid var(--tan);">
                    Image & Status</h2>
                <div class="col-md-6">
                    <label for="formFileLg" class="form-label text-black">Image 1</label>
                    <input class="form-control form-control-lg bg-white" name="img1" id="image" accept=".jpg,.jpeg,.png,.gif"  type="file">
                    <div id="image-error"></div>
                </div>
                <div class="col-md-6">
                    <label for="formFileLg" class="form-label text-black">Image 2</label>
                    <input class="form-control form-control-lg bg-white" id="image" accept=".jpg,.jpeg,.png,.gif"  name="img2" type="file">
                    <div id="image-error"></div>
                </div>
                <div class="col-md-6">
                    <label for="formFileLg" class="form-label text-black">Image 3</label>
                    <input class="form-control form-control-lg bg-white" id="image" accept=".jpg,.jpeg,.png,.gif" name="img3" type="file">
                    <div id="image-error"></div>
                </div>
                <div class="col-md-6">
                    <label for="formFileLg" class="form-label text-black">Image 4</label>
                    <input class="form-control form-control-lg bg-white" id="image" accept=".jpg,.jpeg,.png,.gif" name="img4" type="file">
                    <div id="image-error"></div>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputState" class="form-label  text-black">Is Featured?</label>
                    <select id="inputState" class="form-select" name="featured">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="col-md-6 input-group-lg">
                    <select id="inputState" name="status" class="form-select" hidden>
                        <option value="Sold">Sold</option>
                        <option value="Unsold" seleceted>UnSold</option>
                    </select>
                </div>

                <!-- Verify Doc -->
                <h2 class="animated text-black fadeIn mt-5 add-header" style="border-bottom: 2px solid var(--tan);">
                    Property Varification Documents</h2>
                <div class="col-md-6">
                    <label for="formFileLg" class="form-label text-black">Eletricity Bill</label>
                    <input class="form-control form-control-lg bg-white" name="ebill" id="image" accept=".jpg,.jpeg,.png,.gif"  type="file">
                    <div id="image-error"></div>
                </div>
                <div class="col-md-6">
                    <label for="formFileLg" class="form-label text-black">Taxes Bill</label>
                    <input class="form-control form-control-lg bg-white" id="image" accept=".jpg,.jpeg,.png,.gif"  name="tbill" type="file">
                    <div id="image-error"></div>
                </div>
                
                <!-- Facility -->
                <h2 class="animated text-black fadeIn mt-5 mb-2 add-header" style="border-bottom: 2px solid var(--tan);">Facilities</h2>
                <small class="text-danger mt-1">* Important Please Do Not Remove Below Content Only Change <b>Yes</b> Or
                    <b>No</b></small>
                <textarea class="tinymce form-control" name="facilities" rows="10" cols="29">
                <div class="col-md-4">
				 	<ul>
				 	<li class="mb-3"><span class="text-black fw-bold">Property Age : </span>10 Years</li>
				 	<li class="mb-3"><span class="text-black fw-bold">Parking : </span>Yes</li>
				 	<li class="mb-3"><span class="text-black fw-bold">Maintanace : </span>Yes</li>
				 	</ul>
				 </div>
				 <div class="col-md-4">
				 	<ul>
				 	<li class="mb-3"><span class="text-black fw-bold">Type : </span>Apartment</li>
				 	<li class="mb-3"><span class="text-black fw-bold">Security : </span>Yes</li>
				 	<li class="mb-3"><span class="text-black fw-bold">Wifi Plan : </span>Yes</li>
				 	
				 	</ul>
				 </div>
				 <div class="col-md-4">
				 	<ul>
				 	<li class="mb-3"><span class="text-black fw-bold">3rd Party : </span>No</li>
				 	<li class="mb-3"><span class="text-black fw-bold">Elevator : </span>Yes</li>
				 	<li class="mb-3"><span class="text-black fw-bold">CCTV : </span>Yes</li>
				 	<li class="mb-3"><span class="text-black fw-bold">Water Supply : </span>Ground Water / Tank</li>
				 	</ul>
			    </div>
                </textarea>
                <!-- Description -->
                <h2 class="animated text-black fadeIn mt-5 mb-4 add-header" style="border-bottom: 2px solid var(--tan);">Description</h2>
                
                <textarea class="tinymce form-control" name="description"  id="description" rows="10" cols="29"></textarea>
                <div class="text-danger mt-1" id="error-description"></div>
                <div class="d-flex justify-content-end">
                    <input type="submit" id="submit-button" name="QC" class="btn py-2 px-5 mx-1 bg-black text-tan" value="Send To QC" />
                    <input type="submit" name="discard" class="btn py-2 px-5  mx-1 bg-tan text-black" value="Discard" />
                </div>

            </form>
        </div>
        <!-- Add Form End -->

        <!-- Footer Start -->
        <?php include('../User/include/footer.php') ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <?php include('../User/include/top.php') ?>
    </div>
    <?php if (isset($_SESSION['alert'])){?> 
    <script>
        Swal.fire({
                icon: '<?php echo $_SESSION["alert"]["0"] ?>',
                title: '<?php echo $_SESSION["alert"]["1"] ?>',
                text: '<?php echo $_SESSION["alert"]["2"] ?>',
                footer: '<a href="<?php echo $_SESSION["alert"]['4'] ?>"><?php echo $_SESSION["alert"]["3"] ?></a>'
        })
    </script>
    <?php } 
        // unset($_SESSION['alert']);
    ?>
</body>

<script>
    // Load state and city data from JSON file
		$.getJSON("state.json", function(data) {
			var states = Object.keys(data);

			// Populate state dropdown
			$.each(states, function(index, value) {
			    $('#state').append($('<option>').text(value).attr('value', value));
			});

			// Handle state selection change event
			$('#state').change(function() {
				var selected_state = $(this).val();
				var selected_cities = data[selected_state];

				// Clear existing options in city dropdown
				$('#city').html('<option value="">Select City</option>');

				// Add filtered cities to city dropdown
				$.each(selected_cities, function(index, value) {
				    $('#city').append($('<option>').text(value).attr('value', value));
				});
			});
		});
    // Auto Select BHK
        const bhk = document.getElementById('bhk');
        const bedroom = document.getElementById('bedroom');
        const bathroom = document.getElementById('bathroom');
        const kitchen = document.getElementById('kitchen');
        const hall = document.getElementById('hall');
        const balcony = document.getElementById('balcony');

        bhk.addEventListener('change', function() {
        if(bhk.value === '2') {
            bedroom.value = 2;
            bathroom.value = 3;
            kitchen.value = 1;
            hall.value = 1;
            balcony.value = 3;
        }else if(bhk.value === '3'){
            bedroom.value = 3;
            bathroom.value = 4;
            kitchen.value = 1;
            hall.value = 1;
            balcony.value = 4;
        }else if(bhk.value === '4'){
            bedroom.value = 4;
            bathroom.value = 5;
            kitchen.value = 1;
            hall.value = 1;
            balcony.value = 5;
        }else if(bhk.value === '5'){
            bedroom.value = 5;
            bathroom.value = 6;
            kitchen.value = 1;
            hall.value = 1;
            balcony.value = 6;
        }
    });

    function validatePtitle() {
        var nameInput = document.getElementById("ptitle");
        var ptitle = nameInput.value.trim();
        var errorMessage = document.getElementById("error-ptitle");

        if (ptitle == "") {
            errorMessage.innerHTML = "title field cannot be empty";
            document.getElementById("ptitle").required = true;
            return false;
        }else if (!/^[a-zA-Z\s,'-]*$/.test(ptitle)) {
            errorMessage.innerHTML = "title field can only contain letter";
            return false;
        } else {
            errorMessage.innerHTML = "";
            document.getElementById("ptitle").required = true;
            return true;
        }
    }

    function validateBedroom() {
        var nameInput = document.getElementById("bedroom");
        var bedroom = nameInput.value.trim();
        var errorMessage = document.getElementById("error-bedroom");

        if (bedroom == "") {
            errorMessage.innerHTML = "bedroom field cannot be empty";
            document.getElementById("bedroom").required = true;
            return false;
        } else if (!/^\d+$/.test(bedroom)) {
            errorMessage.innerHTML = "bedroom field can only contain digits";
            return false;
        } else {
            errorMessage.innerHTML = "";
            document.getElementById("bedroom").required = true;
            return true;
        }
    }

    function validateBalcony() {
        var nameInput = document.getElementById("balcony");
        var balcony = nameInput.value.trim();
        var errorMessage = document.getElementById("error-balcony");

        if (balcony == "") {
            errorMessage.innerHTML = "balcony field cannot be empty";
            document.getElementById("balcony").required = true;
            return false;
        } else if (!/^\d+$/.test(balcony)) {
            errorMessage.innerHTML = "balcony field can only contain digits";
            return false;
        } else {
            errorMessage.innerHTML = "";
            document.getElementById("balcony").required = true;
            return true;
        }
    }

    function validateBathroom() {
        var nameInput = document.getElementById("bathroom");
        var bathroom = nameInput.value.trim();
        var errorMessage = document.getElementById("error-bathroom");

        if (bathroom == "") {
            errorMessage.innerHTML = "bathroom field cannot be empty";
            document.getElementById("bathroom").required = true;
            return false;
        } else if (!/^\d+$/.test(bathroom)) {
            errorMessage.innerHTML = "bathroom field can only contain digits";
            return false;
        } else {
            errorMessage.innerHTML = "";
            document.getElementById("bathroom").required = true;
            return true;
        }
    }

    function validateKitchen() {
        var nameInput = document.getElementById("kitchen");
        var kitchen = nameInput.value.trim();
        var errorMessage = document.getElementById("error-kitchen");

        if (kitchen == "") {
            errorMessage.innerHTML = "kitchen field cannot be empty";
            document.getElementById("kitchen").required = true;
            return false;
        } else if (!/^\d+$/.test(kitchen)) {
            errorMessage.innerHTML = "kitchen field can only contain digits";
            return false;
        } else {
            errorMessage.innerHTML = "";
            document.getElementById("kitchen").required = true;
            return true;
        }
    }

    function validateHall() {
        var nameInput = document.getElementById("hall");
        var hall = nameInput.value.trim();
        var errorMessage = document.getElementById("error-hall");

        if (hall == "") {
            errorMessage.innerHTML = "hall field cannot be empty";
            document.getElementById("hall").required = true;
            return false;
        } else if (!/^\d+$/.test(hall)) {
            errorMessage.innerHTML = "hall field can only contain digits";
            return false;
        } else {
            errorMessage.innerHTML = "";
            document.getElementById("hall").required = true;
            return true;
        }
    }

    function validateFloor() {
        var nameInput = document.getElementById("floor");
        var floor = nameInput.value.trim();
        var errorMessage = document.getElementById("error-floor");

        if (floor == "") {
            errorMessage.innerHTML = "floor field cannot be empty";
            document.getElementById("floor").required = true;
            return false;
        } else if (!/^\d+$/.test(floor)) {
            errorMessage.innerHTML = "floor field can only contain digits";
            return false;
        } else {
            errorMessage.innerHTML = "";
            document.getElementById("floor").required = true;
            return true;
        }
    }

    function validateTfloor() {
        var nameInput = document.getElementById("tfloor");
        var tfloor = nameInput.value.trim();
        var errorMessage = document.getElementById("error-tfloor");

        if (tfloor == "") {
            errorMessage.innerHTML = "total floor field cannot be empty";
            document.getElementById("tfloor").required = true;
            return false;
        } else if (!/^\d+$/.test(tfloor)) {
            errorMessage.innerHTML = "total floor field can only contain digits";
            return false;
        } else {
            errorMessage.innerHTML = "";
            document.getElementById("tfloor").required = true;
            return true;
        }
    }

    function validatePrice() {
        var nameInput = document.getElementById("price");
        var price = nameInput.value.trim();
        var errorMessage = document.getElementById("error-price");

        if (price == "") {
            errorMessage.innerHTML = "price field cannot be empty";
            document.getElementById("price").required = true;
            return false;
        } else if (!/^\d+$/.test(price)) {
            errorMessage.innerHTML = "price field can only contain digits";
            return false;
        } else {
            errorMessage.innerHTML = "";
            document.getElementById("price").required = true;
            return true;
        }
    }

    function validateSqft() {
        var nameInput = document.getElementById("sqft");
        var sqft = nameInput.value.trim();
        var errorMessage = document.getElementById("error-sqft");

        if (sqft == "") {
            errorMessage.innerHTML = "sqft field cannot be empty";
            document.getElementById("sqft").required = true;
            return false;
        } else if (!/^\d+$/.test(sqft)) {
            errorMessage.innerHTML = "sqft field can only contain digits";
            return false;
        } else {
            errorMessage.innerHTML = "";
            document.getElementById("sqft").required = true;
            return true;
        }
    }

    function validatePaddress() {
        var input = document.getElementById("paddress");
        var paddress = input.value.trim();
        var errorMessage = document.getElementById("error-paddress");

        if (paddress === "") {
            errorMessage.innerHTML = "Address field cannot be empty";
            return false;
        } else if (!/^[a-zA-Z0-9\s,'-]*$/.test(paddress)) {
            errorMessage.innerHTML = "Address contains invalid characters";
            return false;
        } else {
            errorMessage.innerHTML = "";
            return true;
        }
    }
    
    function validateCity() {
        var cityInput = document.getElementById("city");
        var city = cityInput.value.trim();
        var errorMessage = document.getElementById("error-city");

        if (city == "") {
            errorMessage.innerHTML = "City field cannot be empty";
            // cityInput.classList.add("invalid");
            return false;
        } else if (!/^[a-zA-Z ]+$/.test(city)) {
            errorMessage.innerHTML = "City can only contain letters and spaces";
            // cityInput.classList.add("invalid");
            return false;
        } else {
            errorMessage.innerHTML = "";
            // cityInput.classList.remove("invalid");
            return true;
        }
    }

    function validateState() {
        var stateInput = document.getElementById("state");
        var state = stateInput.value.trim();
        var errorMessage = document.getElementById("error-state");

        if (state == "") {
            errorMessage.innerHTML = "State field cannot be empty";
            // stateInput.classList.add("invalid");
            return false;
        } else if (!/^[a-zA-Z ]+$/.test(state)) {
            errorMessage.innerHTML = "State can only contain letters and spaces";
            // stateInput.classList.add("invalid");
            return false;
        } else {
            errorMessage.innerHTML = "";
            // stateInput.classList.remove("invalid");
            return true;
        }
    }
    // var imageInput = document.getElementById("image");
    // var errorMessage = document.getElementById("image-error");

    // imageInput.addEventListener("change", function() {
    //     var file = imageInput.files[0];
    //     var fileType = file.type;
    //     if (fileType != "image/jpeg" && fileType != "image/png" && fileType != "image/gif") {
    //         errorMessage.innerHTML = "Please select a valid image file (JPG, PNG, GIF).";
    //         imageInput.value = "";
    //         return false;
    //     } else {
    //         errorMessage.innerHTML = "";
    //         return true;
    //     }
    // });
    
    function validateForm() {
    if (validatePtitle() && validateBedroom() && validateBalcony() && validateBathroom() && validateKitchen() && validateHall() && validateFloor() && validateTfloor() && validatePrice() && validateSqft() && validatePaddress() && validateCity() && validateState()) {
        return true;
    } else {
        return false;
    }
}

// Attach this function to the submit button
document.getElementById("submit-button").addEventListener("click", function(event) {
    if (!validateForm()) {
        event.preventDefault();
    }
});

</script>

<!-- Tinymce Lib -->
<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/tinymce/init-tinymce.min.js"></script>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>

</html>