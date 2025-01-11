<?php
    $title = "About";
    require "partials/head.php";
    require "partials/nav.php";

    $heading = "About Student Management System";
    
    require "partials/banner.php";
?>
<main class="about-container">
    <p class="paragraph">
        The Student Management System (SMS) is a web-based platform designed to streamline student and course management
        for educational institutions. It simplifies administrative tasks and provides essential insights through
        generated reports.
    </p>

    <h2>Scope of the System</h2>
    <ul>
        <li>Authenticate users to ensure secure access.</li>
        <li>Manage students:
            <ul>
                <li>Add, edit, and delete student profiles.</li>
                <li>View a comprehensive list of students.</li>
            </ul>
        </li>
        <li>Manage courses:
            <ul>
                <li>Create, edit, and delete course details.</li>
                <li>View a detailed list of all available courses.</li>
            </ul>
        </li>
        <li>Enroll students:
            <ul>
                <li>Assign students to courses by selecting from lists.</li>
            </ul>
        </li>
        <li>Generate reports:
            <ul>
                <li>Get insights like total enrolled students and available courses.</li>
            </ul>
        </li>
    </ul>

    <h2>About the Developer</h2>
    <p>
        This system is developed by Rob Laran, a second-year Information Technology student passionate about creating
        efficient software solutions for real-world problems.
    </p>
</main>


<?php


    require "partials/footer.php";
?>