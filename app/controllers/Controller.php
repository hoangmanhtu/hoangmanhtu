<?php
class Controller {
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        if(isset($_GET["area"]) && $_GET["area"]=='backend')
        {
            if (!isset($_SESSION["user"]) && $_GET["controller"] != 'login') {
                    $_SESSION["error"] = " Bạn chưa đăng nhập";
                    header("location:index.php?area=backend&controller=login&action=login");
                    exit();
            }
        }
    }
    public $error=[];
    public $content;
    public function render($file, $variables = []) {
        extract($variables);
        //mở vùng đệm để ghi nhớ nội dung view
        ob_start();
        //nhúng đường dẫn file view
        require_once $file;
        //kết thúc việc ghi nội dung file
        $view = ob_get_clean();
        return $view;
    }
}