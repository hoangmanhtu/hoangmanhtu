<?php
require_once 'backend/models/Product.php';
require_once 'backend/models/Category.php';
require_once 'backend/models/Producer.php';
require_once 'backend/models/product_images.php';
    class  ProductController extends Controller
    {
//        lấy tát cả các bản ghi
        public function index()
        {
            $product_model = new Product();

            //lấy tổng số bản ghi đang có trong bảng products
            $count_total = $product_model->countTotal();
            $query_additional = '';
            if (isset($_GET['title'])  && !empty($_GET["title"])) {
                $query_additional .= '&title=' . $_GET['title'];
            }
            if (isset($_GET['category_id'])  && !empty($_GET["category_id"])) {
                $query_additional .= '&category_id=' . $_GET['category_id'];
            }
            if (isset($_GET['producer_id'])  && !empty($_GET["producer_id"])) {
                $query_additional .= '&producer_id=' . $_GET['producer_id'];
            }
            $arr_params = [
                'total' => $count_total,
                'limit' => 3,
                'query_string' => 'page',
                "area"=>"backend",
                'controller' => 'product',
                'action' => 'index',
                'full_mode' => false,
                'query_additional' => $query_additional,
                'page' => isset($_GET['page']) ? $_GET['page'] : 1
            ];
            $products = $product_model->getAllPagination($arr_params);
            $pagination = new Pagination($arr_params);
            $pages = $pagination->getPagination();
            $category_model = new Category();
            $categories = $category_model->getAll();
            $producer_model = new Producer();
            $producers = $producer_model->getAll();
            $this->content = $this->render('backend/views/products/index.php', [
                'products' => $products,
                'categories' => $categories,
                'producers' => $producers,
                'pages' => $pages,
            ]);
            require_once 'backend/views/layouts/main.php';
        }

//        xem chi tiết sản phẩm
        public function detail()
        {
            if(!isset($_GET["id"]) || !is_numeric($_GET["id"]))
            {
                $_SESSION["error"] =" ID không hợp lệ";
                header("location:index.php?area=backend&controller=product");
                exit();
            }
            $id=$_GET["id"];
            $product_model=new Product();
            $product=$product_model->getById($id);
            $product_images_model=new product_images();
            $product_images=$product_images_model->get_images($id);
            $this->content=$this->render("backend/views/products/detail.php",["product" => $product,
              'product_images' => $product_images
                ]);
            require_once 'backend/views/layouts/main.php';
        }
//        thêm mới sản phẩm
    public function create()
    {

        if (isset($_POST['submit'])) {
//            echo "<pre>";
//            print_r($_FILES);
//            echo "</pre>";
//            die();
            $category_id = $_POST['category_id'];
            $producer_id = $_POST['producer_id'];
            $title = $_POST['title'];
            $price = $_POST['price'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            $quality=$_POST["quality"];
            $discount=$_POST["discount"];
            $hotproduct = isset($_POST["hotproduct"])?1:0;
            $avatar_file = $_FILES["avatar"];
            $avatars=$_FILES["avatars"];
            $product_images_model=new product_images();
            if (empty($category_id)) {
                $this->error["category"] = ' * Vui lòng chọn 1 danh mục';
            }
            if (empty($producer_id)) {
                $this->error["producer"] = ' * Vui lòng chọn 1 thương hiệu';
            }
            if (empty($title)) {
                $this->error["title"] = ' * Không được để trống title';
            }
            if (empty($summary)) {
                $this->error["summary"] = ' * Không được để trống mô tả ngắn';
            }
            if (empty($content)) {
                $this->error["content"] = ' * Không được để trống mô tả sản phẩm';
            }
            if (empty($quality)) {
                $this->error["quality"] = ' * Không được để trống số lượng';
            }
             for($i=0;$i<count($avatars["name"]);$i++) {
                 $extension_arr = ["jpg", "png", "gif", "jpeg"];
                 $extension = pathinfo($avatars["name"][$i], PATHINFO_EXTENSION);
                 $extension = strtolower($extension);
                     if ($avatars["error"][$i] == 0) {
                         if (!in_array($extension, $extension_arr)) {
                             $this->error["avatars"] = " * Phải upload đúng File ảnh";
                         }
                 }
                 if (empty($this->error)) {
                     if ($avatars["error"][$i] == 0) {
                     $dir_uploads = __DIR__ . '/../../assets/uploads/products';
                     if (!file_exists($dir_uploads)) {
                         mkdir($dir_uploads);
                     }
                     $avatar_name = time() . '-' . $avatars["name"][$i];
                     move_uploaded_file($avatars['tmp_name'][$i], $dir_uploads . '/' . $avatar_name);
                     }
                 }
             }
            if ($avatar_file["error"] == 0) {
                $extension_arr = ["jpg", "png", "gif", "jpeg"];
                $extension = pathinfo($avatar_file["name"], PATHINFO_EXTENSION);
                $extension = strtolower($extension);

                if (!in_array($extension, $extension_arr)) {
                    $this->error["avatar"] = " * Phải upload đúng File ảnh";
                }
            }
            if (empty($this->error)) {
                $avatar = "";
                if ($avatar_file['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../../assets/uploads/products';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $avatar = time() . '-' . $avatar_file['name'];
                    move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);

                }
                $product_model = new Product();
                $product_model->category_id = $category_id;
                $product_model->producer_id = $producer_id;
                $product_model->title = $title;
                $product_model->avatar = $avatar;
                $product_model->price = $price;
                $product_model->quality=$quality;
                $product_model->hotproduct=$hotproduct;
                $product_model->summary = $summary;
                $product_model->content = $content;
                $product_model->status = $status;
                $product_model->discount=$discount;
                $product_id = $product_model->insert();
                if($product_id > 0)
                {
                    $product_images_model->product_id = $product_id;
                    for($i=0;$i< count($avatars["name"]);$i++)
                    {  if ($avatars["error"][$i] == 0) {
                        $product_images_model->avatar =time().'-'.$avatars["name"][$i];
                        $is_insert = $product_images_model->insert();
                    }
                    }
                }
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Thêm dữ liệu thất bại';
                }
                header('Location: index.php?area=backend&controller=product');
                exit();
            }
            }
            $category_model = new Category();
            $categories = $category_model->getAll();
            $producer_model = new Producer();
            $producers = $producer_model->getAll();
            $this->content = $this->render('backend/views/products/create.php', [
                'categories' => $categories,
                "producers" => $producers
            ]);
            require_once 'backend/views/layouts/main.php';
        }
//    chỉnh sửa sản phẩm
    public function update()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }
        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getById($id);
        $product_images_model = new product_images();
        if (isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $producer_id = $_POST["producer_id"];
            $title = $_POST['title'];
            $price = $_POST['price'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            $avatar_file = $_FILES["avatar"];
            $quality = $_POST["quality"];
            $discount = $_POST["discount"];
            $hotproduct = isset($_POST["hotproduct"]) ? 1 : 0;
            $avatars = $_FILES["avatars"];
            if (empty($title)) {
                $this->error["title"] = ' * Không được để trống title';
            }
            if (empty($quality)) {
                $this->error["quality"] = ' * Không được để trống số lượng';
            }
            if (empty($summary)) {
                $this->error["summary"] = ' * Không được để trống mô tả ngắn';
            }
            if (empty($content)) {
                $this->error["content"] = ' * Không được để trống mô tả sản phẩm';
            }
            if (empty($category_id)) {
                $this->error["category"] = ' * Vui lòng chọn 1 danh mục';
            }
            if (empty($producer_id)) {
                $this->error["producer"] = ' * Vui lòng chọn 1 thương hiệu';
            }
            if ($avatar_file["error"] == 0) {
                $extension_arr = ["jpg", "png", "gif", "jpeg"];
                $extension = pathinfo($avatar_file["name"], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                if (!in_array($extension, $extension_arr)) {
                    $this->error["avatar"] = " * Phải upload đúng File ảnh";
                }
            }
//            mo tả ảnh
            for ($i = 0; $i < count($avatars["name"]); $i++) {
                $extension_arr = ["jpg", "png", "gif", "jpeg"];
                $extension = pathinfo($avatars["name"][$i], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                if ($avatars["error"][$i] == 0) {
                    if (!in_array($extension, $extension_arr)) {
                        $this->error["avatars"] = " * Phải upload đúng File ảnh";
                    }
                }
                if (empty($this->error)) {
                    if (!empty($avatars["name"][0])) {
                        $product_images_model->detail_images($id);
                        $dir_uploads = __DIR__ . '/../../assets/uploads/products';
                        if (!file_exists($dir_uploads)) {
                            mkdir($dir_uploads);
                        }
                        for($i=0;$i< count($avatars["name"]);$i++)
                        {
                        $avatar_name = time() . '-' . $avatars["name"][$i];
                        move_uploaded_file($avatars['tmp_name'][$i], $dir_uploads . '/' . $avatar_name);
                        $product_images_model->product_id = $id;
                        $product_images_model->avatar =time().'-'.$avatars["name"][$i];
                        $is_insert = $product_images_model->insert();
                    }
                    }
                }
            }
                if (empty($this->error)) {
                    $avatar = $product["avatar"];
                    if (!empty($avatar_file["name"][0])) {
                        $product_model = new Product();
                        $product_model->images($id);
                        $dir_uploads = __DIR__ . '/../../assets/uploads/products';
                        if (!file_exists($dir_uploads)) {
                            mkdir($dir_uploads);
                        }
                        $avatar = time() . '-' . $avatar_file['name'];
                        move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                    }
                    //save dữ liệu vào bảng products
                    $product_model->category_id = $category_id;
                    $product_model->producer_id = $producer_id;
                    $product_model->title = $title;
                    $product_model->avatar = $avatar;
                    $product_model->price = $price;
                    $product_model->summary = $summary;
                    $product_model->content = $content;
                    $product_model->status = $status;
                    $product_model->quality = $quality;
                    $product_model->hotproduct = $hotproduct;
                    $product_model->discount = $discount;
                    $product_model->updated_at = date('Y-m-d H:i:s');
                    $is_update = $product_model->update($id);

                    if ($is_update) {
                        $_SESSION['success'] = 'Update dữ liệu thành công';
                    } else {
                        $_SESSION['error'] = 'Update dữ liệu thất bại';
                    }
                    header('Location: index.php?area=backend&controller=product');
                    exit();
                }
            }
        //lấy danh sách category đang có trên hệ thống để phục vụ cho search
        $category_model = new Category();
        $categories = $category_model->getAll();
        $producer_model = new Producer();
        $producers = $producer_model->getAll();
        $product_images=$product_images_model->get_images($id);
        $this->content = $this->render('backend/views/products/update.php', [
            'categories' => $categories,
            'producers' =>$producers,
            'product' => $product,
            'product_images' => $product_images
        ]);
        require_once 'backend/views/layouts/main.php';
    }

    public function delete() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }
        $id = $_GET['id'];
        $product_model = new Product();
        $product_model->images($id);
        $is_delete = $product_model->delete($id);
        $product_images_model=new product_images();
        $product_images_model->detail_images($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?area=backend&controller=product');
        exit();
    }
    }
?>