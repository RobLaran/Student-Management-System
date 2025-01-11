<?php
    $heading = "Login";

    require "db/queries/user_queries.php";
    require "user_auth.php";
    $config = require "config.php";
    
    $db = new Database('root', 'darting1223', $config['database']);
    $userQueries = new UserQueries($db);
    $auth = new UserAuthentication($userQueries);
    
    $status = "";
    $error = "";
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = cleanStr($_POST['username']);
        $password = cleanStr($_POST['password']);
        $confirmPassword = cleanStr($_POST['confirmPassword']);
        $email = cleanStr($_POST['email']);

        // login verification
        if(empty($username)) {
            $status = "error";
            $error= "Username is empty.";
        } else if(!$auth->verifyUsername($username)) {
            $status = "error";
            $error= "Wrong username.";
        } else if(!$auth->verifyEmail($username, $email)) {
            $status = "error";
            $error= "Invalid email.";
        } else if(!$auth->matchPassword($password, $confirmPassword)) {
            $status = "error";
            if(empty($password)) {
                $error = "Empty password.";
            } else {
                $error= "Password mismatched.";
            }
        } else if(!$auth->checkPassword($username, $email, $password)) {
            $status = "error";
            $error= "Incorrect password.";
        } else {
            $id = $auth->query->fetchUserID($username, $email);
            
            $_SESSION['user_id'] = $id;
            $_SESSION['success_message_displayed'] = true;
            
            header("Location: /home");
            exit();
        }
    }
    
    require "views/login.view.php";
?>