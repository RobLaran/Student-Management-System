<?php 
    $title = "Unenroll";
    require "views/partials/head.php";
    require "views/partials/nav.php";
?>

    <h1>Unenroll Student</h1>
    <main class="unenroll-container">
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
                    <th>Action</th>
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
                            <td>
                                <form action="/unenroll" method="GET">
                                        <button value="<?= $data['enrollment_id'] ?>" name="id" class="unenroll action-button">UNENROLL</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    </main>

    <div class="back-btn-container">
        <div class="back-btn-wrapper">
            <a href="/enroll" class="back-btn">Back</a>
        </div>
    </div>

<?php 
    require "views/partials/footer.php";
?>