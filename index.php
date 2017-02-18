<?php
require_once(dirname(__FILE__) . "/BusinessLogicLayer/accelClass.php");
$acc = new accelClass();
$accResult = $acc->getAllAccelData();
//var_dump($accResult);
$max = $accResult[0]->id;
?>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"  crossorigin="anonymous"></script>

        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            var data;
            var chart;
            var options = {
                title: 'Accelerometer Data',
                curveType: 'function',
                legend: {position: 'bottom'}
            };
            
            var max = <?php echo $max; ?>;
            function reload() {
                $.getJSON("fetchNewData.php?id="+max, function (datah) {
                    var items = [];
                    $.each(datah, function (key, val) {
                        var items2 = []
                        $.each(val, function (key, val2) {
                            if (key == "id") {
                                if (parseInt(val2) > max) {
                                    max = parseInt(val2);
                                }
                                items2.push(val2);
                            } else {
                                items2.push(parseInt(val2));
                            }
                        });
                        items.push(items2);
                    });

                    data.addRows(items);
                    chart.draw(data);

                });
            }
            function drawChart() {
                data = google.visualization.arrayToDataTable([
                    ['ID', 'x-axis', 'y-axis', 'z-axis'],
<?php
foreach ($accResult as $accI) {
    echo '[\'' . $accI->id . '\',  ' . $accI->x_val . ',' . $accI->y_val . ', ' . $accI->z_val . '],';
    if ($accI->id > $max) {
        $max = $accI->id;
    }
}
?>
                ]);
                chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                chart.draw(data, options);
            }

            setInterval(function () {
               reload();
            }, 5000);
            
            max = <?php echo $max; ?>
        </script>
    </head>
    <body>
        <div id="curve_chart" style="width: 900px; height: 500px"></div>
    </body>
</html>