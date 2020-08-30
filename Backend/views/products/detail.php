<ol class="breadcrumb alert alert-dark">
    <li><a href="index.php?area=Backend">Trang Chủ</a></li>
    <li><a href="index.php?area=backend&controller=product">Danh Sách Sản Phẩm</a></li>
    <li class="active">Chi Tiết Sản Phẩm ID <?php echo $product['id'] ?></li>
</ol>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $product['id']?></td>
    </tr>
    <tr>
        <th>Category name</th>
        <td><?php echo $product['category_name']?></td>
    </tr>
    <tr>
        <th>Producer name</th>
        <td><?php echo $product['producer_name']?></td>
    </tr>
    <tr>
        <th>Title</th>
        <td><?php echo $product['title']?></td>
    </tr>
    <tr>
        <th>Avatar</th>
        <td>
            <?php if (!empty($product['avatar'])): ?>
                <img height="80" src="assets/uploads/products/<?php echo $product['avatar'] ?>"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Mô tả ảnh sản phẩm </th>
        <td>
            <?php if (!empty($product_images)): ?>
                <?php foreach ($product_images as $key=>$value):?>
                    <img height="80" src="assets/uploads/products/<?php echo $value['avatar']; ?>"/>
                <?php endforeach; ?>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Price</th>
        <td><?php echo number_format($product['price']). 'đ'; ?></td>
    </tr>
    <tr>
        <th>Số Lượng</th>
        <td><?php echo $product['quality']; ?></td>
    </tr>
    <tr>
        <th>% Khuyến Mại</th>
        <td><?php echo $product['discount']; ?> %</td>
    </tr>
    <tr>
        <th>Summary</th>
        <td><?php echo $product['summary']?></td>
    </tr>
    <tr>
        <th>Content</th>
        <td><?php echo $product['content']?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo Helper::getStatusText($product['status']) ?></td>
    </tr>
    <tr>
        <th>Sản Phẩm Nổi Bật</th>
        <td><?php if(isset($product["hotproduct"]) && $product["hotproduct"]== 1 ): ?>
               <i class="fa fa-check"></i> Sản Phẩm Nổi Bật
            <?php else: ?>
                <div></div>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Created at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])) ?></td>
    </tr>
    <tr>
        <th>Updated at</th>
        <td><?php echo !empty($product['updated_at']) ? date('d-m-Y H:i:s', strtotime($product['updated_at'])) : '--' ?></td>
    </tr>
</table>
<a href="index.php?area=backend&controller=product&action=index" class="btn btn-primary">Back</a>