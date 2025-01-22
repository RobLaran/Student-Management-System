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
        $PATH = parse_url($_SERVER['REQUEST_URI'])['path'];

        return $PATH == $URL;
    }

    function orderBy($db, $column, $order, $columns=[], $table="") {
        $allowed_column = $columns;
        $allowed_order = ["ASC", "DESC"];

        if(!in_array($column, $allowed_column)) {
            $column = $columns[0];
        }

        if(!in_array($order, $allowed_order)) {
            $order = "ASC";
        }

        if(!empty($column) && !empty($order)) {
            if($order == "ASC") {
                $statement = $db->query("SELECT * FROM {$table} ORDER BY {$column} ASC");
            } else {
                $statement = $db->query("SELECT * FROM {$table} ORDER BY {$column} DESC");
            }

            $result = $statement->fetchAll();
        }

        return $result;
    }
?>