<?php
$accResult4 = $acc->getAllAccelData(4);
if (count($accResult4) > 0) {

    $max4 = $accResult4[0]->id;
    ?>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart4);
        var data4;
        var chart4;
        var options4 = {
            title: '4th Accelerometer Data',
            curveType: 'function',
            legend: {position: 'bottom'}
        };

        var max4 = <?php echo $max4; ?>;
        function reload4() {
            $.getJSON("fetchNewData.php?accel=4&id=" + max4, function (datah) {
                var items = [];
                $.each(datah, function (key, val) {
                    var items2 = []
                    $.each(val, function (key, val2) {
                        if (key == "id") {
                            if (parseInt(val2) > max2) {
                                max4 = parseInt(val2);
                            }
                            items2.push(val2);
                        } else {
                            items2.push(parseInt(val2));
                        }
                    });
                    items.push(items2);
                });

                data4.addRows(items);
                chart4.draw(data4);

            });
        }
        function drawChart4() {
            data4 = google.visualization.arrayToDataTable([
                ['ID', 'x-axis', 'y-axis', 'z-axis'],
    <?php
    foreach ($accResult4 as $accI) {
        echo '[\'' . $accI->id . '\',  ' . $accI->x_val . ',' . $accI->y_val . ', ' . $accI->z_val . '],';
        if ($accI->id > $max2) {
            $max4 = $accI->id;
        }
    }
    ?>
            ]);
            chart4 = new google.visualization.LineChart(document.getElementById('accel_chart4'));
            chart4.draw(data4, options4);
        }

        setInterval(function () {
            //reload4();
        }, 5000);

        max4 = <?php echo $max4; ?>
    </script>
    <?php
} else {
    echo "<h1>No Data</h1>";
}