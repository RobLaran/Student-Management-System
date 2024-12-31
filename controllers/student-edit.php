<?php
    require "db/queries/student_queries.php";
    $config = require "config.php";

    $db = new Database('root', 'darting1223', $config['database']);
    $studentQueries = new StudentQueries($db);

    $student = $studentQueries->fetchStudent($_GET['id']);
    
    if($student != null) {
        if(authorize($student['user_id'])) {
            require "views/student-edit.view.php";
        }
    }  else {
        abort();
    }
?>