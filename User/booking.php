<?php
session_start();
include('./config/config.php');
require './Function/sendmail.php';
if (!isset($_SESSION['uid'])) {
  header("location:login.php");
}
$uid = $_SESSION['uid'];
$u_data = mysqli_fetch_array(mysqli_query($con, "select * from user where uid=$uid"));
if (isset($_POST['pbooking'])) {
  try {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cindate = $_POST['cindate'];
    $coutdate = $_POST['coutdate'];
    $message = $_POST['message'];
    $buyerid = $_SESSION['uid'];
    $sellerid = $_SESSION['sellerid'];
    $pid = $_SESSION['pid'];
    $_SESSION['b_email'] = $email;
    $mno =mysqli_fetch_array(mysqli_query($con , "select * from user where uid=$buyerid"));

    if ($buyerid != $sellerid) {
      $query = "INSERT INTO `tblpbooking`(`name`, `pid`, `seller_id`, `buyer_id`, `email`, `cindate`, `coutdate`,`details`) VALUES ('$name','$pid','$sellerid','$buyerid','$email','$cindate','$coutdate','$message')";
      $run = mysqli_query($con, $query);
      if ($run) {
        $s_email = mysqli_fetch_array(mysqli_query($con, "select * from user where uid = $sellerid"));
        $email = $s_email['email'];
        $sub = "You Got The Deal From The Buyer";
        $msg = '<!doctype html>
                <html>
                  <head>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <title>Property Booking Request</title>
                    <style>
                      /* -------------------------------------
                          GLOBAL RESETS
                      ------------------------------------- */
                      
                      /*All the styling goes here*/
                      
                      img {
                        border: none;
                        -ms-interpolation-mode: bicubic;
                        max-width: 100%; 
                      }
                
                      body {
                        background-color: #f6f6f6;
                        font-family: sans-serif;
                        -webkit-font-smoothing: antialiased;
                        font-size: 14px;
                        line-height: 1.4;
                        margin: 0;
                        padding: 0;
                        -ms-text-size-adjust: 100%;
                        -webkit-text-size-adjust: 100%; 
                      }
                
                      table {
                        border-collapse: separate;
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                        width: 100%; }
                        table td {
                          font-family: sans-serif;
                          font-size: 14px;
                          vertical-align: top; 
                      }
                
                      /* -------------------------------------
                          BODY & CONTAINER
                      ------------------------------------- */
                
                      .body {
                        background-color: #f6f6f6;
                        width: 100%; 
                      }
                
                      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                      .container {
                        display: block;
                        margin: 0 auto !important;
                        /* makes it centered */
                        max-width: 580px;
                        padding: 10px;
                        width: 580px; 
                      }
                
                      /* This should also be a block element, so that it will fill 100% of the .container */
                      .content {
                        box-sizing: border-box;
                        display: block;
                        margin: 0 auto;
                        max-width: 580px;
                        padding: 10px; 
                      }
                
                      /* -------------------------------------
                          HEADER, FOOTER, MAIN
                      ------------------------------------- */
                      .main {
                        background: #ffffff;
                        border-radius: 3px;
                        width: 100%; 
                      }
                
                      .wrapper {
                        box-sizing: border-box;
                        padding: 20px; 
                      }
                
                      .content-block {
                        padding-bottom: 10px;
                        padding-top: 10px;
                      }
                
                      .footer {
                        clear: both;
                        margin-top: 10px;
                        text-align: center;
                        width: 100%; 
                      }
                        .footer td,
                        .footer p,
                        .footer span,
                        .footer a {
                          color: #999999;
                          font-size: 12px;
                          text-align: center; 
                      }
                
                      /* -------------------------------------
                          TYPOGRAPHY
                      ------------------------------------- */
                      h1,
                      h2,
                      h3,
                      h4 {
                        color: #000000;
                        font-family: sans-serif;
                        font-weight: 400;
                        line-height: 1.4;
                        margin: 0;
                        margin-bottom: 30px; 
                      }
                
                      h1 {
                        font-size: 35px;
                        font-weight: 300;
                        text-align: center;
                        text-transform: capitalize; 
                      }
                
                      p,
                      ul,
                      ol {
                        font-family: sans-serif;
                        font-size: 14px;
                        font-weight: normal;
                        margin: 0;
                        margin-bottom: 15px; 
                      }
                        p li,
                        ul li,
                        ol li {
                          list-style-position: inside;
                          margin-left: 5px; 
                      }
                
                      a {
                        color: #3498db;
                        text-decoration: underline; 
                      }
                
                      /* -------------------------------------
                          BUTTONS
                      ------------------------------------- */
                      .btn {
                        box-sizing: border-box;
                        width: 100%; }
                        .btn > tbody > tr > td {
                          padding-bottom: 15px; }
                        .btn table {
                          width: auto; 
                      }
                        .btn table td {
                          background-color: #ffffff;
                          border-radius: 5px;
                          text-align: center; 
                      }
                        .btn a {
                          background-color: #ffffff;
                          border: solid 1px #3498db;
                          border-radius: 5px;
                          box-sizing: border-box;
                          color: #3498db;
                          cursor: pointer;
                          display: inline-block;
                          font-size: 14px;
                          font-weight: bold;
                          margin: 0;
                          padding: 12px 25px;
                          text-decoration: none;
                          text-transform: capitalize; 
                      }
                
                      .btn-primary table td {
                        background-color: #3498db; 
                      }
                
                      .btn-primary a {
                        background-color: #3498db;
                        border-color: #3498db;
                        color: #ffffff; 
                      }
                
                      /* -------------------------------------
                          OTHER STYLES THAT MIGHT BE USEFUL
                      ------------------------------------- */
                      .last {
                        margin-bottom: 0; 
                      }
                
                      .first {
                        margin-top: 0; 
                      }
                
                      .align-center {
                        text-align: center; 
                      }
                
                      .align-right {
                        text-align: right; 
                      }
                
                      .align-left {
                        text-align: left; 
                      }
                
                      .clear {
                        clear: both; 
                      }
                
                      .mt0 {
                        margin-top: 0; 
                      }
                
                      .mb0 {
                        margin-bottom: 0; 
                      }
                
                      .preheader {
                        color: transparent;
                        display: none;
                        height: 0;
                        max-height: 0;
                        max-width: 0;
                        opacity: 0;
                        overflow: hidden;
                        mso-hide: all;
                        visibility: hidden;
                        width: 0; 
                      }
                
                      .powered-by a {
                        text-decoration: none; 
                      }
                
                      hr {
                        border: 0;
                        border-bottom: 1px solid #f6f6f6;
                        margin: 20px 0; 
                      }
                
                      /* -------------------------------------
                          RESPONSIVE AND MOBILE FRIENDLY STYLES
                      ------------------------------------- */
                      @media only screen and (max-width: 620px) {
                        table.body h1 {
                          font-size: 28px !important;
                          margin-bottom: 10px !important; 
                        }
                        table.body p,
                        table.body ul,
                        table.body ol,
                        table.body td,
                        table.body span,
                        table.body a {
                          font-size: 16px !important; 
                        }
                        table.body .wrapper,
                        table.body .article {
                          padding: 10px !important; 
                        }
                        table.body .content {
                          padding: 0 !important; 
                        }
                        table.body .container {
                          padding: 0 !important;
                          width: 100% !important; 
                        }
                        table.body .main {
                          border-left-width: 0 !important;
                          border-radius: 0 !important;
                          border-right-width: 0 !important; 
                        }
                        table.body .btn table {
                          width: 100% !important; 
                        }
                        table.body .btn a {
                          width: 100% !important; 
                        }
                        table.body .img-responsive {
                          height: auto !important;
                          max-width: 100% !important;
                          width: auto !important; 
                        }
                      }
                
                      /* -------------------------------------
                          PRESERVE THESE STYLES IN THE HEAD
                      ------------------------------------- */
                      @media all {
                        .ExternalClass {
                          width: 100%; 
                        }
                        .ExternalClass,
                        .ExternalClass p,
                        .ExternalClass span,
                        .ExternalClass font,
                        .ExternalClass td,
                        .ExternalClass div {
                          line-height: 100%; 
                        }
                        .apple-link a {
                          color: inherit !important;
                          font-family: inherit !important;
                          font-size: inherit !important;
                          font-weight: inherit !important;
                          line-height: inherit !important;
                          text-decoration: none !important; 
                        }
                        #MessageViewBody a {
                          color: inherit;
                          text-decoration: none;
                          font-size: inherit;
                          font-family: inherit;
                          font-weight: inherit;
                          line-height: inherit;
                        }
                        .btn-primary table td:hover {
                          background-color: #34495e !important; 
                        }
                        .btn-primary a:hover {
                          background-color: #34495e !important;
                          border-color: #34495e !important; 
                        } 
                      }
                
                    </style>
                  </head>
                  <body>
                    <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
                      <tr>
                        <td>&nbsp;</td>
                        <td class="container">
                          <div class="content">
                
                            <!-- START CENTERED WHITE CONTAINER -->
                            <table role="presentation" class="main">
                
                              <!-- START MAIN CONTENT AREA -->
                              <tr>
                                <td class="wrapper">
                                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td>
                                        <p>Hi there,</p>
                                        <p>Congratulation , You Have Recevied Property Request From Buyer You Can Check Your Property Order Portal...</p>
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                          <tbody>
                                            <tr>
                                              <td align="left">
                                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                  <tbody>
                                                    <tr>
                                                      <td> <a href="tel:'.$mno['mno'].'" target="_blank">Call To Action</a> </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <p>You Can Talk With And Confirm This Order As Soon As Possilbe. </p>
                                        <p>And Also Atteched File Which Provide Some Information Of Buyer , So You Can Talk With </p>
                                        <p>Good Luck , I Am So Happy Beacause You Got The Deal</p>
                                      </td>
                                    </tr>
                                    <tr>
                                     <b>Buyer Message </b> : <p>' . $message . '</p>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                
                            <!-- END MAIN CONTENT AREA -->
                            </table>
                            <!-- END CENTERED WHITE CONTAINER -->
                
                            <!-- START FOOTER -->
                            <div class="footer">
                              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td class="content-block">
                                    <span class="apple-link">Locus INC , VIP Road , Vesu , Surat </span>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="WWW.LOCUS.COM">
                                  </td>
                                </tr>
                              </table>
                            </div>
                            <!-- END FOOTER -->
                
                          </div>
                        </td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  </body>
                </html>';
        SendMail_With_PDF($email, $sub, $msg, $pid);

        $_SESSION['alert'] = array();
                $icon = "success";
                $title = "Your Booking  Request Sent To Seller...";
                $text = "Buyer Callback As Soon As Possible..";
                $footer = "Help And Support";
                $link = "contact.php";
                array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
        header("location:book_property.php?pid=$pid");
      } else {
        $_SESSION['alert'] = array();
                $icon = "error";
                $title = "Error";
                $text = "Something Went Wrong...!";
                $footer = "Help And Support";
                $link = "contact.php";
                array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
        header("location:property_details.php?pid=$pid");
      }
    } else {
      $_SESSION['alert'] = array();
                $icon = "warning";
                $title = "Something Went Wrong...!";
                $text = "This Is Your Property You Can Not Sell or Rent This Property...!";
                $footer = "Help And Support";
                $link = "contact.php";
                array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
      header("location:property_details.php?pid=$pid");
    }
  } catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LOCUS | Property Booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    
    <link rel="shortcut icon" type="image/x-icon" href="../admin/assets/img/favi.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Sweet Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="bg-white">
    <div class="bg-white p-0">
        <!-- Spinner Start -->
        <?php include('../User/include/spinner.php') ?>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php include('../User/include/header.php') ?>
        <!-- Navbar End -->

        <div class="container mt-5 px-5">

            <form action="booking.php" method="POST" onsubmit="return validateForm()">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" value="<?php echo $u_data['uname'] ?>"
                                name="name" placeholder="Your Name"
                                oninvalid="setCustomValidity('Please enter a valid name')"
                                onblur="setCustomValidity('')" oninput="validateName()" >
                            <label for="name">Your Name</label>
                            <div class="mt-1 text-danger" id="error-name"></div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php echo $u_data['email'] ?>" placeholder="Your Email"
                                oninvalid="setCustomValidity('Please enter a valid Email ID')"
                                onblur="setCustomValidity('')" oninput="validateEmail()">
                            <label for="email">Your Email</label>
                            <div class="mt-1 text-danger" id="error-email"></div>

                        </div>
                    </div>
                    <?php if ($_GET['stype'] == 'Rent') { 
                      if($_GET['ptype'] != "Farm-House"){  
                    ?>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="date" class="form-control" onfocus="(this.type='date')" id="date"
                                name="cindate" placeholder="Enter Check In Date"
                                oninvalid="setCustomValidity('Please enter Message for Booking')"
                                onblur="setCustomValidity('')" oninput="validateMessage()"
                               >
                            <label for="subject">Check In Date</label>
                        </div>
                        <span class="text-danger fs-6"> * If You Take A Property As A Rent So , Please Select At Least 1
                            Month </span>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="date" class="form-control" onfocus="(this.type='date')" id="date1"
                                name="coutdate" placeholder="Enter Check Out Date">
                            <label for="subject">Check Out Date</label>
                        </div>
                    </div>
                        <?php } else {?>
                    <!-- Farm House -->
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="dateChecker1"
                                name="cindate" placeholder="Enter Check In Date"
                                oninvalid="setCustomValidity('Please enter Message for Booking')"
                                onblur="setCustomValidity('')" oninput="validateMessage()">
                            <label for="subject">Check In Date</label>
                        </div>
                        <span class="text-danger fs-6"> * If You Take A Property As A Rent So , Please Select At Least 1
                            Day (24 Hours) </span>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="dateChecker2"
                                name="coutdate" placeholder="Enter Check Out Date">
                            <label for="subject">Check Out Date</label>
                        </div>
                    </div>
                    <?php }?>
                    <?php } ?>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a message here" name="message"
                                id="message" style="height: 100px"
                                oninvalid="setCustomValidity('Please enter Message for Contact Us')"
                                onblur="setCustomValidity('')" oninput="validateMessage()"></textarea>
                            <label for="message">Message</label>
                            <div class="mt-1 text-danger" id="error-message"></div>

                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn bg-tan text-black w-100 py-3" onclick="myFunction()" name="pbooking"
                            type="submit">Request For
                            Booking</button>
                    </div>
                </div>
            </form>
            <?php if (isset($_SESSION['msg'])) { ?>
            <script>
            swal("<?php echo  $_SESSION['status'] ?>", "<?php echo $_SESSION['msg'] ?>",
                "<?php echo $_SESSION['status'] ?>");
            </script>
            <?php
        unset($_SESSION['msg']);
        unset($_SESSION['status']);
      } ?>

        </div>

        <!-- Back to Top -->
        <?php include('../User/include/top.php') ?>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script>
    $(document).ready(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();

        if (month < 10) {
            month = '0' + month.toString();
        }
        if (day < 10) {
            day = '0' + day.toString();
        }

        var maxDate = year + '-' + month + '-' + day;
        $('#dateChecker1').attr('min', maxDate);
        $('#dateChecker2').attr('min', maxDate);

    })
    </script>
    <script>
    function validateName() {
        var nameInput = document.getElementById("name");
        var name = nameInput.value.trim();
        var errorMessage = document.getElementById("error-name");

        if (name == "") {
            errorMessage.innerHTML = "Name field cannot be empty";
            // nameInput.classList.add("invalid");
            nameInput.setAttribute("required", true); // Add required attribute
            return false;
        } else if (!/^[a-zA-Z ]+$/.test(name)) {
            errorMessage.innerHTML = "Name can only contain letters and spaces";
            // nameInput.classList.add("invalid");
            nameInput.removeAttribute("required"); // Remove required attribute
            return false;
        } else {
            errorMessage.innerHTML = "";
            // nameInput.classList.remove("invalid");
            nameInput.setAttribute("required", true); // Add required attribute
            return true;
        }
    }


    function validateEmail() {
        var emailInput = document.getElementById("email");
        var email = emailInput.value.trim();
        var errorMessage = document.getElementById("error-email");

        if (email == "") {
            errorMessage.innerHTML = "Email field cannot be empty";
            // emailInput.classList.add("invalid");
            return false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            errorMessage.innerHTML = "Please enter a valid email address";
            // emailInput.classList.add("invalid");
            return false;
        } else {
            errorMessage.innerHTML = "";
            // emailInput.classList.remove("invalid");
            return true;
        }
    }

    function validateMessage() {
        var input = document.getElementById("message");
        var message = input.value.trim();
        var errorMessage = document.getElementById("error-message");

        if (message === "") {
            errorMessage.innerHTML = "Message field cannot be empty";
            return false;
        } else if (!/^[a-zA-Z0-9\s,'-]*$/.test(message)) {
            errorMessage.innerHTML = "Message contains invalid characters";
            return false;
        } else {
            errorMessage.innerHTML = "";
            return true;
        }
    }

    function validateForm() {
        // Call all validation functions
        var isNameValid = validateName();
        var isEmailValid = validateEmail();
        var isMessageValid = validateMessage();
        // Check if all validation functions returned true
        if (isNameValid && isEmailValid && isMessageValid) {
            // All validation functions passed, submit the form
            return true;
        } else {
            // At least one validation function failed, prevent form submission
            return false;
        }
    }

    function myFunction() {
        document.getElementById("name").required = true;
        document.getElementById("email").required = true;
        document.getElementById("message").required = true;
    }
    </script>

    <!-- Date Validation -->
    <script>
    const checkInDateInput = document.getElementById('date');
    const checkOutDateInput = document.getElementById('date1');
    const today = new Date().toISOString().split('T')[0]; // get today's date in ISO format

    checkInDateInput.min = today; // set the minimum value of the check-in date input to today's date

    checkInDateInput.addEventListener('change', () => {
        const checkInDate = new Date(checkInDateInput.value);
        const oneMonthAfterCheckInDate = new Date(checkInDate.getFullYear(), checkInDate.getMonth() + 1,
            checkInDate.getDate() + 1);
        checkOutDateInput.min = oneMonthAfterCheckInDate.toISOString().split('T')[0];
    });

    checkOutDateInput.addEventListener('change', () => {
        const checkOutDate = new Date(checkOutDateInput.value);
        const oneMonthBeforeCheckOutDate = new Date(checkOutDate.getFullYear(), checkOutDate.getMonth() - 1,
            checkOutDate.getDate());
        checkInDateInput.max = oneMonthBeforeCheckOutDate.toISOString().split('T')[0];
    });
    </script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>