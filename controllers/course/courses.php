<?php 
    require "db/queries/course_queries.php";
    $config = require "config.php";

    $db = new Database('root', 'darting1223', $config['database']);
    $courseQuery = new CourseQueries($db);

    $courses = $courseQuery->fetchAll();


    
    require "views/courses.view.php";
?>