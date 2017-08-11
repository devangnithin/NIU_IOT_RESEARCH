<?php
@session_start();
/**
 * Description of DA_LoginClass
 *
 * @author Nithin Devang
 */
class BL_LoginClass {
    private $LoginId;
    private $LoginTrue;
    public function BL_LoginClass() {
        $this->LoginTrue=false;
    }
    public function LoginValidate($username_,$Password_,$Md5Pass_=false) {
        //TODO @TODO Temporary. Connect to NodeJS to validate
        if($username_  == "admin" && $Password_ == "niuadmin") {
            $this->LoginId=$username_;
            $this->LoginTrue=true;
            return true;
        }
        /*require_once(dirname(__FILE__)."/../DataAccessLayer/DA_QueryClass.php");
        if(empty($username_))
            return false;
        if(empty($Password_))
            return false;
        $username_=trim($username_);
        $Password_=trim($Password_);

        if(!isset($_SESSION)) {
            session_start();
        }

        $username_ = $this->SanitizeForSQL($username_);
        if(!$Md5Pass_){
            $Password_ = md5($Password_);
        }
        $QueryClassObject=new QueryClass();
        $QueryClassObject->SetTable("user_info");
        $QueryClassObject->setField("password");
        //$QueryClassObject->AddField("Status");
        $QueryClassObject->AddCondition("username", $username_);
        $LoginReturn=json_decode($QueryClassObject->Select());
        if(empty($LoginReturn)) return false;
        
        if($LoginReturn[0]->password==$Password_) {
            $this->LoginId=$username;
            $this->LoginTrue=true;
            return true;
        }
        else*/
            return false;
    }
    
    public function authValidate($username_,$appKey, $secret) {
        require_once(dirname(__FILE__)."/../DataAccessLayer/DA_QueryClass.php");
        if(empty($username_))
            return false;
        if(empty($secret))
            return false;
        $username_=trim($username_);
        $secret=trim($secret);

        if(!isset($_SESSION)) {
            session_start();
        }

        $username_ = $this->SanitizeForSQL($username_);
     
        $QueryClassObject=new QueryClass();
        $QueryClassObject->SetTable("user_info");
        $QueryClassObject->setField("secret");
        //$QueryClassObject->AddField("Status");
        $QueryClassObject->AddCondition("username", $username_);
        $QueryClassObject->AddCondition("app_key", $appKey);
        
        $LoginReturn=json_decode($QueryClassObject->Select());
        if(empty($LoginReturn)) return false;
        /*if(($LoginReturn[0]->Status)!="Active") {
            $_SESSION['LoginFailFlag']="username";
            return false;
        }*/
        if($LoginReturn[0]->secret==$secret) {
            return true;
        }
        else
            return false;
    }
    public function LoginCheck() {
        if((isset ($this->LoginId))&&($this->LoginTrue)) {
            return true;
        }
        else
            return false;
    }
    public function GetLoginId() {
        if((isset ($this->LoginId))&&($this->LoginTrue)) {
            return $this->LoginId;
        }
    }
    function SanitizeForSQL($str) {
        require_once(dirname(__FILE__)."/../DataAccessLayer/DA_QueryClass.php");
        $QueryClassObject=new QueryClass();
        if( function_exists( "mysql_real_escape_string" ) ) {
            $ret_str = mysql_real_escape_string( $str );
        }
        else {
            $ret_str = addslashes( $str );
        }
        return $ret_str;
    }
}
?>