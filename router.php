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
        "/students" => "controllers/students.php",
        "/students/add" => "controllers/student-add.php",
        "/students/edit" => "controllers/student-edit.php",
        "/students/remove" => "controllers/student-remove.php",

    ];


    function routeToController($uri, $routes) {
         if(array_key_exists($uri, $routes)) {
            require $routes["{$uri}"];
         } else {
            abort();
         }
    }

    function abort($code=404) {
        http_response_code($code);
        require "views/{$code}.php";
        die();
    }

    function authorize($userid) {
        return $userid == $_SESSION['user_id'] ? true : abort(403);
    }

    routeToController($uri, $routes);
?>