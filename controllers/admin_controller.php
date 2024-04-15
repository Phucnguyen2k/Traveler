<?php
require_once ('controllers/base_controller.php');
require_once ('models/post.php');
require_once ('models/category.php');


class AdminController extends BaseController
{
    function __construct()
    {
        $this->folder = 'admin';
    }
    public function home()
    {
        $posts = Post::all();
        $data = array(
            'posts' => $posts
        );
        $this->render('home',$data, false, true);
    }
   
    public function edit() 
    {
        $id = $_GET["id"];
        echo $id;
        $post = Post::get($id);
        echo '<pre>';
        print_r($post);
        echo '</pre>';
        // $data = array(
        //     'posts' => $posts
        // );
        $this->render('edit',$data = [],false,true);
    }
}
