<?php
    require "db/queries/student_queries.php";
    require "db/queries/course_queries.php";
    require "db/queries/enroll_queries.php";
    $config = require "config.php";
    
    $db = new Database('root', 'darting1223', $config['database']);
    $enrollQueries = new EnrollmentQueries($db);
    
    $column = $_GET["column"] ?? "student_last_name";
    $order = $_GET["order"] ?? "ASC";
    
    $enrollments = $enrollQueries->fetchAllOrderBy($column, $order);

    $next_order = ($order === 'ASC') ? 'DESC' : 'ASC';

    require "views/reports..view.php";
?>