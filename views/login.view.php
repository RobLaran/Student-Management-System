<?php

    $title = "Login";
    require "partials/head.php";
    require "partials/nav.php";
    require "partials/banner.php";
    
?>

<main>
    <form method="POST">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="confirmPassword">Confirm password: </label>
        <input type="password" name="confirmPassword" id="confirmPassword" required>
        <br>
        <input type="submit" value="Submit">
        <br>
        <label for="register-page">Don't have an account yet? </label>
        <a href="/register" id="register-page">Register Here</a>
    </form>
</main>

<?php 
    require "partials/footer.php";
?>