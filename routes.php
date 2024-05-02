<?php
$controllers = array(
    'pages' => ['home', 'about', 'services', 'package', 'error'],
    'posts' => ['home', 'details','postByCategory'],
    'admin' => ['home','category','member','addPost','editPost','addCategory', 'edit','deleteMember']
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}

include_once ('controllers/' . $controller . '_controller.php');
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
