<?php
require_once ('controllers/base_controller.php');
require_once ('models/post.php');
require_once ('models/category.php');
require_once ('models/member.php');


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
    public function category()
    {
        $categories = category::all();
     
        $data = array(
            'categories' => $categories
        );
        $this->render('category',$data, false, true);
    }

    public function member()
    {

        $members = Member::all();
     
        $data = array(
            'members' => $members
        );
        $this->render('member',$data, false, true);
    }
    
    public function addPost()
    {
        $posts = Post::all();
        $members = Member::all();
        $categories = category::all();
     
        $data = array(
            'posts' => $posts,
            'members' => $members,
            'categories' => $categories
        );
        $this->render('addPosts', $data, false, true);
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
