<?php

$request = $_SERVER['REQUEST_URI'];

$actual = explode('?', $request);
$actualRequest = reset($actual);

switch ($actualRequest) {
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
    case '/user' :
        require __DIR__ . '/../views/user.php';
        break;
    case '/search' :
        require __DIR__ . '/../views/search.php';
        break;
    case '/offer' :
        require __DIR__ . '/../views/offer.php';
        break;
    case '/change' :
        require __DIR__ . '/../views/change.php';
        break;
    case '/changepwd' :
        require __DIR__ . '/../views/changepwd.php';
        break;
    case '/paymentsuccess' :
        require __DIR__ . '/../views/paymentsuccess.php';
        break;
    case '/payment' :
        require __DIR__ . '/../views/payment.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/../views/404.php';
        break;
}