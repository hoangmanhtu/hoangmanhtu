<ol class="breadcrumb alert alert-dark">
    <li><a href="index.php?area=Backend">Trang Chủ</a></li>
    <li><a href="index.php?area=backend&controller=product">Danh Sách Sản Phẩm</a></li>
    <li class="active">Chi Tiết Sản Phẩm ID <?php echo $new['id'] ?></li>
</ol>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $new['id']?></td>
    </tr>
    <tr>
        <th>Category name</th>
        <td><?php echo $new['category_name']?></td>
    </tr>
    <tr>
        <th>Title</th>
        <td><?php echo $new['title']?></td>
    </tr>
    <tr>
        <th>Avatar</th>
        <td>
            <?php if (!empty($new['avatar'])): ?>
                <img height="80" src="assets/uploads/news/<?php echo $new['avatar'] ?>"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Summary</th>
        <td><?php echo $new['summary']?></td>
    </tr>
    <tr>
        <th>Content</th>
        <td><?php echo $new['content']?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo Helper::getStatusText($new['status']) ?></td>
    </tr>
    <tr>
        <th>Sản Phẩm Nổi Bật</th>
        <td><?php if(isset($new["hotnews"]) && $new["hotnews"]== 1 ): ?>
                <i class="fa fa-check"></i> Tin Nổi Bật
            <?php else: ?>
                <div></div>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Created at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($new['created_at'])) ?></td>
    </tr>
    <tr>
        <th>Updated at</th>
        <td><?php echo !empty($new['updated_at']) ? date('d-m-Y H:i:s', strtotime($new['updated_at'])) : '--' ?></td>
    </tr>
</table>
<a href="index.php?area=backend&controller=news&action=index" class="btn btn-primary">Back</a>