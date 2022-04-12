<?php //IDEA:

require_once("./config/db.class.php");
// 
class User
{
    public $userID;
    public $userName;
    public $email;
    public $password;
    
    // cons
    public function __construct($userName, $email, $password)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
    }
    // lưu user
    public function save()
    {
        $db = new Db();
        // adđ product into database
        $sql = "INSERT INTO user (UserName, Email, password) VALUES ('".mysqli_real_escape_string($db->connect(),
        $this->userName)."', '".mysqli_real_escape_string($db->connect(),
        $this->email)."','".md5(mysqli_real_escape_string($db->connect(), $this->Password))."')"; 
        $result = $db->query_execute($sql);
       
        return $result;
    }
    public static function checkLogin($userName, $password){
        $password = md5($password);
        $db = new Db();
        $sql = "SELECT * FROM user where UserName='$userName' AND password='$password'";
        $result = $db->query_execute($sql);
        return $result;
    }
}