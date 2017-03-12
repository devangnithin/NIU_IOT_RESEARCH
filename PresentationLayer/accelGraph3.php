<?php
$accResult3 = $acc->getAllAccelData(3);
if (count($accResult3) > 0) {
    $max3 = $accResult3[0]->id;
    ?>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart3);
        var data3;
        var chart3;
        var options3 = {
            title: '3rd Accelerometer Data',
            curveType: 'function',
            legend: {position: 'bottom'}
        };

        var max3 = <?php echo $max3; ?>;
        function reload3() {
            $.getJSON("fetchNewData.php?accel=3&graph_len_name=<?php echo $graphLength;?>&id=" + max3, function (datah) {
                var items = [];
                $.each(datah, function (key, val) {
                    var items2 = []
                    $.each(val, function (key, val2) {
                        if (key == "id") {
                            if (parseInt(val2) > max2) {
                                max3 = parseInt(val2);
                            }
                            //items2.push(val2);
                        } else if (key == "post_time") {
                            items2.push(val2);
                        } else {
                            items2.push(parseFloat(val2));
                        }
                    });
                    items.push(items2);
                });

                data3.removeRows(0, datah.length);
                data3.addRows(items);
                chart3.draw(data3);

            });
        }
        function drawChart3() {
            data3 = google.visualization.arrayToDataTable([
                ['ID', 'x-axis', 'y-axis', 'z-axis'],
    <?php
    foreach ($accResult3 as $accI) {
        echo '[\'' . $accI->post_time . '\',  ' . $accI->x_val . ',' . $accI->y_val . ', ' . $accI->z_val . '],';
        if ($accI->id > $max3) {
            $max3 = $accI->id;
        }
    }
    ?>
            ]);
            chart3 = new google.visualization.LineChart(document.getElementById('accel_chart3'));
            chart3.draw(data3, options3);
        }

        setInterval(function () {
            //reload3();
        }, 5000);

        max3 = <?php echo $max3; ?>
    </script>
    <?php
} else {
    echo "<h1>No Data</h1>";
}
