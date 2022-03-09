<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $statement = $this->database->connect()->prepare('SELECT * FROM users WHERE email = :email');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        $_SESSION["userId"] = $user['id'];
        $_SESSION["zalogowany"]='1';

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }

    public function addUser(User $user)
    {
        $statement = $this->database->connect()->prepare('
            INSERT INTO users (name, surname, phone, email, password)
            VALUES (?, ?, ?, ?, ?)
        ');

        $statement->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getPhone(),
            $user->getEmail(),
            $user->getPassword(),
        ]);
    }

}