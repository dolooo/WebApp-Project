<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('home', 'ItemController');
Routing::post('addItem', 'ItemController');
Routing::get('addStylization', 'ItemController');
Routing::get('addSuitcase', 'DefaultController');
Routing::get('addEvent', 'ItemController');
Routing::get('suitcases', 'DefaultController');
Routing::get('settings', 'DefaultController');
Routing::get('stylizations', 'ItemController');
Routing::get('wardrobe', 'ItemController');
Routing::post('register', 'SecurityController');
Routing::post('login', 'SecurityController');
Routing::post('search', 'ItemController');
Routing::post('filter', 'ItemController');
Routing::post('delete', 'ItemController');
Routing::post('edit', 'ItemController');
Routing::post('notes', 'NoteController');
Routing::post('addNote', 'NoteController');

Routing::run($path);