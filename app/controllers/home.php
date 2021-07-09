<?php

namespace Controller;
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
class Home{

    public function get(){

        echo \View\Loader::make()->render("templates/home.twig");
        
    }
}
