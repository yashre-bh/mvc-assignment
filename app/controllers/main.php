<?php

namespace Controller;
session_start();
class Main
{
    public function get()
    {
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
            
            echo \View\Loader::make()->render("templates/admin_dashboard.twig", array(
                "role" => $_SESSION['role'],
                "email" => $_SESSION['email'],
                "name" => $name,
                
            ));
            
        }
    }    

}