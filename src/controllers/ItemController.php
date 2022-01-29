<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Item.php';
require_once __DIR__ . '/../repository/ItemRepository.php';

class ItemController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
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
        $items = $this->itemRepository->getItems();
        $this->render('wardrobe', ['items' => $items]);
    }

    public function stylizations()
    {
        $topItems = $this->itemRepository->getItemsByType("gora");
        $bottomItems = $this->itemRepository->getItemsByType("dol");
        $footwear = $this->itemRepository->getItemsByType("obuwie");
        $accessories = $this->itemRepository->getItemsByType("akcesoria");
        $stylizations = $this->itemRepository->getStylizations();

        $this->render('stylizations', ['stylizations' => $stylizations , 'topItems' => $topItems,
            'bottomItems' => $bottomItems, 'footwear' => $footwear, 'accessories' => $accessories]);
    }

    public function home()
    {
        $items = $this->itemRepository->getItems();
        $stylizations = $this->itemRepository->getStylizations();
        $this->render('home', ['items' => $items, 'stylizations' => $stylizations]);
    }

    public function addStylization()
    {
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
                'stylizations' => $this->itemRepository->getStylizations()
            ]);
        }

        $this->render('addStylization', ['topItems' => $topItems, 'bottomItems' => $bottomItems,
            'footwear' => $footwear, 'accessories' => $accessories]);
    }

    public function addItem(){
        if ($this->isPost() && is_uploaded_file($_FILES['zdjecie']['tmp_name']) && $this->validate($_FILES['zdjecie'])) {
            move_uploaded_file(
                $_FILES['zdjecie']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['zdjecie']['name']
            );

            $item = new Item($_POST['kategoria'], $_FILES['zdjecie']['name'], $_POST['marka'],
                $_POST['rozmiar'], $_POST['kolor'], $_POST['opis']);
            $this->itemRepository->addItem($item);

            return $this->render('wardrobe', [
                'messages' => $this->message,
                'items' => $this->itemRepository->getItems()
            ]);
        }
        return $this->render('addItem', ['messages'=>$this->messages]);
    }

    private function validate(array $zdjecie) : bool
    {
        if($zdjecie['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'Plik jest za duży';
            return false;
        }
        if(!isset($zdjecie['type']) && !in_array($zdjecie['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'Typ pliku nie jest obsługiwany';
            return false;
        }
        return true;
    }

    public function search() {

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->itemRepository->getItemsBySearchString($decoded['search']));
        }
    }

    public function filter() {

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->itemRepository->getItemsByCategory($decoded['filter']));
        }
    }

    public function delete() {

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->itemRepository->deleteItem($decoded['search']));
        }
    }
}