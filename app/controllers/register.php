<?php

namespace Controller;
session_start(); 

class Register{

    public function get(){

        echo \View\Loader::make()->render("templates/register.twig",array(
            "status" => "ok",
        ));
        
    }

    public function post()
    {
        
        if(\Controller\Utils::isSetAll($_POST['email'], $_POST['name'], $_POST['password'],$_POST['passwordConfirm']))
        {
            if ($_POST['password'] === $_POST['passwordConfirm'])
            {
                $email = $_POST['email'];
                if (!(\Model\User::find_user($email)))
                {
                    $name = $_POST['name'];
                    $options = [
                        'cost' => 11,
                    ];
                    $password = $_POST['password'];
                    $hash = password_hash($password, PASSWORD_BCRYPT, $options);
                    
                    if($email != 'admin@admin'){
                        \Model\User::insert_user($name, $email, $hash);
                    }
                    else{
                        \Model\User::insert_admin($name, $email, $hash);
                    }
                    // echo \View\Loader::make()->render("templates/userHome.twig");
                    // ,array(
                    //     "books" => \Model\Book::getSpecific('remind',''),
                    // ));
                    session_unset();
                    session_destroy();
                    $_SESSION['name'] = $name;
                    $_SESSION['role'] = \Model\User::find_user($name, $email, $hash)["role"];
                    $_SESSION['log'] = true;
                    header('Location: /main');
                }

                else {echo \View\Loader::make()->render("templates/register.twig", array(
                    "status"=>"User Already Exists"));
                }
            }

            else{
                    echo \View\Loader::make()->render("templates/register.twig", array(
                    "status"=> "Password confirmation failed"));
                }

            }

        else{
            echo \View\Loader::make()->render("templates/register.twig", array(
                "status"=> "All fields are required",
            ));
        }
    }
}

