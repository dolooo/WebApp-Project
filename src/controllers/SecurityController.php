<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $user = $this->userRepository->getUser($email);

        if(!$user) {
            return $this->render('login', ['messages' => ['Użytkownik nie istnieje']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['Nieprawidłowy adres email']]);
        }
        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Nieprawidłowe hasło']]);
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Wpisz poprawne hasło']]);
        }

        $user = new User($email, md5($password), $name, $surname);
        $user->setPhone($phone);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['Rejestracja przebiegła pomyślnie!']]);
    }
}