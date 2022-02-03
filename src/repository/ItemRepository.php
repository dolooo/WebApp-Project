<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Item.php';
require_once __DIR__ . '/../models/Stylization.php';
require_once __DIR__ . '/../models/Event.php';
require_once __DIR__ . '/../models/Suitcase.php';

class ItemRepository extends Repository
{
    //ITEMS---------------------------------------------------------------------

    public function getItem(string $file): ?Item
    {
        session_start();
        $statement = $this->database->connect()->prepare(
            'SELECT * FROM items WHERE file = :file AND id_assigned_by = :id ');
        $statement->bindParam(':file', $file, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $item = $statement->fetch(PDO::FETCH_ASSOC);

        if ($item == false) return null;

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
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

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
            DELETE FROM items WHERE id_assigned_by = ? AND FILE = ?');

        $statement->execute([
            $_SESSION["userId"],
            $file
        ]);

        $statement = $this->database->connect()->prepare('
            DELETE FROM stylizations WHERE id_assigned_by = ? AND 
            (UP = ? OR BOTTOM = ? OR FOOTWEAR = ? OR ACCESSORIES = ?)');

        $statement->execute([
            $_SESSION["userId"],
            $file,
            $file,
            $file,
            $file
        ]);
        return $this->getItems();
    }

    public function getItems(): array
    {
        session_start();

        $result = [];

        $statement = $this->database->connect()->prepare('SELECT * FROM items ORDER BY id');
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

        $stmt = $this->database->connect()->prepare('SELECT * FROM items WHERE type=:type ORDER BY id');
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

    public function getItemsBySearchString(string $searchString)
    {
        session_start();
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM items WHERE (LOWER(category) LIKE :search 
            OR LOWER(brand) LIKE :search OR LOWER(description) LIKE :search 
                                           OR LOWER(color) LIKE :search) AND id_assigned_by = :id');
        $stmt->bindParam(':search', $searchString);
        $stmt->bindParam(':id', $_SESSION["userId"], PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItemsByCategory(string $category)
    {
        session_start();
        $category = '%' . strtolower($category) . '%';
        if (is_null($category)) {
            $this->getItems();
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

    //EVENTS---------------------------------------------------------------------

    public function addEvent(Event $event)
    {
        session_start();
        $statement = $this->database->connect()->prepare('
            INSERT INTO events (place, date_start, date_end, id_assigned_by)
            VALUES (?, ?, ?, ?)');

        $statement->execute([
            $event->getPlace(),
            $event->getStartDate(),
            $event->getEndDate(),
            $_SESSION["userId"]
        ]);
    }


    public function getEvents(): array
    {
        session_start();
        $result = [];

        $stmt = $this->database->connect()->prepare('SELECT * FROM events WHERE id_assigned_by = :id 
            ORDER BY date_start DESC');
        $stmt->bindParam(':id', $_SESSION["userId"], PDO::PARAM_INT);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($events as $event) {
            if ($event['id_assigned_by'] == $_SESSION["userId"]) {
                $result[] = new Event(
                    $event['place'],
                    $event['date_start'],
                    $event['date_end']
                );
            }
        }
        return $result;
    }

    //STYLIZATIONS---------------------------------------------------------------------

    public function getStylizations(): array
    {
        session_start();

        $result = [];

        $stmt = $this->database->connect()->prepare('SELECT * FROM stylizations WHERE id_assigned_by = :id 
        ORDER BY id_stylization');
        $stmt->bindParam(':id', $_SESSION["userId"], PDO::PARAM_INT);
        $stmt->execute();
        $stylizations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($stylizations as $stylization) {
                $result[] = new Stylization(
                    $stylization['up'],
                    $stylization['bottom'],
                    $stylization['footwear'],
                    $stylization['accessories'],
                    $stylization['collection']
                );
        }
        return $result;
    }

    public function getStylizationsByCollection($collection): array
    {
        session_start();
        $result = [];

        $stmt = $this->database->connect()->prepare('SELECT * FROM stylizations WHERE collection = :collection 
            AND id_assigned_by = :id ORDER BY id_stylization');
        $stmt->bindParam(':collection', $collection);
        $stmt->bindParam(':id', $_SESSION["userId"], PDO::PARAM_INT);
        $stmt->execute();
        $stylizations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($stylizations as $stylization) {
                $result[] = new Stylization(
                    $stylization['up'],
                    $stylization['bottom'],
                    $stylization['footwear'],
                    $stylization['accessories'],
                    $stylization['collection']
                );
        }
        return $result;
    }

    public function addStylization(array $arr)
    {
        session_start();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO stylizations (id_assigned_by, up, bottom, footwear, accessories, collection)
            VALUES (?, ?, ?, ?, ?, ?)');

        $stmt->execute([
            $_SESSION["userId"],
            $arr[0],
            $arr[1],
            $arr[2],
            $arr[3],
            $arr[4]
        ]);
    }
}
