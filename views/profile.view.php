<?php
    $title = "Profile";
    require "partials/head.php";
    require "partials/nav.php";

    $heading = "User Profile";
    require "partials/banner.php";
?>

<?php if($status == "updated"): ?>
    <div class="alert" style="background-color: #04AA6D;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Success!</strong> Profile updated.
    </div>
<?php endif ?>

<?php if($status == "error"): ?>
    <div class="alert" style="background-color: #f44336;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Error!</strong> Fill out the form. <?= $error ?>
    </div>
<?php endif ?>

<main class="profile-container">

    <form method="POST" class="profile form-container">
        <div class="profile form-wrapper">

            <div class="grid form-input-container">
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" placeholder="Enter username" value="<?= $user['user_name'] ?? "" ?>" >
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" value="<?= $user['email'] ?? "" ?>" placeholder="email@xxxx.com">
                <label for="phoneNumber">Phone number: </label>
                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phoneNumber" id="phoneNumber" placeholder="123-456-7890" value="<?= $user['phone_number'] ?? "" ?>">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" value="<?= $user['address'] ?? "" ?>">
            </div>

        <div class="date-gender-container">
                <div class="date-input-wrapper">
                    <label for="dateOfBirth">Date of birth: </label>
                    <input type="date" name="dateOfBirth" id="dateOfBirth" value="<?= $user['date_of_birth'] ?? "" ?>">
                </div>

                <fieldset style="display: inline" class="gender-radio-wrapper">
                    <legend>Select Gender: </legend>
                    <input type="radio" name="gender" id="male" value="male" <?= $user['gender'] == "male" ? "checked" : "" ?>>
                    <label for="male">Male</label>
                    <br>
                    <input type="radio" name="gender" id="female" value="female" <?= $user['gender'] == "female" ? "checked" : "" ?>>
                    <label for="female">Female</label>
                    <br>
                    <input type="radio" name="gender" id="other" value="other" <?= $user['gender'] == "other" ? "checked" : "" ?>>
                    <label for="other">Other</label>
                </fieldset>
        </div>

            <input type="submit" value="Update" class="profile-submit-input">
        </div>
    </form>
    
</main>

<?php
    require "partials/footer.php";
?>