<?php
    $title = "Contact";
    require "partials/head.php";
    require "partials/nav.php";

    $heading = "Contact Us";
    require "partials/banner.php";
?>
<div class="contact-container">
    <p class="paragraph">
        Have questions or need assistance? Please feel free to reach out to us. We’d love to hear from you!
    </p>

    <h2>Send Us a Message</h2>
    <form method="POST" action="process_contact.php">
        <label for="name">Your Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Your Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="message">Your Message:</label>
        <textarea name="message" id="message" rows="5" required></textarea><br><br>

        <button type="submit">Send Message</button>
    </form>

    <h2>Contact Information</h2>
    <p>Email: laranrobelleney@gmail.com</p>
    <p>Phone: 0906 479 2965</p>
    <p>Address: Panal Street, Abgao, Maasin City, Southern Leyte</p>
</div>


<?php


    require "partials/footer.php";
?>