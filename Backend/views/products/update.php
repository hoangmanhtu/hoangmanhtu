<?php if (empty($product)): ?>
    <h2>Không tồn tại category</h2>
<?php else: ?>
<ol class="breadcrumb alert alert-dark">
    <li><a href="index.php?area=Backend">Trang Chủ</a></li>
    <li><a href="index.php?area=backend&controller=product">Danh Sách Sản Phẩm</a></li>
    <li class="active">Chỉnh Sửa Sản Phẩm ID <?php echo $product['id'] ?></li>
</ol>
<!---->
<div class="container">
    <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="col-lg-8 col-sm-12">
<!--            -->
            <div class="form-group">
                <label for="title">Nhập tên sản phẩm</label>
                <input type="text" name="title"
                       value="<?php echo isset($_POST['title']) ? $_POST['title'] : $product['title'] ?>"
                       class="form-control" id="title"/>
                <p class="error"><?php echo isset($this->error["title"])? $this->error["title"] : '';  ?></p>
            </div>

            <div class="form-group">
                <label for="avatar">Ảnh đại diện</label>
                <input type="file" name="avatar"  class="form-control" id="avatar"/>
                <p class="error"><?php echo isset($this->error["avatar"])? $this->error["avatar"] : '';  ?></p>
                <?php if (!empty($product['avatar'])): ?>
                    <img width="80" src="assets/uploads/products/<?php echo $product['avatar'] ?>"/>
                <?php endif; ?>
            </div>

                <div class="form-group">
                    <label for="avatars">Mô tả ảnh sản phẩm </label>
                    <input type="file" name="avatars[]"  multiple="multiple" class="form-control" id="avatars">
                    <p class="error"><?php echo isset($this->error["avatars"])? $this->error["avatars"] : '';  ?></p>
                        <?php if (!empty($product_images)): ?>
                            <?php foreach ($product_images as $key=>$value):?>
                                <img height="100" src="assets/uploads/products/<?php echo $value['avatar']; ?>"/>
                            <?php endforeach; ?>
                        <?php endif; ?>
                </div>
            <div class="form-group">
                <label for="summary">Mô tả ngắn sản phẩm</label>
                <textarea name="summary" id="summary"
                          class="form-control"><?php echo isset($_POST['summary']) ? $_POST['summary'] : $product['summary'] ?></textarea>
                <p class="error"><?php echo isset($this->error["summary"])? $this->error["summary"] : '';  ?></p>
            </div>
            <div class="form-group">
                <label for="description">Mô tả chi tiết sản phẩm</label>
                <textarea name="content" id="description"
                          class="form-control"><?php echo isset($_POST['content']) ? $_POST['content'] : $product['content'] ?></textarea>
                <p class="error"><?php echo isset($this->error["content"])? $this->error["content"] : '';  ?></p>
            </div>
<!--            -->
        </div>
<!--        -->
        <div class="col-lg-4 col-sm-12">
            <div class="form-group">
                <label for="category_id">Chọn danh mục</label>
                <select name="category_id" class="form-control" id="category_id">
                    <option value="">Tất cả danh mục </option>
                    <?php
                    foreach ($categories as $category):
                        $selected = '';
                        if ($category['id'] == $product['category_id']) {
                            $selected = 'selected';
                        }
                        if (isset($_POST['category_id']) && $category['id'] == $_POST['category_id']) {
                            $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                            <?php echo $category['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <p class="error"><?php echo isset($this->error["category"])? $this->error["category"] : '';  ?></p>
            </div>
<!---->
            <div class="form-group">
                <label for="producer_id">Chọn thương hiệu</label>
                <select name="producer_id" class="form-control" id="producer_id">
                    <option value="">Tất cả thương hiệu </option>
                    <?php
                    foreach ($producers as $producer):
                        $selected = '';
                        if ($producer['id'] == $product['producer_id']) {
                            $selected = 'selected';
                        }
                        if (isset($_POST['producer_id']) && $producer['id'] == $_POST['producer_id']) {
                            $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $producer['id'] ?>" <?php echo $selected; ?>>
                            <?php echo $producer['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <p class="error"><?php echo isset($this->error["producer"])? $this->error["producer"] : '';  ?></p>
            </div>
<!---->
            <!--    -->
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" name="price"
                       value="<?php echo isset($_POST['price']) ? $_POST['price'] : $product['price'] ?>"
                       class="form-control" id="price"/>
                <p class="error"><?php echo isset($this->error["price"])? $this->error["price"] : '';  ?></p>
            </div>
            <!--    -->
            <div class="form-group">
                <label for="quality">Số Lượng </label>
                <input type="number" name="quality"
                       value="<?php echo isset($_POST['quality']) ? $_POST['quality'] : $product['quality'] ?>"
                       class="form-control" id="quality"/>
                <p class="error"><?php echo isset($this->error["quality"])? $this->error["quality"] : '';  ?></p>
            </div>
            <!--    -->
            <div class="form-group">
                <label for="discount">% Khuyến Mại </label>
                <input type="number" name="discount"
                       value="<?php echo isset($_POST['discount']) ? $_POST['discount'] : $product['discount'] ?>"
                       class="form-control" id="discount"/>
            </div>
            <!--    -->
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" class="form-control" id="status">
                    <?php
                    $selected_disabled = '';
                    $selected_active = '';
                    if ($product['status'] == 0) {
                        $selected_disabled = 'selected';
                    } else {
                        $selected_active = 'selected';
                    }
                    if (isset($_POST['status'])) {
                        switch ($_POST['status']) {
                            case 0:
                                $selected_disabled = 'selected';
                                break;
                            case 1:
                                $selected_active = 'selected';
                                break;
                        }
                    }
                    ?>
                    <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
                    <option value="1" <?php echo $selected_active ?>>Active</option>
                </select>
            </div>
            <!--    -->
            <div class="form-group">
                <input type="checkbox" name="hotproduct" <?php if(isset($product["hotproduct"]) && $product["hotproduct"]== 1 ) : ?> checked <?php endif; ?> id="hotproduct"/>
                <label for="hotproduct">Sản Phẩm Nổi Bật</label>
            </div>
        </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
                <a href="index.php?area=backend&controller=product&action=index" class="btn btn-default">Back</a>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>