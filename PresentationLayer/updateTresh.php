<?php

//var_dump($_POST);
require_once(dirname(__FILE__) . "/BusinessLogicLayer/thresholdClass.php");
$thresh = new thresholdClass();

$accelArray = array();
foreach ($_POST as $key => $value) {
    $accelArray[$key] = $value;
}
if($thresh ->insert($accelArray)) {
    echo 'successfully updated';
} else {
echo 'Failed';    
}
