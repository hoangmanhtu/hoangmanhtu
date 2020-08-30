<?php
require_once 'frontend/models/Product.php';
    class ModalController extends Controller
    {
        public function index()
        {
            $product_model=new Product();
            $product_modal=$product_model->Modal();
            $this->content=$this->render("frontend/views/modals/modal.php",
                ["product_modal" => $product_modal]);
            echo $this->content;
        }

    }
?>