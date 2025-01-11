<?php
    $title = "Edit";
    require "partials/head.php";
    require "partials/nav.php";
?>

<?php if($status == "added"): ?>
    <div class="alert" style="background-color: #04AA6D;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Success!</strong> New student added.
    </div>
<?php endif ?>

<?php if($status == "error"): ?>
    <div class="alert" style="background-color: #f44336;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Error!</strong> Fill out the form. <?= $error ?>
    </div>
<?php endif ?>


<h1>Add Student</h1>

<main class="student-container">
    <form method="POST" class="add student form-container">
        <div class="add student form-wrapper">

            <div class="add-student-inputs">
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first-name" placeholder="Enter first name" value="<?= $_POST['first-name'] ?? "" ?>">

                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last-name" placeholder="Enter last name" value="<?= $_POST['last-name'] ?? "" ?>">
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="email@xxxx.com" value="<?= $_POST['email'] ?? "" ?>">
                
                <label for="phoneNumber">Phone number:</label>
                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phoneNumber" id="phoneNumber" placeholder="123-456-7890" value="<?= $_POST['phoneNumber'] ?? "" ?>">
                
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" placeholder="Enter address" value="<?= $_POST['address'] ?? "" ?>">
            </div>

            <div class="date-gender-container" style="display: flex; align-items: center; justify-content: space-evenly;">
                <div class="date-wrapper">
                    <label for="date-of-birth">Date of birth :</label>
                    <input type="date" id="date-of-birth" name="date-of-birth" min="1" max="100" placeholder="Enter date of birth" value="<?= $_POST['date-of-birth'] ?? "" ?>">
                </div>

                <fieldset style="display: inline-block; width: 150px;">
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

            <div class="back-add student-button-wrapper">
                <div class="back-btn"><a href="/students">Go back...</a></div class="back-btn">
                <div id="add-student button-container">
                    <button type="submit" id="add-student-button">Add Student</button>
                </div>
            </div>

        </div>
    </form>
</main>
        
<?php 
    require "partials/footer.php";
?>