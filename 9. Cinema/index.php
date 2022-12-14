<?php
namespace App;
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(
    function($class){
        $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
        if(file_exists($path)){
            include($path);
        }
    }
);

try{
    $router = new Router();

    $router
        ->get('/user/login', [\App\Controllers\User::class, 'login_page'])
        ->get('/user/register', [\App\Controllers\User::class, 'register_page'])

        ->post('/user/login', [\App\Controllers\User::class, 'login'])
        ->post('/user/register', [\App\Controllers\User::class, 'register'])
        ->get('/user/logout', [\App\Controllers\User::class, 'logout'])
        
        ->get('/home', [\App\Controllers\Home::class, 'index'])
        ->get('/booking', [\App\Controllers\Booking::class, 'index']);


    $requestUri = str_replace("/index.php", "", $_SERVER['REQUEST_URI']);
    $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
    
    echo $router->resolve($requestMethod, $requestUri);
    
}
catch (Exceptions\RouteNotFoundException $e){
    http_response_code(404);
    echo $e->message;
}