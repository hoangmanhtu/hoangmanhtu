<?php
    require_once 'frontend/models/Product.php';
    require_once 'frontend/models/Category.php';
    class HomeController extends Controller
    {
        public function index()
        {
            $product_model=new Product();
            $products=$product_model->TopAllProduct();
            $category_model=new Category();
            $categories=$category_model->getAll();
            $this->content=$this->render("frontend/views/home/index.php",
                ["products" => $products,"categories" =>$categories]);
            require_once 'frontend/views/layouts/main.php';
        }

    }

?>