<?php 
    require "db/queries/student_queries.php";
    $config = require "config.php";

    $db = new Database('root', 'darting1223', $config['database']);
    $studentQuery = new StudentQueries($db);

    $students = $studentQuery->fetchAll();
    
    require "views/students.view.php";
?>