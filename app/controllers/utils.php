<?php

namespace Controller;
session_start();

class Utils
{
    public static function loggedInUser()
    {
        if(!isset($_SESSION["loggedIn"]))
        {
            header("Location: /");
        }
    }
    public static function ifNotLoggedIn()
    {
        if(!isset($_SESSION["loggedIn"]))
        {
            header("Location: /login");
        }
    }

    public static function loggedInAdmin()
    {
        if(!((isset($_SESSION["loggedIn"]))&& $_SESSION['role']==='admin'))
        {
            header("Location: /");
        }
    }

    public static function isSetAll(...$values)
    {
        $flag=true;
        foreach($values as $v)
            if(empty($v) || !isset($v))
                $flag=false;
        return $flag;
    }
    // public static function checkIssue()
    // {
    //     $rows1 = \Model\Book::getSpecificIssue();
    //     $rows2 = \Model\Book::getAll();
    //     $rows=array();
    //     $flag=false;
    //     foreach ($rows2 as $i) {
    //         foreach ($rows1 as $j) {
      
    //           if ($i["book_id"] === $j["book_id"]) {
    //             $flag = true;
    //             break;
    //           }
    //         }
    //         if ($flag === false && (int)$i['capacity'] > 0) {
    //           array_push($rows, $i);
    //         }
    //         $flag = false;
    //       }
    //     return $rows;
    // }
}
