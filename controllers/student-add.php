<?php 
require "db/queries/student_queries.php";
$config = require "config.php";

$db = new Database('root', 'darting1223', $config['database']);
$studentQueries = new StudentQueries($db);

$status = "";
$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $student = array(
        'First name'=>cleanStr($_POST['first-name']),
        'Last name'=>cleanStr($_POST['last-name']),
        'Email'=>cleanStr($_POST['email']),
        'Date of birth'=>cleanStr($_POST['date-of-birth']),
        'Phone number'=>cleanStr($_POST['phoneNumber']),
        'Gender'=>cleanStr($_POST['gender']),
        'Address'=>cleanStr($_POST['address'])
    );

    $status = "added";

    if(!empty($error)) {
        $error = "";
    }
    foreach($student as $key=>$value) {
        if($key == "Phone number" || $key == "Address") {
            continue;
        }

        if(empty($value)) {
            $status ="error";
            $error = $key . " is required.";
            break;
        }
    }

    if($status == "added" && empty($error)) {
        $studentQueries->addStudent($student, $_SESSION['user_id']);
    }
}

require "views/student-add.view.php";
?>