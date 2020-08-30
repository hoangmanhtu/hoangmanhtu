<ol class="breadcrumb alert alert-dark">
    <li><a href="index.php?area=Backend">Trang Chủ</a></li>
    <li class="active">Danh Sách Tin Tức</li>
</ol>


<div align="right" style="margin:-15px 0px 10px 0px;">
    <a class="btn btn-success" href="index.php?area=backend&controller=news&action=create"><i class="fa fa-plus"></i> Thêm Mới Sản Phẩm</a>
</div>
<table class="table table-bordered">
    <tr>
        <th >ID</th>
        <th>Category name</th>
        <th>Title</th>
        <th>Avatar</th>
        <th>Status</th>
        <th>Created_at</th>
        <th style="text-align: center">Updated_at</th>
        <th style="text-align: center">Action</th>
    </tr>
    <?php if (!empty($news)): ?>
        <?php foreach ($news as $new):?>
            <tr>
                <td><?php echo $new["id"];?></td>
                <td><?php echo $new["category_name"];?></td>
                <td>
                    <?php echo $new["title"];  ?>
                </td>
                <td><?php if(!empty($new["avatar"])): ?>
                        <img height="100" src="assets/uploads/news/<?php echo $new["avatar"];?>" alt="">
                    <?php endif;?>
                </td>
                <td><?php echo Helper::getStatusText($new["status"]) ?></td>
                <td><?php echo date('d-m-y H:i:s',strtotime($new["created_at"]));?></td>
                <td style="text-align: center"><?php echo !empty($new["updated_at"]) ? date('d-m-y H:i:s',strtotime($new["updated_at"])) : '--'; ?></td>
                <td style="text-align: center">
                    <?php
                    $url_detail = "index.php?area=backend&controller=news&action=detail&id=" . $new['id'];
                    $url_update = "index.php?area=backend&controller=news&action=update&id=" . $new['id'];
                    $url_delete = "index.php?area=backend&controller=news&action=delete&id=" . $new['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil"></i></a> &nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                            class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
    <?php endif;?>

</table>
<div class="pull-right">
    <?php echo $pages;?>
</div>
