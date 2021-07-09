<?php

namespace Controller;
error_reporting(E_ERROR | E_WARNING | E_PARSE);
class Logout
{
    public function get()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /');
    }
}
