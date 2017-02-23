<?php


require_once(dirname(__FILE__) . "/../DataAccessLayer/DA_QueryClass.php");

class accelClass {
    public function getAllAccelData() {
        $qc = new QueryClass();
        return json_decode($qc->selectQueryRun('SELECT * FROM `accel_data` LIMIT 5000'));
    }
    
    public function getAccelDataStartFrom($id) {
        $qc = new QueryClass();
        return json_decode($qc->selectQueryRun('SELECT id, x_val, y_val, z_val FROM `accel_data` WHERE id>'.$id));
    }
}
