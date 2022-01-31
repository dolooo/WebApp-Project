<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Item.php';
require_once __DIR__ . '/../models/Stylization.php';

class ItemRepository extends Repository
{
    public function getItem(int $id): ?Item
    {
        $statement = $this->database->connect()->prepare('SELECT * FROM items WHERE id = :id ');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $item = $statement->fetch(PDO::FETCH_ASSOC);

        if ($item == false) {
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

    public function deleteItem(string $file): array
    {
        session_start();

        $statement = $this->database->connect()->prepare('
            DELETE FROM items WHERE id_assigned_by = ? AND FILE = ?
        ');

        $statement->execute([
            $_SESSION["userId"],
            $file
        ]);

        $statement = $this->database->connect()->prepare('
            DELETE FROM stylizations WHERE id_assigned_by = ? AND (UP = ? OR BOTTOM = ? OR FOOTWEAR = ? OR ACCESSORIES = ?)
        ');

        $statement->execute([
            $_SESSION["userId"],
            $file,
            $file,
            $file,
            $file
        ]);
        return $this->getItems();
    }

    public function addStylization(array $arr)
    {
        session_start();
        $statement = $this->database->connect()->prepare('
            INSERT INTO stylizations (id_assigned_by, up, bottom, footwear, accessories, collection)
            VALUES (?, ?, ?, ?, ?, ?)');

        $statement->execute([
            $_SESSION["userId"],
            $arr[0],
            $arr[1],
            $arr[2],
            $arr[3],
            $arr[4]

        ]);

    }

    public function getItems(): array
    {
        session_start();

        $result = [];

        $statement = $this->database->connect()->prepare('SELECT * FROM items');
        $statement->execute();
        $items = $statement->fetchAll(PDO::FETCH_ASSOC);
        sort($items);

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

    public function getStylizations(): array
    {
        session_start();

        $result = [];

        $statement = $this->database->connect()->prepare('SELECT * FROM stylizations');
        $statement->execute();
        $stylizations = $statement->fetchAll(PDO::FETCH_ASSOC);
        sort($stylizations);

        foreach ($stylizations as $stylization) {
            if ($stylization['id_assigned_by'] == $_SESSION["userId"]) {
                $result[] = new Stylization(
                    $stylization['up'],
                    $stylization['bottom'],
                    $stylization['footwear'],
                    $stylization['accessories'],
                    $stylization['collection']
                );
            }
        }
        return $result;
    }

    public function getStylizationsByCollecton($collection): array
    {
        session_start();

        $result = [];
        $stmt = $this->database->connect()->prepare('SELECT * FROM stylizations WHERE colletion = :collection');
        $stmt->bindParam(':collection', $collection);
        $stmt->execute();
        $stylizations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        sort($stylizations);

        foreach ($stylizations as $stylization) {
            if ($stylization['id_assigned_by'] == $_SESSION["userId"]) {
                $result[] = new Stylization(
                    $stylization['up'],
                    $stylization['bottom'],
                    $stylization['footwear'],
                    $stylization['accessories'],
                    $stylization['collection']
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
        sort($items);

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

    public function getItemsBySearchString(string $searchString)
    {
        session_start();

        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM items WHERE (LOWER(category) LIKE :search 
            OR LOWER(brand) LIKE :search OR LOWER(description) LIKE :search) AND id_assigned_by = :id');
        $stmt->bindParam(':search', $searchString);
        $stmt->bindParam(':id', $_SESSION["userId"], PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getItemsByCategory(string $category): array
    {
        session_start();

        $category = '%' . strtolower($category) . '%';
        if (is_null($category)) {
            $stmt = $this->database->connect()->prepare('SELECT * FROM items WHERE id_assigned_by = :id');
            $stmt->bindParam(':id', $_SESSION["userId"], PDO::PARAM_INT);
            $stmt->execute();
            return array_reverse($stmt->fetchAll(PDO::FETCH_ASSOC));
        } else {
            $stmt = $this->database->connect()->prepare('
            SELECT * FROM items WHERE LOWER(category) LIKE :search 
             AND id_assigned_by = :id');
            $stmt->bindParam(':search', $category);
            $stmt->bindParam(':id', $_SESSION["userId"], PDO::PARAM_INT);
            $stmt->execute();

            return array_reverse($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
    }

}
