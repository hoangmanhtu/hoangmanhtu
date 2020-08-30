<?php
require_once 'backend/models/Order.php';

    class OrderController extends Controller
    {
        public function index()
        {
            $query_additional = '';
            if (isset($_GET['fullname'])  && !empty($_GET["fullname"])) {
                $query_additional .= '&fullname=' . $_GET['fullname'];
            }
            if (isset($_GET['mobile'])  && !empty($_GET["mobile"])) {
                $query_additional .= '&mobile=' . $_GET['mobile'];
            }
            $order_model=new Order();
            $count_total = $order_model->countTotal();
            $arr_params = [
                'total' => $count_total,
                'limit' => 3,
                'query_string' => 'page',
                "area"=>"backend",
                'controller' => 'order',
                'action' => 'index',
                'full_mode' => false,
                'query_additional' => isset($query_additional) ? $query_additional : "",
                'page' => isset($_GET['page']) ? $_GET['page'] : 1
            ];
            $pagination = new Pagination($arr_params);
            $pages = $pagination->getPagination();
            $order_model=new Order();
            $orders=$order_model->listOrder($arr_params);
//            echo "<pre>";
//            print_r($orders);
//            echo "</pre>";
//            die();
            $this->content=$this->render("backend/views/Order/Order.php",["pages" => $pages,"orders"=> $orders]);
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