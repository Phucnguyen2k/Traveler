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
        $posts = Post::all();
        $data = array(
            'post' => $post,
            'posts' => $posts
        );
        $this->render('details', $data);
    }
}
