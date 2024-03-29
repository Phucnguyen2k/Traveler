<?php

//Config Web host
define('_WEB_HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/traveler/index.php');
define('_WEB_HOST_TEMPLATES', _WEB_HOST . '/views/layouts/layoutPart');

//config part
define('_WEB_PART', __DIR__);
define('_WEB_PART_TEMPLATES', __DIR__ . '\views');

function layoutParts($filename = 'index.php')
{
    require_once ("views\layouts\layoutPart\\$filename.php");
}

function redirect($path = 'index.php')
{

}