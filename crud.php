<?php

require_once 'db_kapcsolat.php';

class CRUDManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function performCRUD($crudOperation, $table, $data, $condition = "") {
        switch ($crudOperation) {
            case 'insert':
                $fields = implode(', ', array_keys($data));
                $values = implode(', ', array_fill(0, count($data), '?'));
                $query = "INSERT INTO $table ($fields) VALUES ($values)";
                $this->db->executeQuery($query, array_values($data));
                break;
            case 'update':
                $updates = implode(', ', array_map(function($key) {
                    return "$key = ?";
                }, array_keys($data)));
                $query = "UPDATE $table SET $updates WHERE $condition";
                $this->db->executeQuery($query, array_values($data));
                break;
            case 'delete':
                $query = "DELETE FROM $table WHERE $condition";
                $this->db->executeQuery($query);
                break;
            case 'select':
                $query = "SELECT * FROM $table";
                if (!empty($condition)) {
                    $query .= " WHERE $condition";
                }
                return $this->db->executeQuery($query)->fetchAll(PDO::FETCH_ASSOC);
                
            default:
                // Handle unsupported operation
                throw new Exception("Nem támogatott CRUD művelet: $crudOperation");
        }
    }
}

?>
