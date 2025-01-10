<?php
    require "db/queries/student_queries.php";
    $config = require "config.php";

    $db = new Database('root', 'darting1223', $config['database']);
    $studentQueries = new StudentQueries($db);

    $status = "";
    $error = "";
    $student = $studentQueries->fetchStudent($_GET['id']);

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $updated_student = array(
            'Student ID'=>cleanStr($_GET['id']),
            'First name'=>cleanStr($_POST['first-name']),
            'Last name'=>cleanStr($_POST['last-name']),
            'Email'=>cleanStr($_POST['email']),
            'Date of birth'=>cleanStr($_POST['date-of-birth']),
            'Phone number'=>cleanStr($_POST['phoneNumber']),
            'Gender'=>cleanStr($_POST['gender']),
            'Address'=>cleanStr($_POST['address'])
        );
        
        $status = "updated";

        // foreach($updated_student as $key=>$value) {
        //     if(empty($value) and $key != 'Student ID') {
        //         $status ="error";
        //         $error = $key . " is required.";
        //         break;
        //     }
        // }

        if($status == "updated") {
            $studentQueries->updateStudent($updated_student);
            $student = $studentQueries->fetchStudent($_GET['id']);
        }

    }
    
    if($student != null) {
        if(authorize($student['user_id'])) {
            require "views/student-edit.view.php";
        }
    }  else {
        abort();
    }
?>