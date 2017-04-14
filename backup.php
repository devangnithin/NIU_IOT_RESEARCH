<?php

require_once(dirname(__FILE__) . "/phpORM/DA_QueryClass.php");
$postData = $_POST['data'];
//$postData= file_get_contents("out.txt");
$data = json_decode($postData, TRUE);
$queryClassObject = new QueryClass();
$sql = "";
if (isset($_GET['accel_id']) && $_GET['accel_id'] == '1') {
    $sql = $sql . "INSERT into accel_data (id, x_val, y_val, z_val, post_date) values ";
} else if (isset($_GET['accel_id']) && $_GET['accel_id'] == '2') {
    $sql = $sql . "INSERT into accel_data2 (id, x_val, y_val, z_val, post_date) values ";
} else if (isset($_GET['accel_id']) && $_GET['accel_id'] == '3') {
    $sql = $sql . "INSERT into accel_data3 (id, x_val, y_val, z_val, post_date) values ";
} else if (isset($_GET['accel_id']) && $_GET['accel_id'] == '4') {
    $sql = $sql . "INSERT into accel_data4 (id, x_val, y_val, z_val, post_date) values ";
}
foreach ($data as $dataInstance) {
    //var_dump($dataInstance);
    $sql = $sql . "($dataInstance[0], $dataInstance[1], $dataInstance[2], $dataInstance[3], '$dataInstance[4]'),";
}
$sql = substr($sql, 0, strlen($sql) - 1);
//echo $sql;
if ($queryClassObject->insertQueryRun($sql)) {
    echo "success";
} else {
    echo "failure";
}
