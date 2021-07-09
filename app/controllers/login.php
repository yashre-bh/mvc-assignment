<?php

namespace Controller;
session_start();

class Login{

    public function get(){
        if(isset($_SESSION['loggedIn'])){
            header('Location: /main');
        }
        else{
            echo \View\Loader::make()->render("templates/login.twig",array("status" => "ok",));
        }     
    }

    public function post()
    {
        
        if (\Controller\Utils::isSetAll($_POST["email"], $_POST["password"]))
        {
            $email = $_POST["email"];
            $passwordFromPost = $_POST["password"];
            $record=\Model\User::find_user($email);
            if (isset($record) && password_verify($passwordFromPost, $record["password"])) {
                $_SESSION['email'] = $email;
                $_SESSION['role'] = \Model\User::find_user($email, $password)['role'];
                $_SESSION['loggedIn'] = true;
                header('Location: /main');
                // echo \View\Loader::make()->render("templates/main.twig", array(
                //     "email"=> $_SESSION['email'] ,
                // ));
            }
            else{
                $_SESSION['loggedIn'] = false;
                echo \View\Loader::make()->render("templates/login.twig", array(
                    "status"=>"Incorrect Username or Password",
                ));
            }
        }
    }
} 