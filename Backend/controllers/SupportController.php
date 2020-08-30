<?php
require_once 'backend/models/Support.php';

class SupportController extends Controller
{
    public function index()
    {
        $query_additional = '';
        if (isset($_GET['name'])  && !empty($_GET["name"])) {
            $query_additional .= '&name=' . $_GET['name'];
        }
        if (isset($_GET['mobile'])  && !empty($_GET["mobile"])) {
            $query_additional .= '&mobile=' . $_GET['mobile'];
        }
        $support_model=new Support();
        $count_total = $support_model->countTotal();
        $arr_params = [
            'total' => $count_total,
            'limit' => 3,
            'query_string' => 'page',
            "area"=>"backend",
            'controller' => 'support',
            'action' => 'index',
            'full_mode' => false,
            'query_additional' => isset($query_additional) ? $query_additional : "",
            'page' => isset($_GET['page']) ? $_GET['page'] : 1
        ];
        $pagination = new Pagination($arr_params);
        $pages = $pagination->getPagination();
        $support_model=new Support();
        $support=$support_model->listSupport($arr_params);
//            echo "<pre>";
//            print_r($support);
//            echo "</pre>";
//            die();
        $this->content=$this->render("backend/views/Support/index.php",["pages" => $pages,"support"=> $support]);
        require_once 'backend/views/layouts/main.php';
    }
    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?area=backendcontroller=order');
            exit();
        }
        $id=$_GET["id"];
        $order_model=new Order();
        $products=$order_model->listProduct($id);
        $this->content=$this->render("backend/views/order/order_detail.php" ,["products" => $products,'id' => $id]);
        require_once 'backend/views/layouts/main.php';
    }
    public function send_payment()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?area=backendcontroller=order');
            exit();
        }
        $id=$_GET["id"];
        $order_model=new Order();
        $order_model->updated_at = date('Y-m-d H:i:s');
        $is_update=$order_model->sentOrder($id);
        if ($is_update) {
            $_SESSION['success'] = 'Đã thanh toán đơn hàng';
        } else {
            $_SESSION['error'] = 'Thanh toán thất bại';
        }
        header('Location: index.php?area=backend&controller=order');
        exit();
    }
}
?>