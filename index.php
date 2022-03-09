<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('home', 'ItemController');
Routing::post('addItem', 'ItemController');
Routing::get('addStylization', 'ItemController');
Routing::get('addSuitcase', 'DefaultController');
Routing::get('addEvent', 'DefaultController');
Routing::get('suitcases', 'DefaultController');
Routing::get('settings', 'DefaultController');
Routing::get('stylizations', 'DefaultController');
Routing::get('wardrobe', 'ItemController');
Routing::post('register', 'SecurityController');
Routing::post('login', 'SecurityController');
Routing::post('search', 'ItemController');

Routing::run($path);