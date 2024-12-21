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

        
        # for user regsitration
        function checkUsernameExists($username) {
            $query = "SELECT user_name FROM user where user_name = '{$username}'";

            $statement = $this->connection->prepare($query);
            $statement->execute();

            $result = $statement->get_result();
            $isExist = $result->fetch_assoc();

            return isset($isExist); 
        }

        function checkEmailExists($email) {
            $query = "SELECT email FROM user where email = '{$email}'";

            $statement = $this->connection->prepare($query);
            $statement->execute();

            $result = $statement->get_result();
            $isExist = $result->fetch_assoc();

            return isset($isExist); 
        }

        function fetchUser($username, $email) {
            $query = "SELECT * FROM user where user_name = '{$username}' and email = '{$email}'";

            $statement = $this->connection->prepare($query);
            $statement->execute();

            $result = $statement->get_result();
            $user = $result->fetch_assoc();

            return isset($user) ? $user : NULL;
        }

        function addUser($user) {
            $username = $user['username'];
            $password = $user['password'];
            $email = $user['email'];
            $dateOfBirth = isset($user['dateOfBirth']) ? "NULL" : $user['dateOfBirth'];
            $phoneNumber = isset($user['phoneNumber']) ? "NULL" : $user['phoneNumber'];
            $gender = isset($user['gender']) ? "NULL" : $user['gender'];
            $age = $user['age'];
            $address = $user['address'];

            $query = "INSERT INTO user (user_name, password, email, date_of_birth, phone_number, gender, age, address)  
                    VALUES ('{$username}', '{$password}', '{$email}',
                    {$dateOfBirth}, {$phoneNumber}, '{$gender}', '{$age}', '{$address}')";

            $statement = $this->connection->prepare($query);
            $statement->execute();
        }
    }

    
?>