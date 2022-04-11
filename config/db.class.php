<?php // IDEA:
// 
class Db
{
    protected static $connection;
    //init con
    public function connect()
    {
        $username = "root";
        $password = "Aa@123";
        $databasename = "flowershop";
        $server = "localhost";
       // connect to databs
        if (!isset(self::$connection)) {
            //lấy thông tin kết nối từ file config.ini
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);       
            // self::$connection = new mysqli($server, $username, $password, $databasename);
           
        }
        // ko kết nối được
        if(self::$connection == false) {
            echo "kết nối không thành công";
            return false;
        }
        return self::$connection;
    }
    // jquery
    public function query_execute($queryString)
    {
        // init con
        $connection = $this->connect();
        // 
        // $connection->query("SET NAMES utf-8");
        $result = $connection->query($queryString);
        // $connection->close(); lab05
        return $result;
    }
    // trả về mảng kết quả
    public function select_to_array($queryString)
    {
        $rows = array();
        $result = $this->query_execute($queryString);
        if ($result == false) {
            return false;
        }
        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }
        return $rows;
    }
}
?>
