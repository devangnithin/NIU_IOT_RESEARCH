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
                chart = new google.visualization.LineChart(document.getElementById('accel_chart2'));
                chart.draw(data, options);
            }

            setInterval(function () {
               reload();
            }, 5000);
            
            max = <?php echo $max; ?>
        </script>