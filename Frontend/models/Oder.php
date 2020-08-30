<?php
class Oder extends Model
{
    public $fullname;
    public $address;
    public $mobile;
    public $email;
    public $note;
    public $price_total;
    public $payment_status;

    public function insert()
    {
        $sql_insert= " Insert into orders(`fullname`,`address`,`mobile`,`email`,`note`,`price_total`,`payment_status`)  
                          values (:fullname,:address,:mobile,:email,:note,:price_total,:payment_status)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=[
            ":fullname" => $this->fullname,
            ":address" => $this->address,
            ":mobile" => $this->mobile,
            ":email" => $this->email,
            ":note" =>$this->note,
            ":price_total" => $this->price_total,
             ":payment_status" => $this->payment_status,
        ];
        $obj_insert->execute($arr_insert);
        $order_id=$this->connection->lastInsertId();
        return $order_id;
    }

}