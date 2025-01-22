<?php 
    require "db/queries/course_queries.php";
    $config = require "config.php";

    $db = new Database('root', 'darting1223', $config['database']);
    $courseQuery = new CourseQueries($db);

    $column = $_GET["column"] ?? "course_code";
    $order = $_GET["order"] ?? "ASC";

    $courses = orderBy($db, $column, $order, ["course_code", "course_name"], "course") ?? $courseQuery->fetchAll();

    $next_order = ($order === 'ASC') ? 'DESC' : 'ASC';
    
    require "views/courses.view.php";
?>