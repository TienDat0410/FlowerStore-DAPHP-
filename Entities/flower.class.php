<?php //IDEA:

require_once("./config/db.class.php");
// 
class flower
{
    public $flowerID;
    public $flowerName;
    public $colorID;
    public $unit;
    public $price;
    public $available;
    public $flowerPicture;
    public $typeflower_id;
    
    // cons
    public function __construct($flowerName, $colorID, $unit, $price, $available, $flowerPicture, $typeflower_id)
    {
        $this->flowername = $flowerName;
        $this->colorID = $colorID;
        $this->unit = $unit;
        $this->price = $price;
        $this->available = $available;
        $this->flowerPicture = $flowerPicture;
        $this->typeflower_id = $typeflower_id;

    }
    // lưu sản phẩm
    public function save()
    {
        $filetemp = $this->flowerPicture['tmp_name'];
        $user_file = $this->flowerPicture['name'];
        $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
        $filepath = "uploads/".$timestamp.$user_file;
        if(move_uploaded_file($filetemp, $filepath)==false){
            return false;
        }
        //end upload file
        $db = new Db();
        // adđ product into database
        $sql = "INSERT INTO flower (flowername, colorID, unit, price, available, flowerPicture, typeflower_id) VALUE
        ('$this->flowername', '$this->colorID', '$this->unit', '$this->price', '$this->available', '$filepath', '$this->typeflower_id')";
        echo $sql;
        $result = $db->query_execute($sql);
       
        
        return $result;
    }
    // list flower
    public static function list_flower()
    {
        $db = new Db();
        $sql = "SELECT * FROM flower";
        $result = $db->select_to_array($sql);
        return $result;
    }
    // lấy ds sản phẩm theo màu sp
    public static function list_flower_by_cateid($colorID){
        $db = new Db();
        $sql = "SELECT * FROM flower WHERE colorID='$colorID'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    //lấy ds sản phẩm theo loại hoa
    public static function list_flower_by_typeflower($typeflower_id){
        $db = new Db();
        $sql = "SELECT * FROM flower WHERE typeflower_id='$typeflower_id'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    //lấy ds hoa cùng loại
    public static function list_flower_relate($typeflower_id, $id){
        $db = new Db();
        $sql = "SELECT * FROM flower WHERE typeflower_id='$typeflower_id' AND flower_id !='$id'";
        $result = $db->select_to_array($sql);
        return $result;
    }
     // tìm hoa theo id
     public static function get_flower($id)
     {
         $db = new Db();
         $sql = "SELECT * FROM flower WHERE flower_id='$id'";
         $result = $db->select_to_array($sql);
         return $result;
     }


}

?>