<?php
class HomeController extends Controller
{
    public function index()
    {
        $this->content=$this->render("backend/views/Home/home.php");
        require_once 'backend/views/layouts/main.php';
    }
}
