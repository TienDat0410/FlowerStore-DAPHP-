<?php include_once('./header.php'); ?>
<?php
    if(isset($_SESSION["user"])!=""){
        header("Location: list_flower.php");
    }

    require_once("./Entities/user.class.php");
    //check send into form
    if(isset($_POST['btn-signup'])){
        $u_name = $_POST['txtname'];
        $u_email = $_POST['txtemail'];
        $u_pass = $_POST['txtpass'];
        $account = new User($u_name, $u_email, $u_pass);
        $result = $account->save();
        if(!$result)
        { ?>
            <script> alert('Có lỗi xảy ra, vui lòng kiểm tra lại!');</script>
            <?php
        }
        else{
            //signup success
            $_SESSION['user'] = $u_name;
            header('Location: list_flower.php');
        }
    }
?>
<!-- form singup -->
<form method="POST" style="width: 40%">
    <div class="form-group row">
        <label for="txtname" class="col-sm-2 form-control-label" style="padding-left: 5px;">UserName </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="txtname" placeholder="User Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="txtemail" class="col-sm-2 form-control-label" style="padding-left: 5px;">Email </label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="txtemail" placeholder="Email">
        </div>
    </div>
    <div class="form-group row">
        <label for="txtpass" class="col-sm-2 form-control-label" style="padding-left: 5px;">Password </label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="txtpass" placeholder="Password">
        </div>
    </div>
    <!--  -->
    <div class="form-group row">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="btn-signup" value="Sign Up">
        </div>
    </div>
</form>
<?php include_once('./footer.php'); ?>
