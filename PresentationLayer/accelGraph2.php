<?php
$accResult2 = $acc->getAllAccelData(2);
if (count($accResult2) > 0) {

    $max2 = $accResult2[0]->id;
    ;
    ?>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart2);
        var data2;
        var chart2;
        var options2 = {
            title: '2nd Accelerometer Data',
            curveType: 'function',
            legend: {position: 'bottom'}
        };

        var max2 = <?php echo $max2; ?>;
        function reload2() {
            $.getJSON("fetchNewData.php?accel=2&id=" + max2, function (datah) {
                var items = [];
                $.each(datah, function (key, val) {
                    var items2 = []
                    $.each(val, function (key, val2) {
                        if (key == "id") {
                            if (parseInt(val2) > max2) {
                                max2 = parseInt(val2);
                            }
                            items2.push(val2);
                        } else {
                            items2.push(parseInt(val2));
                        }
                    });
                    items.push(items2);
                });

                data2.addRows(items);
                chart2.draw(data2);

            });
        }
        function drawChart2() {
            data2 = google.visualization.arrayToDataTable([
                ['ID', 'x-axis', 'y-axis', 'z-axis'],
    <?php
    foreach ($accResult2 as $accI) {
        echo '[\'' . $accI->id . '\',  ' . $accI->x_val . ',' . $accI->y_val . ', ' . $accI->z_val . '],';
        if ($accI->id > $max2) {
            $max2 = $accI->id;
        }
    }
    ?>
            ]);
            chart2 = new google.visualization.LineChart(document.getElementById('accel_chart2'));
            chart2.draw(data2, options2);
        }

        setInterval(function () {
            //reload2();
        }, 5000);

        max2 = <?php echo $max2; ?>
    </script>
    <?php
} else {
    echo "<h1>No Data</h1>";
}