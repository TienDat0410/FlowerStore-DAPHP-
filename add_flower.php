<?php
require_once("./Entities/flower.class.php");
require_once("./Entities/color.class.php");
require_once("./Entities/typeflower.class.php");

if (isset($_POST["btnsubmit"])) {
    // 
    $flowerName = $_POST["txtName"];
    $colorID = $_POST["txtColorID"];
    $unit = $_POST["txtUnit"];
    $price = $_POST["txtPricce"];
    $available = $_POST["txtAvailable"];
    $flowerPicture = $_FILES["txtpic"];
    $typeflowerID = $_POST["txttypeflowerID"];
    // $picture = $_POST["txtpic"];
    // 
    $newFlower = new flower($flowerName, $colorID, $unit, $price, $available, $flowerPicture, $typeflowerID);
    // save in database

    $result = $newFlower->save();

    if (!$result) {
        header("Location: add_flower.php?failure");
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
<form method="post" enctype="multipart/form-data">
    <!-- productname -->
    <div class="row">
        <div class="lbltitle">
            <label>Tên Hoa</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtName" value="
                                                <?php
                                                echo isset($_POST["txtName"]) ? $_POST["txtName"] : ""; ?>" />
        </div>
    </div>
    <!-- cateid product -->
    <div class="row">
        <div class="lbltitle">
            <label>Màu hoa</label>
        </div>
        <div class="lblinput">
            <select name="txtColorID" style="width: 200px;">
                <option value="" selected>--Chọn màu hoa--</option>
                <?php
                $color = Color::list_color();
                foreach ($color as $item) {
                    echo "<option value=" . $item["color_id"] . ">" . $item["colorName"] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <!-- unit product -->
    <div class="row">
        <div class="lbltitle">
            <label>Số lượng sản phẩm</label>
        </div>
        <div class="lblinput">
            <input type="number" name="txtUnit" value="
                                                    <?php
                                                    echo isset($_POST["txtUnit"]) ? $_POST["txtUnit"] : ""; ?>" />
        </div>
    </div>
    <!-- product price -->
    <div class="row">
        <div class="lbltitle">
            <label>Giá bán</label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtPricce" value="
                                                    <?php
                                                    echo isset($_POST["txtPricce"]) ? $_POST["txtPricce"] : ""; ?>" />
        </div>
    </div>
    <!-- cate product -->
    <div class="row">
        <div class="lbltitle">
            <label>Số lượng tồn </label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtAvailable" value="
                                                    <?php
                                                    echo isset($_POST["txtAvailable"]) ? $_POST["txtAvailable"] : ""; ?>" />
        </div>

    </div>
    <!-- type flower -->
    <div class="row">
        <div class="lbltitle">
            <label>Chọn loại hoa </label>
        </div>
        <div class="lblinput">
            <select name="txttypeflowerID" style="width: 200px;">
                <option value="" selected>--Chọn loại hoa--</option>
                <?php
                $type = Typeflower::list_typeflower();
                foreach ($type as $item) {
                    echo "<option value=" . $item["typeflower_id"] . ">" . $item["typeName"] . "</option>";
                }
                ?>
            </select>
        </div>

    </div>
    <!-- picture -->
    <div class="row">
        <div class="lbltitle">
            <label>Thêm hình ảnh</label>
        </div>
        <div class="lblinput">
            <input type="file" id="txtpic" name="txtpic" accept=".PNG, .GIF, .JPG">
            <!-- <input type="text" name="txtpic" value="<?php echo isset($_POST["txtpic"]) ? $_POST["txtpic"] : ""; ?>"> -->

        </div>
    </div>
    <!-- btn thêm -->
    <div class="row">
        <div class="submit">
            <input type="submit" name="btnsubmit" value="Thêm sản phẩm" style="margin-top: 20px;" />
        </div>
    </div>
</form>
<?php include_once("footer.php"); ?>