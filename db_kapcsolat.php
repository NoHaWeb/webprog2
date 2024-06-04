<?php

class Database {
    private $pdo;

    public function __construct() {
        // $host = "localhost";
        // $username = "root";
        // $password = "";
        // $database = "konyvtar";

        // $dsn = "mysql:host=$host;dbname=$database";
        $this->pdo = new PDO('mysql:host=localhost;dbname=web2', 'root','');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query, $params = array()) {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
        return $statement;
    }
    public function fall($query) {
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }
}
