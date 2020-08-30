<!---->
<ol class="breadcrumb alert alert-dark">
    <li><a href="index.php?area=Backend">Trang Chủ</a></li>
    <li><a href="index.php?area=backend&controller=category">Danh Mục</a></li>
    <li class="active">Chi Tiết Danh Mục </li>
</ol>
<!--    -->
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $category['id']; ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo $category['name']; ?></td>
    </tr>
    <tr>
        <th>Avatar</th>
        <td>
            <?php if (!empty($category['avatar'])): ?>
                <img src="assets/uploads/categories/<?php echo $category['avatar'] ?>" width="60"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php echo $category['description']; ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            <?php
            $status_text = 'Active';
            if ($category['status'] == 0) {
                $status_text = 'Disabled';
            }
            echo $status_text;
            ?>
        </td>
    </tr>
    <tr>
        <th>Danh Mục Nổi Bật</th>
        <td><?php if(isset($category["hotcategory"]) && $category["hotcategory"]== 1 ): ?>
                <i class="fa fa-check"></i> Danh Mục Nổi Bật
            <?php else: ?>
                <div></div>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Created_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($category['created_at'])); ?>
        </td>
    </tr>
    <tr>
        <th>Updated_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($category['updated_at'])); ?>
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?area=backend&controller=category">Back</a>

