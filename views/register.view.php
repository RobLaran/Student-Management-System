<?php

    $title = "Register";
    require "partials/head.php";
    require "partials/nav.php";
    require "partials/banner.php";

?>

<main>
    <form method="POST">
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
        <label for="address">Address:</label>
        <input type="text" name="address" id="address">
        <br>
        <input type="submit" value="Register">
        <br>
        <label for="login-page">Already have an account? </label>
        <a href="/login" id="login-page">Login Here</a>
    </form>
</main>


<?php 
    require "partials/footer.php";
?>