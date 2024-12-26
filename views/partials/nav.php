<nav>
    <h1>LOGO</h1>
    <ul>
        <li class="nav list-item">
            <a href="/home">Home</a>
        </li>
        <li class="nav list-item">
            <a href="/about">About</a>
        </li>
        <?php
            if(isset($_SESSION['user_id'])) {
                echo "
                <li class=\"nav list-item\">
                <a href=\"/students\">Students</a>
                </li>
                <li class=\"nav list-item\">
                <a href=\"/courses\">Courses</a>
                </li>
                <li class=\"nav list-item\">
                <a href=\"/enroll\">Enroll</a>
                </li>
                <li class=\"nav list-item\">
                <a href=\"/reports\">Reports</a>
                </li>
                ";
            }
        ?>

        <li class="nav list-item">
            <a href="/contact">Contact</a>
        </li>
        <?php 
            if(isset($_SESSION['user_id'])) {
                echo "
                <li class=\"nav list-item\">
                <a href=\"/logout\" id=\"logout\">Logout</a>
                </li>
                <li class=\"nav list-item\">
                <a href=\"/profile\">Profile</a>
                </li>";
            } else if(!in_array($_SERVER['REQUEST_URI'], array('/login', '/register'))){
                echo "
                <li class=\"nav list-item\">
                <a href=\"/login\">Login</a>
                </li>";
            }
        ?>
    </ul>
</nav>