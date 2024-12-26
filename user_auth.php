<?php 
require "db/database.php";

class UserAuthentication {
    public $db;

    function __construct() {
        $this->db = new Database();
    }

    /* 
    * User login
    */
    function verifyUsername($username) {
        return $this->checkUsername($username);
    }

    function verifyEmail($username, $email) {
        $id = $this->db->fetchUserID($username, $email);

        return isset($id);
    }

    function checkPassword($username, $email, $password) {
        $id = $this->db->fetchUserID($username, $email);
        $hash = $this->db->fetchPassword($id);

        return $this->verifyPassword($password, $hash);
    }

    function verifyPassword($password ,$hash) {
        return password_verify($password, $hash);
    }

    function loginUser($username, $password, $email) {
        $id = $this->db->fetchUserID($username, $email);

        return $id;
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

    function createUser($username="NULL", $password="NULL", $email="NULL", $dateOfBirth="NULL", $phoneNumber="NULL", $gender="NULL", $address="NULL") {
        $user = array('username'=>$username, 'password'=>$password, 'email'=>$email,
                        'dateOfBirth'=>$dateOfBirth, 'phoneNumber'=>$phoneNumber, 'gender'=>$gender,
                        'address'=>$address);

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
}


?>