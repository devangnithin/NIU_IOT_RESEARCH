<?php
class DA_DataBaseConnectionClass {

    private static $userName = "root";
    private static $password = "";
    private static $dataBase = "niu_res";
    private static $server = "localhost";
    private static $connection;

    public static function getConnection() {
        return self::$connection;
    }
    
    //TODO Check this

    public function DA_DataBaseConnectionClass() {
        //self::$connection = mysqli_connect(self::$Server,self::$UserName,self::$Password, self::$DataBase);
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try {
            //echo "mysql:host=".self::$server.";dbname=".self::$dataBase;
            self::$connection = new PDO("mysql:host=".self::$server.";dbname=".self::$dataBase, self::$userName, self::$password);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

}

?>
