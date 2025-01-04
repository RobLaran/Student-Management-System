<?php
    $heading = "Register";

    require "db/queries/user_queries.php";
    require "user_auth.php";
    $config = require "config.php";

    $db = new Database('root', 'darting1223', $config['database']);
    $userQueries = new UserQueries($db);
    $auth = new UserAuthentication($userQueries);

    $status = "";
    $error = "";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = cleanStr($_POST["username"]);
        $password = cleanStr($_POST["password"]);
        $confirmPassword = cleanStr($_POST['confirmPassword']);
        $email = cleanStr($_POST['email']);
        $dateOfBirth = cleanStr($_POST['dateOfBirth']);
        $phoneNumber = cleanStr($_POST['phoneNumber']);
        $gender = cleanStr($_POST['gender']);
        $address = cleanStr($_POST['address']);

        if(empty($username) || empty($password) || empty($confirmPassword) || empty($email) ||
        empty($dateOfBirth) || empty($phoneNumber) || empty($gender) || empty($address)
        ) {
            $status = "error";
            $error = "Fill out the empty form.";
        } else if($auth->checkUsername($username)) {
            $status = "error";
            $error = "Username taken.";
        } else if(!$auth->matchPassword($password, $confirmPassword)) {
            $status = "error";
            $error = "Password does not matched.";
        } else if(!$auth->validateEmail($email)) {
            $status = "error";
            $error = "{$email} is not a valid email address.";
        } else if($auth->checkEmail($email)) {
            $status = "error";
            $error = "{$email} already used.";
        } else {
            $user = $auth->createUser($username, $password, $email,
                                    $dateOfBirth, $phoneNumber,
                                    $gender, $address
            );

            if(isset($user)) {
                $auth->registerUser($user);
                $_SESSION['registered_message_displayed'] = true;
                header("Location: /login");
                exit();
            }
        }
    }
    
    require "views/register.view.php";
?>