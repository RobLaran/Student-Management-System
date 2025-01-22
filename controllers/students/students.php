<?php 
    require "db/queries/student_queries.php";
    $config = require "config.php";

    $db = new Database('root', 'darting1223', $config['database']);
    $studentQuery = new StudentQueries($db);

    $column = $_GET["column"] ?? "student_id";
    $order = $_GET["order"] ?? "ASC";

    $students = orderBy($db, $column, $order, ["student_id", "student_first_name", "student_last_name"], "student") ?? $studentQuery->fetchAll();

    $next_order = ($order === 'ASC') ? 'DESC' : 'ASC';
    
    require "views/students.view.php";
?>