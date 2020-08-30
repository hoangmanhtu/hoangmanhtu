<?php if (empty($new)): ?>
    <h2>Không tồn tại tin này</h2>
<?php else: ?>
    <ol class="breadcrumb alert alert-dark">
        <li><a href="index.php?area=Backend">Trang Chủ</a></li>
        <li><a href="index.php?area=backend&controller=news">Danh Sách Sản Phẩm</a></li>
        <li class="active">Chỉnh Sửa Sản Phẩm ID <?php echo $new['id'] ?></li>
    </ol>
    <!---->
    <div class="container">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-lg-8 col-sm-12">
                    <!--            -->
                    <div class="form-group">
                        <label for="title">Nhập title : </label>
                        <input type="text" name="title"
                               value="<?php echo isset($_POST['title']) ? $_POST['title'] : $new['title'] ?>"
                               class="form-control" id="title"/>
                        <p class="error"><?php echo isset($this->error["title"])? $this->error["title"] : '';  ?></p>
                    </div>

                    <div class="form-group">
                        <label for="avatar">Ảnh đại diện</label>
                        <input type="file" name="avatar"  class="form-control" id="avatar"/>
                        <p class="error"><?php echo isset($this->error["avatar"])? $this->error["avatar"] : '';  ?></p>
                        <?php if (!empty($new['avatar'])): ?>
                            <img width="80" src="assets/uploads/news/<?php echo $new['avatar'] ?>"/>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="summary">Mô tả ngắn </label>
                        <textarea name="summary" id="summary"
                                  class="form-control"><?php echo isset($_POST['summary']) ? $_POST['summary'] : $new['summary'] ?></textarea>
                        <p class="error"><?php echo isset($this->error["summary"])? $this->error["summary"] : '';  ?></p>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả chi tiết </label>
                        <textarea name="content" id="description"
                                  class="form-control"><?php echo isset($_POST['content']) ? $_POST['content'] : $new['content'] ?></textarea>
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
                                if ($category['id'] == $new['category_id']) {
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
                    <!--    -->
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" class="form-control" id="status">
                            <?php
                            $selected_disabled = '';
                            $selected_active = '';
                            if ($new['status'] == 0) {
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
                        <input type="checkbox" name="hotnews" <?php if(isset($new["hotnews"]) && $new["hotnews"]== 1 ) : ?> checked <?php endif; ?> id="hotnews"/>
                        <label for="hotnews">Sản Phẩm Nổi Bật</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
                    <a href="index.php?area=backend&controller=news&action=index" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>