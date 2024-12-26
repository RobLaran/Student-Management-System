<?php
    $heading = "Login";

    require "views/login.view.php";
    require "user_auth.php";

    $auth = new UserAuthentication();
    $db = new Database();


    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $email = $_POST['email'];
        
        
        // login verification
        if(!$auth->verifyUsername($username)) {
            echo "wrong username";
        } else if(!$auth->verifyEmail($username, $email)) {
            echo "incorrect email";
        } else if(!$auth->matchPassword($password, $confirmPassword)) {
            echo "password does not match";
        } else if(!$auth->checkPassword($username, $email, $password)) {
            echo "incorrect password";
        } else {
            $id = $auth->db->fetchUserID($username, $email);

            $_SESSION['user_id'] = $id;

            header("Location: /home");
            exit();
        }
    }

?>