<?php 
    require "db/queries/user_queries.php";
    require "user_auth.php";
    $config = require "config.php";
    
    $db = new Database('root', 'darting1223', $config['database']);
    $userQueries = new UserQueries($db);
    $auth = new UserAuthentication($userQueries);
    
    $status = "";
    $error = "";

    $user = $userQueries->fetchUser($_SESSION['user_id']);

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $user = array(
            "user_name"=>$_POST["username"],
            "email"=>$_POST["email"],
            "phone_number"=>$_POST["phoneNumber"],
            "date_of_birth"=>$_POST["dateOfBirth"],
            "gender"=>$_POST["gender"],
            "address"=>$_POST["address"]
        );

        foreach($user as $key=>$value) {
            if(empty($value)) {
                if($key == "user_name") {
                    $status ="error";
                    $error = "Username required.";
                    break;
                } else if($key == "email") {
                    $status ="error";
                    $error = "Email required.";
                    break;
                } else if($key == "date_of_birth") {
                    $user[$key] = NULL;
                }
            }
        }

        if(empty($error) && isset($user)) {
            $userQueries->updateUser($user, $_SESSION['user_id']);
            $status = "updated";
        }
    }

    require "views/profile.view.php";
?>