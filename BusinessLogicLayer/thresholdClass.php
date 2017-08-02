<?php

require_once(dirname(__FILE__) . "/../DataAccessLayer/DA_QueryClass.php");

class thresholdClass {
    /* public function accelClass($graphL = "50") { //Constructor
      $this->graphLength = $graphL;
      } */

    public function getAllThreshData() {
        $qc = new QueryClass();
        return json_decode($qc->selectQueryRun('SELECT * from threshold ORDER BY id DESC LIMIT 1'));
    }

    public function insert($accelArray) {
        $qc = new QueryClass();
        $qc->deleteQueryRun('DELETE from threshold WHERE 1=1');
        $qc = new QueryClass();
        $qc->setTable("threshold");
        if ($qc->insert2($accelArray)) {
            return true;
        } else {
            return false;
        }
    }

    private function getLimiter() {

        if ($this->graphLength == "50") {
            return ' LIMIT 50';
        } else if ($this->graphLength == "100") {
            return ' LIMIT 100';
        } else if ($this->graphLength == "250") {
            return ' LIMIT 250';
        } else if ($this->graphLength == "500") {
            return '  LIMIT 500';
        } else if ($this->graphLength == "1mn") {
            return ' WHERE post_date> ADDDATE(NOW(), INTERVAL -1 MINUTE)';
        } else if ($this->graphLength == "5mn") {
            return ' WHERE post_date> ADDDATE(NOW(), INTERVAL -5 MINUTE)';
        } else if ($this->graphLength == "30mn") {
            return ' WHERE post_date> ADDDATE(NOW(), INTERVAL -30 MINUTE)';
        } else if ($this->graphLength == "1hr") {
            return ' WHERE post_date> ADDDATE(NOW(), INTERVAL -1 HOUR)';
        } else if ($this->graphLength == "5hr") {
            return ' WHERE post_date> ADDDATE(NOW(), INTERVAL -5 HOUR)';
        } else if ($this->graphLength == "td") {
            return ' WHERE post_date >= CURDATE()';
        }
    }

    private function getAcceltable($accelId) {
        if ($accelId == 1) {
            return "accel_data";
        }
        if ($accelId == 2) {
            return "accel_data2";
        }
        if ($accelId == 3) {
            return "accel_data3";
        }
        if ($accelId == 4) {
            return "accel_data4";
        }
        return "accel_data";
    }

}
