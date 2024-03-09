<?php
session_start();
include('../config/config.php');
$query = mysqli_query($con, "select * from tblplan");
if (isset($_SESSION['uname'])) {
    $uid = $_SESSION['uid'];
    $credit = mysqli_fetch_array(mysqli_query($con , "select * from user where uid=$uid"));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
    <!-- Sweet Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="../js/sweetalert.js"></script> -->
    <title>LOCUS | Plan And Pricing</title>
</head>

<body>
    <div class="container w-75">
        <div class="container mt-5">
            <div class="text-center mx-auto mb-5 text-black" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3 text-black pb-2" style="border-bottom: 2px solid var(--tan);">Plan Pricing</h1>
                <p>We offer pricing and plan options to meet your needs, including packages for sellers, renters, and i nvestors. Contact us to learn more about our pricing and subscription options and find the plan that's right for you.</p>
                <?php if(isset($_SESSION['uname'])){?>
                <p>You have <button class="btn bg-black text-tan px-4"><?php echo $credit['credit'];?></button> credit left..</p>
                <?php }?>
            </div>
        </div>
        <div class="container">
            <div class="text-center">

                <div class="d-flex justify-content-around">
                    <?php while ($data = mysqli_fetch_array($query)) { ?>
                    <div class="card mb-4  rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal"><?php echo $data['p_name'] ?></h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">₹ <?php echo $data['p_price'] ?><small class="text-body-secondary fw-light">/<?php echo $data['p_credit'] ?> Credit</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <?php echo $data['p_description'] ?>
                                </ul>
                                <button type="button" class="w-100 btn btn-lg btn-primary" id="payment<?php echo $data['p_id'] ?>" onclick="pay_now<?php echo $data['p_id']?>()">Get started</button>
                            </div>
                        </div>
                        <script>
                            function <?php $pid1 = $data['p_id']; echo "pay_now$pid1"?>() {
                                <?php if(!isset($_SESSION['uid'])){ 
                                    ?>
                                    window.location = "login.php";
                              <?php  }?>
                                var options = {
                                    "key": "rzp_test_WVSwVyjTamNVvO",
                                    "amount": <?php echo $data['p_price']; ?> * 100,
                                    "currency": "INR",
                                    "name": "Locus",
                                    "description": "Test Transaction",
                                    "image": "https://example.com/your_logo",
                                    "handler": function(response) {
                                        console.log(response);
                                        $.ajax({
                                            url: "process_payment.php?p_id=<?php echo $data['p_id']; ?>",
                                            'type': 'POST',
                                            'data': {
                                                'pmtid': response.razorpay_payment_id,
                                                'amt': <?php echo $data['p_price']; ?>
                                            },
                                            success: function(data) {
                                                console.log(data);
                                                window.location.href = 'Pricing.php';
                                            }
                                        });
                                    },
                                }
                                var rzp1 = new Razorpay(options);
                                rzp1.on('payment.failed', function(response) {
                                    alert(response.error.code);
                                    alert(response.error.description);
                                    alert(response.error.source);
                                    alert(response.error.step);
                                    alert(response.error.reason);
                                    alert(response.error.metadata.order_id);
                                    alert(response.error.metadata.payment_id);
                                });
                                document.getElementById('payment<?php echo $data['p_id'] ?>').onclick = function(e) {
                                    rzp1.open();
                                    e.preventDefault();
                                }
                            };
                        </script>
                    <?php } ?>
                </div>
    
   <?php if (isset($_SESSION['alert'])){?> 
    <script>
        Swal.fire({
                icon: '<?php echo $_SESSION["alert"]["0"] ?>',
                title: '<?php echo $_SESSION["alert"]["1"] ?>',
                text: '<?php echo $_SESSION["alert"]["2"] ?>',
                footer: '<a href="<?php echo $_SESSION["alert"]["4"] ?>"><?php echo $_SESSION["alert"]["3"] ?></a>'
        })
    </script>
    <?php } 
        unset($_SESSION['alert']);
    ?>
                
            </div>
        </div>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
   
</body>

</html>