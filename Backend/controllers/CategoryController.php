<?php
    require_once 'Backend/models/Category.php';
    class CategoryController extends Controller
    {
//        lấy all danh mục
        public function index()
        {
            $category_model=new Category();
            $categories=$category_model->getAll();
            $arr_output= [
              'categories' =>$categories
            ];
            $this->content=$this->render('Backend/views/categories/index.php',$arr_output);
            require_once 'Backend/views/layouts/main.php';
        }
//        thêm mới danh mục
        public function create()
        {
            if(isset($_POST["submit"])) {
                $name = $_POST["name"];
                $description = $_POST['description'];
                $status = $_POST["status"];
                $avatar_file = $_FILES["avatar"];
                $hotcategory=isset($_POST["hotcategory"])? 1 : 0;
                if (empty($name)) {
                    $this->error["name"] = " * Name không được để trống";
                }
                if (empty($description)) {
                    $this->error["description"] = " * Mô Tả không được để trống";
                }
                if ($avatar_file["error"] == 0) {
                    $extension_arr = ["jpg", "png", "gif", "jpeg"];
                    $extension = pathinfo($avatar_file["name"], PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    $size = $avatar_file["size"];
                    $size = $size / 1024 / 1024;
                    $size = round($size, 2);
                    if (!in_array($extension, $extension_arr)) {
                        $this->error["file"] = " * Phải upload đúng File ảnh";
                    } else if ($size > 2) {
                        $this->error["file"] = " * Upload file dưới 2MB ";
                    }
                }
                if (empty($this->error)) {
                    $avatar = "";
                    if ($avatar_file['error'] == 0) {
                        $dir_uploads = __DIR__ . '/../../assets/uploads/categories';
                        if (!file_exists($dir_uploads)) {
                            mkdir($dir_uploads);
                        }
                        $avatar = time() . '-' . $avatar_file['name'];
                        move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                    }
                    $category_model = new Category();
                    $category_model->name = $name;
                    $category_model->hotcategory=$hotcategory;
                    $category_model->description = $description;
                    $category_model->status = $status;
                    $category_model->avatar = $avatar;
                    $is_insert = $category_model->insert();
                    if ($is_insert) {
                        $_SESSION["success"] = " Thêm Mới Thành Công";
                    } else {
                        $_SESSION["error"] = " Thêm Mới Thất Bại";
                    }
                    header("location:index.php?area=backend&controller=category&action=index");
                    exit();
                }
            }
            $this->content=$this->render("Backend/views/categories/create.php");
            require_once "Backend/views/layouts/main.php";
        }
//        chi tiết danh mục
        public function detail()
        {
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                $_SESSION['error'] = 'ID không hợp lệ';
                header('Location: index.php?controller=category&action=index');
                exit();
            }
            $id = $_GET['id'];
            $category_model=new Category();
            $category=$category_model->getById($id);
            $this->content=$this->render("backend/views/categories/detail.php",["category"=>$category]);
            require_once 'backend/views/layouts/main.php';
        }
//        update danh mục
        public function update()
        {
            if(!isset($_GET["id"]) || !is_numeric($_GET["id"]))
            {
                $_SESSION["error"] = " ID không hợp lệ";
                header("location:index.php?area=backend&controller=category");
                exit();
            }
            $id=$_GET["id"];
            $category_model = new Category();
            $category=$category_model->getById($id);
            if(isset($_POST["submit"]))
            {
                $name=$_POST["name"];
                $description=$_POST["description"];
                $status=$_POST["status"];
                $avatar_file=$_FILES["avatar"];
                $hotcategory=isset($_POST["hotcategory"]) ? 1: 0;
                if (empty($name)) {
                    $this->error["name"] = " * Name không được để trống";
                }
                if (empty($description)) {
                    $this->error["description"] = " * Mô Tả không được để trống";
                }

                if($avatar_file["error"]==0)
                {

                    $arr_extentsion=["png","jpg","jpeg","gif"];
                    $extentsion=pathinfo($avatar_file["name"],PATHINFO_EXTENSION);
                    $extentsion=strtolower($extentsion);
                    $size=$avatar_file["size"];
                    $size=$size/1024/1024;
                    $size=round($size,2);
                    if(!in_array($extentsion,$arr_extentsion))
                    {
                        $this->error["avatar"] = " * Cần upload đúng file ảnh ";
                    }
                    else if($size > 2)
                    {
                        $this->error["avatar"] = " * File ảnh phải dưới 2MB ";
                    }
                }
                if(empty($this->error))
                {
                    $avatar=$category["avatar"];
                    if($avatar_file["error"] != 4)
                    {
                        $category_model=new Category();
                        $category_model->images($id);
                    }
                    if($avatar_file["name"] != "" || $avatar_file["error"] ==0 )
                    {
                        $dir_uploads= __DIR__ . "/../../assets/uploads/categories";
                        if(!file_exists($dir_uploads))
                        {
                            mkdir($dir_uploads);
                        }
                        $avatar=time()."-". $avatar_file["name"];
                        move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                    }
                    $category_model = new Category();
                    $category_model->name = $name;
                    $category_model->avatar = $avatar;
                    $category_model->description = $description;
                    $category_model->status = $status;
                    $category_model->hotcategory=$hotcategory;
                    $category_model->updated_at = date('Y-m-d H:i:s');
                    $is_update = $category_model->update($id);
                    if ($is_update) {
                        $_SESSION['success'] = 'Update thành công';
                    } else {
                        $_SESSION['error'] = 'Update thất bại';
                    }
                    header("location:index.php?area=backend&controller=category");
                    exit();
                }
            }
            $this->content=$this->render("Backend/views/categories/update.php",["category" => $category]);
            require_once "Backend/views/layouts/main.php";
        }
//        xóa danh mục
        public function delete()
        {
            if(!isset($_GET["id"]) || !is_numeric($_GET["id"]))
            {
                $_SESSION["error"] =" ID không hợp lệ";
                header("location : index.php?area=backend&controller=category");
            }
            $id=$_GET["id"];
            $category_model=new Category();
            $category_model->images($id);
            $is_delete=$category_model->delete($id);
            if($is_delete)
            {
                $_SESSION["success"] = " Xóa Thành Công";
            }
            else
            {
                $_SESSION["error"] = " Xóa Thất Bại ";
            }
            header("location:index.php?area=backend&controller=category");
            exit();
        }
    }
