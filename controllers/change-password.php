<?php
    require "db/queries/user_queries.php";
    require "user_auth.php";
    $config = require "config.php";
    
    $db = new Database('root', 'darting1223', $config['database']);
    $userQueries = new UserQueries($db);
    $auth = new UserAuthentication($userQueries);

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $new_password = array(
            "password"=>cleanStr($_POST['new-password']),
            "confirm_password"=>cleanStr($_POST['new-confirm-password'])
        );

        foreach($new_password as $key=>$val) {
            if(empty($val)) {
                if($key == "password") {
                    $_SESSION['status'] = array(
                        'code'=>'error',
                        'body'=>'New password required.'
                    );
                    break;
                } else if($key == "confirm_password") {
                    $_SESSION['status'] = array(
                        'code'=>'error',
                        'body'=>'Confirm password required.'
                    );
                    break;
                }
            }
        }

        if(!isset($_SESSION['status']) && $new_password['password'] != $new_password['confirm_password']) {
            $_SESSION['status'] = array(
                'code'=>'error',
                'body'=>'Password does not matched.'
            );
        }

        if(!isset($_SESSION['status']) && isset($new_password)) {
            $_SESSION['status'] = array(
                'code'=>'updated',
                'body'=>'New password changed.'
            );
            
            $new_password = $auth->securePassword($new_password['password']);
            
            $userQueries->updatePassword($new_password, $_SESSION['user_id']);
        }
    }

    header("Location: /profile");
    exit();
?>