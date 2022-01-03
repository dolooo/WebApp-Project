<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class ItemRepository extends Repository
{
    public function getItem(int $id): ?Item
    {
        $statement = $this->database->connect()->prepare('SELECT * FROM items WHERE id = :id ');
            $statement->bindParam(':id',$id, PDO::PARAM_INT);
            $statement->execute();

            $item = $statement->fetch(PDO::FETCH_ASSOC);

            if($item == false) {
                return null;
            }
            return new Item(
                $item['email'],
                $item['password'],
                $item['name'],
                $item['surname']
            );
    }

}