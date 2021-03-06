<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Item.php';
require_once __DIR__ . '/../repository/ItemRepository.php';

class ItemController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $itemRepository;

    public function __construct()
    {
        parent::__construct();
        $this->itemRepository = new ItemRepository();
    }

    public function wardrobe()
    {
        session_start();
        if ($_SESSION['zalogowany'] == 0) {
            $this->render('login');
        } else {
            $items = $this->itemRepository->getItems();
            $this->render('wardrobe', ['items' => $items]);
        }

    }

    public function stylizations()
    {
        session_start();
        if ($_SESSION['zalogowany'] == 0) {
            $this->render('login');
        } else {
            $topItems = $this->itemRepository->getItemsByType("gora");
            $bottomItems = $this->itemRepository->getItemsByType("dol");
            $footwear = $this->itemRepository->getItemsByType("obuwie");
            $accessories = $this->itemRepository->getItemsByType("akcesoria");
            $stylizations = $this->itemRepository->getStylizations();

            $this->render('stylizations', ['stylizations' => $stylizations, 'topItems' => $topItems,
                'bottomItems' => $bottomItems, 'footwear' => $footwear, 'accessories' => $accessories]);
        }
    }

    public function home()
    {
        session_start();
        if ($_SESSION['zalogowany'] == 0) {
            $this->render('login');
        } else {
            $items = $this->itemRepository->getItems();
            $stylizations = $this->itemRepository->getStylizations();
            $this->render('home', [
                'items' => $this->itemRepository->getItems(),
                'stylizations' => $stylizations,
                'events' => $this->itemRepository->getEvents()
            ]);
        }
    }

    public function addEvent()
    {
        session_start();
        if ($_SESSION['zalogowany'] == 0) {
            $this->render('login');
        } else {
            $items = $this->itemRepository->getItems();
            $stylizations = $this->itemRepository->getStylizations();
            if ($this->isPost()) {
                $event = new Event($_POST['place'], $_POST['date_start'], $_POST['date_end']);
                $this->itemRepository->addEvent($event);
                return $this->render('home', [
                    'messages' => $this->message,
                    'items' => $this->itemRepository->getItems(),
                    'stylizations' => $stylizations,
                    'events' => $this->itemRepository->getEvents()
                ]);
            }
            $this->render('addEvent', ['messages' => $this->messages]);
        }
    }

    public function addSuitcase()
    {
        //TODO adding suitcase
    }

    public function addStylization()
    {
        session_start();
        if ($_SESSION['zalogowany'] == 0) {
            $this->render('login');
        } else {
            $topItems = $this->itemRepository->getItemsByType("gora");
            $bottomItems = $this->itemRepository->getItemsByType("dol");
            $footwear = $this->itemRepository->getItemsByType("obuwie");
            $accessories = $this->itemRepository->getItemsByType("akcesoria");

            if ($this->isPost()) {

                $array[0] = $_POST['top'];
                $array[1] = $_POST['bottom'];
                $array[2] = $_POST['footwear'];
                $array[3] = $_POST['accesories'];
                $array[4] = $_POST['collection'];

                $this->itemRepository->addStylization($array);

                return $this->render('stylizations', [
                    'messages' => $this->message,
                    'stylizations' => $this->itemRepository->getStylizations(),
                    'topItems' => $topItems,
                    'bottomItems' => $bottomItems, 'footwear' => $footwear, 'accessories' => $accessories
                ]);
            }

            $this->render('addStylization', ['topItems' => $topItems, 'bottomItems' => $bottomItems,
                'footwear' => $footwear, 'accessories' => $accessories]);
        }
    }

    public function addItem()
    {
        session_start();
        if ($_SESSION['zalogowany'] == 0) {
            $this->render('login');
        } else {
            if ($this->isPost() && is_uploaded_file($_FILES['zdjecie']['tmp_name']) && $this->validate($_FILES['zdjecie'])) {
                move_uploaded_file(
                    $_FILES['zdjecie']['tmp_name'],
                    dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['zdjecie']['name']
                );

                $item = new Item($_POST['kategoria'], $_FILES['zdjecie']['name'], $_POST['marka'],
                    $_POST['rozmiar'], $_POST['kolor'], $_POST['opis']);
                $this->itemRepository->addItem($item);

                return $this->render('wardrobe', [
                    'messages' => $this->message,
                    'items' => $this->itemRepository->getItems()
                ]);
            }
            return $this->render('addItem', ['messages' => $this->messages]);
        }
    }

    private
    function validate(array $zdjecie): bool
    {
        if ($zdjecie['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'Plik jest za du??y';
            return false;
        }
        if (!isset($zdjecie['type']) && !in_array($zdjecie['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'Typ pliku nie jest obs??ugiwany';
            return false;
        }
        return true;
    }

    public
    function search()
    {

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->itemRepository->getItemsBySearchString($decoded['search']));
        }
    }

    public
    function filter()
    {

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->itemRepository->getItemsByCategory($decoded['filter']));
        }
    }

    public function delete()
    {

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->itemRepository->deleteItem($decoded['item']));
        }
    }

    public function edit()
    {

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->itemRepository->editItem($decoded['file'], $decoded['category'], $decoded['brand'],
                $decoded['size'], $decoded['description']));
        }
    }
}