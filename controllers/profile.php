<?php 
    require "db/queries/user_queries.php";
    require "user_auth.php";
    $config = require "config.php";
    
    $db = new Database('root', 'darting1223', $config['database']);
    $userQueries = new UserQueries($db);
    
    $user = $userQueries->fetchUser($_SESSION['user_id']);

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $user = array(
            "user_name"=>cleanStr($_POST["username"]),
            "email"=>cleanStr($_POST["email"]),
            "phone_number"=>cleanStr($_POST["phoneNumber"]),
            "date_of_birth"=>cleanStr($_POST["dateOfBirth"]),
            "gender"=>cleanStr($_POST["gender"]),
            "address"=>cleanStr($_POST["address"])
        );

        foreach($user as $key=>$val) {
            if(empty($val)) {
                if($key == "user_name") {
                    $_SESSION['status'] = array(
                        'code'=>'error',
                        'body'=>'Username required.'
                    );
                    break;
                } else if($key == "email") {
                    $_SESSION['status'] = array(
                        'code'=>'error',
                        'body'=>'Email required.'
                    );
                    break;
                } else if($key == "date_of_birth") {
                    $user[$key] = NULL;
                }
            }
        }

        if(isset($user) && !isset($_SESSION['status'])) {
            $_SESSION['status'] = array(
                'code'=>'updated',
                'body'=>'Profile updated.'
            );

            $userQueries->updateUser($user, $_SESSION['user_id']);
        }
    }

    require "views/profile.view.php";
?>