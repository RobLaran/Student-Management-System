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
        "/students" => "controllers/students/students.php",
        "/students/add" => "controllers/students/student-add.php",
        "/students/edit" => "controllers/students/student-edit.php",
        "/students/remove" => "controllers/students/student-remove.php",
        "/courses" => "controllers/course/courses.php",
        "/courses/add" => "controllers/course/course-add.php",
        "/courses/remove" => "controllers/course/course-remove.php",
        "/courses/edit" => "controllers/course/course-edit.php",
        "/enroll" => "controllers/enroll.php",
        "/reports" => "controllers/reports.php",
        "/profile" => "controllers/profile.php",
        "/profile/change-password" => "controllers/change-password.php",
        "/unenroll" => "controllers/unenroll.php",
        

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