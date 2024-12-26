<?php
    class Database {
        public $connection;

        function __construct() {
            // establish database connection
            $this->connection = new mysqli('localhost', 'root', 'darting1223', 'sms_db');

            if(!$this->connection) {
                die('could not connect:'.mysqli_connect_error());
            }
        }

        # for user login
        function fetchUserID($username, $email) {
            $query = "SELECT user_id FROM user 
            where user_name = ? and email = ?";

            $statement = $this->connection->prepare($query);
            $statement->bind_param("ss",$username, $email);
            $statement->execute();

            $result = $statement->get_result();
            $id = $result->fetch_assoc();

            return isset($id) ? $id['user_id'] : null; 
        }

        function fetchUsername($id) {
            $query = "SELECT user_name FROM user where user_id = ?";

            $statement = $this->connection->prepare($query);
            $statement->bind_param("s", $id);
            $statement->execute();

            $result = $statement->get_result();
            $id = $result->fetch_assoc();

            return isset($id) ? $id['user_name'] : null; 
        }

        function fetchPassword($id) {
            $query = "SELECT password FROM user where user_id = ?";

            $statement = $this->connection->prepare($query);
            $statement->bind_param("s", $id);
            $statement->execute();

            $result = $statement->get_result();
            $id = $result->fetch_assoc();

            return isset($id) ? $id['password'] : null; 
        }

        function fetchEmail($id) {
            $query = "SELECT email FROM user where user_id = ?";

            $statement = $this->connection->prepare($query);
            $statement->bind_param("i", $id);
            $statement->execute();

            $result = $statement->get_result();
            $id = $result->fetch_assoc();

            return isset($id) ? $id['email'] : null; 
        }
        
        # for user regsitration
        function checkUsernameExists($username) {
            $query = "SELECT user_name FROM user where user_name = ?";

            $statement = $this->connection->prepare($query);
            $statement->bind_param('s', $username);
            $statement->execute();

            $result = $statement->get_result();
            $isExist = $result->fetch_assoc();

            return isset($isExist); 
        }

        function checkEmailExists($email) {
            $query = "SELECT email FROM user where email = ?";

            $statement = $this->connection->prepare($query);
            $statement->bind_param('s', $email);
            $statement->execute();

            $result = $statement->get_result();
            $isExist = $result->fetch_assoc();

            return isset($isExist); 
        }

        function fetchUser($username, $email) {
            $query = "SELECT * FROM user where user_name = ? and email = ?'";

            $statement = $this->connection->prepare($query);
            $statement->bind_param('ss', $username, $email);
            $statement->execute();

            $result = $statement->get_result();
            $user = $result->fetch_assoc();

            return isset($user) ? $user : NULL;
        }

        function addUser($user) {
            $username = $user['username'];
            $password = $user['password'];
            $email = $user['email'];
            $dateOfBirth = isset($user['dateOfBirth']) ? NULL : $user['dateOfBirth'];
            $phoneNumber = isset($user['phoneNumber']) ? "NULL" : $user['phoneNumber'];
            $gender = isset($user['gender']) ? "NULL" : $user['gender'];
            $address = $user['address'];

            $query = "INSERT INTO user (user_name, password, email, date_of_birth, phone_number, gender, address)  
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $statement = $this->connection->prepare($query);
            $statement->bind_param('ssssiss', $username, $password, $email, $dateOfBirth, 
                                $phoneNumber, $gender, $address);
            $statement->execute();
        }
    }

    
?>