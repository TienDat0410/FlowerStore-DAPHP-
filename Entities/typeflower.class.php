<?php // IDEA

require_once("./config/db.class.php");
// 
class Typeflower
{
    public $typeflowerID;
    public $typeName;

    public function __construct($typeName)
    {
        // 
        $this->typeName = $typeName;        
    }
    // lấy danh sách loại hoa
    public static function list_typeflower()
    {
        $db = new Db();
        $sql = "SELECT * FROM typeofflower";
        $result = $db->select_to_array($sql);
        return $result;
    }
    //lấy danh sách hoa theo loại
    public static function list_color_by_typeflower_id($typeflowerID)
    {
        $db = new Db();
        $sql = "SELECT * FROM color WHERE typeflower_id='$typeflowerID'" ;
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>