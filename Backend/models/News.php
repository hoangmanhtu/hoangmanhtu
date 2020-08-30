<?php
class News extends Model
{
    public $id;
    public $category_id;
    public $title;
    public $avatar;
    public $summary;
    public $content;
    public $status;
    public $hotnews;
    public $created_at;
    public $updated_at;
//lấy tất cả các bản ghi

    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("select news.*,categories.name as category_name 
                    from news inner join categories 
                    on news.category_id=categories.id 
                        WHERE TRUE 
                        ORDER BY news.updated_at DESC, news.created_at DESC
                        LIMIT $start, $limit ");
        $arr_select = [];
        $obj_select->execute($arr_select);
        $news = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $news;
    }
    /* Tính tổng số bản ghi đang có trong bảng news*/
    public function countTotal()
    {
        $sql_count="select count(news.id) from news where TRUE 
                        ORDER BY news.updated_at DESC, news.created_at DESC";
        $obj_select = $this->connection->prepare($sql_count);
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }
//    lấy chi tiết của sản phẩm
    public function getById($id)
    {
        $sql_select="select news.*,categories.name as category_name 
                    from news inner join categories 
                    on news.category_id=categories.id where news.id=$id";
        $obj_select_one=$this->connection->prepare($sql_select);
        $obj_select_one->execute();
        $product=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
//    thêm mới sản phẩm
    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO news(category_id, title, avatar,summary, content, status , hotnews) 
                                VALUES (:category_id, :title, :avatar , :summary, :content, :status , :hotnews)");

        $arr_insert = [
            ':category_id' => $this->category_id,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':status' => $this->status,
            ':hotnews' => $this->hotnews
        ];
        $news=$obj_insert->execute($arr_insert);
        return $news;

    }

    public function images($id)
    {
        $obj_delete_img=$this->connection->prepare("select avatar from news where id=$id");
        $obj_delete_img->execute();
        $result=$obj_delete_img->fetch(PDO::FETCH_ASSOC);

        if($result["avatar"] != "" && file_exists("assets/uploads/news/".$result["avatar"]))
        {
            unlink("assets/uploads/news/".$result["avatar"]);
        }
    }
//    update sản phẩm
    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE news SET category_id=:category_id, title=:title, avatar=:avatar,
            summary=:summary, content=:content, status=:status, hotnews=:hotnews , updated_at=:updated_at WHERE id = $id");
        $arr_update = [
            ':category_id' => $this->category_id,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
            ':hotnews' => $this->hotnews
        ];
        return $obj_update->execute($arr_update);
    }

//xóa sản phẩm
    public function delete($id)
    {
        $obj_delete = $this->connection->prepare("DELETE FROM news WHERE id = $id");
        $is_delete = $obj_delete->execute();
        return $is_delete;
    }

}