<?php
    $title = "Edit";
    require "partials/head.php";
    require "partials/nav.php";
?>

<?php if($status == "updated"): ?>
    <div class="alert" style="background-color: #04AA6D;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Success!</strong> Course updated.
    </div>
<?php endif ?>

<?php if($status == "error"): ?>
    <div class="alert" style="background-color: #f44336;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Error!</strong> Fill out the form. <?= $error ?>
    </div>
<?php endif ?>


<h1>Edit Course</h1>

<main class="course-container">
    <form method="POST" class="add course form-container">
        <div class="add course form-wrapper">

            <div class="add-course-inputs">
                <label for="course-name">Course Name:</label>
                <input type="text" id="course-name" name="course-name" placeholder="Enter course name" value="<?= cleanStr($course['course_name'] ?? "") ?>">

                <label for="description">Description:</label>
                <textarea name="description" id="description"><?= cleanStr($course['description'] ?? "") ?></textarea>
            </div>

            <div class="back-add course-button-wrapper">
                <div class="back-btn"><a href="/courses">Go back...</a></div class="back-btn">
                <div id="add-course button-container">
                    <button type="submit" id="add-course-button">Update Course</button>
                </div>
            </div>

        </div>
    </form>
</main>
        
<?php 
    require "partials/footer.php";
?>