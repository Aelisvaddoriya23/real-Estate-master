<?php
    session_start();
    $_SESSION['alert'] = array();
    $icon = "error";
    $title = "Alert";
    $text = "This Is A Alert";
    $footer = "Click Hear";
    $link = "Click Hear";
    array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>

<body>
<?php if (isset($_SESSION['alert'])) { ?>
        <script>
            Swal.fire({
                icon: '<?php echo $icon ?>',
                title: '<?php echo $title ?>',
                text: '<?php echo $text ?>',
                footer: '<a href="<?php echo $link ?>"><?php echo $footer ?></a>'
            })
        </script>
    <?php
        unset($_SESSION['alert']);
    } ?>
<!-- <?php if (isset($_SESSION['msg'])) { ?>
        <script>
            swal("<?php echo  $_SESSION['status'] ?>", "<?php echo $_SESSION['msg'] ?>",
                "<?php echo $_SESSION['status'] ?>");
        </script>
    <?php
        unset($_SESSION['msg']);
        unset($_SESSION['status']);
    } ?> -->
</body>

</html>