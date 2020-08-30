
<ol class="breadcrumb alert alert-dark">
    <li><a href="index.php?area=Backend">Trang Chủ</a></li>
    <li class="active">Danh Sách Đơn Hàng</li>
</ol>
<form action="" method="GET">
    <div class="form-group">
        <label for="fullname">Nhập họ tên :</label>
        <input type="text" name="fullname" value="<?php echo isset($_GET['fullname']) ? $_GET['fullname'] : '' ?>" id="fullname"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="sdt">Nhập SĐT : </label>
        <input type="text" name="mobile" value="<?php echo isset($_GET['mobile']) ? $_GET['mobile'] : '' ?>" id="sdt"
               class="form-control"/>
    </div>
    <input type="hidden" name="area" value="backend"/>
    <input type="hidden" name="controller" value="order"/>
    <input type="hidden" name="action" value="index"/>
    <input type="submit" name="search" value="Filter" class="btn btn-primary"/>
    <a href="index.php?&area=backend&controller=order" class="btn btn-default">Xóa filter</a>
</form>
<table class="table table-bordered">
    <tr>
        <th >ID</th>
        <th>Full name</th>
        <th>SDT</th>
        <th>Email</th>
        <th>Địa Chỉ</th>
        <th>Trạng thái</th>
        <th>Ghi Chú</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th style="text-align: center">Chi tiết đơn hàng</th>
    </tr>
    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order):?>
            <tr>
                <td><?php echo $order["id"];?></td>
                <td><?php echo $order["fullname"];?></td>
                <td>
                    <?php echo $order["mobile"];  ?>
                </td>
                <td>
                    <?php echo $order["email"];  ?>
                </td>
                <td>
                    <?php echo $order["address"];  ?>
                </td>
                <td>
                    <?php
                    if($order["payment_status"] == 0)
                    {
                        echo "<p style='color:red'>Chưa Thanh Toán</p>";
                    }
                    elseif ($order["payment_status"] == 1)
                    {
                        echo "<p style='color: #0bb827'>Đã Thanh Toán</p>";
                    }
                    ?>
                </td>
                <td>
                    <?php echo $order["note"];  ?>
                </td>

                <td><?php echo date('d-m-y H:i:s',strtotime($order["created_at"]));?></td>
                <td style="text-align: center"><?php echo !empty($order["updated_at"]) ? date('d-m-y H:i:s',strtotime($order["updated_at"])) : '--'; ?></td>
                <td style="text-align: center"><a href="index.php?area=backend&controller=order&action=detail&id=<?php echo $order["id"]; ?>">Danh sách sản phẩm</a>  </td>
            </tr>
        <?php endforeach;?>
    <tr>
        <td colspan="10" align="right">
            <?php echo $pages;?>
        </td>
    </tr>
    <?php else:?>
        <tr>
            <td colspan="10">No data found</td>
        </tr>
    <?php endif;?>

</table>


