<?php

require "../Services/BookServices.php";
require "../Entity/Book.php";

class BookPresentation
{
    private $bookService;

    public function __construct()
    {
        $this->bookService = new BookService();
    }

    public function viewBooks()
    {
        echo "\nViewing the list of Books\n";
        $books = $this->bookService->getBooks();

        if (!empty($books)) {
            foreach ($books as $book) {
                echo "ID: " . $book->getId() . "\n";
                echo "Title: " . $book->getTitle() . "\n";
                echo "ISBN: " . $book->getIsbn() . "\n";
                echo "---------------------------------\n";
            }
        } else {
            echo "No books available\n";
        }
        echo "---------------------------------\n\n";
    }

    public function addBook()
    {
        echo "\nAdding a new book\n";
        $title = askQuestion("Enter the title: ");
        $isbn = askQuestion("Enter the ISBN: ");

        $new_book = new Book($title, $isbn);
        $this->bookService->addBook($new_book);
        echo "Book added successfully\n";
    }

    public function deleteBook()
    {
        echo "\nDeleting a book\n";
        $id = askQuestion("Enter the ID of the book to delete: ");

        if ($this->bookService->deleteBook($id)) {
            echo "Book deleted successfully\n";
        } else {
            echo "Book not found\n";
        }
    }
}
?>
