<?php
require("config.php");
if (!isset($_SESSION['auser'])) {
  header("location:index.php");
}

$house_property = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM tblhouse where ptype='House'"));
$flat_property = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM tblhouse where ptype='Flat'"));
$banglow_property = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM tblhouse where ptype='Banglow'"));
$farmhouse_property = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM tblhouse where ptype='Farm-House'"));
$penthouse_property = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM tblhouse where ptype='Pent-House'"));
?>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['House', <?php echo $house_property['total'] ?>],
            ['Flats', <?php echo $flat_property['total'] ?>],
            ['Banglow', <?php echo $banglow_property['total'] ?>],
            ['Pent-House', <?php echo $penthouse_property['total'] ?>],
            ['Farm-House', <?php echo $farmhouse_property['total'] ?>],
        ]);

        var options = {
            title: ''
        };


        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
    </script>
</head>

<body>
    <div class="bg-white text-center pt-3">
        <div>
            <h5 class="text-black border-bottom pb-2">Property Details</h5>
        </div>
        <div id="piechart" style="width: 900px; height: 500px;">
        </div>

    </div>
</body>

</html>