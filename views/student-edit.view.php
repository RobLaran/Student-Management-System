<?php
    $title = "Edit";
    require "partials/head.php";
    require "partials/nav.php";
?>

<main>
    <h1>Edit Student</h1>

    <p><a href="/students">Go back...</a></p>

    <!-- <ul>
        <?php foreach($student as $key => $value): ?>
            <?php if($key == 'user_id') break; ?>
            <li><?= $key . " => " . $value ?></li>
        <?php endforeach; ?>
    </ul> -->
    
</main>

<?php 
    require "partials/footer.php";
?>