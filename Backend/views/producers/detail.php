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
        <td><?php echo $producer['id']; ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo $producer['name']; ?></td>
    </tr>
    <tr>
        <th>Avatar</th>
        <td>
            <?php if (!empty($producer['avatar'])): ?>
                <img src="assets/uploads/producers/<?php echo $producer['avatar'] ?>" width="60"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php echo $producer['description']; ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            <?php
            $status_text = 'Active';
            if ($producer['status'] == 0) {
                $status_text = 'Disabled';
            }
            echo $status_text;
            ?>
        </td>
    </tr>
    <tr>
        <th>Created_at</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($producer['created_at'])); ?>
        </td>
    </tr>
    <tr>
        <th>Updated_at</th>
        <td>
            <?php echo isset($producer['updated_at']) ? date('d-m-Y H:i:s', strtotime($producer['updated_at'])) : ""; ?>
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="index.php?area=backend&controller=producer">Back</a>

