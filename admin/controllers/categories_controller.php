<?php
require_once ('controllers/base_controller.php');
require_once('../models/category.php');

class CategoriesController extends BaseController
{
    function __construct()
    {
        $this->folder = 'categories';
    }

    // public function home()
    // {
    //     $posts = Category::all();
    //     $data = array('posts' => $posts);
    //     $this->render('home', $data);
    // }
    public function home()
    {
   
        $categories = Category::all();
     
        $data = array(
            'categories' => $categories
        );
        $this->render('home',$data);
    }
    public function add()
    {
        $title = $_POST["title"];
        category::add($title);
        header("location:?controller=categories&action=home");
    }

    public function edit()
    {
        $id = $_GET["id"];
        $category = Category::get($id);
        $data = array(
            'category' => $category
        );
        $this->render('edit',$data);
    }

    public function save()
    {
        $category = new Category(
            $_POST["id"], 
            $_POST["title"], 
        );
      
     //Lưu và database
     Category::save($category);
      //Điều hướng tới danh sách tin tức
      header("location: index.php?controller=categories");
    }
  
    public function delete(){
        $id = $_GET["id"];//lay tham so tu duong dan tren trinh duyet
        Category::delete($id);
        header("location: index.php?controller=categories");
    }

}
