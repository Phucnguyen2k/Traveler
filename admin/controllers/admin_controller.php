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
        $categories = Category::categoriesTag();
     
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

    //TODO: Edit Post
    public function editPost()
    {
        $id = $_GET["id"];
        $post = Post::get($id);
        $member = Member::get($post->createdby);
        $members = Member::all();
        $categories = category::all();
     
        
        $data = array(
            'post' => $post,
            'member' => $member,
            'members' => $members,
            'categories' => $categories
        );
        $this->render('editPost', $data, false, true);
    }
   
    //FIXME: Add Category
    public function addCategory()
    {
        $title = $_POST["title"];
        // category::add($id);
        $data = array(
            'title' => $title
        );
        $this->render('addCate',$data, false, true);
    }
    // public function edit() 
    // {
    //     $id = $_GET["id"];
    //     echo $id;
    //     $post = Post::get($id);
    //     echo '<pre>';
    //     print_r($post);
    //     echo '</pre>';
    //     // $data = array(
    //     //     'posts' => $posts
    //     // );
    //     $this->render('edit',$data = [],false,true);
    // }
}
