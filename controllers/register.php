<?php
    $heading = "Register";

    require "views/register.view.php";
    require "db/queries/user_queries.php";
    require "user_auth.php";
    $config = require "config.php";

    $db = new Database('root', 'darting1223', $config['database']);
    $userQueries = new UserQueries($db);
    $auth = new UserAuthentication($userQueries);

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $confirmPassword = $_POST['confirmPassword'];

        $user = $auth->createUser($_POST["username"], $_POST["password"], $_POST["email"],
                                $_POST["dateOfBirth"], $_POST["phoneNumber"],
                                $_POST["gender"], $_POST["address"]
            );

        if($auth->checkUsername($user['username'])) {
            echo "<br>username taken";
        } else if(!$auth->matchPassword($user['password'], $confirmPassword)) {
            echo "<br>password does not matched";
        } else if(!$auth->validateEmail($user['email'])) {
            echo "<br>{$user['email']} is not a valid email address";
        } else if($auth->checkEmail($user['email'])) {
            echo "<br>email address already used";
        } else {
            if(isset($user)) {
                $auth->registerUser($user);
                header("Location: /login");
                exit();
            }
        }
    }
?>