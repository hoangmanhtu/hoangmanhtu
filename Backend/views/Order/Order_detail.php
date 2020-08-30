<?php
$total_cart=0;
$total_discount=0;
$total=0;
$total_product=0;
?>
<ol class="breadcrumb alert alert-dark">
    <li><a href="index.php?area=backend">Trang Chủ</a></li>
    <li><a href="index.php?area=backend&controller=order">Danh Sách Đơn Hàng</a></li>
    <li class="active">Chi Tiết Đơn Hàng</li>
</ol>
<div>
     <a href="index.php?area=backend&controller=Order&action=send_payment&id=<?php echo $id; ?> " onclick="return confirm('Bạn có chắc chắn người này đã thanh toán ?')"  class="btn btn-primary">Xác nhận đã thanh toán</a>

</div>
<br>
<table class="table table-bordered">
    <tr>
        <th>Tên Sản Phẩm</th>
        <th>Số Lượng</th>
        <th>Đơn giá</th>
        <th> % Khuyến Mại</th>
        <th>Thành Tiền</th>
    </tr>
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product):?>
            <tr>
                <td><?php echo $product["product_name"];?></td>
                <td>
                    <?php echo $product["quality"];  ?>
                </td>
                <td>
                    <?php echo number_format($product["product_price"]);  ?> VNĐ
                </td>
                <td>
                    <?php echo $product["product_discount"];  ?>
                </td>

                 <td><?php
                    $total_item_discount=($product["product_price"] * ($product["product_discount"]/100)) * $product["quality"] ;
                    $total_item=($product["product_price"] * $product["quality"]);
                    $total_product=$total_item-$total_item_discount;
                    echo number_format($total_product);
                    $total_cart += $total_item;
                    $total_discount += $total_item_discount;
                    $total +=$total_product;
                    ?>
                    VND
                 </td>

            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="11">No data found</td>
        </tr>
    <?php endif;?>
</table>
<div align="right" style="font-size: 17px; font-weight: bold">

    <p> Tổng Tiền : <?php echo number_format($total_cart); ?> VND</p>
    <p> Giảm Giá : <?php echo number_format($total_discount); ?> VND</p>
    <p> Thành Tiền : <?php echo number_format($total); ?> VND</p>
</div>


