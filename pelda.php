<?php

// Az adatbázis kapcsolatot tartalmazó fájl beolvasása
require_once 'db_kapcsolat.php';

// A CRUD műveleteket tartalmazó fájl beolvasása
require_once 'crud.php';

// Database objektum létrehozása
$db = new Database();

// CRUDManager objektum létrehozása
$crudManager = new CRUDManager($db);

// Példa insert művelet
// $data = array("name" => "John", "age" => 30);
// $crudManager->performCRUD("insert", "users", $data);

// Példa select művelet
$result = $crudManager->performCRUD("select", "termekek","");
echo("Példa auth kódja: ");
echo($_SESSION['auth']);
echo("<br>");
// Az eredmény feldolgozása
foreach ($result as $row) {
    echo "az idja: " . $row['termek_id'] . ", tneve: " . $row['termek_nev'] . "<br>";
}

?>
