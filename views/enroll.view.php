<?php
    $title = "Enroll";
    require "partials/head.php";
    require "partials/nav.php";
?>

<?php if($status == "enrolled"): ?>
    <div class="alert" style="background-color: #04AA6D;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Success!</strong> Student Enrolled.
    </div>
<?php endif ?>

<?php if($status == "error"): ?>
    <div class="alert" style="background-color: #f44336;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Error!</strong> <?= $error ?>
    </div>
<?php endif ?>

<main class="enroll-container">
    
    <h1>Enroll Form</h1>

    <form method="POST" class="enroll form-container">
        <div class="enroll form-wrapper">

            <div class="enroll-course-inputs">
                <div class="student selection-wrapper">
                    <label for="student-selection">Select a student: </label>
                    <select name="student" id="student-selection">
                        <option value="">
                            --Select Student--
                        </option>

                        <?php foreach($students as $student): ?>

                        <option value="<?= $student['student_id'] ?>">
                            <?= $student['student_last_name'] . ", " . $student['student_first_name'] ?>
                        </option>
                            
                        <?php endforeach ?>
                        
                    </select>
                </div>
                
                <div class="course selection-wrapper">
                    <label for="course-selection">Select a course: </label>
                    <select name="course" id="course-selection">
                        <option value="">
                            --Select Course--
                        </option>

                        <?php foreach($courses as $course): ?>

                            <option value="<?= $course['course_code'] ?>">
                                <?= $course['course_name'] ?>
                            </option>
                            
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="year selection-wrapper">
                    <label for="year-selection">Select a year: </label>
                    <select name="year" id="year-selection">
                        <option value="">
                            --Select Year--
                        </option>
                        <option value="1">Year 1</option>
                        <option value="2">Year 2</option>
                        <option value="3">Year 3</option>
                        <option value="4">Year 4</option>
                    </select>
                </div>

                <div class="semester selection-wrapper">
                    <label for="semester-selection">Select a semester: </label>
                    <select name="semester" id="semester-selection">
                        <option value="">
                            --Select Semester--
                        </option>
                        <option value="1st">1st Semester</option>
                        <option value="2nd">2nd Semester</option>
                    </select>
                </div>
            </div>

            <div class="enroll-button-wrapper">
                <div id="enroll button-container">
                    <button type="submit" id="enroll-button">Enroll</button>
                </div>
            </div>

        </div>
    </form>

</main>

<div class="unenroll-btn-container">
    <div class="unenroll-btn-wrapper">
        <a href="/unenroll" class="unenroll-btn">Unenroll</a>
    </div>
</div>

<?php require "partials/footer.php"; ?>