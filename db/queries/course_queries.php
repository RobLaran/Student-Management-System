<?php 
class CourseQueries {
    public $database;

    function __construct($database) {
        $this->database = $database;
    }

    function fetchAll() {
        $query = "SELECT * FROM course";

        $result = $this->database->query($query)->fetchAll();

        return !empty($result) ? $result : null; 
    }

    function fetchCourse($code) {
        $query = "SELECT * FROM course where course_code = ?";

        $result = $this->database->query($query, [$code])->fetch();

        return !empty($result) ? $result : null;
    }

    function updateCourse($course) {
        $query = "UPDATE course
            SET course_name = ?, 
                description = ?
            WHERE course_code = ?";

        $params = [
            $course['course_name'], 
            $course['description'],
            $course['course_code'] 
        ];

        return $this->database->query($query, $params);
    }

    function addCourse($course) {
        $query = "INSERT INTO course (course_name, description)  
            VALUES (?, ?)";

        $params = [
            $course['course_name'], 
            $course['description']
        ];

        $this->database->query($query, $params);
    }

    function removeCourse($code) {
        $query = "DELETE FROM course 
            WHERE course_code = ?     
        ";

        $params = [
            $code
        ];

        $this->database->query($query, $params);
    }

    function isCourseExist($course_name) {
        $query = "SELECT * from course 
            WHERE course_name = ?;
        ";

        $params = [$course_name];

        $result = $this->database->query($query, $params)->fetch();

        return !empty($result);
    }
}

?>