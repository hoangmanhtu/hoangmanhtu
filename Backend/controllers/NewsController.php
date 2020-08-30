<?php
require_once 'backend/models/News.php';
require_once 'backend/models/Category.php';

class NewsController extends Controller
{
//        lấy tát cả các bản ghi
    public function index()
    {
        $news_model = new News();
        $count_total = $news_model->countTotal();
        $arr_params = [
            'total' => $count_total,
            'limit' => 3,
            'query_string' => 'page',
            "area"=>"backend",
            'controller' => 'news',
            'action' => 'index',
            'full_mode' => false,
            'page' => isset($_GET['page']) ? $_GET['page'] : 1
        ];
        $news = $news_model->getAllPagination($arr_params);
        $pagination = new Pagination($arr_params);
        $pages = $pagination->getPagination();
        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->content = $this->render('backend/views/news/index.php', [
            'news' => $news,
            'categories' => $categories,
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
            header("location:index.php?area=backend&controller=news");
            exit();
        }
        $id=$_GET["id"];
        $news_model = new News();
        $new=$news_model->getById($id);
        $this->content=$this->render("backend/views/news/detail.php",["new" => $new
        ]);
        require_once 'backend/views/layouts/main.php';
    }
//        thêm mới sản phẩm
    public function create()
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        if (isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            $hotnews = isset($_POST["hotnews"])?1:0;
            $avatar_file = $_FILES["avatar"];
            if (empty($category_id)) {
                $this->error["category"] = ' * Vui lòng chọn 1 danh mục';
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
                    $dir_uploads = __DIR__ . '/../../assets/uploads/news';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $avatar = time() . '-' . $avatar_file['name'];
                    move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);

                }
                $news_model = new News();
                $news_model->category_id = $category_id;

                $news_model->title = $title;
                $news_model->avatar = $avatar;
                $news_model->hotnews=$hotnews;
                $news_model->summary = $summary;
                $news_model->content = $content;
                $news_model->status = $status;
                $is_insert = $news_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Thêm dữ liệu thất bại';
                }
                header('Location: index.php?area=backend&controller=news');
                exit();
            }
        }
        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->content = $this->render('backend/views/news/create.php', [
            'categories' => $categories,
        ]);
        require_once 'backend/views/layouts/main.php';
    }
//    chỉnh sửa sản phẩm
    public function update()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=news');
            exit();
        }
        $id = $_GET['id'];
        $news_model = new News();
        $new = $news_model->getById($id);
        if (isset($_POST['submit'])) {

            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            $hotnews = isset($_POST["hotnews"])?1:0;
            $avatar_file = $_FILES["avatar"];
            if (empty($category_id)) {
                $this->error["category"] = ' * Vui lòng chọn 1 danh mục';
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
            if ($avatar_file["error"] == 0) {
                $extension_arr = ["jpg", "png", "gif", "jpeg"];
                $extension = pathinfo($avatar_file["name"], PATHINFO_EXTENSION);
                $extension = strtolower($extension);

                if (!in_array($extension, $extension_arr)) {
                    $this->error["avatar"] = " * Phải upload đúng File ảnh";
                }
            }
            if (empty($this->error)) {
                $avatar = $new["avatar"];
                if (!empty($avatar_file["name"][0])) {
                    $news_model = new News();
                    $news_model->images($id);
                    $dir_uploads = __DIR__ . '/../../assets/uploads/news';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $avatar = time() . '-' . $avatar_file['name'];
                    move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                }
                //save dữ liệu vào bảng products
                $news_model->category_id = $category_id;
                $news_model->title = $title;
                $news_model->avatar = $avatar;
                $news_model->summary = $summary;
                $news_model->content = $content;
                $news_model->status = $status;
                $news_model->hotnews = $hotnews;
                $news_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $news_model->update($id);

                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?area=backend&controller=news');
                exit();
            }
        }
        //lấy danh sách category đang có trên hệ thống để phục vụ cho search
        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->content = $this->render('backend/views/news/update.php', [
            'categories' => $categories,
            'new' => $new,
        ]);
        require_once 'backend/views/layouts/main.php';
    }

    public function delete() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=news');
            exit();
        }
        $id = $_GET['id'];
        $new_model = new News();
        $new_model->images($id);
        $is_delete = $new_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?area=backend&controller=news');
        exit();
    }
}
?>