<?php

namespace Model;

class Admin{
    public static function requestList()
    {
        $db = \DB::get_instance();
        $stmt= $db->prepare("SELECT * FROM book_status LEFT JOIN books ON book_status.isbn=books.isbn LEFT JOIN users ON book_status.email= users.email WHERE book_status.status= 'requested' ORDER BY book_status.id");
        $stmt->execute();
        $rows= $stmt->fetchAll();
        return $rows;
    }
    public static function issuedList()
    {
        $db = \DB::get_instance();
        $stmt= $db->prepare("SELECT * FROM book_status LEFT JOIN books ON book_status.isbn=books.isbn LEFT JOIN users ON book_status.email= users.email WHERE book_status.status= 'issued' ORDER BY book_status.id");
        $stmt->execute();
        $rows= $stmt->fetchAll();
        return $rows;
    }
    public static function returnedList()
    {
        $db = \DB::get_instance();
        $stmt= $db->prepare("SELECT * FROM book_status LEFT JOIN books ON book_status.isbn=books.isbn LEFT JOIN users ON book_status.email= users.email WHERE (book_status.status= 'returned' AND book_status.email = (?)) ORDER BY book_status.id");
        $stmt->execute([$email]);
        $rows= $stmt->fetchAll();
        return $rows;
    }
    public static function acceptBookRequest($bookId)
    {
        $db = \DB::get_instance();
        $date = date('Y-m-d');
        $stmt= $db->prepare("UPDATE book_status SET `status`= 'issued', issue_date= (?) WHERE id= (?)");
        $stmt->execute([$date, $bookId]);
        
    }
    public static function rejectBookRequest($bookId)
    {
        $db = \DB::get_instance($bookId);
        $stmt= $db->prepare("UPDATE book_status SET `status`= 'rejected' WHERE id= (?)");
        $stmt->execute([$bookId]);
    }
    public static function clearReturnedBooks($bookId)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("DELETE from book_status where id=(?)");
        $stmt->execute([$id]);
    }
}