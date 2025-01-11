<?php
    class Database {
        public $connection;

        function __construct($username, $password, $config) {
            // establish database connection
            $dsn = "mysql:" . http_build_query($config, '', ';');

            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            if(!$this->connection) {
                die('could not connect:'.mysqli_connect_error());
            }
        }

        function query($query, $params=[]) {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }
    }

    
?>