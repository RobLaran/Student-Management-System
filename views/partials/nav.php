<nav>
    <h1>LOGO</h1>
    <ul>
        <li class="nav list-item">
            <a href="/home" style="<?= isURL("/home") ? "color: #FFD700;" : "" ?>">Home</a>
        </li>
        <li class="nav list-item">
            <a href="/about" style="<?= isURL("/about") ? "color: #FFD700;" : "" ?>">About</a>
        </li>
        <?php if(isset($_SESSION['user_id'])): ?>
                <li class="nav list-item">
                <a href="/students" style="<?= isURL("/students") ? "color: #FFD700;" : "" ?>">Students</a>
                </li>
                <li class="nav list-item">
                <a href="/courses" style="<?= isURL("/courses") ? "color: #FFD700;" : "" ?>">Courses</a>
                </li>
                <li class="nav list-item">
                <a href="/enroll" style="<?= isURL("/enroll") ? "color: #FFD700;" : "" ?>">Enroll</a>
                </li>
                <li class="nav list-item">
                <a href="/reports" style="<?= isURL("/reports") ? "color: #FFD700;" : "" ?>">Reports</a>
                </li>
        <?php endif ?>

        <li class="nav list-item">
            <a href="/contact" style="<?= isURL("/contact") ? "color: #FFD700;" : "" ?>">Contact</a>
        </li>
        <?php if(isset($_SESSION['user_id'])): ?>
            <li class="nav list-item">
                <a href="/logout" id="logout">Logout</a>
                </li>
                <li class="nav list-item">
                <a href="/profile" style="<?= isURL("/profile") ? "color: #FFD700;" : "" ?>">Profile</a>
            </li>
        <?php elseif(!in_array($_SERVER['REQUEST_URI'], array('/login', '/register'))): ?>
            <li class="nav list-item">
                <a href="/login">Login</a>
            </li>
        <?php endif ?>

        
    </ul>
</nav>