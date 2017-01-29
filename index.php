<?php
require_once(dirname(__FILE__) . "/BusinessLogicLayer/tempHumClass.php");

$tempHum = new tempHumClass();
$tempHumResult = $tempHum->getAllTempData();
$currentT = $tempHumResult[0]->temp;
$currentH = $tempHumResult[0]->hum;
$tempHumResult = array_reverse($tempHumResult);


?>
<html>
  <head>
      <meta http-equiv="refresh" content="5" >
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ID', 'Temperature', 'Humidity'],
          <?php
          foreach ($tempHumResult as $tempHumI) {
              echo '[\''.$tempHumI->id.'\',  '.$tempHumI->temp.','.$tempHumI->hum.'],';
              
          }
          ?>
        ]);

        var options = {
          title: 'Current Room Temp',
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
    <div style="float: left; border-right: black; border-right-style: double">
        <div>
            <h3 style="color: green">Last Read Room Temperature:</h3>
        </div>
        <div>
            <h1 style="color: green">" <?php echo $currentT; ?> &#8451; "</h1>
        </div>
    </div>
    <div style="float: left">
        <div>
            <h3 style="color: green">Last Read Room Humidity:</h3>
        </div>
        <div>
            <h1 style="color: green">" <?php echo $currentH; ?> "</h1>
        </div>
    </div>
  </body>
</html>