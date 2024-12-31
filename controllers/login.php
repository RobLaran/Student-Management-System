<?php
    $heading = "Login";

    require "views/login.view.php";
    require "db/queries/user_queries.php";
    require "user_auth.php";
    $config = require "config.php";

    $db = new Database('root', 'darting1223', $config['database']);
    $userQueries = new UserQueries($db);
    $auth = new UserAuthentication($userQueries);


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
            $id = $auth->query->fetchUserID($username, $email);

            $_SESSION['user_id'] = $id;

            header("Location: /home");
            exit();
        }
    }

?>