<?php

$doc = file_get_contents('php://input');


$ch = curl_init("http://localhost:8085/threshold");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $doc); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($doc))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
var_dump($doc);
var_dump($result);
/*if($thresh ->insert($accelArray)) {
    echo 'successfully updated';
} else {
echo 'Failed';    
}*/
