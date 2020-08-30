<?php
require_once 'frontend/models/Category.php';
 class CategoryController extends Controller
 {
     public function index()
     {
         $category_model=new Category();
         $categories=$category_model->MenuCategory();
         $this->content=$this->render("frontend/views/category/menuCategory.php",["categories" => $categories]);
         echo $this->content;
     }
     public function category_center()
     {
         $category_model=new Category();
         $categories=$category_model->MenuCategory();
         $this->content=$this->render("frontend/views/category/Category_Center.php",["categories" => $categories]);
         echo $this->content;
     }
 }