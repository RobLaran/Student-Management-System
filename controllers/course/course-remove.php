<?php 
require "db/queries/course_queries.php";
$config = require "config.php";

$db = new Database('root', 'darting1223', $config['database']);
$courseQueries = new CourseQueries($db);


if(isset($_GET['id'])) {
    $courseQueries->removeCourse($_GET['id']);

    header("Location: /courses");
    exit();
}
?>