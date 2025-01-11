<?php 
require "db/queries/course_queries.php";
$config = require "config.php";

$db = new Database('root', 'darting1223', $config['database']);
$courseQueries = new CourseQueries($db);

$status = "";
$error = "";


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = cleanStr($_POST['course-name']);
    $description = cleanStr($_POST['description']);


    if(empty($course_name)) {
        $status = "error";
        $error = "Course name required.";
    } else {
        $new_course = array(
            "course_name"=>$course_name,
            "description"=>$description
        );
    
        $courseQueries->addCourse($new_course);
        $status = "added";
    }

}

require "views/course-add.view.php";
?>