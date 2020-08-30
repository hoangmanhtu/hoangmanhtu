<ol class="breadcrumb alert alert-dark">
    <li><a href="index.php?area=Backend">Trang Chủ</a></li>
    <li class="active">Danh Sách Sản Phẩm</li>
</ol>
<style>
    .rating .active
    {
        color: #ff9705 !important;
    }
    li
    {
        list-style: none;
    }
</style>
<form action="" method="GET">
    <div class="form-group">
        <label for="title">Nhập title</label>
        <input type="text" name="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>" id="title"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="title">Chọn danh mục</label>
        <select name="category_id" class="form-control">
            <option value="">Tất cả danh mục</option>
            <?php foreach ($categories as $category):
                //giữ trạng thái selected của category sau khi chọn dựa vào
//                tham số category_id trên trình duyệt
                $selected = '';
                if (isset($_GET['category_id']) && $category['id'] == $_GET['category_id']) {
                    $selected = 'selected';
                }
                ?>
                <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                    <?php echo $category['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
<!--    -->
    <div class="form-group">
        <label for="title">Chọn Thương Hiệu</label>
        <select name="producer_id" class="form-control">
            <option value="">Tất cả Thương Hiệu</option>
            <?php foreach ($producers as $producer):
                //giữ trạng thái selected của category sau khi chọn dựa vào
//                tham số category_id trên trình duyệt
                $selected = '';
                if (isset($_GET['producer_id']) && $producer['id'] == $_GET['producer_id']) {
                    $selected = 'selected';
                }
                ?>
                <option value="<?php echo $producer['id'] ?>" <?php echo $selected; ?>>
                    <?php echo $producer['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="hidden" name="area" value="backend"/>
    <input type="hidden" name="controller" value="product"/>
    <input type="hidden" name="action" value="index"/>
    <input type="submit" name="search" value="Filter" class="btn btn-primary"/>
    <a href="index.php?&area=backend&controller=product" class="btn btn-default">Xóa filter</a>
</form>
<div align="right" style="margin:-15px 0px 10px 0px;">
<a class="btn btn-success" href="index.php?area=backend&controller=product&action=create"><i class="fa fa-plus"></i> Thêm Mới Sản Phẩm</a>
</div>
<table class="table table-bordered">
    <tr>
        <th >ID</th>
        <th>Category name</th>
        <th>Producer name</th>
        <th>Title</th>
        <th>Avatar</th>
        <th>Price</th>
        <th>Status</th>
        <th>Created_at</th>
        <th style="text-align: center">Updated_at</th>
        <th style="text-align: center">Action</th>
    </tr>
    <?php if (!empty($products)): ?>
    <?php foreach ($products as $product):?>
            <tr>
                <td><?php echo $product["id"];?></td>
                <td><?php echo $product["category_name"];?></td>
                <td><?php echo $product["producer_name"];?></td>
                <td>
                    <ul>
                        <li><?php echo $product["title"];  ?></li>
                        <li class="rating">
                            <?php
                            $rating=0;
                            if($product["total_rating"] > 0)
                            {
                                $rating=round($product["total_number_rating"]/ $product["total_rating"],2);
                            }
                            ?>
                            Đánh giá : <span>
                                <?php for($i=1;$i<=5;$i++): ?>
                                <i class="fa fa-star <?php if( $i <= $rating) echo "active"; else  echo "" ?>"></i>
                                <?php endfor; ?>
                            </span>
                            <span style="font-size: 15px"><?php echo $rating; ?></span>
                        </li>
                    </ul>

                </td>
                <td><?php if(!empty($product["avatar"])): ?>
                        <img height="100" src="assets/uploads/products/<?php echo $product["avatar"];?>" alt="">
                    <?php endif;?>
                </td>
                <td><?php echo number_format($product["price"]); ?></td>
                <td><?php echo Helper::getStatusText($product["status"]) ?></td>
                <td><?php echo date('d-m-y H:i:s',strtotime($product["created_at"]));?></td>
                <td style="text-align: center"><?php echo !empty($product["updated_at"]) ? date('d-m-y H:i:s',strtotime($product["updated_at"])) : '--'; ?></td>
                <td style="text-align: center">
                    <?php
                    $url_detail = "index.php?area=backend&controller=product&action=detail&id=" . $product['id'];
                    $url_update = "index.php?area=backend&controller=product&action=update&id=" . $product['id'];
                    $url_delete = "index.php?area=backend&controller=product&action=delete&id=" . $product['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil"></i></a> &nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                </td>
            </tr>
    <?php endforeach;?>
        <tr>
            <td colspan="11" align="right">
                <?php echo $pages;?>
            </td>
        </tr>
    <?php else:?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
    <?php endif;?>

</table>

