<?php

class Database {
    private $pdo;

    public function __construct() {
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
    public function closeConnection() {
        $this->pdo = null;
    }
}
