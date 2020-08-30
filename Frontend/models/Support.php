<?php
class Support extends Model
{
    public $name;
    public $email;
    public $sdt;
    public $created_at;
    public function insert()
    {
        $sql_insert ="insert into support(`name`,`email`,`sdt`) 
                      values (:name,:email,:sdt)";
        $obj_select=$this->connection->prepare($sql_insert);
        $arr_insert=[
            ":name" => $this->name,
            ":email" => $this->email,
            ":sdt" => $this->sdt,
        ];
        return $obj_select->execute($arr_insert);
    }


}
?>