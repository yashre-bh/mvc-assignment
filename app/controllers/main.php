<?php

namespace Controller;
session_start();
class Main
{
    public function get()
    {
        // if($_SESSION['role']==='user'){
        //     \Controller\Utils::loggedInUser();
        // }
        // if($_SESSION['role']==='user'){
        //     \Controller\Utils::loggedInAdmin();
        // }
        // \Controller\Utils::loggedInAdmin();
        $record=\Model\User::find_user($_SESSION['email']);
        $name = $record['name'];
        
        if($_SESSION['role']==='user'){
            echo \View\Loader::make()->render("templates/user_dashboard.twig", array(
                "role" => $_SESSION['role'],
                "email" => $_SESSION['email'],
                "name" => $name,
            ));
        }
        else{
            // $count = \Model\User::count_user($_SESSION['role']);
            echo \View\Loader::make()->render("templates/admin_dashboard.twig", array(
                "role" => $_SESSION['role'],
                "email" => $_SESSION['email'],
                "name" => $name,
                // "count" => $count,
            ));
            
        }
    }    

}