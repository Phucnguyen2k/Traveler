<?php
require_once ('controllers/base_controller.php');
require_once ('models/post.php');
require_once ('models/category.php');


class PostsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'posts';
    }

    public function home()
    {
        $page = 1;
        if(isset($_GET["page"])){
          $page=$_GET["page"];
        }
        
        $posts = Post::allHome($page);
        $total = Post::Total();

        $postRecent = Post::getRecent();
        $tags = Category::categoriesTag();
        $filter = Category::filter();
        $data = array(
                    'posts' => $posts,
                    'total' => $total,
                    'postRecent' => $postRecent,
                    'tags' => $tags,
                    );
        $this->render('home', $data);
    }
    public function postByCategory()
    {
        $id = $_GET["id"];
        $posts = Post::allPostByCate($id);
        $postRecent = Post::getRecent();
        $tags = Category::categoriesTag();
        $category = Category::get($id);

            $data = array(
            'posts' => $posts,
            'postRecent' => $postRecent,
            'tags' => $tags,
            'category' => $category
        );
        $this->render('home', $data);
    }

    public function details()
    {
        $id = $_GET["id"];
        $post = Post::get($id);
        
        $posts = Post::getRecent();
        $tags = Category::categoriesTag();
        $member = Member::get($post->createdby);

        $data = array(
            'post' => $post,
            'posts' => $posts,
            'tags' => $tags,
            'member' => $member,
            'titlePage' => $post->title
        );
        $this->render('details', $data);
    }
}
