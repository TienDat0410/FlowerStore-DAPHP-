<?php include_once('./header.php') ?>
<?php
require_once("./Entities/flower.class.php");
require_once("./Entities/typeflower.class.php");

$typeflower = Typeflower::list_typeflower();

include './config/db.class.php';
if(isset($_GET['action'])){
    var_dump($_POST); exit;
}
//
echo "<tr> <td colspan=5><p clas='text-right text-danger'>Tổng tiền: ".$total_monney."</p></td> </tr>";
                        echo "<tr> <td colspan=3><p clas='text-right'><button type='button' class'btn btn-primary'>Tiếp tục mua
                        hàng</button></p></td><td colspan=2><p class= 'text-right'><button type='button' class='btn btn-success'>Thanh 
                        toán</button></p></td></tr>";
?>

<form id="cart-form" action="shopping_flowe.php?action=submit" method="POST">
                <table>
                    <tr>
                        <th class="product-number">STT</th>
                        <th class="product-name">Tên sản phẩm</th>
                        <th class="product-img">Ảnh sản phẩm</th>
                        <th class="product-price">Đơn giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="total-money">Thành tiền</th>
                        <th class="product-delete">Xóa</th>
                    </tr>
                </table>
                <div id="form-button">
                    <input type="submit" name="update_click" value="Cập nhật" />
                </div>
                <hr>
                <div><label>Người nhận: </label><input type="text" value="" name="name" /></div>
                <div><label>Điện thoại: </label><input type="text" value="" name="phone" /></div>
                <div><label>Địa chỉ: </label><input type="text" value="" name="address" /></div>
                <div><label>Ghi chú: </label><textarea name="note" cols="50" rows="7" ></textarea></div>
                <input type="submit" name="order_click" value="Đặt hàng" />
            </form>
<?php include_once('footer.php'); ?>
