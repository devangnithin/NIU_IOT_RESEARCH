<?php
require_once(dirname(__FILE__) . "/BusinessLogicLayer/accelClass.php");
$acc = new accelClass();
$accResult = $acc->getAllAccelData();
//var_dump($accResult);
$max = $accResult[0]->id;
?>

<!doctype html>
<html>
<head>
  <title>Graph 3D animation demo</title>

  <style type="text/css">
    body {
      font: 10pt arial;
    }
  </style>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.18.1/vis.min.js"></script>

  
  
</head>

<body onload="drawVisualization();">
<div id="mygraph"></div>

<div id="info"></div>
</body>
</html>
