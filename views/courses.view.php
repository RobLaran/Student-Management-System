<?php
    $title = "Courses";
    require "partials/head.php";
    require "partials/nav.php";
?>
<main class="courses-table-container">
    <h1>Course List</h1>
    <div class="courses-table-wrapper">
        <table>
            <thead>
                <tr class="course-table-header">
                    <th>Course code</th>
                    <th>Course name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php if(isset($courses)): ?>
                    <?php if(!empty($courses)): ?>
                    <?php foreach($courses as $course): ?>
                        <tr class="course-table-data">

                        <?php foreach($course as $key => $value): ?>
                            <td><?= $value ?></td>
                        <?php endforeach; ?>
                        
                            <td class="course action-buttons-wrapper">
                                    <form action="courses/edit" method="GET">
                                        <button value="<?= $course['course_code'] ?>" name="id" class="course action-button edit">EDIT</button>
                                    </form>
                                    <form action="courses/remove" method="GET">
                                        <button value="<?= $course['course_code'] ?>" name="id" class="course action-button delete">DELETE</button>
                                    </form>
                                </td>

                        </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif ?>
                
            </tbody>
        </table>
    </div>
</main>

    <div class="rd-add-course-container">
        <a href="/courses/add" role="button" class="rd-add-course">Add new course</a>        
    </div>

<?php
    require "partials/footer.php";
?>