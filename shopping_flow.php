<?php include_once('./header.php') ?>
<?php
require_once("./Entities/flower.class.php");
require_once("./Entities/typeflower.class.php");

$typeflower = Typeflower::list_typeflower();
// khoiw dong session
session_start();
// session_destroy();
//hien thi loi
error_reporting(E_ALL);
ini_set('disphay_errors','1');
//them moi san pham vao gio hang
if(isset($_GET["id"])){
    $pro_id = $_GET["id"];
    //bien xac nhan san pham da ton tai trong gio hang hay chua
    //was_found = true --> sp đã có trong giỏ hàng, tăng sl lên 1
    //was_found =false --> sp chưa có trong giỏ hàng,  thêm sản phẩm, vào giỏ hàng, mặc định số lượng là 1
    $was_found = false;
    $i=0;
    //kiem tra session dc khoi tao chua
    if(!isset($_SESSION["cart_items"]) || count($_SESSION["cart_items"])<1){
        $_SESSION["cart_items"] = array(0=> array("pro_id"=>$pro_id,"unit"=>1));
    }
    else{
        //gio hang da dc kho tao
        //duyet tat ca casc sp trong gio hnag
        //neu da ton tai sp thi tangw sl len 1
        //neu chuaw ton tai thi se them moi sp vao gio hang voi sl la1 
        foreach($_SESSION["cart_items"] as $item){
            $i++;
            // while(list($key,$value)= each($item))
            foreach($item as $key=>$value){
                if($key == "pro_id" && $value == $pro_id){
                    //sp da ton tai trong gio hang tang sl len 1
                    array_splice($_SESSION["cart_items"],$i-1,1,array(array("pro_id"=> $pro_id,"unit"=>
                    $item["unit"]+1)));
                    $was_found = true;
                }
            }
        }
    if($was_found == false){
        array_push($_SESSION["cart_items"], array("pro_id"=> $pro_id,"unit"=>1));

    }
}
header("location: shopping_flow.php");

}
?>

<!-- thong tin trong shopping cart-->
<div class ="container text-center">
    <div class="col-sm-3">
        <h3>Danh mục</h3>
        <ul class = "list-group">
            <?php
            foreach($cates as $items){
                echo"<li class ='list-group-item'><a
                href=/LAB_03/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a></li>";
                
            }?>
        </ul>
    </div>
    <div class="col-sm-9">
        <h3>Thông tin giỏ hàng</h3> <br>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
               <?php 
               $total_monney =0;
               if(isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"])>0){
                   foreach($_SESSION["cart_items"] as $item){
                       $id = $item["pro_id"];             
                       $flower = flower::get_flower($id);
                       $flow = reset($flower);
                       $total_monney += $item["unit"]*$flow["price"];
                       echo "<tr><td>".$flow["flowertName"]."</td><td><img style='width:90px; height:80px' src=".$flow["flowerPicture"]."
                       /></td><td>".$item["unit"]."</td><td>".number_format($flow["price"],0, ",", ".")."</td><td>".number_format($flow["price"],0, ",", ".")."</td></tr>";

                   }
                        echo "<tr> <td colspan=5><p clas='text-right text-danger'>Tổng tiền: ".number_format($total_monney,0, ",", ".")."</p></td> </tr>";
                        echo "<tr> 
                        <td colspan=3>
                        <p clas='text-right'>
                        <a href='./list_flower.php'><button type='button' class'btn btn-primary'>Tiếp tục mua
                        hàng</button></a>
                        </p>
                        </td>
                        <td colspan=2>
                        <p class= 'text-right'><button type='button' class='btn btn-success'>Thanh 
                        toán
                        </button>
                        </p>
                        </td>
                        </tr>";
                    
                   }
                   else{
                       echo "Không có sản phẩm nào trong giỏ hàng!";
                   }
                   
               ?>
            </tbody>
        </table>
    </div>
</div>

<!-- hien thi shopping cart-->
<?php include_once('footer.php'); ?>
