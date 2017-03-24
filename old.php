<?php
$graphLength = "50";
if(isset($_GET['graph_len_name'])) {
    $graphLength = $_GET['graph_len_name'];
}
require_once(dirname(__FILE__) . "/BusinessLogicLayer/accelClass.php");
$acc = new accelClass($graphLength);
?>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"  crossorigin="anonymous"></script>
        <style>
            .button {
                background-color: Red; /* Green */
                border: none;
                color: white;
                padding: 5px 5px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }

            .selected {
                background-color: #4CAF50;
            }

        </style>

    <form>
        <button name="graph_len_name" value="50" class="button">50</button>
        <button name="graph_len_name" value="100" class="button">100</button>
        <button name="graph_len_name" value="250" class="button">250</button>
        <button name="graph_len_name" value="500" class="button">500</button>
        <button name="graph_len_name" value="1mn" class="button">1 min</button>
        <button name="graph_len_name" value="5mn" class="button">5 min</button>
        <button name="graph_len_name" value="30mn" class="button">30 min</button>
        <button name="graph_len_name" value="1hr" class="button">1 hr</button>
        <button name="graph_len_name" value="5hr" class="button">5 hr</button>
        <button name="graph_len_name" value="td" class="button">Today</button>
    </form>


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
