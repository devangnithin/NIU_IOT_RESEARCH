<?php
$accResult1 = $acc->getAllAccelData(1);
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
        legend: {position: 'bottom'}
    };

    var max1 = <?php echo $max1; ?>;
    function reload1() {
        $.getJSON("fetchNewData.php?accel=1&id=" + max, function (datah) {
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

            data1.addRows(items);
            chart1.draw(data);

        });
    }
    function drawChart1() {
        data1 = google.visualization.arrayToDataTable([
            ['ID', 'x-axis', 'y-axis', 'z-axis'],
<?php
foreach ($accResult1 as $accI) {
    echo '[\'' . $accI->id . '\',  ' . $accI->x_val . ',' . $accI->y_val . ', ' . $accI->z_val . '],';
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
        //reload1();
    }, 5000);

    max1 = <?php echo $max1; ?>
</script>