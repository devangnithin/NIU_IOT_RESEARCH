<div id="accel_chart1" style="height: 500px;"></div>
<?php
$accResult1 = $acc->getAllAccelData(1);
if (count($accResult1) > 0) {

    $max1 = $accResult1[0]->id;
    ?>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart1);
        var data1;
        var chart1;
        var options1 = {
            title: '1st Accelerometer Data',
            curveType: 'function',
            legend: {position: 'bottom'},
            vAxis: {
                title: 'Accel Value',
            },
            hAxis: {
                title: 'Time (UTC)',
            }
        };

        var max1 = <?php echo $max1; ?>;
        var isLoading = 0;
        function reload1() {
            if (isLoading === 0) {
                isLoading = 1;
            } else {
                return;
            }
            $.getJSON("fetchNewData.php?accel=1&graph_len_name=<?php echo $graphLength; ?>&id=" + max1, function (datah) {
                var items = [];
                $.each(datah, function (key, val) {
                    var items2 = []
                    $.each(val, function (key, val2) {
                        if (key == "id") {
                            if (parseInt(val2) > max1) {
                                max1 = parseInt(val2);
                            }
                        } else if (key == "post_time") {
                            items2.push(val2);
                        } else {
                            items2.push(parseFloat(val2));
                        }
                    });
                    items.push(items2);
                });

                data1.removeRows(0, datah.length);
                data1.addRows(items);
                chart1.draw(data1, options1);
                isLoading = 0;

            });
        }
        function drawChart1() {
            data1 = google.visualization.arrayToDataTable([
                ['ID', 'x-axis', 'y-axis', 'z-axis'],
    <?php
    foreach ($accResult1 as $accI) {
        echo '[\'' . $accI->post_time . '\',  ' . $accI->x_val . ',' . $accI->y_val . ', ' . $accI->z_val . '],';
        if ($accI->id > $max1) {
            $max1 = $accI->id;
        }
    }
    ?>
            ]);
            chart1 = new google.visualization.LineChart(document.getElementById('accel_chart1'));
            chart1.draw(data1, options1);
        }

        setInterval(function () {
            reload1();
        }, 5000);

        max1 = <?php echo $max1; ?>
    </script>
    <?php
}
