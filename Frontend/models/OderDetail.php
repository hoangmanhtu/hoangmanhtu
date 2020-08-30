<?php
class OderDetail extends  Model
{
    public $order_id;
    public $product_id;
    public $quality;
    public function insert()
    {
        $sql_insert="insert into order_details(`order_id`,`product_id`,`quality`) values (:order_id,:product_id,:quality)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=
            [
                ":order_id" => $this->order_id,
                ":product_id" => $this->product_id,
                ":quality" => $this->quality
            ];
        return $obj_insert->execute($arr_insert);
    }
}