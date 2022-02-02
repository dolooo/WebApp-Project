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
    public function addSuitcase() {
        $this->render('addSuitcase');
    }
    public function addEvent() {
        $this->render('addEvent');
    }
    public function suitcases() {
        $this->render('suitcases');
    }
    public function settings() {
        $this->render('settings');
    }
    public function stylizations() {
        $this->render('stylizations');
    }
}