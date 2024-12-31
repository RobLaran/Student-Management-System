<?php 
class UserAuthentication {
    public $query;

    function __construct($userQueries) {
        $this->query = $userQueries;
    }

    /* 
    * User login
    */
    function verifyUsername($username) {
        return $this->checkUsername($username);
    }

    function verifyEmail($username, $email) {
        $id = $this->query->fetchUserID($username, $email);

        return isset($id);
    }

    function checkPassword($username, $email, $password) {
        $id = $this->query->fetchUserID($username, $email);
        $hash = $this->query->fetchPassword($id);

        return $this->verifyPassword($password, $hash);
    }

    function verifyPassword($password ,$hash) {
        return password_verify($password, $hash);
    }

    function loginUser($username, $password, $email) {
        $id = $this->query->fetchUserID($username, $email);

        return $id;
    }


    /* 
    * User Registration
    */
    # verify all submission if all are valid to authenticate
    function checkUsername($username) {
        if(!empty($username)) {
            // check username exists, if exists the user must enter another username 
            return $this->query->checkUsernameExists($username);
        } else {
            return false;
        }
    }

    function matchPassword($password, $confirmPassword) {
        if(!empty($password)) {
            # checks if password matches
            return $password == $confirmPassword;
        } else {
            return false;
        }
    }

    function validateEmail($email) {
        // Remove all illegal characters from email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function checkEmail($email) {
        if(!empty($email)) {
            # check email exists, if exists the user must enter another email 
            return $this->query->checkEmailExists($email);
        } else {
            return false;
        }
    }

    function createUser($username="NULL", $password="NULL", $email="NULL", $dateOfBirth="NULL", $phoneNumber="NULL", $gender="NULL", $address="NULL") {
        $user = array('username'=>$username, 'password'=>$password, 'email'=>$email,
                        'dateOfBirth'=>$dateOfBirth, 'phoneNumber'=>$phoneNumber, 'gender'=>$gender,
                        'address'=>$address);

        return $user;
    }

    function registerUser($user) {
        $user['password'] = $this->securePassword($user['password']);

        $this->query->addUser($user);
    }

    function securePassword($password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        return $hash;
    }
}
?>