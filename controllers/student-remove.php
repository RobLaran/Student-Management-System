<?php 
require "db/queries/student_queries.php";
$config = require "config.php";

$db = new Database('root', 'darting1223', $config['database']);
$studentQueries = new StudentQueries($db);


if(isset($_GET['id'])) {
    $studentQueries->removeStudent($_GET['id'], $_SESSION['user_id']);

    header("Location: /students");
    exit();
}
?>