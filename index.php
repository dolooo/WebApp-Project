<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('home', 'DefaultController');
Routing::post('addItem', 'ProjectController');
Routing::get('addStylization', 'DefaultController');
Routing::get('community', 'DefaultController');
Routing::get('settings', 'DefaultController');
Routing::get('store', 'DefaultController');
Routing::get('wardrobe', 'DefaultController');
//Routing::post('register', 'SecurityController');
Routing::post('login', 'SecurityController');

Routing::run($path);