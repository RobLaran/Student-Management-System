<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>
<body>
    <h1>Register</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
    <label for="dateOfBirth">Date of birth: </label>
    <input type="date" name="dateOfBirth" id="dateOfBirth">
    <br>
    <label for="phoneNumber">Phone number: </label>
    <input type="text" name="phoneNumber" id="phoneNumber">
    <br>
    <fieldset style="display: inline">
        <legend>Select Gender: </legend>
        <input type="radio" name="gender" id="male" value="male" checked>
        <label for="male">Male</label>
        <br>
        <input type="radio" name="gender" id="female" value="female">
        <label for="female">Female</label>
        <br>
        <input type="radio" name="gender" id="other" value="other">
        <label for="other">Other</label>
    </fieldset>
    <br>
    <label for="age">Age: </label>
    <input type="text" name="age" id="age">
    <br>
    <label for="address">Address:</label>
    <input type="text" name="address" id="address">
    <br>
    <input type="submit" value="Register">
    <br>
    <label for="login-page">Already have an account? </label>
    <a href="login.php" id="login-page">Login Here</a>
    </form>

    <?php
        require "user_auth.php";

        $auth = new UserAuthentication();
        $db = new Database();

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $confirmPassword = $_POST['confirmPassword'];

            $user = $auth->createUser($_POST["username"], $_POST["password"], $_POST["email"],
                                    $_POST["dateOfBirth"], $_POST["phoneNumber"],
                                    $_POST["gender"], $_POST["age"], $_POST["address"]
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
                    header("Location: login.php");
                    exit();
                }
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