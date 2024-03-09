<?php
session_start();
include('./config/config.php');
$pid = $_GET['pid'];
$data = mysqli_fetch_array(mysqli_query($con, "select * from tblhouse where pid='$pid'"));

$uid = $data['uid'];
$user_data = mysqli_fetch_array(mysqli_query($con, "select * from user where uid='$uid'"));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="descriptionv">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <title>List Your Property</title>
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
                    <h1 class="display-5 animated text-black fadeIn mb-4">Update Home</h1>
                    <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a class="text-tan" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-tan" href="#">Select Type</a></li>
                            <li class="breadcrumb-item text-body text-black active" aria-current="page">Update Home
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
            <form class="row g-3 container" onsubmit="return validateForm()" method="POST" action="upcode.php?pid=<?php echo $pid ;?>" enctype="multipart/form-data">
                <!-- Basic Information -->
                <h2 class="animated text-black fadeIn mb-3" style="border-bottom: 2px solid var(--tan);">Basic
                    Information</h2>
                <div class="col-md-12 input-group-lg">
                    <input type="hidden" name="prid" value="<?= $data['pid'] ?>">
                    <label for="inputEmail4" class="form-label  text-black">Title</label>
                    <input type="text" name="ptitle" id="ptitle" class="form-control" oninput="validatePtitle()" Value="<?php echo $data['ptitle'] ?>" id="inputEmail4">
                </div>
                <div class="text-danger mt-1" id="error-ptitle"></div>

                <div class="col-md-6 input-group-lg">
                    <label for="inputState" class="form-label  text-black">Property Type</label>
                    <select id="inputState" name="ptype" class="form-select">
                        <?php if ($data['ptype'] == 'House') { ?>
                        <option value="House" selected>House</option>
                        <option value="Flat">Flat</option>
                        <option value="Banglow">Banglow</option>
                        <option value="Pent-House">Pent-House</option>
                        <option value="Farm-House">Farm-House</option>
                        <?php } if ($data['ptype'] == 'Flat') { ?>
                        <option value="House">House</option>
                        <option value="Flat" selected>Flat</option>
                        <option value="Banglow">Banglow</option>
                        <option value="Pent-House">Pent-House</option>
                        <option value="Farm-House">Farm-House</option>
                        <?php }if ($data['ptype'] == 'Banglow') { ?>
                        <option value="House">House</option>
                        <option value="Flat">Flat</option>
                        <option value="Banglow" selected>Banglow</option>
                        <option value="Pent-House">Pent-House</option>
                        <option value="Farm-House">Farm-House</option>
                        <?php } if ($data['ptype'] == 'Pent-House') { ?>
                        <option value="House">House</option>
                        <option value="Flat">Flat</option>
                        <option value="Banglow">Banglow</option>
                        <option value="Pent-House" selected>Pent-House</option>
                        <option value="Farm-House">Farm-House</option>
                        <?php } if ($data['ptype'] == 'Farm-House') { ?>
                        <option value="House">House</option>
                        <option value="Flat">Flat</option>
                        <option value="Banglow">Banglow</option>
                        <option value="Pent-House">Pent-House</option>
                        <option value="Farm-House" selected>Farm-House</option>
                        <?php }  ?>
                    </select>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputState" class="form-label  text-black">BHK</label>
                    <select id="inputState" name="bhk" class="form-select">
                        <?php if ($data['bhk'] == '1') { ?>
                            <option value="1" selected>1BHK</option>
                            <option value="2">2BHK</option>
                            <option value="3">3BHK</option>
                            <option value="4">4BHK</option>
                            <option value="5">5BHK</option>
                        <?php } else if ($data['bhk'] == '2') { ?>
                            <option value="1">1BHK</option>
                            <option value="2" selected>2BHK</option>
                            <option value="3">3BHK</option>
                            <option value="4">4BHK</option>
                            <option value="5">5BHK</option>
                        <?php } else if ($data['bhk'] == '3') { ?>
                            <option value="1">1BHK</option>
                            <option value="2">2BHK</option>
                            <option value="3" selected>3BHK</option>
                            <option value="4">4BHK</option>
                            <option value="5">5BHK</option>
                        <?php } else if ($data['bhk'] == '4') { ?>
                            <option value="1">1BHK</option>
                            <option value="2">2BHK</option>
                            <option value="3">3BHK</option>
                            <option value="4" selected>4BHK</option>
                            <option value="5">5BHK</option>
                        <?php } else if ($data['bhk'] == '5') { ?>
                            <option value="1">1BHK</option>
                            <option value="2">2BHK</option>
                            <option value="3">3BHK</option>
                            <option value="4">4BHK</option>
                            <option value="5" selected>5BHK</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputState" class="form-label  text-black">Selling Type</label>
                    <select id="inputState" name="stype" class="form-select">
                        <?php if ($data['stype'] == 'Rent') { ?>
                            <option value="Rent">Rent</option>
                            <option value="Sell">Sell</option>
                        <?php } else if ($data['stype'] == 'Sell') { ?>
                            <option value="Rent">Rent</option>
                            <option value="Sell">Sell</option>
                        <?php }  ?>
                    </select>

                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Bedroom</label>
                    <input type="text" name="bedroom" id="bedroom" oninput="validateBedroom()" value="<?php echo $data['bedroom'] ?>" class="form-control" id="inputZip" placeholder="Enter Bedroom (Only 1 to 5)">
                    <div class="text-danger  mt-1" id="error-bedroom"></div>
                </div>

                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Balcony</label>
                    <input type="text" name="balcony" id="balcony" class="form-control"  oninput="validateBalcony()" value="<?php echo $data['balcony'] ?>" id="inputZip" placeholder="Enter Balcony (Only 1 to 5)">
                    <div class="text-danger  mt-1" id="error-balcony"></div>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Bathroom</label>
                    <input type="text" name="bathroom" id="bathroom" oninput="validateBathroom()" value="<?php echo $data['bathroom'] ?>" class="form-control" id="inputZip" placeholder="Enter Balcony (Only 1 to 5)">
                    <div class="text-danger  mt-1" id="error-bathroom"></div>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Kitchen</label>
                    <input type="text" name="kitchen" id="kitchen" oninput="validateKitchen()"  value="<?php echo $data['kitchen'] ?>" class="form-control" id="inputZip" placeholder="Enter Kitchen (Only 1 to 5)">
                    <div class="text-danger  mt-1" id="error-kitchen"></div>
                
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Hall</label>
                    <input type="text" name="hall" id="hall" oninput="validateHall()"  class="form-control" value="<?php echo $data['hall'] ?>" id="inputZip" placeholder="Enter Hall (Only 1 to 5)">
                    <div class="text-danger  mt-1" id="error-hall"></div>
               
                </div>

                <!-- Price & Location  -->
                <h2 class="animated text-black fadeIn mt-5 add-header" style="border-bottom: 2px solid var(--tan);">
                    Price & Location</h2>
                <div class="col-md-6 input-group-lg">
                    <label for="inputState" class="form-label  text-black">Floor</label>
                    <input type="text" name="floor" id="floor" oninput="validateFloor()" class="form-control" value="<?php echo $data['floor'] ?>" id="inputEmail4">
                    <div class="text-danger  mt-1" id="error-floor"></div>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputState" class="form-label  text-black">Total Floor</label>
                    <input type="text" name="tfloor" id="tfloor" oninput="validateTfloor()" class="form-control" value="<?php echo $data['tfloor'] ?>" >
                    <div class="text-danger  mt-1" id="error-tfloor"></div>
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Price</label>
                    <input type="text" class="form-control" name="price" id="price" oninput="validatePrice()" value="<?php echo $data['price'] ?>" >
                    <div class="text-danger  mt-1" id="error-price"></div>
                
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputZip" class="form-label  text-black">Area Size</label>
                    <input type="text" class="form-control" name="sqft" id="sqft" oninput="validateSqft()" value="<?php echo $data['sqft'] ?>" >
                    <div class="text-danger  mt-1" id="error-sqft"></div>
                
                </div>
                <div class="col-md-12 input-group-lg">
                    <label for="inputEmail4" class="form-label  text-black">Address</label>
                    <input type="text" name="paddress" id="paddress" class="form-control"  oninput="validatePaddress()"  value="<?php echo $data['paddress'] ?>" >
                    <div class="text-danger  mt-1" id="error-paddress"></div>
                
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
               
                <!-- Image & Status -->
                <!-- <h2 class="animated text-black fadeIn mt-5 add-header" style="border-bottom: 2px solid var(--tan);">
                    Image & Status</h2>
                <div class="col-md-6">
                    <label for="formFileLg" class="form-label text-black">Image 1</label>
                    <img src="../admin/Img/Property_image/house/<?php echo $data['img1'] ?>" style="height: 400px;" class="img-thumbnail" alt="...">
                    <input class="form-control form-control-lg mt-1 bg-white" name="img1" id="formFileLg" type="file">
                </div>
                <div class="col-md-6">
                    <label for="formFileLg" class="form-label text-black">Image 2</label>
                    <img src="../admin/Img/Property_image/house/<?php echo $data['img2'] ?>" style="height: 400px;" class="img-thumbnail" alt="...">
                    <input class="form-control form-control-lg mt-1 bg-white" id="formFileLg" name="img2" type="file">
                </div>
                <div class="col-md-6">
                    <label for="formFileLg" class="form-label text-black">Image 3</label>
                    <img src="../admin/Img/Property_image/house/<?php echo $data['img3'] ?>" style="height: 400px;" class="img-thumbnail" alt="...">
                    <input class="form-control form-control-lg mt-1 bg-white" id="formFileLg" name="img3" type="file">
                </div>
                <div class="col-md-6">
                    <label for="formFileLg" class="form-label text-black">Image 4</label>
                    <img src="../admin/Img/Property_image/house/<?php echo $data['img4'] ?>" style="height: 400px;" class="img-thumbnail" alt="...">
                    <input class="form-control form-control-lg mt-1 bg-white" id="formFileLg" name="img4" type="file">
                </div>
                <div class="col-md-6 input-group-lg">
                    <label for="inputState" class="form-label  text-black">Is Featured?</label>
                    <select id="inputState" class="form-select" name="featured">
                        <?php if ($data['featured'] == 'Yes') { ?>
                            <option value="Yes" selected>Yes</option>
                            <option value="No">No</option>
                        <?php } else if ($data['featured'] == 'No') { ?>
                            <option value="Yes">Yes</option>
                            <option value="No" selected>No</option>
                        <?php } ?>
                    </select>
                    <div class="col-md-6 input-group-lg">
                        <select id="inputState" name="status" class="form-select" hidden>
                            <option value="Sold">Sold</option>
                            <option value="Unsold">UnSold</option>
                        </select>
                    </div>
                </div> -->

                <!-- Description -->
                <h2 class="animated text-black fadeIn mt-5 mb-4 add-header" style="border-bottom: 2px solid var(--tan);">Description</h2>
                <textarea class="tinymce form-control" name="description" rows="10" cols="29">
                <?php echo $data['description'] ?>
                </textarea>
                <div class="d-flex justify-content-end">
                    <input type="submit" name="update" id="submit-button" class="btn py-2 px-5 mx-1 bg-black text-tan" value="Update Property" />
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
        unset($_SESSION['alert']);
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
   
    
    function validateForm() {
    if (validatePtitle() && validateBedroom() && validateBalcony() && validateBathroom() && validateKitchen() && validateHall() && validateFloor() && validateTfloor() && validatePrice() && validateSqft() && validatePaddress() && validateCity() && validateState()) {
        return true;
    } else {
        return false;
    }
}


        
           
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