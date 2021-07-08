<?php

namespace Model;

class User
{
    public static function find_user($email)
    {
        $db = \DB::get_instance();
        $qry = $db->prepare("SELECT * FROM users where email = ?");
        $qry->execute([$email]);
        $record = $qry->fetch();
        return $record;
    }
    public static function insert_user($name, $email, $password)
    {
        $db = \DB::get_instance();
        $qry = $db->prepare("insert into users value(?,?,?,'user')");
        $qry->execute([$name, $email, $password]);
    }
    public static function count_user($role)
    {
        $db = \DB::get_instance();
        $qry = $db->prepare("SELECT count(*) FROM users WHERE role = ?" );
        $sql = $qry->execute([$role]);
        $count = $sql->fetchColumn();
        return $count;
    }
    public static function insert_admin($name, $email, $password)
    {
        $db = \DB::get_instance();
        $qry = $db->prepare("INSERT INTO users VALUE (?,?,?,'admin')");
        $qry->execute([$name, $email, $password]);
    }
    public static function requestedBooks($name, $email, $password)
    {
        $db = \DB::get_instance();
        $qry = $db->prepare("INSERT INTO users VALUE (?,?,?,'admin')");
        $qry->execute([$name, $email, $password]);
    }
    
}
