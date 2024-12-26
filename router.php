<?php 
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

    $routes = [
        "/" => "controllers/home.php",
        "/home" => "controllers/home.php",
        "/about" => "controllers/about.php",
        "/contact" => "controllers/contact.php",
        "/login" => "controllers/login.php",
        "/logout" => "controllers/logout.php",
        "/register" => "controllers/register.php",
    ];


    function routeToController($uri, $routes) {
         if(array_key_exists($uri, $routes)) {
            require $routes["{$uri}"];
         } else {
            abort();
         }
    }

    function abort($code=404) {
        require "views/{$code}.php";
    }

    routeToController($uri, $routes);
?>