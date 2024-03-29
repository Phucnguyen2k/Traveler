<?php
require_once ('controllers/base_controller.php');
require_once ('models/post.php');

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
    public function details()
    {
        $id = $_GET["id"];
        $post = Post::get($id);
        $data = array('post' => $post);
        $this->render('details', $data);
    }
}
