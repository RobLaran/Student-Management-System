<?php
    $title = "Edit";
    require "partials/head.php";
    require "partials/nav.php";
?>

<?php if($status == "updated"): ?>
    <div class="alert" style="background-color: #04AA6D;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Success!</strong> Student info updated.
    </div>
<?php endif ?>

<?php if($status == "error"): ?>
    <div class="alert" style="background-color: #f44336;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Error!</strong> Fill out the form. <?= $error ?>
    </div>
<?php endif ?>


<h1>Edit Student</h1>

<main class="student-container">
    <form method="POST" class="edit student form-container">
        <div class="edit student form-wrapper">

            <div class="edit-student-inputs">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" name="first-name" placeholder="Enter first name" value="<?= $student['student_first_name'] ?? "" ?>">

                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" name="last-name" placeholder="Enter last name" value="<?= $student['student_last_name'] ?? "" ?>">
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="email@xxxx.com" value="<?= $student['student_email'] ?? "" ?>">

                    <label for="phoneNumber">Phone number:</label>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phoneNumber" id="phoneNumber" placeholder="123-456-7890" value="<?= $student['phone_number'] ?? "" ?>">

                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" placeholder="Enter address" value="<?= $student['address'] ?? "" ?>">
            </div>

            <div class="date-gender-container" style="display: flex; align-items: center; justify-content: space-evenly;">
                <div class="date">
                    <label for="date-of-birth">Date of birth :</label>
                    <input type="date" id="date-of-birth" name="date-of-birth" min="1" max="100" placeholder="Enter date of birth" value="<?= $student['date_of_birth'] ?? "" ?>">
                </div>

                <fieldset style="display: inline-block; width: 150px;">
                    <legend>Select Gender: </legend>
                    <input type="radio" name="gender" id="male" value="male" <?= $student['gender'] == "male" ? "checked" : "" ?>>
                    <label for="male">Male</label>
                    <br>
                    <input type="radio" name="gender" id="female" value="female" <?= $student['gender'] == "female" ? "checked" : "" ?>>
                    <label for="female">Female</label>
                    <br>
                    <input type="radio" name="gender" id="other" value="other" <?= $student['gender'] == "other" ? "checked" : "" ?>>
                    <label for="other">Other</label>
                </fieldset>
            </div>

            <div class="back-edit student-button-wrapper">
                <div class="back-btn"><a href="/students">Go back...</a></div class="back-btn">
                <div id="edit-student button-container">
                    <button type="submit" id="edit-student-button">Update Student</button>
                </div>
            </div>
            
        </div>
    </form>
</main>
<?php 
    require "partials/footer.php";
?>