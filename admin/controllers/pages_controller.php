<?php
require_once ('controllers/base_controller.php');
require_once('../models/post.php');

class PagesController extends BaseController
{
    function __construct()
    {
        $this->folder = 'pages';
    }
 

    public function home()
    {
        $data = array(
            'titlePage' => 'AW',
        );
        $this->render('home', $data);
    }

    public function error()
    {
        $this->render('error');
    }

}
