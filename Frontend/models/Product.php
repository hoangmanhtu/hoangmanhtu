<?php
    class Product extends Model
    {
        public function TopAllProduct()
        {
            $sql_select_all= 'SELECT products.*, categories.name AS category_name, producer.name as producer_name
                            FROM products INNER JOIN categories inner join producer
                            ON products.category_id = categories.id and producer.id=products.producer_id
                            where  products.status=1 and products.hotproduct=1
                            order by products.created_at desc ';
            $obj_select_all = $this->connection->prepare($sql_select_all);
            $obj_select_all->execute();
            $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        }
        public function AllProductHome()
        {
            $sql_select_all= 'SELECT products.*, categories.name AS category_name, producer.name as producer_name
                            FROM products INNER JOIN categories inner join producer
                            ON products.category_id = categories.id and producer.id=products.producer_id
                            where  products.status=1
                            order by products.created_at desc limit 0,12 ';
            $obj_select_all = $this->connection->prepare($sql_select_all);
            $obj_select_all->execute();
            $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        }
        public function Modal()
        {
            $sql_select_all= 'SELECT products.*, categories.name AS category_name, producer.name as producer_name
                            FROM products INNER JOIN categories inner join producer
                            ON products.category_id = categories.id and producer.id=products.producer_id';
            $obj_select_all = $this->connection->prepare($sql_select_all);
            $obj_select_all->execute();
            $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
            return $products;
    }
        public function Show_All($pageSize,$page,$params = [])
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
                        WHERE products.status=1 and TRUE $str_producer_id $str_price
                        ORDER BY products.updated_at DESC, products.created_at DESC limit $from,$pageSize ";
            $obj_select_all = $this->connection->prepare($sql_select_all);
            $obj_select_all->execute();
            $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        }
        public function countTotal($params = [])
        {
            $str_producer_id = '';
            $str_price = '';
            if (isset($params["str_producer_id"])) {
                $str_producer_id = " AND " . $params["str_producer_id"];
            }
            if (isset($params["str_price"])) {
                $str_price = "AND " . $params["str_price"];
            }
            $sql_count = "select count(products.id) from products where TRUE  $str_producer_id $str_price
                        ORDER BY products.updated_at DESC, products.created_at DESC";
            $obj_select = $this->connection->prepare($sql_count);
            $obj_select->execute();
            return $obj_select->fetchColumn();
        }
        public function getById($id)
        {
            $sql_select_one =
                "SELECT products.*, categories.name AS category_name,categories.status as category_status,
                    producer.name as producer_name
                    FROM products INNER JOIN categories inner join producer
                    ON products.category_id = categories.id and producer.id=products.producer_id
                    WHERE products.id = $id";
            $obj_select_one =
                $this->connection->prepare($sql_select_one);
            $obj_select_one->execute();
            $product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
            return $product;
        }
        public function getImages()
        {
            $sql_select = "select * from product_images";
            $obj_select = $this->connection->prepare($sql_select);
            $obj_select->execute();
            $images = $obj_select->fetchAll(PDO::FETCH_ASSOC);
            return $images;
        }
        public function search($search)
        {
            $sql_query ="select * from products where title like '%$search%'";
            $obj_select=$this->connection->prepare($sql_query);
            $obj_select->execute();
            $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        }


    }
?>