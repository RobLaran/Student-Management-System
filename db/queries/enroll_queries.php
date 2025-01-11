<?php 
class EnrollmentQueries {
    public $database;

    function __construct($database) {
        $this->database = $database;
    }

    function fetchAll() {
        $query = "SELECT * FROM enrollment";

        $result = $this->database->query($query)->fetchAll();

        return !empty($result) ? $result : null; 
    }

    function fetchEnrolledStudent($id, $code) {
        $query = "SELECT * FROM enrollment
                    WHERE student_id = ? AND course_code = ?";

        $result = $this->database->query($query, [$id, $code])->fetch();

        return !empty($result) ? $result : null;
    }

    function updateEnrolledStudent() {
        /* 
        * Updating an enrollment is optional in this project *
        */
    }

    function addEnrollment($enrollment) {
        $query = "INSERT INTO enrollment (
                student_id, course_code, year, semester, date_enrolled)  
            VALUES (?, ?, ?, ?, ?)";

        $params = [
            $enrollment['student_id'], 
            $enrollment['course_code'],
            $enrollment['year'],
            $enrollment['semester'],
            $enrollment['date_enrolled'],
        ];

        $this->database->query($query, $params);
    }

    function removeEnrollment($id) {
        $query = "DELETE FROM enrollment 
                WHERE enrollment_id = ?";

        $params = [$id];

        $this->database->query($query, $params);
    }
}

?>