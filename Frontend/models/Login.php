<?php
class Login extends Model{
    public $fullname;
    public $username;
    public $password;
    public $email;
    public $phone;
    public $status;
    public $avatar;
    public $address;
    public $updated_at;
    public function getUser($username) {
        $sql_select_one =
            "SELECT count(id) FROM users WHERE `username` = :username AND `status`= 0";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $arr_select = [
            ':username' => $username,
        ];
        $obj_select_one->execute($arr_select);
        return $obj_select_one->fetchColumn();

    }
    public function getUser_Account($username) {
        $sql_select_one =
            "SELECT * FROM users WHERE `username` = :username AND `status`= 0";
        $obj_select_one = $this->connection
            ->prepare($sql_select_one);
        $arr_select = [
            ':username' => $username,
        ];
        $obj_select_one->execute($arr_select);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function register() {
        $sql_insert = "INSERT INTO users(`fullname`,`phone`,`email`,`username`, `password`,`status`)
                        VALUES(:fullname,:phone,:email,:username, :password,:status)";
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        $arr_insert = [
            ':fullname' => $this->fullname,
            ':email' => $this->email,
            ':username' => $this->username,
            ':password' => $this->password,
            ':status' => $this->status,
            ':phone' => $this->phone
        ];
        return $obj_insert->execute($arr_insert);
    }
    public function getUserLogin($username, $password) {
        $sql_select_one =
            "SELECT * FROM users WHERE 
            `username` = :username AND `password` = :password AND `status`= 0";
        $obj_select_one =
            $this->connection->prepare($sql_select_one);
        $arr_select = [
            ':username' => $username,
            ':password' => $password
        ];
        //thực thi truy vấn
        $obj_select_one->execute($arr_select);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function updateAccount($id) {
        $sql_insert = "UPDATE users SET fullname=:fullname,phone=:phone,address=:address,email=:email ,updated_at=:updated_at WHERE id = $id ";
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        $arr_insert = [
            ':fullname' => $this->fullname,
            ':address' => $this->address,
            ':email' => $this->email,
            ':phone' => $this->phone,
            ':updated_at' => $this->updated_at,
        ];
        return $obj_insert->execute($arr_insert);
    }
//    public function user_cart($id)
//    {
//        $sql_select_cart =
//            "select orders.*,products.title as product_name,order_details.quality as product_quality from
//                orders INNER JOIN order_details INNER JOIN products
//                on orders.id=order_details.order_id and order_details.product_id=products.id
//                where orders.user_id=$id";
//        $obj_select_one = $this->connection->prepare($sql_select_cart);
//        //thực thi truy vấn
//        $obj_select_one->execute();
//        return $obj_select_one->fetchAll(PDO::FETCH_ASSOC);
//
//    }
}

