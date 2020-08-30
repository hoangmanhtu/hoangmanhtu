<?php
    session_start();
    require_once 'app/controllers/Controller.php';
    require_once 'App/configs/Model.php';
    require_once 'App/helpers/Helper.php';
    require_once 'App/Pagination/Pagination.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $area=isset($_GET["area"]) ? $_GET["area"] : "Frontend";
    $controller=isset($_GET["controller"]) ? $_GET["controller"] : "home";
    $action=isset($_GET["action"]) ? $_GET["action"] : "index";
    //  hàm ucfirst chữ cái đầu sẽ viết hoa
    $controller = ucfirst($controller);
    $controller .="Controller";
    $path_controller="controllers/$controller.php";
    $file_controller="$area/$path_controller";
    if(!file_exists($file_controller))
    {
      die("Trang bạn tìm không tồn tại");
    }
    require_once "$file_controller";
    $object=new $controller();
    if(!method_exists($object,$action))
    {
      die("Không tồn tại phương thức $action trong class $controller");
    }
    $object->$action();

?>