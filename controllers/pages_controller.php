<?php
require_once ('controllers/base_controller.php');
require_once ('models/post.php');
require_once ('models/home.php');

// require_once ('controllers/post_controller.php');


class PagesController extends BaseController
{
    function __construct()
    {
        $this->folder = 'pages';
    }

    function showPage($page)
    {
        $data = array(
            'titlePage' => $page,
            'header' => $page
        );
        $this->render($page, $data);
    }
    public function home()
    {
        $posts = Post::getRecent();
        $authors = Author::all();
        $movies = CategoryMovie::all();
        $lightnovels = LightNovel::all();
        $data = array(
            'titlePage' => 'AW',
            'posts' => $posts,
            'authors' => $authors,
            'movies' => $movies,
            'lightnovels' => $lightnovels
        );
        $this->render('home', $data);
    }

    
    public function about()
    {
        $authors = Author::all();

        $data = array(
            'titlePage' => 'about',
            'header' => 'about',
            'authors' => $authors
        );
        $this->render('about', $data);
    }
    public function services()
    {
        $movies = CategoryMovie::all();
        $data = array(
            'titlePage' => 'Anime',
            'header' => 'Anime',
            'movies' => $movies
        );
        $this->render('services', $data);
    }

    public function package()
    { 
        $movies = CategoryMovie::all();
        $lightnovels = LightNovel::all();

        $data = array(
            'titlePage' => 'Light Novel',
            'header' => 'Light Novel',
            'movies' => $movies,
            'lightnovels' => $lightnovels
        );
        $this->render('package', $data);
    }

    public function error()
    {
        $this->showPage('error');
    }
}