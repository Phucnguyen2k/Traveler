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

    //complete
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
              $_POST["createdby"]
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
      
      public function saveUpdate(){

        $target_dir = "../assets/img/posts/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
        $picture = $_FILES["picture"]["name"] ? $_FILES["picture"]["name"] : $_POST["old_picture"]; 

        $post = new Post(
              $_POST["id"],
              $_POST["title"], 
              $picture, 
              $_POST["content"], 
              $_POST["categoryid"], 
              date('Y-m-d'), 
              $_POST["member"],
          );
    
        Post::update($post);
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
