<?php
    $title = "Students";
    require "partials/head.php";
    require "partials/nav.php";
?>
<main class="table-container">
    <h1>Student List</h1>
    <div class="table-wrapper">
        <table>
            <thead>
                <tr class="table-header">
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date of birth</th>
                    <th>Phone number</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($students)): ?>
                    <?php foreach($students as $student): ?>
                        <tr class="table-data">

                        <?php foreach($student as $key => $value): ?>
                            <td><?= $value ?></td>
                        <?php endforeach; ?>

                            <td>
                                <form action="students/edit" method="GET">
                                    <button value="<?= $student['student_id'] ?>" name="id" class="student action-button edit">EDIT</button>
                                </form>
                                <form action="students/remove" method="GET">
                                    <button value="<?= $student['student_id'] ?>" name="id" class="student action-button delete">DELETE</button>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

    <div class="rd-add-student-container">
        <a href="/students/add" role="button" class="rd-add-student">Add new student</a>        
    </div>

<?php
    require "partials/footer.php";
?>