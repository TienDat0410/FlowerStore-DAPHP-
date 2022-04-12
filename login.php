<?php include_once('./header.php'); ?>
<?php
session_start();
// if (isset($_SESSION["user"]) != "") {
//     header("Location: list_flower.php");
// }

require_once("./Entities/user.class.php");
//check send into form
if (isset($_POST['btn-login'])) {
    $u_name = $_POST['txtname'];
    $u_pass = md5($_POST['txtpass']);
    $account = User::checkLogin($u_name, $u_pass);   
    if (!$account) { 
        echo "<script> alert('Có lỗi xảy ra, vui lòng kiểm tra lại!')</script>";
    } else {
        //signup success
        $_SESSION['user'] = $u_name;
        header("Location:list_flower.php");
    }
}
    
    // $conn = mysqli_connect("localhost", "root", "Aa@123", "flowerstore");
    // if (isset($_POST['btn-login'])){
    //     $u_name = $_POST['txtname'];
    //     $u_pass = md5($_POST['txtpass']);
    //     $sql = mysqli_query($conn, "SELECT * FROM user where UserName='$u_name' AND password='$u_pass'");
    //     $num = mysqli_num_rows($sql);
    //     if($num > 0){
    //         $row = mysqli_fetch_assoc($sql);
    //         $_SESSION['user'] = $row['UserName'];
    //         $_SESSION['password'] = md5($row['password']);
    //         header("Location:list_flower.php");

    //     }else{
    //         echo "<script> alert('Có lỗi xảy ra, vui lòng kiểm tra lại!')</script>";
    //     }

   
        //     $row = mysqli_fetch_array($sql);

    //     if(is_array($row)){
    //         $_SESSION['username'] = $row['UserName'];
    //         $_SESSION['password'] = $row['password'];
    //     }else{
    //         echo '<script type = "text/javascript">';
    //         echo 'alert("Invalid UserName or Password!")';
    //         echo 'window.location.hred = "list_flower.php"';
    //     }
    // }
    // if(isset($_SESSION['user'])){
    //     header("Location: list_flower.php");
?>
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Login to your account</h2>
                    <form method="POST">
                        <input type="text" placeholder="UserName" name="txtname" />
                        <input type="password" placeholder="Password" name="txtpass" />
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" name="btn-login" value="Login">
                        </div>
                    </form>
                </div>
                <!--/login form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->

<?php include_once('./footer.php'); ?>
