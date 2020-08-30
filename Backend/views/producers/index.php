<ol class="breadcrumb alert alert-dark">
    <li><a href="index.php?area=Backend">Trang Chủ</a></li>
    <li class="active">Thương Hiệu & Nhà Sx </li>
</ol>
<div align="right" style="margin:-15px 0px 10px 0px;">
    <a class="btn btn-success" href="index.php?area=backend&controller=producer&action=create"><i class="fa fa-plus"></i> Thêm Mới Thương Hiệu</a>
</div>
<table class="table table-bordered">
    <thead>
    <tr class="table-active">
        <th scope="col">ID</th>
        <th style="width: 400px;" scope="col">Name</th>
        <th style="width: 100px;" scope="col">Avatar</th>
        <th style="width: 200px;" scope="col">Description</th>
        <th style="width: 200px;" scope="col">Status</th>
        <th style="width: 200px;" scope="col">Created_at</th>

        <th style="width: 200px;text-align: center"  scope="col">Action </th>
    </tr>
    </thead>
    <tbody>

    <?php
    if(!empty($producers)):
    foreach ($producers as $producer): ?>
        <tr>
            <th scope="row"><?php echo $producer["id"]; ?></th>
            <td><?php echo $producer["name"]; ?></td>
            <td>
                <?php if (!empty($producer['avatar'])): ?>
                    <img src="assets/uploads/producers/<?php echo $producer['avatar'] ?>" width="100"/>
                <?php endif; ?>
            </td>
            <td><?php echo $producer["description"]; ?></td>
            <?php
            $status="";
                if($producer["status"] ==1)
                {
                    $status ="Active";
                }
                else
                {
                    $status ="Disable";
                }
            ?>
            <td><?php echo $status;?></td>
            <td><?php echo $producer["created_at"]; ?></td>
            <td style="text-align: center">
                <a style="margin-right: 10px;" href="index.php?area=backend&controller=producer&action=detail&id=<?php echo $producer['id'] ?>">
                    <i class="fa fa-eye "></i></a>
                <a style="margin-right: 10px;" href="index.php?area=backend&controller=producer&action=update&id=<?php echo $producer['id'] ?>">
                    <i class="fa fa-pencil"></i></a>
                <a  style="margin-right: 10px;"
                    href="index.php?area=backend&controller=producer&action=delete&id=<?php echo $producer['id']?>"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                    <i class="fa fa-trash"></i>
                </a>

            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
    <?php else: ?>
        <tr>
        <td colspan="9">No data found</td>
        </tr>
    <?php endif;?>
</table>