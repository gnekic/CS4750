<?PHP
    class DbUtil {
        public static $host="stardock.cs.virginia.edu";
        public static $username="cs4750s17aaa4aa";
        public static $password="spring2017";
        public static $schema = "cs4750jmi8fs";
        
        public static function loginConnection(){
            $db = new mysqli(DbUtil::$host, DbUtil::$loginUser, DbUtil::$loginPass, DbUtil::$schema);
            if($db->connect_errno){
                echo("Could not connect to db");
                $db->close();
                exit();
            }
            return $db;
        }
    }
?>
