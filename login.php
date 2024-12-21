<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1>Login</h1>

    <form action="" method="POST">
    <label for="username">Username: </label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" required>
    <br>
    <label for="confirmPassword">Confirm password: </label>
    <input type="password" name="confirmPassword" id="confirmPassword" required>
    <br>
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" required>
    <br>
    <input type="submit" value="Submit">
    <br>
    <label for="register-page">Don't have an account yet? </label>
     <a href="register.php" id="register-page">Register Here</a>
    </form>

    <?php
        # login functionalities
        require "user_auth.php";

        $auth = new UserAuthentication();
        $db = new Database();

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $email = $_POST['email'];
            
            // login verification
            if(!$auth->verifyUsername($username, $email)) {
                echo "wrong username or email";
            } else if(!$auth->matchPassword($password, $confirmPassword)) {
                echo "password does not match";
            } else if(!$auth->checkPassword($password)) {
                echo "incorrect password";
            } else if(!$auth->verifyEmail($email)) {
                echo "incorrect email";
            } else {
                header("Location: dashboard.php");
                exit();
            }
        }

    ?>

    <script>
        if(window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>