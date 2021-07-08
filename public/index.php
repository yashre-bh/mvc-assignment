<?php
// echo "hello mvc finally!";
require __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Home",
    "/register" => "\Controller\Register",
    "/login" => "\Controller\Login",
    "/main" => "\Controller\Main",
    "/booksUpdate" => "\Controller\BookUpdate",
    "/addBooks" => "\Controller\AddBooks",
    "/bookRequest" => "\Controller\BookRequest",
    "/returnBooks"=>"\Controller\ReturnBooks",
    "/issueBooks"=>"\Controller\IssueBooks",

    
));