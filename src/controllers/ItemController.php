<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Item.php';

class ItemController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function addItem(){
        if ($this->isPost() && is_uploaded_file($_FILES['zdjecie']['tmp_name']) && $this->validate($_FILES['zdjecie'])) {
            move_uploaded_file(
                $_FILES['zdjecie']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['zdjecie']['name']
            );

            $item = new Item($_POST['kategoria'], $_POST['kolor'], $_POST['marka'], $_POST['rozmiar'],
                $_POST['tagi'], $_FILES['zdjecie']['name'], $_POST['opis']);

            return $this->render('wardrobe', ['messages'=>$this->messages, 'item'=>$item]);
        }
        $this->render('addItem', ['messages'=>$this->messages]);
    }

    private function validate(array $zdjecie) : bool
    {
        if($zdjecie['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'Plik jest za duzy';
            return false;
        }
        if(!isset($zdjecie['type']) && !in_array($zdjecie['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'Typ pliku nie jest obslugiwany';
            return false;
        }
        return true;
    }
}