<?php
header('Content-type: application/json');
if (isset($_GET['id'])) {
    $accelId = 1;
    if (isset($_GET['accel'])) {
        $accelId = $_GET['accel'];
    }
    $graphLength = "50";
    if(isset($_GET['graph_len_name'])) {
        $graphLength = $_GET['graph_len_name'];
    }

    require_once(dirname(__FILE__) . "/BusinessLogicLayer/accelClass.php");
    $acc = new accelClass();
    $accResult = $acc->getAccelDataStartFrom($_GET['id'], $accelId);
    /*$result = "[";
    foreach ($accResult as $accI) {
        $result = $result . '[\'' . $accI->id . '\',  ' . $accI->x_val . ',' . $accI->y_val . ', ' . $accI->z_val . '],';
    
    }
    $result = substr_replace($result, '', -1);
    $result = $result."]";*/

    //echo $result;
    echo json_encode($accResult);

    }
    
    /*
     * // note that the internal quotes are double-quotes here, as that is required by JSON
var foo = '[["2004", 1000, 400],["2005", 1170, 460],["2006", 660, 1120],["2007", 1030, 540]]';
data.addRows(JSON.parse(foo));
     */
