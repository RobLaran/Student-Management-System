<?php 
class UserQueries {
    public $database;

    function __construct($database) {
        $this->database = $database;
    }

     # for user login
     function fetchUserID($username, $email) {
        $query = "SELECT user_id FROM user 
        where user_name = ? and email = ?";

        $result = $this->database->query($query, [$username, $email])->fetch();

        return !empty($result) ? $result['user_id'] : null; 
    }

    function fetchUsername($id) {
        $query = "SELECT user_name FROM user where user_id = ?";

        $result = $this->database->query($query, [$id])->fetch();

        return !empty($result) ? $result['user_name'] : null; 
    }

    function fetchPassword($id) {
        $query = "SELECT password FROM user where user_id = ?";

        $result = $this->database->query($query, [$id])->fetch();

        return !empty($result) ? $result['password'] : null; 
    }

    function fetchEmail($id) {
        $query = "SELECT email FROM user where user_id = ?";

        $result = $this->database->query($query, [$id])->fetch();

        return !empty($result) ? $result['email'] : null; 
    }
    
    # for user regsitration
    function checkUsernameExists($username) {
        $query = "SELECT user_name FROM user where user_name = ?";

        $result = $this->database->query($query, [$username])->fetch();

        return !empty($result); 
    }

    function checkEmailExists($email) {
        $query = "SELECT email FROM user where email = ?";

        $result = $this->database->query($query, [$email])->fetch();

        return !empty($result); 
    }

    function fetchUser($id) {
        $query = "SELECT * FROM user where user_id = ?";

        $result = $this->database->query($query, [$id])->fetch();

        return !empty($result) ? $result : NULL;
    }

    function addUser($user) {
        $username = $user['username'];
        $password = $user['password'];
        $email = $user['email'];
        $dateOfBirth = empty($user['dateOfBirth']) ? NULL : $user['dateOfBirth'];
        $phoneNumber = empty($user['phoneNumber']) ? NULL : $user['phoneNumber'];
        $gender = empty($user['gender']) ? "NULL" : $user['gender'];
        $address = $user['address'];

        $params = [$username, $password, $email, $dateOfBirth,
    $phoneNumber, $gender, $address];

        $query = "INSERT INTO user (user_name, password, email, date_of_birth, phone_number, gender, address)  
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $this->database->query($query, $params);
    }

    function updateUser($user, $id) {
        $query = "UPDATE user
        SET user_name = ?, 
            email = ?, 
            phone_number = ?, 
            date_of_birth = ?, 
            gender = ?, 
            address = ?
        WHERE user_id = ?";

    $params = [
        $user['user_name'], 
        $user['email'],
        $user['phone_number'],
        $user['date_of_birth'],
        $user['gender'],
        $user['address'],
        $id
    ];

    return $this->database->query($query, $params);
    }
}
?>