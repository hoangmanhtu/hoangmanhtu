
<ol class="breadcrumb alert alert-dark">
    <li><a href="index.php?area=Backend">Trang Chủ</a></li>
    <li class="active">Hỗ trợ người dùng</li>
</ol>
<form action="" method="GET">
    <div class="form-group">
        <label for="fullname">Nhập họ tên :</label>
        <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>" id="fullname"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="sdt">Nhập SĐT : </label>
        <input type="text" name="mobile" value="<?php echo isset($_GET['mobile']) ? $_GET['mobile'] : '' ?>" id="sdt"
               class="form-control"/>
    </div>
    <input type="hidden" name="area" value="backend"/>
    <input type="hidden" name="controller" value="support"/>
    <input type="hidden" name="action" value="index"/>
    <input type="submit" name="search" value="Filter" class="btn btn-primary"/>
    <a href="index.php?&area=backend&controller=support" class="btn btn-default">Xóa filter</a>
</form>
<table class="table table-bordered">
    <tr>
        <th >ID</th>
        <th>Full name</th>
        <th>SDT</th>
        <th>Email</th>
        <th>Trạng thái</th>
        <th>Created_at</th>
<!--        <th>Updated_at</th>-->
    </tr>
    <?php if (!empty($support)): ?>
        <?php foreach ($support as $value):?>
            <tr>
                <td><?php echo $value["id"];?></td>
                <td><?php echo $value["name"];?></td>
                <td>
                    <?php echo $value["sdt"];  ?>
                </td>
                <td>
                    <?php echo $value["email"];  ?>
                </td>
                <td>
                    <?php
                    if($value["status"] == 0)
                    {
                        echo "<p style='color:red'>Chưa Tư Vấn</p>";
                    }
                    elseif ($order["payment_status"] == 1)
                    {
                        echo "<p style='color: #0bb827'>Đã Tư Vấn</p>";
                    }
                    ?>
                </td>

                <td><?php echo date('d-m-y H:i:s',strtotime($value["create_at"]));?></td>
            </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="7" align="right">
                <?php echo $pages;?>
            </td>
        </tr>
    <?php else:?>
        <tr>
            <td colspan="10">No data found</td>
        </tr>
    <?php endif;?>

</table>


