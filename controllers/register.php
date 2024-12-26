<?php
    $heading = "Register";

    require "views/register.view.php";
    require "user_auth.php";

    $auth = new UserAuthentication();
    $db = new Database();

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
        } else if($auth->checkEmail($user['email'])) {
            echo "<br>email already used";
        } else {
            if(isset($user)) {
                $auth->registerUser($user);
                header("Location: /login");
                exit();
            }
        }
    }
?>