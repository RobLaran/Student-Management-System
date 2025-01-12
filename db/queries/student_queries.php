<?php 
class StudentQueries {
    public $database;

    function __construct($database) {
        $this->database = $database;
    }

    function fetchAll() {
        $query = "SELECT * FROM student";

        $result = $this->database->query($query)->fetchAll();

        return !empty($result) ? $result : null; 
    }

    function fetchStudent($id) {
        $query = "SELECT * FROM student where student_id = ?";

        $result = $this->database->query($query, [$id])->fetch();

        return !empty($result) ? $result : null;
    }

    function updateStudent($student) {
        $query = "UPDATE student
            SET student_first_name = ?, 
                student_last_name = ?, 
                student_email = ?, 
                date_of_birth = ?, 
                phone_number = ?, 
                gender = ?, 
                address = ?
            WHERE student_id = ?";

        $params = [
            $student['First name'], 
            $student['Last name'],
            $student['Email'],
            $student['Date of birth'],
            $student['Phone number'],
            $student['Gender'],
            $student['Address'],
            $student['Student ID']
        ];

        return $this->database->query($query, $params);
    }

    function addStudent($student) {
        $query = "INSERT INTO student 
            (student_first_name, student_last_name, 
            student_email, date_of_birth, phone_number, gender, address)  
            VALUES (?, ?, ?, ?, ?, ?, ?)";

        $params = [
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

    function removeStudent($student_id) {
        $query = "DELETE FROM student 
            WHERE student_id = ?      
        ";

        $params = [
            $student_id
        ];

        $this->database->query($query, $params);
    }

    function isStudentExist($fname, $lname, $email) {
        $query = "select * from student 
            where student_first_name = ? and student_last_name = ?
            and student_email = ?";

        $params = [$fname, $lname, $email];

        $result = $this->database->query($query, $params)->fetch();

        return !empty($result);
    }
}

?>