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

    if(isset($_GET['id'])) {
        $enrollQueries->removeEnrollment($_GET['id']);

        header("Location: /unenroll");
        exit();
    }

    require "views/unenroll.view.php";
?>