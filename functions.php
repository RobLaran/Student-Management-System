<?php 
    function dd($var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";

        die();
    }

    function cleanStr($value) {
        $value = trim($value);
        $value = htmlspecialchars($value);

        return $value ?? NULL;
    }

    function isURL($URL) {
        return $_SERVER['REQUEST_URI'] == $URL;
    }
?>