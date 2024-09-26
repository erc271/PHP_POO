<?php

require "../DB/Database.php";

class BookDAO
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getBooks()
    {
        return $this->database->Books;
    }

    public function addBook($book)
    {
        $this->database->Books[] = $book;
        $this->database->saveData();
    }

    public function deleteBook($id)
    {
        foreach ($this->database->Books as $key => $book) {
            if ($book->getId() == $id) {
                unset($this->database->Books[$key]);
                $this->database->Books = array_values($this->database->Books); // Reindex array
                $this->database->saveData();
                return true; 
            }
        }
        return false; 
    }

}
?>
