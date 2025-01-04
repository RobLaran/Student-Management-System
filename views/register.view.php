<?php

    $title = "Register";
    require "partials/head.php";
    require "partials/nav.php";
    require "partials/banner.php";

?>

<?php if($status == "error"): ?>
    <div class="alert" style="background-color: #f44336;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Error!</strong> <?= $error ?>
    </div>
<?php endif ?>

<main class="register-container">
    <form method="POST" class="register form-container">
        <div class="register form-wrapper">

            <div class="grid form-input-container">
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" placeholder="Enter username" <?= $_POST['username'] ?? "" ?>" >
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" placeholder="Enter password">
                <label for="confirmPassword">Confirm password: </label>
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Re-enter password">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" value="<?= $_POST['email'] ?? "" ?>" placeholder="email@xxxx.com">
                <label for="phoneNumber">Phone number: </label>
                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phoneNumber" id="phoneNumber" placeholder="123-456-7890" value="<?= $_POST['phoneNumber'] ?? "" ?>">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" value="<?= $_POST['address'] ?? "" ?>">
            </div>

        <div class="date-gender-container">
                <div class="date-input-wrapper">
                    <label for="dateOfBirth">Date of birth: </label>
                    <input type="date" name="dateOfBirth" id="dateOfBirth" value="<?= $_POST['dateOfBirth'] ?? "" ?>">
                </div>

                <fieldset style="display: inline" class="gender-radio-wrapper">
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
        </div>

            <input type="submit" value="Register" class="register-submit-input">

            <div class="rdt-login-wrapper">
                <label>Already have an account? <a href="/login" id="login-page-link">Login Here</a></label>
            </div>

        </div>
    </form>
</main>


<?php 
    require "partials/footer.php";
?>