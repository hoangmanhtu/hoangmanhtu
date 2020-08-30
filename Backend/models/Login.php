<?php
class Login extends Model{
    public $lastname;
    public $firstname;
    public $username;
    public $password;
    public $status;
    public function getUser($username) {
        $sql_select_one =
            "SELECT * FROM users WHERE `username` = :username AND `status`= 1";
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
        $sql_insert = "INSERT INTO users(`last_name`,`first_name`,`username`, `password`,`status`)
                        VALUES(:lastname,:firstname,:username, :password,:status)";
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        $arr_insert = [
            ':lastname' => $this->lastname,
            ':firstname' => $this->firstname,
            ':username' => $this->username,
            ':password' => $this->password,
            ':status' => $this->status
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function getUserLogin($username, $password) {
        $sql_select_one =
            "SELECT * FROM users WHERE 
            `username` = :username AND `password` = :password AND `status`= 1";
        $obj_select_one =
            $this->connection->prepare($sql_select_one);
        //truyền giá trị thật cho các placeholder trong câu truy vấn
        $arr_select = [
            ':username' => $username,
            ':password' => $password
        ];
        //thực thi truy vấn
        $obj_select_one->execute($arr_select);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}