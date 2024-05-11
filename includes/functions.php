<?php

//Config Web host
define('_WEB_HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/index.php');
define('_WEB_HOST_TEMPLATES', _WEB_HOST . '/views/layouts/layoutPart');

//config part
define('_WEB_PART', __DIR__);
define('_WEB_PART_TEMPLATES', __DIR__ . '\views');

