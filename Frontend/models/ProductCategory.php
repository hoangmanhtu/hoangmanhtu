<?php
 class ProductCategory extends Model
 {
     public function Show_All($id,$pageSize,$page,$params = [])
     {
         $str_producer_id = '';
         $str_price = '';
         if (isset($params["str_producer_id"])) {
             $str_producer_id = " AND " . $params["str_producer_id"];
         }
         if (isset($params["str_price"])) {
             $str_price = "AND " . $params["str_price"];
         }
         $from=($page-1) * $pageSize;
         $sql_select_all= "select products.*,categories.name as category_name ,producer.name as producer_name
                    from products inner join categories INNER JOIN producer
                    on products.category_id=categories.id and products.producer_id=producer.id
                        WHERE products.status=1 and products.category_id=$id AND TRUE $str_producer_id $str_price
                        ORDER BY products.updated_at DESC, products.created_at DESC limit $from,$pageSize ";
//         var_dump($sql_select_all);
//         die();
         $obj_select_all = $this->connection->prepare($sql_select_all);
         $obj_select_all->execute();
         $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
         return $products;
     }
     public function countTotal($id,$params = [])
     {
         $str_producer_id = '';
         $str_price = '';
         if (isset($params["str_producer_id"])) {
             $str_producer_id = " AND " . $params["str_producer_id"];
         }
         if (isset($params["str_price"])) {
             $str_price = "AND " . $params["str_price"];
         }
         $sql_count = "select count(products.id) from products where products.status=1 and products.category_id=$id and TRUE $str_producer_id $str_price
                        ORDER BY products.updated_at DESC, products.created_at DESC";
         $obj_select = $this->connection->prepare($sql_count);
         $obj_select->execute();
         return $obj_select->fetchColumn();
     }

 }