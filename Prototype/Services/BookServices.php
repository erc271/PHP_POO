<?php

require "../DataAccess/BookDAO.php";

class BookService
{
    private $bookDAO;

    public function __construct()
    {
        $this->bookDAO = new BookDAO();
    }

    public function getBooks()
    {
        return $this->bookDAO->getBooks();
    }

    public function addBook($book)
    {
        $this->bookDAO->addBook($book);
    }

   public function deleteBook($id){
    return $this->bookDAO->deleteBook($id);

   }

   
}
?>
