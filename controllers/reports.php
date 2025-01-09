<?php
    require "db/queries/student_queries.php";
    require "db/queries/course_queries.php";
    require "db/queries/enroll_queries.php";
    $config = require "config.php";
    
    $db = new Database('root', 'darting1223', $config['database']);
    $studentQueries = new StudentQueries($db);
    $courseQueries = new CourseQueries($db);
    $enrollQueries = new EnrollmentQueries($db);

    $enrollments = $enrollQueries->fetchAll();

    require "views/reports..view.php";
?>