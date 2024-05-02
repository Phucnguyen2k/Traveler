<?php
$controllers = array(
  'pages' => ['home', 'error'],
  'posts' => ['home', 'add','saveAdd', 'saveNew', 'delete', 'edit', 'saveUpdate'],
  'categories' => ['home','add','save','edit','delete'],
); 

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'posts';
  $action = 'error';
}

include_once('controllers/' . $controller . '_controller.php');
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();