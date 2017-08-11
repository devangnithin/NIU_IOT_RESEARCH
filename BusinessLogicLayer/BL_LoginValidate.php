<?php
@session_start();
require_once(dirname(__FILE__)."/BL_LoginClass.php");
function Redirect($url) {
//    echo $url;
    header("Location: $url");
}
if(isset($_SESSION['Login'])) {
    $Login=unserialize($_SESSION['Login']);
}
else {
    $Login=new BL_LoginClass();
}

if($Login->LoginCheck()) {
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
}
else {
    if($Login->LoginValidate($_POST['username'],$_POST['password'])) {
        $_SESSION['Login']=serialize($Login);
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';    
    }
    else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../login.php?fail=passworderror">';    
     }
}
?>