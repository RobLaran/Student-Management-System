<?php 
class StudentQueries {
    public $database;

    function __construct($database) {
        $this->database = $database;
    }

    function fetchAll($userid) {
        $query = "SELECT * FROM student where user_id = ?";

        $result = $this->database->query($query, [$userid])->fetchAll();

        return !empty($result) ? $result : null; 
    }

    function fetchStudent($id) {
        $query = "SELECT * FROM student where student_id = ?";

        $result = $this->database->query($query, [$id])->fetch();

        return !empty($result) ? $result : null;
    }
}

?>