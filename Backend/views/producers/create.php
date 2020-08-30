<!---->
<ol class="breadcrumb alert alert-dark">
        <li><a href="index.php?area=Backend">Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=category">Danh Sách Thương Hiệu & Nhà SX</a></li>
        <li class="active">Thêm Mới</li>
</ol>
<!---->
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tên thương hiệu :</label>
        <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" class="form-control"/>
        <p class="error"><?php echo isset($this->error["name"])? $this->error["name"] : '';  ?></p>
    </div>

    <div class="form-group">
        <label>Avatar :</label>
        <input type="file" name="avatar" class="form-control"/>
        <p class="error"><?php echo isset($this->error["file"])? $this->error["file"] : '';  ?></p>
    </div>

    <div class="form-group">
        <label>Mô tả :</label>
        <textarea class="form-control"
                  name="description"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
        <p class="error"><?php echo isset($this->error["description"])? $this->error["description"] : '';  ?></p>
    </div>

    <div class="form-group">
        <?php
        $selected_active = '';
        $selected_disabled = '';
        if (isset($_POST['status'])) {
            switch ($_POST['status']) {
                case 1:
                    $selected_active = 'selected';
                    break;
                case 0:
                    $selected_disabled = 'selected';
                    break;
            }
        }
        ?>
        <label>Trạng thái : </label>
        <select name="status" class="form-control">
            <option value="1" <?php echo $selected_disabled ?> >Active</option>
            <option value="0" <?php echo $selected_active ?> >Disabled</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
        <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
    </div>

</form>