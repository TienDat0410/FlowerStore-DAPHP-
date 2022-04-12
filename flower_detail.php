<?php
require_once("./Entities/flower.class.php");
require_once("./Entities/typeflower.class.php");
?>

<?php
include_once("./header.php");
if (!isset($_GET["id"])) {
    header('Location: not_found.php');
} else {
    $id = $_GET["id"];
    $flower = reset(flower::get_flower($id));
    $flower_relate = flower::list_flower_relate($flower["typeflower_id"], $id);
}
$typeflower = Typeflower::list_typeflower();
?>

<div class="container text-center">
    <div class="col-sm-3 panel panel-danger">
        <h3 class="panel-heading">Loại Hoa </h3>
        <ul class="list-group">
            <?php
            foreach ($typeflower as $item) {
                echo "<li class='list-group-item'><a
                href=/DA_manguonmo/list_flower.php?typeflower_id=" . $item["typeflower_id"] . ">" . $item["typeName"] . "</a></li>";
            } ?>
        </ul>
    </div>

    <div class="col-sm-9 panel panel-info">
        <h3 class="panel-heading">Chi tiếT hoa</h3>
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo "../DA_manguonmo/" . $flower["flowerPicture"]; ?>" class="img-responsive" style="width:100%" alt="Image">
            </div>
            <div class="col-sm-6">
                <!-- in thong tin chi tiet san pham-->
                <div style="padding-left:10px">
                    <h3 class="text-info">
                        <?php echo $flower["flowerName"]; ?>
                    </h3>                   
                    <p>
                        Giá: <?php echo number_format($flower["price"], 0, ",", ".") ?> VND
                    </p>                 
                    
                    <p>
                    <a href="./shopping_flow.php?id=<?=$flower['flower_id']?>">  <button type="button" class="btn  btn-danger">Mua Hàng</button> </a>
                    </p>
                </div>
            </div>
        </div>
        <h3 class="panel-heading"> Sản phẩm liên quan</h3>
        <div class="row">
            <?php
            foreach ($flower_relate as $item) {
            ?>
                <div class="col-sm-4">
                    <a href="../DA_manguonmo/flower_detail.php?id=<?php echo $item["typeflower_id"]; ?>">
                        <img src="<?php echo "../DA_manguonmo/" . $item["flowerPicture"]; ?>" class="img-responsive" style="width:100%" alt="Image">
                    </a>
                    <p class="text-danger"><?php echo $item["flowerName"]; ?> </p>
                    <p class="text-ingo"><?php echo number_format($item["price"], 0, ",", ".") ?> VND</p>
                    <p>
                        <a href="./shopping_flow.php?id=<?=$item['flower_id']?>">  <button type="button" class="btn  btn-danger">Mua Hàng</button> </a>
                    </p>
                </div>
            <?php   } ?>
        </div>
    </div>
</div>