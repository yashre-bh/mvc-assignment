<?php

namespace Controller;
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

class BookUpdate{
    public function get()
    {
        \Controller\Utils::loggedInAdmin();
        echo \View\Loader::make()->render("templates/booksDelete.twig", array(
            "books" => \Model\Book::getAllBooks(),
            "msg" => "Delete Selected Books",
        ));
    }
    public function post()
    {
        $data = $_POST["book"];

        for ($i = 0; $i < count($data); $i++) {
            $isbn = $data[$i];
            $row = \Model\Book::deleteBook($isbn);
        }
    }
}

class AddBooks{
    public function get()
    {
        \Controller\Utils::loggedInAdmin();
        echo \View\Loader::make()->render("templates/addBooks.twig", array(
            "status"=>"ok",
        ));
    }
    public function post()
    {
        
            $isbn = $_POST['isbn'];
            $name = $_POST['name'];
            $author = $_POST['author'];
            $genre = $_POST['genre'];

            $bookInDB = \Model\Book::ifBookExists($isbn);

            if ($bookInDB==0)
            {
                \Model\Book::insert_book($isbn, $name, $author, $genre);
                echo \View\Loader::make()->render("templates/addBooks.twig", array(
                    "status"=>"Booklist updated successfully!",
                ));
            }

            else {
                echo \View\Loader::make()->render("templates/addBooks.twig", array(
                    "status"=>"ISBN already exists in the Booklist.",
                    "bookno"=>$bookInDB,
                ));
            }

    }
}

class BookRequest{
    public function get()
    {
        \Controller\Utils::loggedInUser();
        echo \View\Loader::make()->render("templates/booksDelete.twig", array(
            "status"=>"request",
            "msg"=>"Request an Issue",
            "books" => \Model\Book::getAllBooks(),
            "bookStatus" => \Model\Book::checkAvailability(),
            // "email" => $_SESSION('email'),
        ));
    }
    public function post()
    {
        $data = $_POST["book"];
        $email = $_SESSION['email'];
        for ($i = 0; $i < count($data); $i++) {
                $isbn = $data[$i];
                \Model\Book::requestBook($isbn, $email, 'requested');
        } 
        
    }
}

class ReturnBooks{
    public function get()
    {
        $email = $_SESSION["email"];
        \Controller\Utils::loggedInUser();
        echo \View\Loader::make()->render("templates/returnBooks.twig", array(
            "books" => \Model\Book::booksIssuedByUser($email),
            "rejected" => \Model\Book::rejectedList($email),
            "requested" => \Model\Book::requestedList($email),
        ));
    }
    public function post()
    {
        $data = $_POST["book"];
        for ($i = 0; $i < count($data); $i++) {
            $id = $data[$i];
            \Model\Book::returnBook($id);
        } 
    }
}

class IssueBooks{
    public function get()
    {
        \Controller\Utils::loggedInAdmin();
        echo \View\Loader::make()->render("templates/issueBooks.twig", array(
            "list" => \Model\Admin::requestList(),
            "issued" => \Model\Admin::issuedList(),
            "returned" => \Model\Admin::returnedList(),
            
        ));
    }
    public function post()
    {
        $bookId = $_POST['id'];
        $adminAction = (int)($_POST['status']);
        // echo $adminAction;
        if ($adminAction === 1){
            \Model\Admin::acceptBookRequest($bookId);
            
        }
        else{   
            \Model\Admin::rejectBookRequest($bookId); 
        }
    }
}
