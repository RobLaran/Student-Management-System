<?php 
require "db/queries/course_queries.php";
$config = require "config.php";

$db = new Database('root', 'darting1223', $config['database']);
$courseQueries = new CourseQueries($db);

$status = "";
$error = "";

$course = $courseQueries->fetchCourse($_GET['id']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = cleanStr($_POST['course-name']);
    $description = cleanStr($_POST['description']);


    if(empty($course_name)) {
        $status = "error";
        $error = "Course name required.";
    } else {
        $course = array(
            "course_name"=>$course_name,
            "description"=>$description,
            "course_code"=>$_GET['id']
        );
    
        $courseQueries->updateCourse($course);
        $course = $courseQueries->fetchCourse($_GET['id']);

        $status = "updated";
    }

}

require "views/course-edit.view.php";
?>