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
                    <th><a href="?column=student_last_name&order=<?= $next_order ?>">Student Last Name</a></th>
                    <th><a href="?column=student_first_name&order=<?= $next_order ?>">Student First Name</a></th>
                    <th class="sortable">Email Address</th>
                    <th class="sortable">Courses</th>
                    <th class="sortable">Year</th>
                    <th class="sortable">Semester</th>
                    <th class="sortable">Date Enrolled</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!empty($enrollments)): ?>
                    <?php foreach($enrollments as $data): ?>
                        <tr class="table-data">
                            <td><?= $data['student_last_name'] ?></td>
                            <td><?= $data['student_first_name'] ?></td>
                            <td><?= $data['student_email']?></td>
                            <td><?= $data['course_name'] ?></td>
                            <td><?= $data['year'] ?></td>
                            <td><?= $data['semester'] ?></td>
                            <td><?= $data['date_enrolled'] ?></td>
                            <td>
                                <form action="/unenroll" method="GET">
                                        <button  value="<?= $data['enrollment_id'] ?>" name="id" class="unenroll action-button">UNENROLL</button>
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