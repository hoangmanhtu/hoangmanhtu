<?php
class Product extends Model
{
    public $id;
    public $category_id;
    public $title;
    public $avatar;
    public $price;
    public $quality;
    public $discount;
    public $producer_id;
    public $summary;
    public $content;
    public $status;
    public $hotproduct;
    public $created_at;
    public $updated_at;
//lấy tất cả các bản ghi
    public $str_search="";
    public function __construct()
    {
        parent::__construct();
       if(isset($_GET["title"]) && !empty($_GET["title"]))
       {
           $this->str_search .=" AND products.title LIKE '%{$_GET["title"]}%' ";
       }
       if(isset($_GET["category_id"]) && !empty($_GET["category_id"]))
       {
           $this->str_search .= " AND products.category_id ={$_GET["category_id"]} ";
       }
        if(isset($_GET["producer_id"]) && !empty($_GET["producer_id"]))
        {
            $this->str_search .= " AND products.producer_id ={$_GET["producer_id"]} ";
        }
    }

    public function getAll()
    {
        $sql_select="select products.*,categories.name as category_name ,producer.name as producer_name
                    from products inner join categories INNER JOIN producer
                    on products.category_id=categories.id and products.producer_id=producer.id
                    where TRUE $this->str_search 
                    order by products.created_at desc ";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("select products.*,categories.name as category_name ,producer.name as producer_name
                    from products inner join categories INNER JOIN producer
                    on products.category_id=categories.id and products.producer_id=producer.id
                        WHERE TRUE $this->str_search
                        ORDER BY products.updated_at DESC, products.created_at DESC
                        LIMIT $start, $limit ");
        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    /* Tính tổng số bản ghi đang có trong bảng products*/
    public function countTotal()
{
    $sql_count="select count(products.id) from products where TRUE $this->str_search
                        ORDER BY products.updated_at DESC, products.created_at DESC";
    $obj_select = $this->connection->prepare($sql_count);
    $obj_select->execute();
    return $obj_select->fetchColumn();
}
//    lấy chi tiết của sản phẩm
    public function getById($id)
    {
        $sql_select="select products.*,categories.name as category_name ,producer.name as producer_name
                    from products inner join categories INNER JOIN producer
                    on products.category_id=categories.id and products.producer_id=producer.id where products.id=$id";
        $obj_select_one=$this->connection->prepare($sql_select);
        $obj_select_one->execute();
        $product=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
//    thêm mới sản phẩm
    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO products(producer_id,category_id, title, avatar, price , quality , discount ,summary, content, status , hotproduct) 
                                VALUES (:producer_id,:category_id, :title, :avatar, :price, :quality , :discount , :summary, :content, :status , :hotproduct)");

        $arr_insert = [
            ':category_id' => $this->category_id,
            ':producer_id' =>$this->producer_id,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':price' => $this->price,
            ':quality' => $this->quality,
            ':discount' => $this->discount,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':status' => $this->status,
            ':hotproduct' => $this->hotproduct
        ];
        $obj_insert->execute($arr_insert);
        $product_id=$this->connection->lastInsertId();
        return $product_id;
    }
//    update sản phẩm
    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE products SET producer_id=:producer_id,category_id=:category_id, title=:title, quality=:quality , discount=:discount, avatar=:avatar, price=:price, 
            summary=:summary, content=:content, status=:status, hotproduct=:hotproduct , updated_at=:updated_at WHERE id = $id");
        $arr_update = [
            ':category_id' => $this->category_id,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':price' => $this->price,
            ':quality' => $this->quality,
            ':discount' => $this->discount,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
            ':producer_id' =>$this->producer_id,
            ':hotproduct' => $this->hotproduct
        ];
        return $obj_update->execute($arr_update);
    }
//lấy ra ảnh của sản phẩm
    public function images($id)
    {
        $obj_delete_img=$this->connection->prepare("select avatar from products where id=$id");
        $obj_delete_img->execute();
        $result=$obj_delete_img->fetch(PDO::FETCH_ASSOC);

        if($result["avatar"] != "" && file_exists("assets/uploads/products/".$result["avatar"]))
        {
            unlink("assets/uploads/products/".$result["avatar"]);
        }
    }
//xóa sản phẩm
    public function delete($id)
    {
        $obj_delete = $this->connection->prepare("DELETE FROM products WHERE id = $id");
        $is_delete = $obj_delete->execute();
        return $is_delete;
    }

}