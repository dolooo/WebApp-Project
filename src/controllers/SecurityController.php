<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';

class SecurityController extends AppController
{
    public function login()
    {
        $user = new User('johnsnow@gmail.com', 'abc', 'John', 'Snow');

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['Użytkownik o podanym emailu nie istnieje']]);
        }
        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Nieprawidłowe hasło']]);
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }
}