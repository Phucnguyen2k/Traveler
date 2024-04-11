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
    // public function posts()
    // {
    //     $posts = Post::all();
    //     $data = array('home' => $posts);
    //     $this->render('home', $data);
    // }

    public function home()
    {
        $posts = Post::all();
        $data = array(
            'titlePage' => 'Home',
            'posts' => $posts
        );
        $this->render('home', $data, false);
    }
    public function about()
    {
        $data = array(
            'titlePage' => 'About',
            'header' => 'ABOUT'
        );
        $this->render('about', $data, true);
    }
    public function services()
    {
        $data = array(
            'titlePage' => 'Services',
            'header' => 'SERVICES'
        );
        $this->render('services', $data, true);
    }

    public function package()
    {
        $data = array(
            'titlePage' => 'package',
            'header' => 'PACKAGE'
        );
        $this->render('package', $data, true);
    }

    public function contact()
    {
    }

    public function error()
    {
        $this->render('error');
    }

}
