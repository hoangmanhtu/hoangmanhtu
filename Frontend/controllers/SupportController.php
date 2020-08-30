<?php
require_once 'frontend/models/Support.php';
    class SupportController extends Controller
    {
        public function index()
        {
            $support_model=new Support();
            $name=$_POST["name"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $support_model->name=$name;
            $support_model->email=$email;
            $support_model->sdt=$phone;
            $is_insert=$support_model->insert();
            if($is_insert)
            {
                $_SESSION["support"] = "Chúng tôi sẽ sớm liên hệ tư vấn cho bạn. Xin cảm ơn !!!";
            }

        }
    }
?>