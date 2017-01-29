<?php
require_once(dirname(__FILE__) . "/../DataAccessLayer/DA_QueryClass.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tempClass
 *
 * @author devangn
 */
class tempHumClass {
    public function getAllTempData() {
        $qc = new QueryClass();
        return json_decode($qc->selectQueryRun('SELECT * FROM `temp_data` ORDER BY id DESC LIMIT 30;'));
    }
}
