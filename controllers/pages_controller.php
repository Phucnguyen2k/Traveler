<?php
require_once ('controllers/base_controller.php');
require_once ('models/post.php');

// require_once ('controllers/post_controller.php');


class PagesController extends BaseController
{
    function __construct()
    {
        $this->folder = 'pages';
    }

    public function home()
    {
        $posts = Post::getRecent();
        $data = array(
            'titlePage' => 'AW',
            'posts' => $posts
        );
        $this->render('home', $data);
    }

    
    public function about()
    {
        $this->showPage('about');
    }
    public function services()
    {
        $this->showPage('services');
    }

    public function package()
    {
        $this->showPage('package');
    }

    public function error()
    {
        $this->showPage('error');
    }
}
