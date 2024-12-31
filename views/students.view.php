<?php
    $title = "Students";
    require "partials/head.php";
    require "partials/nav.php";
?>
    <div class="form-container">
        <h1>Add Student</h1>
        <form action="process_add_student.php" method="POST" id="student-form">
           <div class="form-wrapper">
                    <!-- Student Name -->
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first-name" placeholder="Enter first name" required>

                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last-name" placeholder="Enter last name" required>
                
                <!-- Email -->
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email address" required>

                <!-- Date of birth -->
                <label for="date-of-birth">Date of birth :</label>
                <input type="date" id="date of birth" name="date of birth" min="1" max="100" placeholder="Enter date of birth" required>
                
                <label for="phoneNumber">Phone number: </label>
                <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Enter phone number" >

                <fieldset style="display: inline">
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

                <label for="address">Address:</label>
                <input type="text" name="address" id="address" placeholder="Enter address">
           </div>

            <!-- Submit Button -->
             <div id="add-student-wrapper">
                <button type="submit" id="add-student-button">Add Student</button>
             </div>
            
        </form>
    </div>

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
                                    <?php if($key == 'user_id') {
                                        echo "
                                        <td>
                                        <a href=\"/students/edit?id={$student['student_id']}\">EDIT</a> <br>
                                        <a href=\"#\">DELETE</a>
                                        </td>";

                                        break;
                                    } ?>

                                        <td><?= $value ?></td>

                                <?php endforeach; ?>

                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
<?php
    require "partials/footer.php";
?>