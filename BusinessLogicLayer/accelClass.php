<?php


require_once(dirname(__FILE__) . "/../DataAccessLayer/DA_QueryClass.php");

class accelClass {
    public function getAllAccelData($accelId) {
        $qc = new QueryClass();
        return json_decode($qc->selectQueryRun('SELECT * FROM `'.$this->getAcceltable($accelId).'` LIMIT 5000'));
    }
    
    public function getAccelDataStartFrom($id, $accelId) {
        $qc = new QueryClass();
        return json_decode($qc->selectQueryRun('SELECT id, x_val, y_val, z_val FROM `'.$this->getAcceltable($accelId).'` WHERE id>'.$id));
    }
    
    private function getAcceltable($accelId) {
        if ($accelId ==1) {   
            return "accel_data";
        }
        if ($accelId ==2) {
            return "accel_data2";
        }
        if ($accelId ==3) {
            return "accel_data3";
        }
        if ($accelId ==4) {
            return "accel_data4";
        }
        return "accel_data";
        
    }
}
