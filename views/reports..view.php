<?php
    $title = "Reports";
    require "partials/head.php";
    require "partials/nav.php";
?>
<main class="reports-container">
    <h1>Enrolled Student</h1>
    <div class="table-wrapper">
        <table>
            <thead>
                <tr class="table-header">
                    <th>Student Last Name</th>
                    <th>Student First Name</th>
                    <th>Email Address</th>
                    <th>Courses</th>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Date Enrolled</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!empty($enrollments)): ?>
                    <?php foreach($enrollments as $data): ?>
                        <tr class="table-data">
                            <?php 
                                $student = $studentQueries->fetchStudent($data['student_id']);
                                $course = $courseQueries->fetchCourse($data['course_code']);
                            ?>

                            <td><?= $student['student_first_name'] ?></td>
                            <td><?= $student['student_last_name'] ?></td>
                            <td><?= $student['student_email']?></td>
                            <td><?= $course['course_name'] ?></td>
                            <td><?= $data['year'] ?></td>
                            <td><?= $data['semester'] ?></td>
                            <td><?= $data['date_enrolled'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php
    require "partials/footer.php";
?>