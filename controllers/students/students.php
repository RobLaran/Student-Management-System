<?php 
    require "db/queries/student_queries.php";
    $config = require "config.php";

    $db = new Database('root', 'darting1223', $config['database']);
    $studentQuery = new StudentQueries($db);

    $column = $_GET["column"] ?? "id";
    $order = $_GET["order"] ?? "asc";
    $table = "student" . $column . "view_" . $order;

    $students = $studentQuery->fetchAllOrderBy($table);

    $next_order = ($order === 'asc') ? 'desc' : 'asc';
    
    require "views/students.view.php";
?>