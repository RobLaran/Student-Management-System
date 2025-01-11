<?php
    $title = "Home";
    require "partials/head.php";
    require "partials/nav.php";

    $heading = "Welcome to the Student Management System";
    require "partials/banner.php";
?>

<?php if(isset($_SESSION['user_id']) && isset($_SESSION['success_message_displayed'])): ?>
    <div class="alert" style="background-color: #04AA6D;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>Success!</strong> You are now logged in.
    </div>
<?php endif ?>

<?php if(isset($_SESSION['success_message_displayed'])) {
    unset($_SESSION['success_message_displayed']);
    } 
?>

<main class="home-container">
    <p class="paragraph">
        The Student Management System (SMS) is designed to simplify managing students, courses, and enrollments.
        Log in to explore how this system can make administration effortless.
    </p>

<?php if(!isset($_SESSION['user_id'])): ?>
    <section class="authentication-section">
        <a href="login" class="btn">Login</a>
        <h4>Or</h4>
        <a href="register" class="btn">Register</a>
    </section>
<?php endif ?>


   

    <section id="features">
        <h2>Our Features</h2>
        <ul>
            <li>Authenticate users to ensure security.</li>
            <li>Manage students: Add, edit, delete student profiles.</li>
            <li>Manage courses: Create, edit, delete course information.</li>
            <li>Enroll students into courses quickly and easily.</li>
            <li>Generate reports for better decision-making.</li>
        </ul>
    </section>

</main>

<?php require "partials/footer.php"; ?>