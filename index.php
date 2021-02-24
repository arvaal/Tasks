<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';

use core\Router;

spl_autoload_register(function($class_name) {
    $path = str_replace('\\', '/', $class_name . '.php');
    
    require $path;
});

session_start();

$router = new Router();
$router->run();


