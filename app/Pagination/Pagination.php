<?php
//models/Pagination.php
//Class phân trang
//ý tương của phân trang:
//giả sử trong bảng categories có 36 bản ghi
//và yêu cầu là hiển thị 10 bản ghi trên 1 trang
//-> tổng số trang cần tạo để chứa hết 36 bản ghi
// = ceil(36/10) = 4
//như vậy cần xác định các tham số sau
// - tổng số bản ghi: total
// - số bản ghi trên 1 trang: limit
//url phân trang sẽ có dạng sau, theo mô hình mvc
//index.php?controller=category&action=index&page=3
//- controller xử lý phân trang: controller
//- action xử lý phân trang: action
// - chế độ hiển thị phân trang: full_mode
class Pagination
{

    public $params = [
        'total' => 0,
        'limit' => 0,
        "area" => "",
        'controller' => '',
        'action' => '',
        'query_additional' => "",
        'id' => '',
        'full_mode' => FALSE
    ];

    public function __construct($params) {
        $this->params = $params;
    }
    public function getTotalPage() {
        $total = $this->params['total'] / $this->params['limit'];
        $total = ceil($total);
        return $total;
    }
    //tạo 1 phương thức lấy ra trang hiện tại
    public function getCurrentPage() {
        $page = 1;
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
            $total_page = $this->getTotalPage();
            if ($page >= $total_page) {
                $page = $total_page;
            }
        }
        return $page;
    }
    // - Link Prev
    public function getPrevPage() {
        $prev_page = '';
        $current_page = $this->getCurrentPage();
        if ($current_page >= 2) {
            $area=$this->params["area"];
            $controller = $this->params['controller'];
            $action = $this->params['action'];
            $query_additional=isset($this->params["query_additional"]) ? $this->params["query_additional"] : "";
            $page = $current_page - 1;
            $id=isset($this->params["id"]) ? $this->params["id"] : "";
            if(isset($_GET["area"]) && $_GET["area"]=='backend') {
                $prev_url = "index.php?$query_additional&area=$area&controller=$controller&action=$action&id=$id&page=$page";
            }
            $prev_page = "<li><a href='$prev_url'>Prev</a></li>";
        }
        return $prev_page;
    }

    //xây dựng phương thức tạo ra link Next cho phân trang
    public function getNextPage() {
        $next_page = '';
        $current_page = $this->getCurrentPage();
        $total_page = $this->getTotalPage();
        if ($current_page < $total_page) {
            $area=$this->params["area"];
            $controller = $this->params['controller'];
            $action = $this->params['action'];
            $query_additional=isset($this->params["query_additional"]) ? $this->params["query_additional"] : "";
            $page = $current_page + 1;
            $id=isset($this->params["id"]) ? $this->params["id"] : "";
            if(isset($_GET["area"]) && $_GET["area"]=='backend') {
                $next_url =
                    "index.php?$query_additional&area=$area&controller=$controller&action=$action&id=$id&page=$page";
            }
            $next_page = "<li><a href='$next_url'>Next</a></li>";
        }
        return $next_page;
    }

    public function getPagination() {
        $data = '';
        $total_page = $this->getTotalPage();
        if ($total_page == 1) {
            return '';
        }
        $data.="  <div class='Page navigation example'>";
        $data .= "<ul class='pagination'>";
        $prev_link = $this->getPrevPage();
        $data .= $prev_link;
        $area=$this->params["area"];
        $controller = $this->params['controller'];
        $action = $this->params['action'];
        $id=isset($this->params["id"]) ? $this->params["id"] : "";
        $query_additional=isset($this->params["query_additional"]) ? $this->params["query_additional"] : "";
        //nếu như hiển thị phân trang theo kiểu ..
        // -> full_mode = FALSE
        $full_mode = $this->params['full_mode'];
        if ($this->params['full_mode'] == FALSE) {
            for ($page = 1; $page <= $total_page; $page++) {
                $current_page = $this->getCurrentPage();
                //luôn luôn hiển thị trang đầu, trang cuối,
                //trang ngay trước và ngay sau trang hiện tại
                if (in_array($page, [1, $total_page, $current_page - 1, $current_page + 1])) {
                    if($page != $current_page)
                    {
                        if(isset($_GET["area"]) && $_GET["area"]=='backend') {
                            $link = "index.php?$query_additional&area=$area&controller=$controller&action=$action&id=$id&page=$page";
                            $data .= "<li><a href='$link'>$page</a></li>";
                        }
                        else
                        {
                            $link = "index.php?controller=$controller&action=$action&id=$id&page=$page";
                            $data .= "<li><a href='$link'>$page</a></li>";
                        }
                    }
                    else
                    {
                        $data .= "<li class='active'><a>$page</a></li>";
                    }
                }
                //nếu là trang hiện tại thì sẽ ko set link
                elseif ($page == $current_page) {
                    $data .= "<li class='active'><a>$page</a></li>";
                }
                //nếu là trang 2, 3, trang cuối -1, trang cuối - 2 thì
                //sẽ hiển thị ký tự ...
                elseif(in_array($page,
                    [2, 3, $total_page - 1, $total_page - 2])) {
                    $data .= "<li><a>...</a></li>";
                }
            }
        }
        //hiển thị full page
        else {
            //chạy vòng lặp từ 1 đến tổng số trang
            //để hiển thị ra các trang
            for ($page = 1; $page <= $total_page; $page++) {
                $current_page = $this->getCurrentPage();
                //nếu trang hiện tại trùng với với số lần lặp hiện
                //tại thì sẽ thêm class active và ko gắn link
//                cho trang hiện tại
                if ($current_page == $page) {
                    $data .= "<li class='active'><a href='#'>$page</a></li>";
                } else {
                    if(isset($_GET["area"]) && $_GET["area"]=='backend') {
                    $page_url
                        = "index.php?area=$area&controller=$controller&action=$action&id=$id&page=$page";
                    $data .= "<li><a href='$page_url'>$page</a></li>";
                }
                else
                {
                    $page_url
                        = "index.php?controller=$controller&action=$action&id=$id&page=$page";
                    $data .= "<li><a href='$page_url'>$page</a></li>";
                }
                }
            }
        }
        //gắn link NExt vào cuối của cấu trúc phân trang
        $next_link = $this->getNextPage();
        $data .= $next_link;
        $data .= "</ul>";
        return $data;
    }
}