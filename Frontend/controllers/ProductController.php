<?php
    require_once 'frontend/models/Product.php';
    require_once 'frontend/models/Category.php';
    require_once 'frontend/models/Rating.php';
    require_once 'frontend/models/ProductCategory.php';
//
    class ProductController extends  Controller
    {
        public function index()
        {
            $product_model=new Product();
            $products=$product_model->AllProductHome();
            $this->content=$this->render("frontend/views/products/Products_home.php",
                ["products" => $products]);
         echo $this->content;
        }
//
        public function showAll()
        {
            $params=[];
            if(isset($_POST['filter'])) {
                $str_producer_id='';
                $str_price='';
                if(isset($_POST["producer"]))
                {
                    $str_producer_id=implode(",",$_POST['producer']);
                    $str_producer_id="($str_producer_id)";
                    $str_producer_id="products.producer_id IN $str_producer_id";
                    $params["str_producer_id"] =$str_producer_id;
                }
                if(isset($_POST["price"]))
                {
                    foreach ($_POST["price"] as $price)
                    {
                        switch ($price)
                        {
                            case 1:
                                $str_price .= " OR (products.price < 2000000) ";
                                break;
                            case 2:
                                $str_price .= " OR (products.price BETWEEN 2000000 AND 4000000) ";
                                break;
                            case 3 :
                                $str_price .= " OR (products.price BETWEEN 4000000 AND 10000000) ";
                                break;
                            case 4 :
                                $str_price .= " OR (products.price > 10000000) ";
                                break;
                        }
                    }
                    $str_price=substr($str_price,3);
                    $str_price="($str_price)";
                    $params["str_price"]=$str_price;
                }
            }
            $page = isset($_GET["page"])&&is_numeric($_GET["page"]) ? $_GET["page"] : 1;
            $pageSize = 9;
            $product_model=new Product();
            $countProduct=$product_model->countTotal($params);
            $numPage=ceil($countProduct/$pageSize);
            $products=$product_model->Show_All($pageSize,$page,$params);
            $this->content=$this->render('frontend/views/products/show_all.php',
                ["products" => $products,
                  "numPage" => $numPage,
                  "page" => $page,
                ]);
            require_once 'frontend/views/layouts/main_center.php';
        }
//
        public function ProductCategory()
        {
            $id=$_GET["id"];
            $params=[];
            if(isset($_POST['filter'])) {
                $str_producer_id='';
                $str_price='';
                if(isset($_POST["producer"]))
                {
                    $str_producer_id=implode(",",$_POST['producer']);
                    $str_producer_id="($str_producer_id)";
                    $str_producer_id="products.producer_id IN $str_producer_id";
                    $params["str_producer_id"] =$str_producer_id;
                }
                if(isset($_POST["price"]))
                {
                    foreach ($_POST["price"] as $price)
                    {
                        switch ($price)
                        {
                            case 1:
                                $str_price .= " OR (products.price < 2000000) ";
                                break;
                            case 2:
                                $str_price .= " OR (products.price BETWEEN 2000000 AND 4000000) ";
                                break;
                            case 3 :
                                $str_price .= " OR (products.price BETWEEN 4000000 AND 10000000) ";
                                break;
                            case 4 :
                                $str_price .= " OR (products.price > 10000000) ";
                                break;
                        }
                    }
                    $str_price=substr($str_price,3);
                    $str_price="($str_price)";
                    $params["str_price"]=$str_price;
                }
            }
            $page = isset($_GET["page"])&&is_numeric($_GET["page"]) ? $_GET["page"] : 1;
            $pageSize = 3;
            $product_category=new ProductCategory();
            $countProduct=$product_category->countTotal($id,$params);
            $numPage=ceil($countProduct/$pageSize);
            $products=$product_category->Show_All($id,$pageSize,$page,$params);
            $category_model=new Category();
            $category=$category_model->getDetail($id);
            $this->content=$this->render('frontend/views/products/product_category.php',
                ["products" => $products,
                    "numPage" => $numPage,
                    "page" => $page,
                    "category" => $category,
                ]);
            require_once 'frontend/views/layouts/main_center.php';
        }
//
        public function detail() {
            $id=$_GET["id"];
            $product_model=new Product();
            $product=$product_model->getById($id);
            $product_images=$product_model->getImages();
            $rating_model=new Rating();
            $ratings=$rating_model->All_Rating($id);
            $this->content =$this->render('frontend/views/products/detail.php',
                [
                    "product" => $product,
                    'product_images' =>$product_images,
                    'ratings' => $ratings
                ]
            );
            require_once 'frontend/views/layouts/main.php';
        }
//
        public function search()
        {
            $search=$_POST["search"];
            $product_model=new Product();
            $products=$product_model->search($search);
            $this->content=$this->render("frontend/views/products/search.php",['products' => $products] );
            echo $this->content;
        }

    }

?>