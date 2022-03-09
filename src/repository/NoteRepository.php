<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Note.php';

class NoteRepository extends Repository {
    public function getNote(int $id): ?Note {
        $statement = $this->database->connect()->prepare('SELECT * FROM notes WHERE id = :id ');
            $statement->bindParam(':id',$id, PDO::PARAM_INT);
            $statement->execute();

            $note = $statement->fetch(PDO::FETCH_ASSOC);

            if($note == false) {
                return null;
            }
            return new Note($note['text']);
    }

    public function addNote(Note $note)
    {
        session_start();

        $statement = $this->database->connect()->prepare('INSERT INTO notes 
                                    (text, id_assigned_by) 
                                    VALUES (?,?)');

        $statement->execute([
            $note->getText(),
            $_SESSION["userId"]
        ]);
    }

    public function getNotes(): array
    {
        session_start();

        $result = [];

        $statement = $this->database->connect()->prepare('SELECT * FROM notes');
        $statement->execute();
        $notes = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($notes as $note) {
            if ($note['id_assigned_by'] == $_SESSION["userId"]) {
                $result[] = new Note(
                    $note['text']
                );
            }
        }

        return $result;
    }

}