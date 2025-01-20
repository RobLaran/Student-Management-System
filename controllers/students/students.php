<?php 
    require "db/queries/student_queries.php";
    $config = require "config.php";

    $db = new Database('root', 'darting1223', $config['database']);
    $studentQuery = new StudentQueries($db);

    $field = "student_id";

    $statement = $db->query("SELECT student_id FROM student ORDER BY ? DESC", [$field]);

    $column = $_GET["column"] ?? "student_id";
    $order = $_GET["order"] ?? "ASC";

    $allowed_column = ["student_id", "student_first_name", "student_last_name"];
    $allowed_order = ["ASC", "DESC"];

    if(!in_array($column, $allowed_column)) {
        $column = "student_id";
    }

    if(!in_array($order, $allowed_order)) {
        $order = "ASC";
    }

    $students = NULL;


    if(!empty($column) && !empty($order)) {
        if($order == "ASC") {
            $statement = $db->query("SELECT * FROM student ORDER BY {$column} ASC");
        } else {
            $statement = $db->query("SELECT * FROM student ORDER BY {$column} DESC");
        }

        $students = $statement->fetchAll();
    } else {
        $students = $studentQuery->fetchAll();
    }


    $next_order = ($order === 'ASC') ? 'DESC' : 'ASC';
    
    require "views/students.view.php";
?>