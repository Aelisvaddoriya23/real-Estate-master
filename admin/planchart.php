<?php
require("config.php");
if (!isset($_SESSION['auser'])) {
  header("location:index.php");
}

$plan_name = mysqli_query($con , "SELECT DISTINCT  p_name FROM `tblpmt`");
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
        ['paln', 'User per Plan'],
        <?php while($plan = mysqli_fetch_array($plan_name)){
            $p_name = $plan["p_name"]; 
            $get_user = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM tblpmt where p_name='$p_name'"));
          ?>
        ['<?php echo $p_name?>', <?php echo $get_user['total'] ?>],
        <?php }?>
        
      ]);

      var options = {
        title: ''
      };


      var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

      chart.draw(data, options);
    }
  </script>
</head>

<body>
<div class="bg-white text-center pt-3">
        <div>
            <h5 class="text-black border-bottom pb-2">Plan Details</h5>
        </div>
        <div id="piechart1" style="width: 900px; height: 500px;">
        </div>

    </div>
</body>

</html>