<?php
require_once("./Entities/flower.class.php");
require_once("./Entities/color.class.php");
require_once("./Entities/typeflower.class.php");

?>

<?php
include_once("./header.php");
// if (!isset($_GET["color_id"])) {
//     $flowers = flower::list_flower();
// } else {
//     $colorid = $_GET["color_id"];
//     $flowers = flower::list_flower_by_cateid($colorid);
// }
if (!isset($_GET["typeflower_id"])) {
    $flowers = flower::list_flower();
} else {
    $typeflower = $_GET["typeflower_id"];
    $flowers = flower::list_flower_by_typeflower($typeflower);
}
// $colors = Color::list_color();
$typeflowers = Typeflower::list_typeflower();
?>
<div class="col-sm-3">
    <h3>Danh sách loại hoa</h3>
    <ul class="list-group">
        <?php
        foreach($typeflowers as $item){
            echo"<li class = 'list-group-item'><a
            href=/DA_manguonmo/list_flower.php?typeflower_id=".$item["typeflower_id"].">".$item["typeName"]."</a></li>";
        }?>
    </ul>
</div>
<div class="container text-center">
    <h3>Danh sách hoa cửa hàng</h3><br />
    <div class="row">
        <?php
        //...design
        foreach ($flowers as $item) {
        ?>
            <div class="col-sm-4">
                <img src="<?php echo "../DA_manguonmo/" . $item["flowerPicture"]; ?>" class="img-responsive" style="width: 100%;" alt="Image">
                <p class="text-danger"><?php echo $item["flowerName"]; ?></p>
                <p class="text-info"><?php echo $item["price"]; ?></p>
                <p>
                    <button type="button" class="btn btn-primary">Mua Hoa </button>
                </p>
            </div>
        <?php } ?>
    </div>

</div>
<?php include_once("./footer.php"); ?>