<?php
session_start();


//autoload classes
spl_autoload_register(function ($class_name) {
    $path = '../models/';

    if(file_exists($path .  $class_name . '.php'))
        include $path .  $class_name . '.php';
    else {
        $path = '../controllers/';
        include $path .  $class_name . '.php';
    }
            
});