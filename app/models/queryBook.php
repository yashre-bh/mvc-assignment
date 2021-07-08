<?php

namespace Model;

class Book
{
    public static function ifBookExists($isbn)
    {
        $db = \DB::get_instance();
        $check = $db->prepare("SELECT count(isbn) FROM books WHERE isbn= (?)");
        $check->execute([$isbn]);
        $count= $check->fetch();
        return $count[0];
    }
    public static function find_by_isbn($isbn)
    {
         $db = \DB::get_instance();
         $stmt = $db->prepare("SELECT * from books WHERE isbn = ?");
         $stmt->execute([$isbn]);
         $record = $qry->fetch();
         return $record;
    }
    public static function insert_book($isbn, $name, $author, $genre)
    {
        $db = \DB::get_instance();
        $qry = $db->prepare("INSERT INTO books VALUE(?,?,?,?)");
        $qry->execute([$isbn, $name, $author, $genre]);
    }
    public static function getAllBooks()
    {
        $db= \DB::get_instance();
        $stmt= $db->prepare("SELECT * from books");
        $stmt->execute();
        $rows=$stmt->fetchAll();
        return $rows;
    }
    public static function booksIssuedByUser($email)
    {
        $db = \DB::get_instance();
        $stmt= $db->prepare("SELECT * FROM book_status LEFT JOIN books ON book_status.isbn=books.isbn LEFT JOIN users ON book_status.email= users.email WHERE book_status.status= 'issued' AND book_status.email=(?) ORDER BY book_status.id");
        $stmt->execute([$email]);
        $rows= $stmt->fetchAll();
        return $rows;
    }
    public static function deleteBook($isbn)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("DELETE from books where isbn=(?)");
        $stmt->execute([$isbn]);
    }
    
    public static function requestBook($isbn, $email, $status)
    {
        $db= \DB::get_instance();
        $stmt= $db->prepare("INSERT INTO book_status (`isbn`, `email`, `status`, `request_date`) VALUES (?,?,?,?)");
        $date = date('Y-m-d');
        $stmt->execute([$isbn, $email, $status, $date]);
    }
    public static function returnBook($bookId)
    {
        $db= \DB::get_instance();
        $date = date('Y-m-d');
        $stmt= $db->prepare("UPDATE book_status SET `status`= 'returned', return_date= (?) WHERE (id= (?) AND `status` = 'issued')");
        $stmt->execute([$date, $bookId]);
    }

    public static function checkAvailability()
    {
        $db= \DB::get_instance();
        $stmt= $db->prepare("SELECT * FROM book_status WHERE (`status` = 'requested' OR `status`= 'issued')");
        $stmt->execute();
        $count= $stmt->fetchAll();
        return $count;
    }
    public static function rejectedList($email)
    {
        $db = \DB::get_instance();
        $stmt= $db->prepare("SELECT * FROM book_status LEFT JOIN books ON book_status.isbn=books.isbn WHERE (book_status.status= 'rejected' AND book_status.email= (?)) ORDER BY book_status.id");
        $stmt->execute([$email]);
        $rows= $stmt->fetchAll();
        return $rows;
    }
    public static function requestedList($email)
    {
        $db = \DB::get_instance();
        $stmt= $db->prepare("SELECT * FROM book_status LEFT JOIN books ON book_status.isbn=books.isbn WHERE (book_status.status= 'requested' AND book_status.email= (?)) ORDER BY book_status.id");
        $stmt->execute([$email]);
        $rows= $stmt->fetchAll();
        return $rows;
    }

}
