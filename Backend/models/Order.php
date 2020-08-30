<?php
 class Order extends Model {
     public $updated_at;
     public $str_search="";
     public function __construct()
     {
         parent::__construct();
         if(isset($_GET["fullname"]) && !empty($_GET["fullname"]))
         {
             $this->str_search .=" AND orders.fullname LIKE '%{$_GET["fullname"]}%' ";
         }
         if(isset($_GET["mobile"]) && !empty($_GET["mobile"]))
         {
             $this->str_search .= " AND orders.mobile ={$_GET["mobile"]} ";
         }

     }

     //lay danh sach cac ban ghi: tu ban ghi nao den ban ghi nao
    public function listOrder($arr_params){
        //lay bien ket noi csdl
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $start = ($page - 1) * $limit;
        $obj_select=$this->connection->prepare
        ("select * from orders   where TRUE $this->str_search 
                    order by orders.created_at desc  LIMIT $start, $limit");
        //lay tat ca ket qua tra ve
        $arr_select = [];
        $obj_select->execute($arr_select);
        $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }
     public function countTotal()
     {
         $sql_count="select count(orders.id) from orders where TRUE $this->str_search ";
         $obj_select = $this->connection->prepare($sql_count);
         $obj_select->execute();
         return $obj_select->fetchColumn();
     }
    public function listProduct($id)
    {
       $sql_select_product = "select order_details.*,products.title as product_name,products.discount as product_discount,
                              products.price as product_price
                              from  order_details inner join products 
                              on order_details.product_id=products.id   
                              where order_details.order_id=$id";
       $obj_select= $this->connection->prepare($sql_select_product);
       $obj_select->execute();
       $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
       return $products;
    }
    public function sentOrder($id){

        $update_order = "update orders set payment_status=1,updated_at=:updated_at where id=$id";
        $obj_update=$this->connection->prepare($update_order);
        $arr_update=[  ':updated_at' => $this->updated_at];
        return $obj_update->execute($arr_update);
    }
}
?>