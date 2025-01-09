<?php
    require "db/queries/student_queries.php";
    require "db/queries/course_queries.php";
    require "db/queries/enroll_queries.php";
    $config = require "config.php";
    
    $db = new Database('root', 'darting1223', $config['database']);
    $studentQueries = new StudentQueries($db);
    $courseQueries = new CourseQueries($db);
    $enrollQueries = new EnrollmentQueries($db);

    $students = $studentQueries->fetchAll($_SESSION['user_id']);
    $courses = $courseQueries->fetchAll($_SESSION['user_id']);
    $date_now = date("Y-m-d");

    $status = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $enrollment = array(
            "student_id"=>$_POST['student'],
            "course_code"=>$_POST['course'],
            "year"=>$_POST['year'],
            "semester"=>$_POST['semester'],
            "date_enrolled"=>$date_now,
        );

        foreach($enrollment as $key=>$val) {
            if(empty($val))
            $status = "error";
        }

        if($enrollment && $status != "error") {
            $status = "enrolled";
            $enrollQueries->addEnrollment($enrollment);
        }
    }

    require "views/enroll.view.php";
?>