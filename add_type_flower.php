<?php
require_once("./Entities/flower.class.php");
require_once("./Entities/color.class.php");
require_once("./Entities/typeflower.class.php");

if (isset($_POST["btnsubmit"])) {
    // 
    $typeName = $_POST["txtName"];    
    // 
    $newtypeflower = new Typeflower($typeName);
    // save in database

    $result = $newtypeflower->save();

    if (!$result) {
        header("Location: add_type_flower.php?failure");
        echo "Thất bại";
    } else {
        header("Location: list_flower.php?inserted");
    }
}

?>
<?php include_once("header.php"); ?>
<!--add value in header-->
<?php
// lấy giá trị tham số có tên inserted
if (isset($_GET["inserted"])) {
    echo "<h2>Thêm sản phẩm thành công</h2>";
}
?>





<!-- form sản phẩm -->
<form method="post">
    <!-- productname -->
    <div class="row">
        <div class="lbltitle">
            <label>Tên Loại Hoa </label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtName" value="
                                                <?php
                                                echo isset($_POST["txtName"]) ? $_POST["txtName"] : ""; ?>" />
        </div>
    </div>   
    <!-- btn thêm -->
    <div class="row">
        <div class="submit">
            <input type="submit" name="btnsubmit" value="Thêm loại hoa" style="margin-top: 20px;" />
        </div>
    </div>
</form>
<?php include_once("footer.php"); ?>