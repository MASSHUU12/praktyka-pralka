<?php
session_start();


//autoload classes
spl_autoload_register(function ($class_name) {
    $path = '../models/';

    if(file_exists($path .  $class_name . '.php'))
        include $path .  $class_name . '.php';
    else{
        $path = '../controllers/';
        if(file_exists($path .  $class_name . '.php'))
            include $path .  $class_name . '.php';
         else{
            $path = '../views/inc/';
            include $path .  $class_name . '.php';
        }
    }
            
});

function getUrl() {

    $request = $_SERVER['REQUEST_URI'];

    $actual = explode('?', $request);
    $actualRequest = reset($actual);
    return $actualRequest;

}

