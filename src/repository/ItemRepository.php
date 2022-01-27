<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Item.php';

class ItemRepository extends Repository {
    public function getItem(int $id): ?Item {
        $statement = $this->database->connect()->prepare('SELECT * FROM items WHERE id = :id ');
            $statement->bindParam(':id',$id, PDO::PARAM_INT);
            $statement->execute();

            $item = $statement->fetch(PDO::FETCH_ASSOC);

            if($item == false) {
                return null;
            }
            return new Item(
                $item['category'],
                $item['file'],
                $item['brand'],
                $item['size'],
                $item['color'],
                $item['description']
            );
    }

    public function addItem(Item $item)
    {
        session_start();

        $statement = $this->database->connect()->prepare('
            INSERT INTO items (category, file, brand, size, color, description, id_assigned_by, type)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $statement->execute([
            $item->getCategory(),
            $item->getFile(),
            $item->getBrand(),
            $item->getSize(),
            $item->getColor(),
            $item->getDescription(),
            $_SESSION["userId"],
            $item->getType()
        ]);
    }

    public function addStylization(array $arr)
    {
        session_start();
        foreach ($arr as $itemInStylization) {
            $statement = $this->database->connect()->prepare('
            INSERT INTO stylizations s (s.id_assigned_by) LEFT JOIN stylizations_items si 
                (si.id_stylization, si.id_item)
            VALUES (?, ?, ?)');

            $statement->execute([
                $_SESSION["userId"],

            ]);
        }
    }

    public function getItems(): array
    {
        session_start();

        $result = [];

        $statement = $this->database->connect()->prepare('SELECT * FROM items');
        $statement->execute();
        $items = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($items as $item) {
            if ($item['id_assigned_by'] == $_SESSION["userId"]) {
                $result[] = new Item(
                    $item['category'],
                    $item['file'],
                    $item['brand'],
                    $item['size'],
                    $item['color'],
                    $item['description']
                );
            }
        }

        return $result;
    }

    public function getItemsByType($type): array
    {
        session_start();

        $result = [];

        $stmt = $this->database->connect()->prepare('SELECT * FROM items WHERE type=:type');
        $stmt->bindParam(':type', $type);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($items as $item) {
            if ($item['id_assigned_by'] == $_SESSION["userId"]) {
                $result[] = new Item(
                    $item['category'],
                    $item['file'],
                    $item['brand'],
                    $item['size'],
                    $item['color'],
                    $item['description']
                );
            }
        }

        return $result;
    }

    public function getItemsByCategory(string $searchString)
    {
        session_start();

        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM items WHERE LOWER(category) LIKE :search 
            OR LOWER(brand) LIKE :search OR LOWER(description) LIKE :search AND id_assigned_by = :id');
        $stmt->bindParam(':search', $searchString);
        $stmt->bindParam(':id', $_SESSION["userId"], PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}