<?php 
class CourseQueries {
    public $database;

    function __construct($database) {
        $this->database = $database;
    }

    function fetchAll($userid) {
        $query = "SELECT * FROM course where user_id = ?";

        $result = $this->database->query($query, [$userid])->fetchAll();

        return !empty($result) ? $result : null; 
    }

    function fetchCourse($code) {
        $query = "SELECT * FROM course where course_code = ?";

        $result = $this->database->query($query, [$code])->fetch();

        return !empty($result) ? $result : null;
    }

    function updateCourse($course, $userid) {
        $query = "UPDATE course
            SET course_name = ?, 
                description = ?
            WHERE course_code = ? and user_id = ?";

        $params = [
            $course['course_name'], 
            $course['description'],
            $course['course_code'], 
            $userid
        ];

        return $this->database->query($query, $params);
    }

    function addCourse($course, $userid) {
        $query = "INSERT INTO course (user_id, course_name, description)  
            VALUES (?, ?, ?)";

        $params = [
            $userid,
            $course['course_name'], 
            $course['description'],
        ];

        $this->database->query($query, $params);
    }

    function removeCourse($code, $user_id) {
        $query = "DELETE FROM course 
            WHERE course_code = ? and user_id = ?       
        ";

        $params = [
            $code,
            $user_id
        ];

        $this->database->query($query, $params);
    }
}

?>