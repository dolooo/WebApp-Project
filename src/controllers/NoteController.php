<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Note.php';
require_once __DIR__ . '/../repository/NoteRepository.php';

class NoteController extends AppController
{
    private $messages = [];
    private $noteRepository;

    public function __construct()
    {
        parent::__construct();
        $this->noteRepository = new NoteRepository();
    }

    public function notes()
    {
        $notes = $this->noteRepository->getNotes();
        $this->render('notes', ['notes' => $notes]);
    }

    public function addNote(){
        if ($this->isPost()) {
            $note = new Note($_POST['text']);
            $this->noteRepository->addNote($note);

            return $this->render('notes', [
                'messages' => $this->message,
                'notes' => $this->noteRepository->getNotes()
            ]);
        }
        return $this->render('addItem', ['messages'=>$this->messages]);
    }
}