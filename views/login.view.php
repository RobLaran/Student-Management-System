<?php

    $title = "Login";
    require "partials/head.php";
    require "partials/nav.php";
    require "partials/banner.php";
    
?>

<?php if(isset($_SESSION['registered_message_displayed'])): ?>
    <div class="alert" style="background-color: #04AA6D;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Success!</strong> You are now registered.
    </div>
<?php endif ?>

<?php if(isset($_SESSION['registered_message_displayed'])) {
    unset($_SESSION['registered_message_displayed']);
    } 
?>

<?php if($status == "error"): ?>
    <div class="alert" style="background-color: #f44336;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Error!</strong> <?= $error ?>
    </div>
<?php endif ?>

<main class="login-container">
    <form method="POST" class="login form-container">
        <div class="login form-wrapper">

            <label for="username">Username: </label>
            <input type="text" name="username" id="username" value="<?= $_POST['username'] ?? "" ?>">
            <br>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" value="<?= $_POST['email'] ?? "" ?>">
            <br>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password">
            <br>
            <label for="confirmPassword">Confirm password: </label>
            <input type="password" name="confirmPassword" id="confirmPassword" >
            <br>
            <input type="submit" value="Submit" class="login-submit-input">
            <br>

            <div class="rdt-register-wrapper">
                <label>Don't have an account yet? <a href="/register" id="register-page-link">Register Here</a></label>
            </div>

        </div>
    </form>
</main>

<?php 
    require "partials/footer.php";
?>