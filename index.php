<?php
require_once(dirname(__FILE__) . "/BusinessLogicLayer/accelClass.php");
$acc = new accelClass();
$accResult = $acc->getAllAccelData();
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ID', 'x-axis', 'y-axis', 'z-axis'],
          <?php
          foreach ($accResult as $accI) {
              echo '[\''.$accI->id.'\',  '.$accI->x_val.','.$accI->y_val.', '.$accI->z_val.'],';
              
          }
          ?>
        ]);

        var options = {
          title: 'Accelerometer Data',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>