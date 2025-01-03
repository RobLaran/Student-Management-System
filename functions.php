<?php 
    function dd($var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";

        die();
    }

    function cleanStr($value) {
        return strlen(htmlspecialchars(trim($value))) != 0 ? htmlspecialchars(trim($value)) : NULL;
    }

    function isURL($URL) {
        return $_SERVER['REQUEST_URI'] == $URL;
    }
?>