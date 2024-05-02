<?php
require_once ('controllers/base_controller.php');
require_once('../models/post.php');

class PostsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'posts';
    }

    public function home()
    {
        $posts = Post::all();
        $data = array('posts' => $posts);
        $this->render('home', $data);
    }
    public function add(){
      $posts = Post::all();
      $members = Member::all();
      $categories = category::all();
   
      $data = array(
          'posts' => $posts,
          'members' => $members,
          'categories' => $categories
      );
      $this->render('add', $data);
    }

    //FIXME: save posts
    public function saveAdd()
    {
        //Thu nhap du lieu tu nguoi dung
        //luu hinh anh
        $target_dir = "../assets/img/posts/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

        $post = new Post(
              null,
              $_POST["title"], 
              $_FILES["picture"]["name"], 
              $_POST["content"], 
              $_POST["categoryid"], 
              date('Y-m-d'), 
              1
          );
 
      //  //Lưu và database
       Post::saveNew($post);
      //   //Điều hướng tới danh sách tin tức
        header("location: index.php?controller=posts");
    }
      public function editPost(){
        $id = $_GET["id"];
        $post = Post::get($id);  
        $data = array('post'=> $post);
        $this->render('edit', $data);
      }
      
      //FIXME: save posts
      public function save(){

      }
      public function saveNew(){
        //Thu nhap du lieu tu nguoi dung
        //luu hinh anh
        $target_dir = "../assets/img/posts/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

        $post = new Post(
              $_POST["id"], 
              $_POST["title"], 
              $_FILES["picture"]["name"], 
              $_POST["content"], 
              $_POST["categoryid"], 
              date('Y-m-d'), 
              1
          );
       //Lưu và database
       Post::saveNew($post);
        //Điều hướng tới danh sách tin tức
        header("location: index.php?controller=posts");
      }
    
      public function saveUpdate(){

        //lay tham so tu form
        $post = new Post($_POST["id"], $_POST["title"], $_FILES["picture"]["name"], $_POST["content"], $_POST["categoryid"], date('Y-m-d'), 1);
       
        $target_dir = "../assets/img/posts/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
    
        $post = new Post(
              $_POST["id"], 
              $_POST["title"], 
              $_FILES["picture"]["name"], 
              $_POST["content"], 
              $_POST["categoryid"], 
              date('Y-m-d'), 
              1
          );

        Post::saveNew($post);
        //Điều hướng tới danh sách tin tức
        header("location: index.php?controller=posts");
      }

      public function edit()
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
        $this->render('edit', $data);
    }
      public function delete(){
        $id = $_GET["id"];//lay tham so tu duong dan tren trinh duyet
        Post::delete($id);
        header("location: index.php?controller=posts");
      }
}
