<?php
$controllers = array(
  'posts' => ['home','error', 'add','saveAdd', 'saveNew', 'delete', 'edit', 'saveUpdate'],
  'categories' => ['home','add','save','edit','delete'],
  'members' => ['home','add','save','saveAdd','saveUpdate','edit','delete'],
); 

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'posts';
  $action = 'error';
}

include_once('controllers/' . $controller . '_controller.php');
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();