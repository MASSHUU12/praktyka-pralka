<?php

$request = $_SERVER['REQUEST_URI'];


switch ($request) {
    case '/' :
        require __DIR__ . '/../views/index.php';
        break;
    case '' :
        require __DIR__ . '/../views/index.php';
        break;
    case '/login' :
            require __DIR__ . '/../views/login.php';
            break;
    case '/signup' :
        require __DIR__ . '/../views/signup.php';
        break;
    case '/logout' :
        require __DIR__ . '/../views/logout.php';
        break;
    case '/newoffer' :
        require __DIR__ . '/../views/newoffer.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/../views/404.php';
        break;
}