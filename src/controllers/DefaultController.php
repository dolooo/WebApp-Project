<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function login() {
        $this->render('login');
    }
    public function register() {
        $this->render('register');
    }
    public function home() {
        $this->render('home');
    }
    public function addItem() {
        $this->render('addItem');
    }
    public function addStylization() {
        $this->render('addStylization');
    }
    public function community() {
        $this->render('community');
    }
    public function settings() {
        $this->render('settings');
    }
    public function store() {
        $this->render('store');
    }
    public function wardrobe() {
        $this->render('wardrobe');
    }
}