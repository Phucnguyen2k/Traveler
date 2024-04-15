<?php
class BaseController
{
    protected $folder;

    function render($file, $data = [], $headerNav = false, $admin = false)
    {
        $view_file = 'views/' . $this->folder . '/' . $file . '.php';
        if (is_file($view_file)) {
            extract($data);
            ob_start();
            require_once ($view_file);
            $content = ob_get_clean();
            
            if ($admin == false) {
                require_once ('views/layouts/application.php');
                if ($headerNav) {
                    require_once ('views/layouts/layoutPart/headerNav.php');
                }
            } else {
                require_once ('views/admin/header.php');
            }
        } else {
            header('Location: index.php?controller=pages&action=error');
        }
    }
}