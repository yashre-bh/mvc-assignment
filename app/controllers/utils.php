<?php

namespace Controller;
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

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
}
