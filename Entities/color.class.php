<?php // IDEA
require_once("./config/db.class.php");
// 
class Color
{
    public $colorID;
    public $colorName;

    public function __construct($colorName)
    {
        // 
        $this->colorName = $colorName;        
    }
    // lấy danh sách loại sản phẩm
    public static function list_color()
    {
        $db = new Db();
        $sql = "SELECT * FROM color";
        $result = $db->select_to_array($sql);
        return $result;
    }
    //lấy danh sách hoa theo màu
    public static function list_color_by_color_id($colorID)
    {
        $db = new Db();
        $sql = "SELECT * FROM color WHERE color_id='$colorID'" ;
        $result = $db->select_to_array($sql);
        return $result;
    }

}
?>