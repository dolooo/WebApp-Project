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

    public function home()
    {
        $items = $this->itemRepository->getItems();
        $this->render('home', ['items' => $items]);
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

            return $this->render('items', [
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
}