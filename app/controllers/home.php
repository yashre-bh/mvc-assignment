<?php

namespace Controller;
session_start();

class Home{

    public function get(){

        echo \View\Loader::make()->render("templates/home.twig");
        
    }
}
