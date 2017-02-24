<?php
require_once(dirname(__FILE__) . "/BusinessLogicLayer/accelClass.php");
$acc = new accelClass();
?>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"  crossorigin="anonymous"></script>


        <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph1.php"); ?>
        <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph2.php"); ?>
        <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph3.php"); ?>
        <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph4.php"); ?>
    </head>
    <body>
        <div style="float: left">
            <div id="accel_chart1" style="width: 800px; height: 500px; float: left"></div>
            <div id="accel_chart2" style="width: 800px; height: 500px; float: left"></div>
            <div id="accel_chart3" style="width: 800px; height: 500px; float: left"></div>
            <div id="accel_chart4" style="width: 800px; height: 500px; float: left"></div>
        </div>

        <div id="info"></div>
    </body>

</html>