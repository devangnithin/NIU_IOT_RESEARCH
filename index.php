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
        
        <style type="text/css">
    body {
      font: 10pt arial;
    }
  </style>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.18.1/vis.min.js"></script>

        
        <!-- 3D start -->
        <script type="text/javascript">
    var vis_data = null;
    var vis_graph = null;


    // Called when the Visualization API is loaded.
    function drawVisualization() {
      // Create and populate a data table.
      vis_data = new vis.DataSet();
      // create some nice looking data with sin/cos
      <?php
$i =0;
$j=0;
foreach ($accResult as $accI) {
    
    $j++;
    if(fmod($j,10)==0) {
        $i++;
    }
    
    //echo  $accI->x_val . ',' . $accI->y_val . ', ' . $accI->z_val . ','.$j.'@';
    ?>
      vis_data.add({x:<?php echo $accI->x_val; ?>,y:<?php echo $accI->x_val; ?>,z:<?php echo $accI->z_val; ?>,filter:<?php echo $j; ?>, style:<?php echo $accI->z_val; ?>});              
    <?php
}
?>
      var steps = 25;
      var axisMax = 314;
      var tMax = 31;
      var axisStep = axisMax / steps;
      

      // specify options
      var vis_options = {
        width:  '600px',
        height: '600px',
        style: 'dot-color',
        showPerspective: true,
        showGrid: true,
        showShadow: false,
        //showAnimationControls: false,
        keepAspectRatio: true,
        verticalRatio: 0.5,
        animationInterval: 1, // milliseconds
        animationPreload: true,
        filterValue: 'time',
        legendLabel: 'color value for z'
      };

      // create our graph
      var container = document.getElementById('mygraph');
      vis_graph = new vis.Graph3d(container, vis_data, vis_options);
    }
  </script>
        <!-- 3D end-->
        <?php require_once(dirname(__FILE__) . "/PresentationLayer/accelGraph1.php");?>
    </head>
    <body onload="drawVisualization();">
        
        <div id="accel_chart1" style="width: 900px; height: 500px"></div>
    
    
<div id="mygraph"></div>

<div id="info"></div>
</body>
    
</html>