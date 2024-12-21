<?php 
require "db/database.php";

class UserAuthentication {
    private $db;
    private $user;

    function __construct() {
        $this->db = new Database();
        $this->user = null;
    }

    /* 
    * User login
    */
    function verifyUsername($username, $email) {
        if(isset($username)) {
            $this->user = $this->db->fetchUser($username, $email);
            if(isset($this->user)) {
                return true;
            } else {
                $this->user = null;
                return false;
            }
        }
    }

    function checkPassword($password) {
        $hash = $this->user['password'];

        return $this->verifyPassword($password, $hash);
    }

    function verifyPassword($password ,$hash) {
        return password_verify($password, $hash);
    }

    function verifyEmail($email) {
        return $email == $this->user['email'];
    }

    function loginUser() {

    }


    /* 
    * User Registration
    */
    # verify all submission if all are valid to authenticate
    function checkUsername($username) {
        if(!empty($username)) {
            // check username exists, if exists the user must enter another username 
            return $this->db->checkUsernameExists($username);
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

    function checkEmail($email) {
        if(!empty($email)) {
            # check email exists, if exists the user must enter another email 
            return $this->db->checkEmailExists($email);
        } else {
            return false;
        }
    }

    function createUser($username="NULL", $password="NULL", $email="NULL", $dateOfBirth="NULL", $phoneNumber="NULL", $gender="NULL", $age="NULL", $address="NULL") {
        $user = array('username'=>$username, 'password'=>$password, 'email'=>$email,
                        'dateOfBirth'=>$dateOfBirth, 'phoneNumber'=>$phoneNumber, 'gender'=>$gender,
                        'age'=>$age, 'address'=>$address);

        return $user;
    }

    function registerUser($user) {
        $user['password'] = $this->securePassword($user['password']);

        $this->db->addUser($user);
    }

    function securePassword($password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        return $hash;
    }

    function dd($var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
}


?>