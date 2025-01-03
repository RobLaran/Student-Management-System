<?php
    $title = "Students";
    require "partials/head.php";
    require "partials/nav.php";
?>

    <div class="table-container">
        <h1>Student List</h1>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr id="table-header">
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
                                <tr>

                                <?php foreach($student as $key => $value): ?>
                                    <?php if($key == 'user_id'): ?>
                                        <td>
                                        <form action="students/edit" method="GET">
                                            <button value="<?= $student['student_id'] ?>" name="id" class="action-button edit">EDIT</button>
                                        </form>
                                        <form action="students/remove" method="GET">
                                            <button value="<?= $student['student_id'] ?>" name="id" class="action-button delete">DELETE</button>
                                        </form>
                                        <!-- <a href="/students/remove?id={$student['student_id']}">DELETE</a> -->
                                        </td>
                                        <?php break; ?>
                                    <?php endif ?>

                                        <td><?= $value ?></td>

                                <?php endforeach; ?>

                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="rd-add-student-container">
        <a href="/students/add" role="button" class="rd-add-student">Add new student</a>        
    </div>

<?php
    require "partials/footer.php";
?>