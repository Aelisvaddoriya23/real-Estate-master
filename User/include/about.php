<?php
    include('./config/config.php');
    $select_q="select * from about";
    $q=mysqli_query($con,$select_q);
?>
<body>
    <?php while($data= mysqli_fetch_array($q)){?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden pe-0">
                        <img class="img-fluid w-100" style="height: 60vh;" src="../admin/upload/Image/<?php echo $data['image'];?>">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn text-black" data-wow-delay="0.5s">
                    <h1 class="mb-4 text-black"><?php echo $data['title'];?></h1>
                    <p class="mb-4"><?php echo $data['content'];?></p>
                </div>
            </div>
        </div>
    </div>
   <?php }?>

</body>
