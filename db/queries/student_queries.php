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

    function updateStudent($student, $userid) {
        $query = "UPDATE student
            SET student_first_name = ?, 
                student_last_name = ?, 
                student_email = ?, 
                date_of_birth = ?, 
                phone_number = ?, 
                gender = ?, 
                address = ?
            WHERE student_id = ? and user_id = ?";

        $params = [
            $student['First name'], 
            $student['Last name'],
            $student['Email'],
            $student['Date of birth'],
            $student['Phone number'],
            $student['Gender'],
            $student['Address'],
            $student['Student ID'],
            $userid
        ];

        return $this->database->query($query, $params);
    }

    function addStudent($student, $userid) {
        $query = "INSERT INTO student 
            (user_id, student_first_name, student_last_name, 
            student_email, date_of_birth, phone_number, gender, address)  
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $params = [
            $userid,
            $student['First name'], 
            $student['Last name'],
            $student['Email'],
            $student['Date of birth'],
            $student['Phone number'],
            $student['Gender'],
            $student['Address'] 
        ];

        $this->database->query($query, $params);
    }

    function removeStudent($student_id, $user_id) {
        $query = "DELETE FROM student 
            WHERE student_id = ? and user_id = ?       
        ";

        $params = [
            $student_id,
            $user_id
        ];

        $this->database->query($query, $params);
    }
}

?>